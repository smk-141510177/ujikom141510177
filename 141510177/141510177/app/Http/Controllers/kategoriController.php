<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Input;
use App\Kategori_lembur;
use App\Golongan;
use App\Jabatan;
class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $kategori=Kategori_lembur::paginate(5);
        return view('kategori_lembur.index',compact('kategori'));
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
        return view('kategori_lembur.create',compact('golongan','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules=[
                'kode_l'=>'required|unique:kategori_lemburs,kode_l',
                'golongan_id'=>'required',
                'jabatan_id'=>'required',
                'besar_uang'=>'required|numeric',
                ];
        $sms=[
                'kode_l.required'=>'jangan kosong',
                'besar_uang.required'=>'jangan kosong',
                'besar_uang.numeric'=>'harus angka',
                'kode_l.unique'=>'jangan sama',
                'golongan_id.required'=>'jangan kosong',
                'jabatan_id.required'=>'jangan kosong',
                ];
        $validasi=Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->WithErrors($validasi)
            ->WithInput();
        }
        $check=Kategori_lembur::all();
        foreach($check as $data){
            if(Request('golongan_id') == $data->golongan_id && Request('jabatan_id') == $data->jabatan_id) {
                $jangan=true;
                $golongan=Golongan::all();
                $jabatan=Jabatan::all();
                return view('kategori_lembur.create',compact('jangan','jabatan','golongan'));
            }
        }
        $kategori=Request::all();
        Kategori_lembur::create($kategori);
        return redirect('kategori');
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
        $kategori=Kategori_lembur::find($id);
        return view('kategori_lembur.edit',compact('kategori','golongan','jabatan'));
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
        $kategori=Kategori_lembur::where('id',$id)->first();
        if($kategori['kode_l'] != Request('kode_l')){

        $rules=[
                'kode_l'=>'required|unique:kategori_lemburs,kode_l',
                'golongan_id'=>'required',
                'besar_uang'=>'required',
                'jabatan_id'=>'required',
                ];
        }
        else{

        $rules=[
                'kode_l'=>'required',
                'golongan_id'=>'required',
                'jabatan_id'=>'required',
                ];
        }
        $sms=[
                'kode_l.required'=>'jangan kosong',
                'besar_uang.required'=>'jangan kosong',
                'kode_l.unique'=>'jangan sama',
                'golongan_id.required'=>'jangan kosong',
                'jabatan_id.required'=>'jangan kosong',
                ];
        $validasi=Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->WithErrors($validasi)
            ->WithInput();
        }

        $update=Request::all();
        $kategori=Kategori_lembur::find($id);
        $kategori->update($update);
        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori=Kategori_lembur::find($id)->delete();
        return redirect('kategori');
    }
}
