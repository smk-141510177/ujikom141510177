<?php $__env->startSection('golongan'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('judul'); ?>
    Edit Golongan
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo Form::model($golongan,['method'=>'PATCH','route'=>['golongan.update',$golongan->id]]); ?>

                        <?php echo Form::hidden('id',null,['class'=>'form-control']); ?>

                        <div class="form-group<?php echo e($errors->has('kode_g') ? ' has-error' : ''); ?>">
                            <label for="kode_g" class="col-md-4 control-label">Kode Golongan</label>

                            <div class="col-md-6">
                                <?php echo Form::text('kode_g',null,['class'=>'form-control']); ?>

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
                                <?php echo Form::text('nama_g',null,['class'=>'form-control']); ?>


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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>