@extends('layouts.app')
@section('lemburp')
    active
@endsection
@section('judul')
    Daftar Lembur Pegawai
@endsection
@section('content')
	<table border="1" class="table table-striped table-border table-hover">
		<thead>
			<tr>
				<th>Lembur Hari-</th>
				<th>Nama Pegawai</th>
				<th>Kode Kategori Lembur</th>
				<th>Jumlah Jam</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		<tbody>
			@foreach($lembur as $data)
			<tr>
				<td>{{$data->created_at->day}}-{{$data->created_at->month}}-{{$data->created_at->year}}</td>
				<td>{{$data->pegawai->user->name}}</td>
				<td>{{$data->kategori->kode_l}}</td>
				<td>{{$data->Jumlah_jam}} Jam</td>
				<td>
					<a href="{{route('lemburp.edit',$data->id)}}" class='btn btn-warning'> Edit </a>
				</td>
				<td>
					{!! Form::open(['method'=>'DELETE','route'=>['lemburp.destroy',$data->id]]) !!}
					{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<a  href="{{url('lemburp/create')}}" class="btn btn-primary form-control">Tambah</a>
	<center>{{$lembur->links()}}</center>

@endsection