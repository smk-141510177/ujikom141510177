<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Input;
use App\Lembur_pegawai;
use App\Pegawai;
use App\Kategori_lembur;
use Carbon\Carbon;
class lemburpegawaiController extends Controller
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

        // $lembur=Lembur_pegawai::selectRaw("sum(lembur_pegawais.Jumlah_jam) as Jumlah_jam ,
        //                                     lembur_pegawais.kode_lembur_id as kode_lembur_id,
        //                                     lembur_pegawais.pegawai_id as pegawai_id" )
        //                         ->groupBy('kode_lembur_id','pegawai_id')
        //                         ->get();
        
        $lembur=Lembur_pegawai::all();
        $pegawai=Pegawai::all();
        $sekarang=Carbon::now()->day.'-'.Carbon::now()->month.'-'.Carbon::now()->year;
        // dd($sekarang);
        return view('lemburp.index',compact('sekarang','pegawai','lembur','a'));
    }
    public function searchbulan(Request $request)
    {
        $pegawai=Pegawai::all();
        $query = Request::get('q');

        $lembur = Lembur_pegawai::where('bulan', 'LIKE', '%' . $query . '%')->get();
        // dd($lemburp);
        return view('lemburp.resultbulan', compact('pegawai','query','lembur'));
    }
    public function searchnama(Request $request)
    {
        $pegawai=Pegawai::all();
        $query = Request::get('q');

        $lembur = Lembur_pegawai::where('pegawai_id', 'LIKE', '%' . $query . '%')->get();
        // dd($lemburp);
        return view('lemburp.resultnama', compact('pegawai','query','lembur'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai=Pegawai::all();
        $kategori=Kategori_lembur::all();
        $bulan=Carbon::now()->month;
        return view('lemburp.create',compact('pegawai','kategori','bulan'));
        //
    }
        public function error1()
    {
        $pegawai=Pegawai::all();
        $kategori=Kategori_lembur::all();
        return view('lemburp.error1',compact('pegawai','kategori'));
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
        $lemburp=Lembur_pegawai::all();
        $check=0;
        foreach ($lemburp as $data) {
            $check++;
        }
        if ($check>0) {
            # code...
            foreach ($lemburp as $data) {
                # code...
                $tanggal=$data->created_at->day.'-'.$data->created_at->month.'-'.$data->created_at->year;
                $sekarang=Carbon::now()->day.'-'.Carbon::now()->month.'-'.Carbon::now()->year;
                if($tanggal == $sekarang && $data->pegawai_id == Request('pegawai_id')){
                    $tanggal=true;
                    $pegawai=Pegawai::all();
        $bulan=Carbon::now()->month;

                    return view('lemburp/create',compact('tanggal','pegawai','bulan'));
                   
                }
                
            }
            $roles=[
                        'pegawai_id'=>'required',
                        'Jumlah_jam'=>'required|numeric',
                    ];
                    $sms=[
                        'pegawai_id.required'=>'jangan kosong',
                        'Jumlah_jam.required'=>'jangan kosong',
                        'Jumlah_jam.numeric'=>'harus angka',
                    ];
                    $validasi=Validator::make(Input::all(),$roles,$sms);
                    if($validasi->fails()){
                        return redirect('lemburp/create')
                                ->WithErrors($validasi)
                                ->WithInput();
                    }
                    else{

                        $pegawai=Pegawai::where('id',Request('pegawai_id'))->first();
                        $kategori=Kategori_lembur::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();

                        // dd($kategori);
                        if($kategori){

                            $lembur=new Lembur_pegawai;
                            $lembur->pegawai_id=Request('pegawai_id');
                            $lembur->kode_lembur_id=$kategori->id;
                            $lembur->Jumlah_jam=Request('Jumlah_jam');
                            $lembur->bulan=Request('bulan');
                            $lembur->save();
                            return redirect('lemburp');
                        
                        
                        }
                            return redirect('error1');
                    }
        }
        else{

                    $roles=[
                        'pegawai_id'=>'required',
                        'Jumlah_jam'=>'required|numeric',
                    ];
                    $sms=[
                        'pegawai_id.required'=>'jangan kosong',
                        'Jumlah_jam.required'=>'jangan kosong',
                        'Jumlah_jam.numeric'=>'harus angka',
                    ];
                    $validasi=Validator::make(Input::all(),$roles,$sms);
                    if($validasi->fails()){
                        return redirect('lemburp/create')
                                ->WithErrors($validasi)
                                ->WithInput();
                    }
                    else{

                        $pegawai=Pegawai::where('id',Request('pegawai_id'))->first();
                        $kategori=Kategori_lembur::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();

                        // dd($kategori);
                        if($kategori){

                            $lembur=new Lembur_pegawai;
                            $lembur->pegawai_id=Request('pegawai_id');
                            $lembur->kode_lembur_id=$kategori->id;
                            $lembur->Jumlah_jam=Request('Jumlah_jam');
                            $lembur->bulan=Request('bulan');
                            $lembur->save();
                            return redirect('lemburp');
                        
                        
                        }
                            return redirect('error1');
                    }
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
        $pegawai=Pegawai::all();
        $kategori=Kategori_lembur::all();
        $lembur=Lembur_pegawai::find($id);
        return view('lemburp.edit',compact('lembur','pegawai','kategori'));
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
            'Jumlah_jam'=>'required|numeric',
        ];
        
        $sms=[
            'Jumlah_jam.required'=>'jangan kosong',
            'Jumlah_jam.numeric'=>'harus angka',
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect()->back()
                    ->WithErrors($validasi)
                    ->WithInput();
        }
        $update=Request::all();
        $lembur=Lembur_pegawai::find($id);
        $lembur->update($update);
        return redirect('lemburp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $lembur=Lembur_pegawai::find($id)->delete();
        return redirect('lemburp');
    }
}
