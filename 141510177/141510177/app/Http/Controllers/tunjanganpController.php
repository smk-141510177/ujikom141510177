<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Input;
use App\Tunjangan_pegawai;
use App\Pegawai;
use App\Tunjangan;

class tunjanganpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjanganp=Tunjangan_pegawai::all();
        return view('tunjanganp.index',compact('tunjanganp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tunjangan=Tunjangan::all();
        $pegawai=Pegawai::all();
        return view('tunjanganp.create',compact('pegawai','tunjangan'));
    }
    public function error2()
    {
         $tunjangan=Tunjangan::all();
        $pegawai=Pegawai::all();
        return view('tunjanganp.error2',compact('pegawai','tunjangan'));
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
        
        $roles=[
            'pegawai_id'=>'required',
        ];
        $sms=[
            'pegawai_id.required'=>'jangan kosong',
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect('tunjanganp/create')
                    ->WithErrors($validasi)
                    ->WithInput();
        }
        else{

        $pegawai=Pegawai::where('id',Request('pegawai_id'))->first();
            $tunjangan=Tunjangan::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();

            if($tunjangan){

                $tunjanganp=new Tunjangan_pegawai;
                $tunjanganp->pegawai_id=Request('pegawai_id');
                $tunjanganp->kode_tunjangan_id=$tunjangan->id;
                $tunjanganp->save();
                return redirect('tunjanganp');
            
            
            }
                return redirect('error2');
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
    public function edit($id)
    {
        $tunjanganpa=Tunjangan_pegawai::find($id);
        $tunjangan=Tunjangan::all();
        $pegawai=Pegawai::all();
        return view('tunjanganp.edit',compact('pegawai','tunjangan','tunjanganp'));
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
        $roles=[
            'kode_lembur_id'=>'required',
            'pegawai_id'=>'required',
            ];
        $sms=[
            'kode_lembur_id.required'=>'jangan kosong',
            'pegawai_id.required'=>'jangan kosong',
            ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect('tunjanganp/create')
                ->WithErrors($validasi)
                ->WithInput();
        }
        $update=Request::all();
        $tunjanganp=Tunjangan_pegawai::find($id);
        $tunjanganp->update($update);
        return redirect('tunjanganp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tunjanganp=Tunjangan_pegawai::find($id)->delete();
        return redirect('tunjanganp');
    }
}
