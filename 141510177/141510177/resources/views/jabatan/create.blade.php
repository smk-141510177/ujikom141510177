@extends('layouts.app')
@section('jabatan')
    active
@endsection
@section('judul')
    Create Jabatan
@endsection
@section('content')
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/jabatan') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kode_j') ? ' has-error' : '' }}">
                            <label for="kode_j" class="col-md-4 control-label">Kode Jabatan</label>

                            <div class="col-md-6">
                                <input id="kode_j" type="text" class="form-control" name="kode_j" value="{{ old('kode_j') }}"  autofocus>

                                @if ($errors->has('kode_j'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_j') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_j') ? ' has-error' : '' }}">
                            <label for="nama_j" class="col-md-4 control-label">Nama Jabatan</label>

                            <div class="col-md-6">
                                <input id="nama_j" type="nama_j" class="form-control" name="nama_j" value="{{ old('nama_j') }}" >

                                @if ($errors->has('nama_j'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_j') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('besar_uang') ? ' has-error' : '' }}">
                            <label for="besar_uang" class="col-md-4 control-label">Besar Uang</label>

                            <div class="col-md-6">
                                <input id="besar_uang" type="besar_uang" class="form-control" name="besar_uang" >

                                @if ($errors->has('besar_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besar_uang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary form-control">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>

@endsection