@extends('layouts.app')

@section('judul')
    Daftar Penggajian
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
        <div class="">
                    <div class="col-md-12">
                        <a href="{{url('gaji/create')}}" class="btn btn-primary form-control">Tambah Data</a>
                        <center>{{$penggajian->links()}}</center>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        @php
                            $no=1 ;
                        @endphp
                        @foreach($penggajian as $datapenggajian)
                        @php
                             
                        @endphp
                        <div class="col-md-6">
                            <div class="panel panel-default pegawai">
                            <div class="panel-heading kecil">
                                <div class="panel-title"></div>
                            </div>
                            <div class="panel-body">                        
                            <center>
                            <p>{{$no++}}</p>
                            <img height="100px" alt="Smiley face" width="100px" class="img-circle" src="assets/image/{{$datapenggajian->tunjangan_pegawai->pegawai->photo}}">

                        <h3>{{$datapenggajian->tunjangan_pegawai->pegawai->User->name}}</h3>
                        <h4>{{$datapenggajian->tunjangan_pegawai->pegawai->nip}}</h4>
                        <h5><b>
                        @if($datapenggajian->tanggal_pengambilan == ""&&$datapenggajian->status_pengambilan == "0")
                            Gaji Belum Diambil 
                            <div class="col-md-12">
                            <a class="btn btn-primary col-md-12" href="{{route('gaji.edit',$datapenggajian->id)}}">Ubah Pengambilan</a>
                        </div>
                        @elseif($datapenggajian->tanggal_pengambilan == ""||$datapenggajian->status_pengambilan == "0")
                            Gaji Belum Diambil
                            <div class="col-md-12">
                            <a class="btn btn-primary col-md-12 " href="{{route('gaji.edit',$datapenggajian->id)}}">Ubah Pengambilan</a>
                        </div>
                        @else
                            Gaji Sudah Diambil Pada {{$datapenggajian->tanggal_pengambilan}}
                        @endif</b></h5>
                        



                        </h5>
                        
                                <a class="btn btn-primary col-md-4 a" href="{{route('gaji.show',$datapenggajian->id)}}">Detail</a>
                                     {!!Form::open(['method'=>'DELETE','route'=>['penggajian.destroy',$datapenggajian->id]])!!}
                                    {!!Form::submit('Delete',['class'=>'btn btn-danger col-md-4 a'])!!}
                                    {!!Form::close()!!}
                                
                        </center>
                        </div>
                        </div>
                        </div> 
                        @endforeach
                        
                    </table>
                </div>
        
@endsection