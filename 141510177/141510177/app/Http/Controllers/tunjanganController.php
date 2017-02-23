<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Input;
use App\Tunjangan;
use App\Golongan;
use App\Jabatan;
class tunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('keuangan');
    }
    public function index()
    {
        $tunjangan=Tunjangan::paginate(5);
        return view('tunjangan.index',compact('tunjangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongan=Golongan::all();
        $jabatan=Jabatan::all();
        return view('tunjangan.create',compact('golongan','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $roles=[
                'kode_t'=>'required|unique:tunjangans',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'besar_uang'=>'required',
                'besar_uang'=>'required|numeric',
                'jumlah_anak'=>'required|numeric',
                'status'=>'required',
            ];
            $sms=[
                'kode_t.required'=>'jangan kosong',
                'kode_t.unique'=>'jangan sama',
                'jabatan_id.required'=>'jangan kosong',
                'golongan_id.required'=>'jangan kosong',
                'besar_uang.required'=>'jangan kosong',
                'besar_uang.numeric'=>'harus angka',
                'jumlah_anak.numeric'=>'harus angka',
                'jumlah_anak.required'=>'jangan kosong',
                'status.required'=>'jangan kosong',
            ];
            $validasi= Validator::make(Input::all(),$roles,$sms);
            if($validasi->fails()){
                return redirect()->back()
                        ->WithErrors($validasi)
                        ->WithInput();
            }

            $tunjangan=Request::all();
            Tunjangan::create($tunjangan);
            return redirect('tunjangan');
        
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
         $golongan=Golongan::all();
        $jabatan=Jabatan::all();
        $tunjangan=Tunjangan::find($id);
        return view('tunjangan.edit',compact('jabatan','golongan','tunjangan'));
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
        $tunjangan=Tunjangan::where('id',$id)->first();
        if($tunjangan['kode_t'] != Request('kode_t')){
            $roles=[
                'kode_t'=>'required|unique:tunjangans',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'besar_uang'=>'required',
                'jumlah_anak'=>'required',
                'status'=>'required',
            ];
        }
        else{
            $roles=[
                'kode_t'=>'required',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'besar_uang'=>'required',
                'jumlah_anak'=>'required',
                'status'=>'required',
            ];
        }
        $sms=[
                'kode_t.required'=>'jangan kosong',
                'kode_t.unique'=>'jangan sama',
                'jabatan_id.required'=>'jangan kosong',
                'golongan_id.required'=>'jangan kosong',
                'besar_uang.required'=>'jangan kosong',
                'status.required'=>'jangan kosong',
                'jumlah_anak.required'=>'jangan kosong',
            ];
            $validasi= Validator::make(Input::all(),$roles,$sms);
            if($validasi->fails()){
                return redirect()->back()
                        ->WithErrors($validasi)
                        ->WithInput();
            }

            $update=Request::all();
            $tunjangan=Tunjangan::find($id);
            $tunjangan->update($update);
            return redirect('tunjangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tunjangan=Tunjangan::find($id)->delete();
        return redirect('tunjangan');
    }
}
