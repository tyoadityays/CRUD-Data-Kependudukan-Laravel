<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
//edit
use Illuminate\Support\Facades\Crypt;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datapenduduk = Penduduk::latest()->get();
        return view('app.ListPenduduk', compact('datapenduduk'));
        //return view('template.adminLTE');
    }

    public function adddatapenduduk()
    {
        //
        return view('app.AddPenduduk');
        //return view('template.adminLTE');
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
       //dd($request);
        $addpenduduk = Penduduk::create([
            'id' => $request->id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kelamin' => $request->kelamin,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'pekerjaan' => $request->pekerjaan,
            'warga' => $request->warga,
            'asal' => $request->asal,
            'tanggal' => $request->tanggal,
            'golongan' => $request->golongan,
        ]);
        if ($addpenduduk){
            return redirect('/datapenduduk');
        }
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
    public function editdata($id)
    {
        //
        $datapenduduk = Penduduk::findOrFail(Crypt::decryptString($id));
        return view('app.EditPenduduk', compact('datapenduduk'));
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
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->update([
            'id' => $request->id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kelamin' => $request->kelamin,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'pekerjaan' => $request->pekerjaan,
            'warga' => $request->warga,
            'asal' => $request->asal,
            'tanggal' => $request->tanggal,
            'golongan' => $request->golongan,
        ]);
        return redirect('/datapenduduk');
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
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();
        return redirect('/datapenduduk');
    }
}