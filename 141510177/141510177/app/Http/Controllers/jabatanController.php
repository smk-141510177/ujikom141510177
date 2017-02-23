<?php

namespace App\Http\Controllers;

use Request;
use App\Jabatan;
use Validator;
use Input;
class jabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('hrd');
    }
    public function index()
    {
        $jabatan=Jabatan::paginate(5);
        return view('jabatan.index',compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        // $this->validate($request,['kode_g' => 'required|unique:jabatans,kode_g',
    {
        //     'nama_g' => 'required','besar_uang' =>'required'
        //     ]);

        $rules=['kode_j' => 'required|unique:jabatans,kode_j',
            'nama_j' => 'required',
            'besar_uang' =>'required|numeric'];
        $sms=[
            'kode_j.required' => 'jangan kosong',
            'kode_j.unique' => 'data udah ada',
            'nama_j.required' => 'jangan kosong',
            'besar_uang.required' => 'jangan kosong',
            'besar_uang.numeric' => 'harus angka',
            ];
        $validasi = Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->withErrors($validasi)
            ->withInput();
        }

        $jabatan=Request::all();
        Jabatan::create($jabatan);
        return redirect('jabatan');
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
        $jabatan=Jabatan::find($id);
        return view ('jabatan.edit',compact('jabatan'));
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
        $jabatan=Jabatan::where('id', $id)->first();
        if($jabatan['kode_j'] != Request('kode_j')){
               $rules=['kode_j' => 'required|unique:jabatans',
                'nama_j' => 'required','besar_uang' =>'required'];
        }
        else{

               $rules=['kode_j' => 'required',
                'nama_j' => 'required','besar_uang' =>'required'];
        }
        $sms=[
            'kode_j.required' => 'jangan kosong',
            'kode_j.unique' => 'jangan sama',
            'nama_j.required' => 'jangan kosong',
            'besar_uang.required' => 'jangan kosong',
            ];
        $validasi = Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->withErrors($validasi)
            ->withInput();
        }

        $update=Request::all();
        $jabatan=Jabatan::find($id);
        $jabatan->update($update);
        return redirect('jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan=Jabatan::find($id)->delete();
        return redirect('jabatan');
    }
}
