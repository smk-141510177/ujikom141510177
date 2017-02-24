@extends('layouts.app')
@section('pegawai')
    active
@endsection
@section('judul')
	Data Pegawai
@endsection
@section('content')
			        
			            
			                	<table border="2" class="table table-success table-border table-hover">
									<thead >
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>NIP</th>
											<th>Nama Golongan</th>
											<th>Nama Jabatan</th>
											<th>Photo</th>
											<th>Akun</th>
											<th colspan="2"><center>Action</center></th>

										</tr>
									</thead>
									@php $no=1; @endphp
									<tbody>
										@foreach($pegawai as $data)
										<tr>
											<td>{{$no++}}</td>
											<td>{{$data->user->name}}</td>
											<td>{{$data->nip}}</td>
											<td>{{$data->golongan->nama_g}}</td>
											<td>{{$data->jabatan->nama_j}}</td>
											<td>
												
											<div class="dropdown">
							                    <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button" aria-expanded="false">Lihat Photo <span class="caret"></span>
							                    </a>
												<ul class="dropdown-menu" role="menu">
													<img src="assets/image/{{$data->photo}}" width="200" height="200">
							                    </ul>
							                </div>

											</td>
											<td>
												
											<div class="dropdown">
							                    <a href="#" class="dropdown-toggle btn btn-success" data-toggle="dropdown" role="button" aria-expanded="false">Lihat Akun <span class="caret"></span>
							                    </a>
												<ul class="dropdown-menu" role="menu">
													<table border="2" class="table table-success table-border table-hover">
														<thead >
															<tr>
																<th>Email</th>
																<th>Type User</th>
															</tr>
														</thead>
														@php $no=1; @endphp
														<tbody>
															<tr>
																<td>{{$data->user->email}}</td>
																<td>{{$data->user->type_user}}</td>
																
																
															</tr>
														</tbody>
													</table>
							                    </ul>
							                </div>

											</td>
											<td>
												<a href="{{route('pegawai.edit',$data->id)}}" class='btn btn-warning'> Edit </a>
																</td>
																<td>
												{!! Form::open(['method'=>'DELETE','route'=>['pegawai.destroy',$data->id]]) !!}
												{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
												{!! Form::close() !!}
											</td>
											
										</tr>
										@endforeach
									</tbody>
								</table>
			                
				<a  href="{{url('pegawai/create')}}" class="btn btn-primary form-control">Tambah</a>
	
	<center>{{$pegawai->links()}}</center>

@endsection