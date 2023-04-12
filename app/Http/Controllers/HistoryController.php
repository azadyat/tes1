<?php

namespace App\Http\Controllers;

use App\model\Barang;
use App\model\Pesanan;
use App\model\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pesanans = Pesanan::where('id_mitra', $request->session()->get('id'))->where('status', '!=', 0)->get();
        $db = DB::table('mitras')
            ->where('id', $request->session()->get('id'))
            // ->orderByRaw('kd_transaksi')
            ->get();
        return view('user.pesan.history', compact('pesanans', 'db'));
    }


    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        //   dd($pesanan);
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('user.pesan.detail', compact('pesanan', 'pesanan_details'));
    }

    public function terima($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        //   dd($pesanan);
        $pesanan_id = $pesanan->id;
        $pesanan->status = 4;
        $pesanan->update();
        Alert::success('Pesanan Sudah Diterima');

        return redirect('/history');
    }
    public function buktitr(Request $request)
    {

        $data = Pesanan::findorfail($request->id);
        //dd($data);
        $gambar = isset($request->gambar) ? ($request->gambar) : null;

        if (isset($gambar)) {

            $awal = $request->gambar;
            $namaFile = time() . rand(100, 999) . "." . $awal->getClientOriginalExtension();
            //dd($namaFile);
            $request->gambar->move(public_path() . '/bukti', $namaFile);
            //  $awal->move(public_path().'/bukti', $namaFile);
            //  dd(
            //  $awal->move(public_path().'/bukti', $namaFile)

            //  );


        } else {

            $namaFile = $data->gambar;
        }

        $dt = [
            'buktitr' => $namaFile,
            'status' => 2,
        ];
        //dd($dt);

        $data->update($dt);



        return redirect('/history')->withSuccess('berhasil upload bukti transfer');
    }


    public function feedback(Request $request)
    {
        $data = Pesanan::findorfail($request->id);


        // $data = feedback->$request->input('feedback');
        $data->feedback = $request->input('feedback');
        $data->status = 5;

        // dd($data);
        $data->update();



        return redirect('/history')->withSuccess('berhasil mengirim feedback');
    }
}
