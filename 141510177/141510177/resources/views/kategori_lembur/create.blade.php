@extends('layouts.app')
@section('kategori')
    active
@endsection
@section('judul')
    Create Kategori Lembur
@endsection
@section('content')
 <form class="form-horizontal" role="form" method="POST" action="{{ url('/kategori') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kode_l') ? ' has-error' : '' }}">
                            <label for="kode_l" class="col-md-4 control-label">Kode Kategori Lembur</label>

                            <div class="col-md-6">
                                <input id="kode_l" type="text" class="form-control" name="kode_l" value="{{ old('kode_l') }}"  autofocus>

                                @if ($errors->has('kode_l'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_l') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('golongan_id') ? ' has-error' : '' }}">
                            <label for="golongan_id" class="col-md-4 control-label">Nama Golongan</label>

                            <div class="col-md-6">
                                <select name="golongan_id" class="form-control">
                                    <option value="">pilih</option>
                                    @foreach($golongan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_g}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('golongan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('golongan_id') }}</strong>
                                    </span>
                                
                                 @elseif (isset($jangan))
                                    <span class="help-block">
                                        <strong>kedua data sudah ada</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
                            <label for="jabatan_id" class="col-md-4 control-label">Nama Jabatan</label>

                            <div class="col-md-6">
                                <select name="jabatan_id" class="form-control">
                                    <option value="">pilih</option>
                                    @foreach($jabatan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_j}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('jabatan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan_id') }}</strong>
                                    </span>
                                    @elseif (isset($jangan))
                                    <span class="help-block">
                                        <strong>kedua data sudah ada</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('besar_uang') ? ' has-error' : '' }}">
                            <label for="besar_uang" class="col-md-4 control-label">Besar Uang </label>

                            <div class="col-md-6">
                                <input id="besar_uang" type="text" class="form-control" name="besar_uang" value="{{ old('besar_uang') }}"  autofocus>

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