<?php

namespace App\Http\Controllers;

use App\model\Mitra;

use Illuminate\Http\Request;
use App\model\Barang;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;
use RealRashid\SweetAlert\Facades\Alert;
use Session;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {


        return view('user.landing');
    }


    public function head(Request $request)
    {
        $db = DB::table('mitras')
            ->where('id', $request->session()->get('id'))
            // ->orderByRaw('kd_transaksi')
            ->get();


        // $keyword = null;

        // $data = Barang::Paginate(10);
        // return response()->json($data);

        return view('user.member', compact('db'));
    }


    public function card()
    {
        // $keyword = null;

        // $data = Barang::Paginate(10);
        // return response()->json($data);

        return view('user.card');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function info(Request $request)
    {
        // $pesanans = Pesanan::where('id_mitra', $request->session()->get('id'))->where('status', '!=', 0)->get();
        $db = DB::table('mitras')
            ->where('id', $request->session()->get('id'))
            // ->orderByRaw('kd_transaksi')
            ->get();
        return view('user.info', compact('db'));
    }

    public function registrasi()
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


        // dd($nomor);
        return view('user.register.register', compact('nomor'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $username = $request->username;

        $cekdata = mitra::where('username', $username)->first();
        if ($cekdata) {

            // return redirect('/tambah-mitra')->withErrors('data telah ada');
            // Alert::error('', 'Data Sudah Ada');
            FacadesSession::flash('peringatan', 'Username Telah Terdaftar Gunakan Yang Lain');

            return redirect('/daftar');
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
            return redirect('/')->withSuccess('Berhasil Mendaftar Sebagai Member');
        }
        //    return redirect('admin.produk.index');
        // return redirect('/produk')->withSuccess('data berhasil di simpan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cari_produk(Request $request)
    {
        $keyword = $request->search;

        $data = Barang::where('nama_barang', 'like', "%" . $keyword . "%",)
            ->Paginate(10);
        // dd($data);
        return view('user.index', compact('data', 'keyword'));
    }
}
