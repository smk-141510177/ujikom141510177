<?php $__env->startSection('jabatan'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Tambah Jabatan</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/jabatan')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('kode_j') ? ' has-error' : ''); ?>">
                            <label for="kode_j" class="col-md-4 control-label">Kode Jabatan</label>

                            <div class="col-md-6">
                                <input id="kode_j" type="text" class="form-control" name="kode_j" value="<?php echo e(old('kode_j')); ?>"  autofocus>

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
                                <input id="nama_j" type="nama_j" class="form-control" name="nama_j" value="<?php echo e(old('nama_j')); ?>" >

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
                                <input id="besar_uang" type="besar_uang" class="form-control" name="besar_uang" >

                                <?php if($errors->has('besar_uang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('besar_uang')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary form-control">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>