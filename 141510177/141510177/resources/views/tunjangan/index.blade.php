@extends('layouts.app')
@section('tunjangan')
    active
@endsection
@section('judul')
    Daftar Kategori Tunjangan
@endsection
@section('content')
	<table border="1" class="table table-striped table-border table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Tunjangan</th>
				<th>Nama Golongan</th>
				<th>Nama Jabatan</th>
				<th>Besar Uang</th>
				<th>Status</th>
				<th>Jumlah Anak</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		@php $no=1; @endphp
		<tbody>
			@foreach($tunjangan as $data)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$data->kode_t}}</td>
				<td>{{$data->golongan->nama_g}}</td>
				<td>{{$data->jabatan->nama_j}}</td>
				<td>{{$data->besar_uang}}</td>
				<td>{{$data->status}}</td>
				<td>{{$data->jumlah_anak}}</td>
				<td>
					<a href="{{route('tunjangan.edit',$data->id)}}" class='btn btn-warning'> Edit </a>
				</td>
				<td>
					{!! Form::open(['method'=>'DELETE','route'=>['tunjangan.destroy',$data->id]]) !!}
					{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<a  href="{{url('tunjangan/create')}}" class="btn btn-primary form-control">Tambah</a>

@endsection