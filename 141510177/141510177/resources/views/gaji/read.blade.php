@extends('layouts.app')

@section('penggajian')
    active
@endsection
@section('content')
<style type="text/css">
    td,th{
        text-align: center ;
    }
    img{
        border-image-repeat: 3px ;
        border-style: circle ;
    }
</style>
       <div class="col-md-12">
                        <a href="{{url('gaji/create')}}" class="btn btn-primary form-control">Tambah Data</a>
                        
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        
                        <div class="col-md-12">
                        <center>
                            <p><img width="120px" height="100px" src="<?php echo url('assets/image/') ?>/<?php echo $datapenggajian->tunjangan_pegawai->pegawai->photo; ?>" class="img-circle" alt="Cinque Terre" ></p>

                        <h3>{{$datapenggajian->tunjangan_pegawai->pegawai->User->name}}</h3>
                        <h4>{{$datapenggajian->tunjangan_pegawai->pegawai->nip}}</h4>
                        <b>@if($datapenggajian->tanggal_pengambilan == ""&&$datapenggajian->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @elseif($datapenggajian->tanggal_pengambilan == ""||$datapenggajian->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @else
                            Gaji Sudah Diambil Pada {{$datapenggajian->tanggal_pengambilan}}
                        @endif</b>
                        <h5>Gaji Lembur Sebesar Rp.{{$datapenggajian->jumlah_uang_lembur}} ,Gaji Pokok Sebesar Rp.{{$datapenggajian->gaji_pokok}} ,Mendapat Tunjangan Sebesar Rp.{{$datapenggajian->tunjangan_pegawai->tunjangan->besar_uang}} ,Jadi Total Gaji Rp.{{$datapenggajian->gaji_total}}



                        </h5>
                        
                                <a class="btn btn-primary col-md-12" href="{{url('gaji')}}">Kembali</a>
                                
                        </center>
                        </div> 
                        
                    </table>
        
@endsection