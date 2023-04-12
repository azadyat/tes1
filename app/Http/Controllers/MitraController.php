<?php

namespace App\Http\Controllers;

use App\model\Mitra;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class MitraController extends Controller
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
        $data = Mitra::all();



        // return response()->json($data);
        return view('admin.mitra.index', compact('data'));
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
        $cek = Mitra::count();
        //dd($cek);
        if ($cek == 0) {
            $urut = 1001;
            $nomor = 'HK-BEAUTY-' . $thnbulan . $urut;
            //dd($nomor);
        } else {

            $ambil = Mitra::all()->last();
            $urut = (int)substr($ambil->username, -4) + 1;
            $nomor = 'HK-BEAUTY-' . $thnbulan . $urut;
            // dd($nomor);
        }
        return view('admin.mitra.create', compact('nomor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // mitra::create($request->all());

        $username = $request->usernamelog;

        $cekdata = mitra::where('usernamelog', $username)->first();
        if ($cekdata) {

            // return redirect('/tambah-mitra')->withErrors('data telah ada');
            Alert::error('', 'Data Sudah Ada');


            return redirect('/tambah-mitra');
        } else {



            $data = $request->gambar_bengkel;
            $namaFile = time() . rand(100, 999) . "." . $data->getClientOriginalExtension();

            $dtUpload = new Mitra();
            $dtUpload->nama_mitra = $request->nama_mitra;
            $dtUpload->gambar_bengkel = $namaFile;
            $dtUpload->alamat = $request->alamat;
            $dtUpload->no_hp = $request->no_hp;
            $dtUpload->username = $request->username;
            $dtUpload->usernamelog = $request->usernamelog;
            $dtUpload->password = $request->password;
            $dtUpload->wa = $request->wa;
            $dtUpload->yt = $request->yt;
            $dtUpload->tt = $request->tt;
            $dtUpload->sp = $request->sp;
            $dtUpload->ig = $request->ig;
            $dtUpload->fb = $request->fb;

            $data->move(public_path() . '/img', $namaFile);
            $dtUpload->save();
        }
        //    return redirect('admin.produk.index');
        // return redirect('/produk')->withSuccess('data berhasil di simpan');
        return redirect('/mitra')->withSuccess('data berhasil di simpan');
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
        $data = mitra::find($id);
        return view('admin.mitra.edit', compact('data'));
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
        // $data = mitra::find($id);
        // $model = $request->all();
        // $data->update($model);



        $data = Mitra::findorfail($id);
        $gambar = isset($request->gambar_bengkel) ? ($request->gambar_bengkel) : null;

        if (isset($gambar)) {

            $awal = $request->gambar_bengkel;
            $namaFile = time() . rand(100, 999) . "." . $awal->getClientOriginalExtension();

            // $request->gambar->move(public_path().'/img',$namaFile);
            $awal->move(public_path() . '/img', $namaFile);
        } else {

            $namaFile = $data->gambar_bengkel;
        }

        $dt = [
            'nama_mitra' => $request['nama_mitra'],
            'gambar_bengkel' => $namaFile,
            'alamat' => $request['alamat'],
            'no_hp' => $request['no_hp'],
            'username' => $request['username'],
            'usernamelog' => $request['usernamelog'],
            'password' => $request['password'],
            'ig' => $request['ig'],
            'tt' => $request['tt'],
            'wa' => $request['wa'],
            'sp' => $request['sp'],
            'fb' => $request['fb'],
            'yt' => $request['yt'],
        ];
        // dd($namaFile);

        // $request->gambar->move(public_path().'/img',$awal);

        $data->update($dt);


        return redirect('/mitra')->withSuccess('data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = mitra::find($id);
        $data->delete();

        return redirect('/mitra')->withSuccess('data berhasil di hapus');
    }
}
