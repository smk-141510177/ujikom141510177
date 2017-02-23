<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penggajian ;
use App\Tunjangan_pegawai ;
use App\Pegawai ;
use App\Tunjangan ;
use App\Jabatan ;
use App\Golongan;
use App\Kategori_lembur ;
use App\Lembur_pegawai ;
use Input ;
use Validator ;
use auth ;
class gajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('karyawan');
    }
     public function index()
    {   
        if (Auth::user()->type_user=='Karyawan') {
            $wherepegawai=Pegawai::where('user_id',Auth::user()->id)->first();
            // dd($wherepegawai->id);
            $wheretunjangan=Tunjangan_pegawai::where('pegawai_id', $wherepegawai->id)->first();
            // dd($wheretunjangan);
            $penggajian=Penggajian::where('tunjangan_pegawai_id',$wheretunjangan->id)->paginate(5);
            // dd($penggajian);

            return view('gaji.karyawan',compact('penggajian'));
            

        }

        $penggajian=Penggajian::paginate(3);
        // dd($penggajian);
        return view('gaji.index',compact('penggajian'));
    }
    public function search(Request $request)
    {
        $query = Input::get('q');
         if (Auth::user()->type_user=='Karyawan') {
            $wherepegawai=Pegawai::where('user_id',Auth::user()->id)->first();
            // dd($wherepegawai->id);
            $wheretunjangan=Tunjangan_pegawai::where('pegawai_id', $wherepegawai->id)->first();
            // dd($wheretunjangan);
            $penggajian=Penggajian::where('tunjangan_pegawai_id',$wheretunjangan->id)->where('bulan', 'LIKE', '%' . $query . '%')->paginate(5);
            // dd($penggajian);

            return view('gaji.resultkaryawan',compact('penggajian'));
            

        }

        $penggajian = Penggajian::where('bulan', 'LIKE', '%' . $query . '%')->paginate(5);
        // dd($lemburp);
        return view('gaji.resultindex', compact('query','penggajian'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tunjangan=Tunjangan_pegawai::paginate(10);
        return view('gaji.create',compact('tunjangan'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $penggajian=Input::all();
         // dd($penggajian);
        $where=Tunjangan_pegawai::where('id',$penggajian['tunjangan_pegawai_id'])->first();
        // dd($where); 
        $wherepenggajian=Penggajian::where('tunjangan_pegawai_id',$where->id)->first();
        // dd($wherepenggajian);
        $wheretunjangan=Tunjangan::where('id',$where->kode_tunjangan_id)->first();
        // dd($wheretunjangan);
        $wherepegawai=Pegawai::where('id',$where->pegawai_id)->first();
        // dd($wherepegawai);
        $wherekategorilembur=Kategori_lembur::where('jabatan_id',$wherepegawai->jabatan_id)->where('golongan_id',$wherepegawai->golongan_id)->first();
        // dd($wherekategorilembur);
        $wherelemburpegawai=Lembur_pegawai::where('pegawai_id',$wherepegawai->id)->get();
        $Jumlah_jam=0;
        foreach ($wherelemburpegawai as $jam) {
            $Jumlah_jam+=$jam->Jumlah_jam;
        }
        // dd($Jumlah_jam);
        $wherejabatan=Jabatan::where('id',$wherepegawai->jabatan_id)->first();
        // dd($wherejabatan);
        $wheregolongan=Golongan::where('id',$wherepegawai->golongan_id)->first();
        // dd($wheregolongan);
        $penggajian=new Penggajian ;
        if (isset($wherepenggajian)) {
            $error=true ;
            $tunjangan=Tunjangan_pegawai::paginate(10);
            return view('gaji.create',compact('tunjangan','error'));
        }
        elseif (!isset($wherelemburpegawai)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besar_uang+$wheregolongan->besar_uang;
            $penggajian->gaji_total=($wheretunjangan->besar_uang)+($wherejabatan->besar_uang+$wheregolongan->besar_uang);
        $penggajian->tunjangan_pegawai_id=Input::get('tunjangan_pegawai_id');
        $penggajian->petugas_penerima=auth::user()->name ;
        $penggajian->save();
        }
        elseif (!isset($wherelemburpegawai)||!isset($wherekategorilembur)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besar_uang+$wheregolongan->besar_uang;
            $penggajian->gaji_total=($wheretunjangan->besar_uang)+($wherejabatan->besar_uang+$wheregolongan->besar_uang);
        $penggajian->tunjangan_pegawai_id=Input::get('tunjangan_pegawai_id');
        $penggajian->petugas_penerima=auth::user()->name ;
        $penggajian->save();
        }
        else{
            $penggajian->jumlah_jam_lembur=$Jumlah_jam;
            $penggajian->jumlah_uang_lembur=$Jumlah_jam*$wherekategorilembur->besar_uang ;
            $penggajian->gaji_pokok=$wherejabatan->besar_uang+$wheregolongan->besar_uang;
            $penggajian->gaji_total=($Jumlah_jam*$wherekategorilembur->besar_uang)+($wheretunjangan->besar_uang)+($wherejabatan->besar_uang+$wheregolongan->besar_uang);
            $penggajian->tanggal_pengambilan =date('d-m-y');
            $penggajian->tunjangan_pegawai_id=Input::get('tunjangan_pegawai_id');
            $penggajian->petugas_penerima=auth::user()->name ;
            $penggajian->save();
            }
            return redirect('gaji');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datapenggajian=Penggajian::find($id);
        return view('gaji.read',compact('datapenggajian'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $gaji=Penggajian::find($id);
        $penggajian=new Penggajian ;
        $penggajian=array('status_pengambilan'=>1,'tanggal_pengambilan'=>date('y-m-d'));
        Penggajian::where('id',$id)->update($penggajian);
        return redirect('gaji');
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
        Penggajian::find($id)->delete();
        return redirect('gaji');
    }
}
