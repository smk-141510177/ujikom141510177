<?php $__env->startSection('tunjangan'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('judul'); ?>
    Edit Kategori Tunjangan
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo Form::model($tunjangan,['method'=>'PATCH','route'=>['tunjangan.update',$tunjangan->id]]); ?>

                        <?php echo Form::hidden('id',null,['class'=>'form-control']); ?>

                        <div class="form-group<?php echo e($errors->has('kode_t') ? ' has-error' : ''); ?>">
                            <label for="kode_t" class="col-md-4 control-label">Kode Tunjangan</label>

                            <div class="col-md-6">
                                <?php echo Form::text('kode_t',null,['class'=>'form-control']); ?>

                                <?php if($errors->has('kode_t')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_t')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('golongan_id') ? ' has-error' : ''); ?>">
                            <label for="golongan_id" class="col-md-4 control-label">Nama Golongan</label>

                            <div class="col-md-6">
                                <select name="golongan_id" class="form-control">
                                    <option value="">pilih</option>
                                    <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama_g); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>

                                <?php if($errors->has('golongan_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('golongan_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('jabatan_id') ? ' has-error' : ''); ?>">
                            <label for="jabatan_id" class="col-md-4 control-label">Nama Jabatan</label>

                            <div class="col-md-6">
                                <select name="jabatan_id" class="form-control">
                                    <option value="">pilih</option>
                                    <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama_j); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>

                                <?php if($errors->has('jabatan_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('jabatan_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                            <label for="status" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <select name="status" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Duda">Duda</option>
                                    <option value="Janda">Janda</option>
                                </select>
                                <?php if($errors->has('status')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('status')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('jumlah_anak') ? ' has-error' : ''); ?>">
                            <label for="jumlah_anak" class="col-md-4 control-label">Jumlah Anak</label>

                            <div class="col-md-6">
                                <?php echo Form::text('jumlah_anak',null,['class'=>'form-control']); ?>

                                <?php if($errors->has('jumlah_anak')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('jumlah_anak')); ?></strong>
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