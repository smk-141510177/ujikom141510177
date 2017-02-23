@extends('layouts.app')
@section('lemburp')
    active
@endsection
@section('judul')
    Daftar Lembur Pegawai
@endsection
@section('content')
<!-- Split button -->

 <form class="navbar-form navbar-left" role="search" action="{{ url('bulanlembur') }}" method="GET">
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