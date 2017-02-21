<?php $__env->startSection('content'); ?>
<h1>Daftar Golongan</h1>
	<table border="1" class="table table-striped table-border table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Golongan</th>
				<th>Nama Golongan</th>
				<th>Besar Uang</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		<?php  $no=1;  ?>
		<tbody>
			<?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr>
				<td><?php echo e($no++); ?></td>
				<td><?php echo e($data->kode_g); ?></td>
				<td><?php echo e($data->nama_g); ?></td>
				<td><?php echo e($data->besar_uang); ?></td>
				<td>
					<a href="<?php echo e(route('golongan.edit',$data->id)); ?>" class='btn btn-warning'> Edit </a>
				</td>
				<td>
					<?php echo Form::open(['method'=>'DELETE','route'=>['golongan.destroy',$data->id]]); ?>

					<?php echo Form::submit('Delete',['class'=>'btn btn-danger']); ?>

					<?php echo Form::close(); ?>

				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</tbody>
	</table>
	<a  href="<?php echo e(url('golongan/create')); ?>" class="btn btn-primary form-control">Tambah</a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>