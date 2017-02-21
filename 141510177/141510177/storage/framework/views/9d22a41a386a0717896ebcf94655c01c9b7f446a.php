<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-body">
			        <div class="col-md-6 ">
			            <div class="panel panel-primary">
			                <div class="panel-heading">Data Pegawai</div>
			                <div class="panel-body">
			                	<table border="2" class="table table-success table-border table-hover">
									<thead >
										<tr>
											<th>No</th>
											<th>NIP</th>
											<th>Nama Golongan</th>
											<th>Nama Jabatan</th>
											<th>Photo</th>
										</tr>
									</thead>
									<?php  $no=1;  ?>
									<tbody>
										<?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
										<tr>
											<td><?php echo e($no++); ?></td>
											<td><?php echo e($data->nip); ?></td>
											<td><?php echo e($data->golongan->nama_g); ?></td>
											<td><?php echo e($data->jabatan->nama_j); ?></td>
											<td>
												
											<div class="dropdown">
							                    <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button" aria-expanded="false">Lihat Photo <span class="caret"></span>
							                    </a>
												<ul class="dropdown-menu" role="menu">
													<img src="assets/image/<?php echo e($data->photo); ?>" >
							                    </ul>
							                </div>

											</td>
											
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
									</tbody>
								</table>
			                </div>
			            </div>
			        </div>
			        <div class="col-md-6 ">
			            <div class="panel panel-primary">
			                <div class="panel-heading">Data User</div>
			                <div class="panel-body">
			                	<table border="2" class="table table-success table-border table-hover">
									<thead >
										<tr>
											<th>Name</th>
											<th>Type User</th>
											<th>Email</th>
											<th colspan="2"><center>Action</center></th>
										</tr>
									</thead>
									<?php  $no=1;  ?>
									<tbody>
										<?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
										<tr>
											<td><?php echo e($data->user->name); ?></td>
											<td><?php echo e($data->user->type_user); ?></td>
											<td><?php echo e($data->user->email); ?></td>
											
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
			                </div>
			            </div>
			        </div>
					<a  href="<?php echo e(url('pegawai/create')); ?>" class="btn btn-primary form-control">Tambah</a>
        		</div>
        	</div>
        </div>
    </div>
</div>
	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>