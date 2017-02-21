<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah golongan</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/golongan')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('kode_g') ? ' has-error' : ''); ?>">
                            <label for="kode_g" class="col-md-4 control-label">Kode Golongan</label>

                            <div class="col-md-6">
                                <input id="kode_g" type="text" class="form-control" name="kode_g" value="<?php echo e(old('kode_g')); ?>"  autofocus>

                                <?php if($errors->has('kode_g')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_g')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('nama_g') ? ' has-error' : ''); ?>">
                            <label for="nama_g" class="col-md-4 control-label">Nama Golongan</label>

                            <div class="col-md-6">
                                <input id="nama_g" type="nama_g" class="form-control" name="nama_g" value="<?php echo e(old('nama_g')); ?>" >

                                <?php if($errors->has('nama_g')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nama_g')); ?></strong>
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