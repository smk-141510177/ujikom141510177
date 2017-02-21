<?php $__env->startSection('content'); ?>
<h1>Edit Golongan</h1>
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Jabatan</div>
                <div class="panel-body">
					<?php echo Form::model($jabatan,['method'=>'PATCH','route'=>['jabatan.update',$jabatan->id]]); ?>

						<?php echo Form::hidden('id',null,['class'=>'form-control']); ?>

                        <div class="form-group<?php echo e($errors->has('kode_j') ? ' has-error' : ''); ?>">
                            <label for="kode_j" class="col-md-4 control-label">Kode Jabatan</label>

                            <div class="col-md-6">
                                <?php echo Form::text('kode_j',null,['class'=>'form-control']); ?>

                                <?php if($errors->has('kode_j')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_j')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('nama_j') ? ' has-error' : ''); ?>">
                            <label for="nama_j" class="col-md-4 control-label">Nama Jabatan</label>

                            <div class="col-md-6">
                                <?php echo Form::text('nama_j',null,['class'=>'form-control']); ?>


                                <?php if($errors->has('nama_j')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nama_j')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('besar_uang') ? ' has-error' : ''); ?>">
                            <label for="besar_uang" class="col-md-4 control-label">Besar Uang</label>

                            <div class="col-md-6">
                                <?php echo Form::text('besar_uang',null,['class'=>'form-control']); ?>


                                <?php if($errors->has('besar_uang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('besar_uang')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
						<?php echo Form::submit('Save',['class'=>'btn btn-primary form-control']); ?>

					</div>
				<?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>