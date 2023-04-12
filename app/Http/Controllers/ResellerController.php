<?php

namespace App\Http\Controllers;

use App\model\reseller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $data = reseller::all();



        // return response()->json($data);
        return view('admin.reseller.index', compact('data'));
        // dd($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = Carbon::now();
        $thnbulan = $now->year . $now->month;
        $cek = reseller::count();
        //dd($cek);
        if ($cek == 0) {
            $urut = 1001;
            $nomor = 'RESELLER-HK-BEAUTY-' . $thnbulan . $urut;
            //dd($nomor);
        } else {

            $ambil = reseller::all()->last();
            $urut = (int)substr($ambil->username, -4) + 1;
            $nomor = 'RESELLER-HK-BEAUTY-' . $thnbulan . $urut;
            // dd($nomor);
        }
        return view('admin.reseller.create', compact('nomor'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->gambar;
        $namaFile = time() . rand(100, 999) . "." . $data->getClientOriginalExtension();

        $dtUpload = new reseller();
        $dtUpload->nama_reseller = $request->nama_reseller;
        $dtUpload->gambar = $namaFile;
        $dtUpload->alamat = $request->alamat;
        $dtUpload->no_hp = $request->no_hp;
        $dtUpload->username = $request->username;
        $dtUpload->wa = $request->wa;
        $dtUpload->yt = $request->yt;
        $dtUpload->tt = $request->tt;
        $dtUpload->sp = $request->sp;
        $dtUpload->ig = $request->ig;
        $dtUpload->fb = $request->fb;
        // $dtUpload->usernamelog = $request->usernamelog;
        // $dtUpload->password = $request->password;

        $data->move(public_path() . '/reseller', $namaFile);
        $dtUpload->save();
        return redirect('/reseler')->withSuccess('data berhasil di simpan');
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

        $data = reseller::find($id);

        $now = Carbon::now();
        $thnbulan = $now->year . $now->month;
        $cek = reseller::count();
        //dd($cek);
        if ($cek == 0) {
            $urut = 1001;
            $nomor = 'RESELLER-HK-BEAUTY-' . $thnbulan . $urut;
            //dd($nomor);
        } else {

            $ambil = reseller::all()->last();
            $urut = (int)substr($ambil->username, -4) + 1;
            $nomor = 'RESELLER-HK-BEAUTY-' . $thnbulan . $urut;
            // dd($nomor);
        }
        return view('admin.reseller.edit', compact('data', 'nomor'));
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

        $data = reseller::findorfail($id);
        $gambar = isset($request->gambar) ? ($request->gambar) : null;

        if (isset($gambar)) {

            $awal = $request->gambar;
            $namaFile = time() . rand(100, 999) . "." . $awal->getClientOriginalExtension();

            // $request->gambar->move(public_path().'/img',$namaFile);
            $awal->move(public_path() . '/reseller', $namaFile);
        } else {

            $namaFile = $data->gambar;
        }

        $dt = [
            'nama_reseller' => $request['nama_reseller'],
            'gambar' => $namaFile,
            'alamat' => $request['alamat'],
            'no_hp' => $request['no_hp'],
            'username' => $request['username'],
            'ig' => $request['ig'],
            'tt' => $request['tt'],
            'wa' => $request['wa'],
            'sp' => $request['sp'],
            'fb' => $request['fb'],
            'yt' => $request['yt'],
            // 'usernamelog' => $request['usernamelog'],
            // 'password' => $request['password'],
        ];
        // dd($namaFile);

        // $request->gambar->move(public_path().'/img',$awal);

        $data->update($dt);


        return redirect('/reseler')->withSuccess('data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = reseller::find($id);
        $data->delete();

        return redirect('/reseller')->withSuccess('data berhasil di hapus');
    }
}
