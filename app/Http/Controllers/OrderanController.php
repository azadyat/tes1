<?php

namespace App\Http\Controllers;

use App\model\Barang;
use App\model\Pesanan;
use App\model\PesananDetail;
use App\model\Mitra;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;


use Illuminate\Http\Request;

class OrderanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // munculkan seluruh orderan yg ada ditabel pesanan;


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pesanans = Pesanan::where('status', '!=', 0)
            ->orderBy('id', 'DESC')->get();
        $pesanans = Pesanan::paginate(6);

        //  dd($pesanans);

        return view('admin.orderan.index', compact('pesanans'));
    }
    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        //   dd($pesanan);
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('admin.orderan.detail', compact('pesanan', 'pesanan_details', 'id'));
    }

    public function dibayar($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        //   dd($pesanan);
        $pesanan_id = $pesanan->id;
        $pesanan->status = 6;
        $pesanan->update();
        Alert::success('Pesanan Sudah Dibayar');

        return redirect('/orderan');
    }
    public function kirim($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        //   dd($pesanan);
        $pesanan_id = $pesanan->id;
        $pesanan->status = 3;
        $pesanan->update();
        Alert::success('Pesanan Sudah Dikirim');

        return redirect('/orderan');
    }

    public function transfer()
    {
        $pesanans = Pesanan::where('buktitr', '!=', null)
            ->orderBy('id', 'DESC')->get();
        $pesanans = Pesanan::paginate(6);
        return view('admin.orderan.bukti', compact('pesanans'));
    }
}
