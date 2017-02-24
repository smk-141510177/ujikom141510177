@extends('layouts.app')

@section('penggajian')
    active
@endsection
@section('judul')
    Create PEnggajian Bulan Ini
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Penggajian</h3> </div>
                    <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/gaji') }}">
                        {{ csrf_field() }}

                            <div class="col-md-12">
                                <label for="Jabatan">Nama Pegawai</label>
                                    <select class="col-md-6 form-control" name="tunjangan_pegawai_id">
                                        @foreach($tunjangan as $datatunjangan)
                                            <option  value="{{$datatunjangan->id}}" >{{$datatunjangan->pegawai->User->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">
                                        {{$errors->first('tunjangan_pegawai_id')}}
                                    </span>
                                    <div>
                                        @if(isset($error))
                                            Check Lagi Gaji Sudah Ada
                                        @endif
                                    </div>
                            </div>
                            <div class="col-md-12"></div>

                            <div class="col-md-12" >
                                <button type="submit" class="btn btn-primary form-control">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

@endsection