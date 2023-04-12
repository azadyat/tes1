<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::guard()->check()) {
            Alert::success('Login Berhasil');

            return redirect('admin');
        } else {
            return redirect('login');
        }
    }
}
