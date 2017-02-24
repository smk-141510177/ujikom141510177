<?php $__env->startSection('pegawai'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('judul'); ?>
	Data Pegawai
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
			        
			            
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
									<?php  $no=1;  ?>
									<tbody>
										<?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
										<tr>
											<td><?php echo e($no++); ?></td>
											<td><?php echo e($data->user->name); ?></td>
											<td><?php echo e($data->nip); ?></td>
											<td><?php echo e($data->golongan->nama_g); ?></td>
											<td><?php echo e($data->jabatan->nama_j); ?></td>
											<td>
												
											<div class="dropdown">
							                    <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button" aria-expanded="false">Lihat Photo <span class="caret"></span>
							                    </a>
												<ul class="dropdown-menu" role="menu">
													<img src="assets/image/<?php echo e($data->photo); ?>" width="200" height="200">
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
														<?php  $no=1;  ?>
														<tbody>
															<tr>
																<td><?php echo e($data->user->email); ?></td>
																<td><?php echo e($data->user->type_user); ?></td>
																
																
															</tr>
														</tbody>
													</table>
							                    </ul>
							                </div>

											</td>
											<td>
												<a href="<?php echo e(route('pegawai.edit',$data->id)); ?>" class='btn btn-warning'> Edit </a>
																</td>
																<td>
												<?php echo Form::open(['method'=>'DELETE','route'=>['pegawai.destroy',$data->id]]); ?>

												<?php echo Form::submit('Delete',['class'=>'btn btn-danger']); ?>

												<?php echo Form::close(); ?>

											</td>
											
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
									</tbody>
								</table>
			                
				<a  href="<?php echo e(url('pegawai/create')); ?>" class="btn btn-primary form-control">Tambah</a>
	
	<center><?php echo e($pegawai->links()); ?></center>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>