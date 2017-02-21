@extends('layouts.app')
@section('jabatan')
    active
@endsection
@section('judul')
    Daftar Jabatan
@endsection
@section('content')
	<table border="1" class="table table-striped table-border table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Jabatan</th>
				<th>Nama Jabatan</th>
				<th>Besar Uang</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		@php $no=1; @endphp
		<tbody>
			@foreach($jabatan as $data)
			<tr>
				<td>{{$no++}}</td>
				<td>J-{{$data->kode_j}}</td>
				<td>{{$data->nama_j}}</td>
				<td>{{$data->besar_uang}}</td>
				<td>
					<a href="{{route('jabatan.edit',$data->id)}}" class='btn btn-warning'> Edit </a>
				</td>
				<td>
					{!! Form::open(['method'=>'DELETE','route'=>['jabatan.destroy',$data->id]]) !!}
					{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<a  href="{{url('jabatan/create')}}" class="btn btn-primary form-control">Tambah</a>

@endsection