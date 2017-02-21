<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Input;
use App\Penggajian;
use App\Tunjangan_pegawai;
use App\Pegawai;
use App\Lembur_pegawai;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penggajian=Penggajian::all();
        $pegawai=Pegawai::all();
        $lemburp=Lembur_pegawai::all();
        $tunjangan=Tunjangan_pegawai::all();
        return view('penggajian.index',compact('penggajian','pegawai','lemburp','tunjangan'));
    }

     public function search(Request $request)
    {
        $query = Request::get('q');
        $pegawai = Pegawai::where('id', 'LIKE', '%' . $query . '%')->paginate(10);
        $pegawaii = Pegawai::all();
        $penggajian=Penggajian::all();
         $lemburp=Lembur_pegawai::all();
        $tunjangan=Tunjangan_pegawai::all();
        return view('penggajian.result', compact('penggajian','pegawai','pegawaii','lemburp','tunjangan', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penggajian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penggajian=Request::all();
        Penggajian::create($penggajian);
        return redirect('penggajian');
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
}
