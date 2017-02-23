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
                    <form class="navbar-form navbar-left" role="search" action="{{ url('bulangaji') }}" method="GET">
                      <div class="form-group">
                        <select class="form-control" placeholder="Search For Month" name="q" >
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <table class="table table-striped table-hover table-bordered">
                        @php
                            $no=1 ;
                        @endphp
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Photo</th>
                                <th>Status Pengambilan</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($penggajian as $datapenggajian)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$datapenggajian->tunjangan_pegawai->pegawai->User->name}}</td>
                                <td>{{$datapenggajian->tunjangan_pegawai->pegawai->nip}}</td>
                                <td>
                                    <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button" aria-expanded="false">Lihat Photo <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <img src="assets/image/{{$datapenggajian->tunjangan_pegawai->pegawai->photo}}" width="200" height="200">
                                                </ul>
                                            </div>
                                </td>
                                <td>
                                    @if($datapenggajian->tanggal_pengambilan == ""&&$datapenggajian->status_pengambilan == "0")
                                    Gaji Belum Diambil 
                                    <div >
                                    <a class="btn btn-primary " href="{{route('gaji.edit',$datapenggajian->id)}}">Ubah Pengambilan</a>
                                    </div>
                                    @elseif($datapenggajian->tanggal_pengambilan == ""||$datapenggajian->status_pengambilan == "0")
                                        Gaji Belum Diambil
                                        <div >
                                        <a class="btn btn-primary  " href="{{route('gaji.edit',$datapenggajian->id)}}">Ubah Pengambilan</a>
                                    </div>
                                    @else
                                        Gaji Sudah Diambil Pada {{$datapenggajian->tanggal_pengambilan}}
                                    @endif
                                </td>
                                <td><a class="btn btn-success " href="{{route('gaji.show',$datapenggajian->id)}}">Detail</a></td>
                                <td>
                                    {!!Form::open(['method'=>'DELETE','route'=>['penggajian.destroy',$datapenggajian->id]])!!}
                                    {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        </tbody>

                        
                        @endforeach
                        
                    </table>
                    <div class="col-md-12">
                        <a href="{{url('gaji/create')}}" class="btn btn-primary form-control">Tambah Data</a>
                        <center>{{$penggajian->links()}}</center>
                    </div>
                </div>
        
@endsection