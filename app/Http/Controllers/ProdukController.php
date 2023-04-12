<?php

namespace App\Http\Controllers;

use App\model\Barang;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::all();
        // return response()->json($data);
        return view('admin.produk.index', compact('data'));
        // dd($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Barang::all();

        return view('admin.produk.create', compact('data'));
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
        $data = $request->gambar;
        $namaFile = time() . rand(100, 999) . "." . $data->getClientOriginalExtension();

        $dtUpload = new Barang;
        $dtUpload->nama_barang = $request->nama_barang;
        $dtUpload->gambar = $namaFile;
        $dtUpload->harga = $request->harga;
        $dtUpload->stok = $request->stok;
        $dtUpload->deskripsi = $request->deskripsi;

        $data->move(public_path() . '/img', $namaFile);
        $dtUpload->save();
        //    return redirect('admin.produk.index');
        return redirect('/produk')->withSuccess('data berhasil di simpan');
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
        $data = barang::find($id);
        return view('admin.produk.edit', compact('data'));
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
        $data = Barang::findorfail($id);
        $gambar = isset($request->gambar) ? ($request->gambar) : null;

        if (isset($gambar)) {

            $awal = $request->gambar;
            $namaFile = time() . rand(100, 999) . "." . $awal->getClientOriginalExtension();

            // $request->gambar->move(public_path().'/img',$namaFile);
            $awal->move(public_path() . '/img', $namaFile);
        } else {

            $namaFile = $data->gambar;
        }

        $dt = [
            'nama_barang' => $request['nama_barang'],
            'gambar' => $namaFile,
            'harga' => $request['harga'],
            'stok' => $request['stok'],
            'deskripsi' => $request['deskripsi'],
        ];
        // dd($dt);
        // $request->gambar->move(public_path().'/img',$awal);

        $data->update($dt);

        // else{
        // $dt = [
        //     'nama_barang' => $request['nama_barang'],
        //     'gambar' => $awal,
        //     'harga' => $request['harga'],
        //     'stok' => $request['stok'],
        //     'deskripsi' => $request['deskripsi'],

        // ];
        // $request->gambar->move(public_path().'/img',$awal);
        // $data->update($dt);




        return redirect('/produk')->withSuccess('data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang::find($id);
        $data->delete();

        return redirect('/produk')->withSuccess('data berhasil di hapus');
    }
}
