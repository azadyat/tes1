<?php

namespace App\Http\Controllers;

use App\model\Penonton;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $thnbulan = $now->year . $now->month;
        $cek = Penonton::count();
        //dd($cek);
        if ($cek == 0) {
            $urut = 1001;
            $nomor = 'konser-' . $thnbulan . $urut;
            //dd($nomor);
        } else {

            $ambil = Penonton::all()->last();
            $urut = (int)substr($ambil->id_tiket, -4) + 1;
            $nomor = 'konser-' . $thnbulan . $urut;
            // dd($nomor);
        }


        // dd($nomor);
        return view('user.register.register', compact('nomor'));
    }


    public function konser()
    {

        $data = Penonton::all();



        // return response()->json($data);
        return view('admin.penonton.index', compact('data'));
        // dd($data);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Penonton();

        $data->id_tiket = $request->input('id_tiket');
        $data->nama = $request->input('nama');
        $data->no_hp = $request->input('no_hp');
        $data->alamat = $request->input('alamat');
        $data->status = "0";
        $data->save();
        // dd($data);
        return redirect('/')->withSuccess('Tiket Berhasil Dipesan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Penonton::find($id);
        $now = Carbon::now();
        $thnbulan = $now->year . $now->month;
        $cek = Penonton::count();
        //dd($cek);
        if ($cek == 0) {
            $urut = 1001;
            $nomor = 'konser-' . $thnbulan . $urut;
            //dd($nomor);
        } else {

            $ambil = Penonton::all()->last();
            $urut = (int)substr($ambil->id_tiket, -4) + 1;
            $nomor = 'konser-' . $thnbulan . $urut;
            // dd($nomor);
        }

        return view('admin.penonton.edit', compact('data', 'nomor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Penonton::find($id);

        $data->id_tiket = $request->input('id_tiket');
        $data->nama = $request->input('nama');
        $data->no_hp = $request->input('no_hp');
        $data->alamat = $request->input('alamat');

        $data->update();
        return redirect('/penonton')->withSuccess('data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = Penonton::find($id);
        $data->delete();
        return redirect('/penonton')->withSuccess('data berhasil di hapus');
    }


    public function masuk(Request $Request, $id)
    {
        $data = Penonton::where('id', $id)->firstOrFail();
        $data->status = 1;


        // $data->status_berobat = "Resep Diberikan";
        // $data->id_pasien = $id;
        // 


        $data->update();
        return redirect('/penonton')->withSuccess('Penonton Berhasil Masuk');
    }
}
