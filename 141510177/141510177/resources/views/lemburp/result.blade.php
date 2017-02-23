@extends('layouts.app')

@section('lemburp')
    active
@endsection
@section('content')
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
<div class="section">
<div class="card-panel green white-text">Hasil pencarianMenurutg bulan  : <b>
	@php $bulan=['Januari','February','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];  @endphp
  									@if($query == '1')
                                        {{$bulan[$query - 1]}}
                                    @elseif($query == '2')
                                        {{$bulan[$query - 1]}}
                                    @elseif($query == '3')
                                        {{$bulan[$query - 1]}}
                                    @elseif($query == '4')
                                        {{$bulan[$query - 1]}}
                                    @elseif($query == '5')
                                        {{$bulan[$query - 1]}}
                                    @elseif($query == '6')
                                        {{$bulan[$query - 1]}}
                                    @elseif($query == '7')
                                        {{$bulan[$query - 1]}}
                                    @elseif($query == '8')
                                        {{$bulan[$query - 1]}}
                                    @elseif($query == '9')
                                        {{$bulan[$query - 1]}}
                                    @elseif($query == '10')
                                        {{$bulan[$query - 1]}}
                                    @elseif($query == '11')
                                        {{$bulan[$query - 1]}}
                                    @elseif($query == '12')
                                        {{$bulan[$query - 1]}}
                                    @endif
	</b></div>


</div>
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
	
	
	



@endsection
