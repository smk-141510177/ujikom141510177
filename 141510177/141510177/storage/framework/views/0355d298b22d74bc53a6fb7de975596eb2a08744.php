<?php $__env->startSection('content'); ?>
<h1>Daftar Pegawai</h1>
	<table border="1" class="table table-striped table-border table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>NIP</th>
				<th>Nama Pegawai</th>
				<th>Nama Golongan</th>
				<th>Nama Jabatan</th>
				<th>Photo</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		<?php  $no=1;  ?>
		<tbody>
			<?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr>
				<td><?php echo e($no++); ?></td>
				<td><?php echo e($data->nip); ?></td>
				<td><?php echo e($data->user->name); ?></td>
				<td><?php echo e($data->golongan->nama_g); ?></td>
				<td><?php echo e($data->jabatan->nama_j); ?></td>
				<td><img src="assets/image/<?php echo e($data->photo); ?>" height="150" width="125"></td>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>