<?php

namespace App\Http\Controllers;

use App\model\Mitra;
use App\model\reseller;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class LoginUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.login');
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
        // dd($request->all());
        $masuk = Mitra::where('usernamelog', $request->usernamelog)->where('password', $request->password)->first();
        if ($masuk) {

            $request->session()->put('status_login', '1');
            $request->session()->put('id', $masuk->id);
            $request->session()->put('nama', $masuk->nama_mitra);
            $request->session()->put('idluar', $masuk->id);

            //   $request->session()->put('status_login', '1');
            Alert::success('Login Berhasil');

            return Redirect('/');
        }
        Alert::error('', 'username atau password salah');

        return view('user.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $request->session()->flush();
        return Redirect('/')->withSuccess('Berhasil Logout');
    }


    public function out_admin(Request $request)
    {

        $request->session()->flush();
        return Redirect('/login');
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
}
