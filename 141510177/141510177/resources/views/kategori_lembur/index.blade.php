@extends('layouts.app')
@section('kategori')
    active
@endsection
@section('judul')
    Daftar Kategori Lembur
@endsection
@section('content')
	<table border="1" class="table table-striped table-border table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Kategori Lembur</th>
				<th>Nama Golongan</th>
				<th>Nama Jabatan</th>
				<th>Besar Uang</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		@php $no=1; @endphp
		<tbody>
			@foreach($kategori as $data)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$data->kode_l}}</td>
				<td>{{$data->golongan->nama_g}}</td>
				<td>{{$data->jabatan->nama_j}}</td>
				<td>{{$data->besar_uang}}</td>
				<td>
					<a href="{{route('kategori.edit',$data->id)}}" class='btn btn-warning'> Edit </a>
				</td>
				<td>
					{!! Form::open(['method'=>'DELETE','route'=>['kategori.destroy',$data->id]]) !!}
					{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<a  href="{{url('kategori/create')}}" class="btn btn-primary form-control">Tambah</a>
	<center>{{$kategori->links()}}</center>

@endsection