@extends('layouts.app')
@section('penggajian')
    active
@endsection
@section('content')
<form class="form-horizontal" role="form" action="{{ url('query') }}" method="GET"">
                        {{ csrf_field() }}

                        

                        <div class="form-group{{ $errors->has('q') ? ' has-error' : '' }}">
                            <label for="q" class="col-md-4 control-label">Pegawai</label>

                            <div class="col-md-6">
                                <select name="q" class="form-control">
                                    <option value="">pilih</option>
                                    @foreach($pegawai as $data)
                                    <option value="{{$data->id}}">{{$data->nip}}</option>
                                    @endforeach
                                </select>
								<button type="submit" class="btn btn-primary">
                                    Cari
                                </button>
                                @if ($errors->has('q'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('q') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        

                        
                    </form>
 
@endsection
 						
@section('content1')
				<table border="2" class="table table-success table-border table-hover">
										<thead >
											<tr>
												<th>No</th>
												<th>Pegawai</th>
												<th>Jumlah Uang Tunjangan</th>
												<th>Jumlah Jam Lembur</th>
												<th>Jumlah Uang Lembur</th>
												<th>gaji Pokok</th>
												<th>Total Gaji</th>
												<th>Tanggal Pengambilan</th>
												<th>Status Pengambilan</th>
												<th>Petugas Penerimaan</th>
											</tr>
										</thead>
										@php $no=1;   @endphp
										<tbody>
											@foreach($pegawai as $data)
											<tr>
												<td>{{$no++}}</td>
												<td>{{$data->user->name}}</td>
												<td>
												@foreach($tunjangan as $data1)
													
													@if($data1->pegawai_id == $data->id)
														{{$data1->tunjangan->besar_uang}}
														@php $a=$data1->tunjangan->besar_uang; ; @endphp
													@endif

												@endforeach
												</td>
												<td>
													@php
														$jumlah_jam=0;
													@endphp
												@foreach($lemburp as $data2)
													@if($data2->pegawai_id == $data->id)
														@php $jumlah_jam+=$data2->Jumlah_jam; @endphp
													@endif
												@endforeach
												{{$jumlah_jam}}
												</td>
												<td>
													
												@foreach($lemburp as $data2)
													@if($data2->pegawai_id == $data->id)
														@php 
														$b=$jumlah_jam*$data2->kategori->besar_uang;
														 @endphp

													@endif
												@endforeach
												{{$b}}
												</td>
												<td>{{$data->golongan->besar_uang+$data->jabatan->besar_uang}}</td>
												@php $c=$data->golongan->besar_uang+$data->jabatan->besar_uang; @endphp

												<td>{{$a + $b + $c}}</td>
													@php $no=0 @endphp
													@foreach($penggajian as $check)
														@php $no++ @endphp
													@endforeach
												<td>
													@if($no==0)
														Belum Diambil
													@else
												@foreach($tunjangan as $data1 )
													
													@foreach($penggajian as $data3)
														@if($data3->tunjangan_pegawai_id == $data1->id && $data1->pegawai->id == $data->id )  
															{{$data3->tanggal_pengambilan}}
														@elseif($data3->tunjangan_pegawai_id != $data1->id && $data1->pegawai->id != $data->id )
														
														@elseif($data3->tunjangan_pegawai_id == $data1->id && $data1->pegawai->id != $data->id )
															
														
														@endif
														@endforeach
													@endforeach
													@endif
												</td>
												<td>
												@if($no==0)
														Belum Diambil
														<form class="form-horizontal" role="form" method="POST" action="{{ url('/penggajian') }}">
							                        {{ csrf_field() }}
							                        	@foreach($tunjangan as $data1)
															@if($data1->pegawai_id == $data->id)
									                        	<input type="hidden" name="tunjangan_pegawai_id" value="{{$data1->id}}">
																@php $a=$data1->tunjangan->besar_uang; ; @endphp
															@endif
														@endforeach
							                        	@foreach($lemburp as $data2)
															@if($data2->pegawai_id == $data->id)
																<input type="hidden" name="jumlah_jam_lembur" value="{{$data2->Jumlah_jam}}">
																<input type="hidden" name="jumlah_uang_lembur" value="{{$data2->Jumlah_jam*$data2->kategori->besar_uang}}">
															@endif
														@endforeach
														<input type="hidden" name="gaji_pokok" value="{{$data->golongan->besar_uang+$data->jabatan->besar_uang}}">
							                        <input type="hidden" name="tanggal_pengambilan" value="{{date('Y-m-d')}}" >
							                        <input type="hidden" name="status_pengambilan" value="1" >
							                       <input type="hidden" name="petugas_penerima" value="dj">
							                        <div class="form-group">
							                            <div class="col-md-10 col-md-offset-0">
							                                <button type="submit" class="btn btn-primary form-control">
							                                    Ambil
							                                </button>
							                            </div>
							                        </div>
							                    </form>
												@else
													@foreach($tunjangan as $data1 )
													
															@if($data3->tunjangan_pegawai_id == $data1->id && $data1->pegawai->id == $data->id )  
																	{{$data3->status_pengambilan}}
															
															
															@endif
														
													@endforeach
												@endif

													
												</td>
												<td>dj</td>
											</tr>
											@endforeach
										</tbody>
									</table>
       

 					
@endsection