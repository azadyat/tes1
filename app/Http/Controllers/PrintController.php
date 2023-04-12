<?php

namespace App\Http\Controllers;

use App\model\Mitra;
use App\model\Penonton;
use App\model\Pesanan;
use App\model\PesananDetail;
use App\model\reseller;
use PDF;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintController extends Controller
{
    public function print($id)
    {

        $pesanan = Pesanan::where('id', $id)->first();
        //   dd($pesanan);
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        $pdf = PDF::loadView('admin.orderan.print', compact('pesanan', 'pesanan_details', 'id'))->setPaper('a4', 'landscape');

        return $pdf->stream();



        // return $pdf->download('invoice.pdf');
        // return view('admin.orderan.print' ,compact('pesanan','pesanan_details','id'));
    }

    public function data()
    {
        return view('admin.report.index');
    }

    public function member($id, Request $request)
    {

        $servisan = DB::table('mitras')
            ->where('id', $request->session()->get('id'))
            // ->orderByRaw('kd_transaksi')
            ->first();
        // $servisan = Mitra::where('id', $id)->first();
        //   dd($pesanan);
        $servisanq = Mitra::where('id', $servisan->id)->get();
        return view('user.card', compact('servisan', 'servisanq', 'id'));
        // return $pdf->stream('Member Card');
    }


    public function memberadmin($id)
    {


        $servisan = Mitra::where('id', $id)->first();
        //   dd($pesanan);
        $servisanq = Mitra::where('id', $servisan->id)->get();
        return view('user.card', compact('servisan', 'servisanq', 'id'));
        // return $pdf->stream();
    }

    public function res($id)
    {


        $servisan = reseller::where('id', $id)->first();
        // dd($servisan);
        $servisanq = reseller::where('id', $servisan->id)->get();
        // $nama = reseller::where('nama_reseller', $servisan->nama_reseller)->get();
        // dd($nama);
        // $customPaper = array(0, 0, 720, 1440);
        return view('admin.reseller.card', compact('servisan', 'servisanq', 'id'));
        // return $pdf->stream('Reseller Card');
    }


    public function index()
    {

        $data = Penonton::all();

        return view('admin.report.index', compact('data'));
    }

    public function show()
    {
        $pesanan = Pesanan::where('status', 4)->get();

        return view('admin.report.print', compact('pesanan'));
    }

    public function printreport()
    {
        $belum = Penonton::where('status', 0)->get();
        //   dd($pesanan);
        $pdf = PDF::loadView('admin.report.print', compact('belum'))->setPaper('a4', 'landscape');

        return $pdf->stream();
    }


    public function printreport1()
    {
        $belum = Penonton::where('status', 1)->get();
        //   dd($pesanan);
        $pdf = PDF::loadView('admin.report.print', compact('belum'))->setPaper('a4', 'landscape');

        return $pdf->stream();
    }
    public function store(Request $request)
    {

        // $tanggal = CarbonCarbon::now();
        $tanggal = Carbon::now();


        $start = $request->start;
        $end = $request->end;

        $pesanan = Pesanan::where('status', 5)->whereBetween('created_at', [$start, $end])->get();


        $pdf = PDF::loadView('admin.report.print', compact('pesanan', 'start', 'end', 'tanggal'))->setPaper('a4', 'landscape');
        // dd($pesanan);

        return $pdf->stream();
    }
}
