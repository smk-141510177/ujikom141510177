@extends('layouts.app')
@section('jabatan')
    active
@endsection
@section('judul')
    Edit Jabatan
@endsection
@section('content')
{!! Form::model($jabatan,['method'=>'PATCH','route'=>['jabatan.update',$jabatan->id]])!!}
                        {!! Form::hidden('id',null,['class'=>'form-control']) !!}
                        <div class="form-group{{ $errors->has('kode_j') ? ' has-error' : '' }}">
                            <label for="kode_j" class="col-md-4 control-label">Kode Jabatan</label>

                            <div class="col-md-6">
                                {!! Form::text('kode_j',null,['class'=>'form-control']) !!}
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
                                {!! Form::text('nama_j',null,['class'=>'form-control']) !!}

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
                                {!! Form::text('besar_uang',null,['class'=>'form-control']) !!}

                                @if ($errors->has('besar_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besar_uang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                        {!! Form::submit('Save',['class'=>'btn btn-primary form-control']) !!}
                    </div>
                {!! Form::close() !!}
	

@endsection