<?php $__env->startSection('lemburp'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('judul'); ?>
    Daftar Lembur Pegawai
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Split button -->

 <form class="navbar-form navbar-left" role="search" action="<?php echo e(url('bulanlembur')); ?>" method="GET">
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
			<?php $__currentLoopData = $lembur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr>
				<td><?php echo e($data->created_at->day); ?>-<?php echo e($data->created_at->month); ?>-<?php echo e($data->created_at->year); ?></td>
				<td><?php echo e($data->pegawai->user->name); ?></td>
				<td><?php echo e($data->kategori->kode_l); ?></td>
				<td><?php echo e($data->Jumlah_jam); ?> Jam</td>
				<td>
					<a href="<?php echo e(route('lemburp.edit',$data->id)); ?>" class='btn btn-warning'> Edit </a>
				</td>
				<td>
					<?php echo Form::open(['method'=>'DELETE','route'=>['lemburp.destroy',$data->id]]); ?>

					<?php echo Form::submit('Delete',['class'=>'btn btn-danger']); ?>

					<?php echo Form::close(); ?>

				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</tbody>
	</table>
	<a  href="<?php echo e(url('lemburp/create')); ?>" class="btn btn-primary form-control">Tambah</a>
	<center><?php echo e($lembur->links()); ?></center>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>