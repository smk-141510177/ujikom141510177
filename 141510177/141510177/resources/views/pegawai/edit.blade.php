@extends('layouts.app')
@section('pegawai')
    active
@endsection
@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Edit User</div>
                <div class="panel-body">
                    {!! Form::model($pegawai,['method'=>'PATCH','route'=>['pegawai.update',$pegawai->id],'enctype'=>'multipart/form-data']) !!}
    
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{$pegawai->user->name}}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('type_user') ? ' has-error' : '' }}">
                            <label for="type_user" class="col-md-4 control-label">type_user</label>

                            <div class="col-md-6">
                                <input id="type_user" type="text" class="form-control" name="type_user" value="{{$pegawai->user->type_user }}"  autofocus>

                                @if ($errors->has('type_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type_user') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control"  name="email" value="{{$pegawai->user->email}}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Edit Pegawai</div>
                </div>
                <div class="panel-body">
                    <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">NIP</label>

                            <div class="col-md-6">
                                <input id="nip" type="text" class="form-control" name="nip" value="{{ $pegawai->nip }}"  autofocus>

                                @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <!--  <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="user_id" class="col-md-4 control-label">Nama Pegawai</label>

                            <div class="col-md-6">
                                <select name="user_id" class="form-control">
                                    <option value="">pilih</option>
                                    @foreach($user as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

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
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
 
                            <label  class="col-md-4 control-label">Foto Pegawai</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control" name="photo" value="{{ $pegawai->photo }}"  autofocus>


                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
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
				{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection