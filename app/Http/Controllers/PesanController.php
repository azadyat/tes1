<?php

namespace App\Http\Controllers;

use App\model\Barang;
use Illuminate\Http\Request;
use App\model\Pesanan;
use App\model\PesananDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Request $request)
    {
        $barang = Barang::where('id', $id)->first();
        $pesanans = Pesanan::where('id_mitra', $request->session()->get('id'))->where('status', '!=', 0)->get();
        $db = DB::table('mitras')
            ->where('id', $request->session()->get('id'))
            // ->orderByRaw('kd_transaksi')
            ->get();
        return view('user.pesan.index', compact('barang', 'db'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function pesan(Request $request, $id)
    {

        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi stok
        if ($request->jumlah_pesan > $barang->stok) {
            Alert::error('Harap Cek Stok Barang');
            return redirect('/pesan/' . $id);
        }

        if ($request->jumlah_pesan == 0) {
            Alert::error('Harap Masukkan Jumlah Pesanan Dengan Benar');
            return redirect('/produk-mitra');
        }

        //cek validasi
        $cek_pesanan = Pesanan::where('id_mitra', $request->session()->get('id'))->where('status', 0)->first();
        if (empty($cek_pesanan)) {
            //simpan ke database pesanan detail
            $pesanan = new Pesanan;
            $pesanan->id_mitra = $request->session()->get('id');
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
            $pesanan->save();
        }


        //simpan ke database pesanan detail

        $pesanan_baru = Pesanan::where('id_mitra', $request->session()->get('id'))->where('status', 0)->first();
        //cek pesanan detail
        // dd($pesanan_baru);
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where(
            'pesanan_id',
            $pesanan_baru->id
        )->first();
        if (empty($cek_pesanan_detail)) {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->tanggal = $tanggal;
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga * $request->jumlah_pesan;

            $pesanan_detail->save();
        } else {
            $pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where(
                'pesanan_id',
                $pesanan_baru->id
            )->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;

            //harga sekarang
            $harga_pesanan_detail_baru = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //jumlah total
        $pesanan = Pesanan::where('id_mitra', $request->session()->get('id'))->where('status', 0)->first();
        //   dd($pesanan);

        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $barang->harga * $request->jumlah_pesan;
        $pesanan->update();
        Alert::success('Pesanan Sukses Masuk Keranjang');
        return redirect('/checkout');
    }

    public function checkout(Request $request)
    {
        // $pesanans = Pesanan::where('id_mitra', $request->session()->get('id'))->where('status', '!=', 0)->get();
        $db = DB::table('mitras')
            ->where('id', $request->session()->get('id'))
            // ->orderByRaw('kd_transaksi')
            ->get();
        $pesanan = Pesanan::where('id_mitra', $request->session()->get('id'))->where('status', 0)->first();
        //   dd($pesanan);

        if (!empty($pesanan)) {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }
        return view('user.pesan.checkout', compact('pesanan', 'pesanan_details', 'db'));
    }

    public function destroy($id)
    {

        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga;
        $pesanan->update();
        $pesanan_detail->delete();
        Alert::error('Pesanan Sukses Dihapus');
        return redirect('checkout');
    }

    public function konfirmasi(Request $request)
    {
        // $pesanans = Pesanan::where('id_mitra', $request->session()->get('id'))->where('status', '!=', 0)->get();
        $db = DB::table('mitras')
            ->where('id', $request->session()->get('id'))
            // ->orderByRaw('kd_transaksi')
            ->get();
        $pesanan = Pesanan::where('id_mitra', $request->session()->get('id'))->where('status', 0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok = $barang->stok - $pesanan_detail->jumlah;
            $barang->update();
        }

        Alert::success('Pesanan Sukses Di Checkout Silahkan Lakukan Pembayaran');
        return redirect('history/' . $pesanan_id);
    }
}
