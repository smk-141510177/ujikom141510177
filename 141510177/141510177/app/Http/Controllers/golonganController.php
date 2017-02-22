<?php

namespace App\Http\Controllers;

use Request;
use Input;
use Validator;
use App\Golongan;
class golonganController extends Controller
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
        $golongan=Golongan::paginate(5);
        return view('golongan.index',compact('golongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        // $this->validate($request,['kode_g' => 'required|unique:golongans,kode_g',
    {
        //     'nama_g' => 'required','besar_uang' =>'required'
        //     ]);

        $rules=['kode_g' => 'required|unique:golongans,kode_g',
            'nama_g' => 'required',
            'besar_uang' =>'required|numeric'];
        $sms=[
            'kode_g.required' => 'jangan kosong',
            'kode_g.unique' => 'data udah ada',
            'nama_g.required' => 'jangan kosong',
            'besar_uang.required' => 'jangan kosong',
            'besar_uang.numeric' => 'harus angka',
            ];
        $validasi = Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->withErrors($validasi)
            ->withInput();
        }

        $golongan=Request::all();
        Golongan::create($golongan);
        return redirect('golongan');
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
        $golongan=Golongan::find($id);
        return view ('golongan.edit',compact('golongan'));
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
        $golongan=Golongan::where('id' , $id)->first();
          if($golongan['kode_g'] != Request('kode_g')){

           $rules=[
                    'kode_g' => 'required|unique:golongans',
                    'nama_g' => 'required','besar_uang' =>'required'
                    ];
          }
          else{
           $rules=[
                    'kode_g' => 'required',
                    'nama_g' => 'required','besar_uang' =>'required'
                    ];

          }
        $sms=[
            'kode_g.required' => 'jangan kosong',
            'kode_g.unique' => 'jangan sama',
            'nama_g.required' => 'jangan kosong',
            'besar_uang.required' => 'jangan kosong',
            ];
        $validasi = Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->withErrors($validasi)
            ->withInput();
        }

        $update=Request::all();
        $golongan=Golongan::find($id);
        $golongan->update($update);
        return redirect('golongan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $golongan=Golongan::find($id)->delete();
        return redirect('golongan');
    }
}
