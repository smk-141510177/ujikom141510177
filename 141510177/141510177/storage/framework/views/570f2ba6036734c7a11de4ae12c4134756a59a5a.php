<?php $__env->startSection('penggajian'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Pencarian Gaji Menurut Karyawan</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="<?php echo e(url('query')); ?>" method="GET"">
                        <?php echo e(csrf_field()); ?>


                        

                        <div class="form-group<?php echo e($errors->has('q') ? ' has-error' : ''); ?>">
                            <label for="q" class="col-md-4 control-label">Pegawai</label>

                            <div class="col-md-6">
                                <select name="q" class="form-control">
                                    <option value="">pilih</option>
                                    <?php $__currentLoopData = $pegawaii; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nip); ?><?php echo e($data->user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>

                                <?php if($errors->has('q')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('q')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                       
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary form-control">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<div class="section">
<div class="card-panel green white-text">Hasil pencarian : <b><?php echo e($query); ?></b></div>
    <?php $__currentLoopData = $penggajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class="row">
		<div class="col s12">


            
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

</div>

	
	
	



<?php $__env->stopSection(); ?>
<?php $__env->startSection('content1'); ?>
				<div class="col-md-15 col-md-offset-0">
                    <div class="panel panel-primary">
                        <div class="panel-body">
        <div class="col-md-15 col-md-offset-0">
            <div class="panel panel-primary">
			    <div class="panel-heading">Data Penggajian</div>
	                <div class="panel-body">
				        
				        <table border="2" class="table table-success table-border table-hover">
										<thead >
											<tr>
												<th>No</th>
												<th>Pegawai</th>
												<th>Jumlah Uang Tunjangan</th>
												<th>Jumlah Jam Lembur</th>
												<th>Jumlah Uang Lembur</th>
												<th>gaji Pokok</th>
												<th>Total Gaji</th>
												<th>Tanggal Pengambilan</th>
												<th>Status Pengambilan</th>
												<th>Petugas Penerimaan</th>
											</tr>
										</thead>
										<?php  $no=1;    ?>
										<tbody>
											<?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
											<tr>
												<td><?php echo e($no++); ?></td>
												<td><?php echo e($data->user->name); ?></td>
												<?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
													<?php if($data1->pegawai_id == $data->id): ?>
														<td><?php echo e($data1->tunjangan->besar_uang); ?></td>
														<?php  $a=$data1->tunjangan->besar_uang; ;  ?>
													<?php endif; ?>

												<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
												<?php $__currentLoopData = $lemburp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
													<?php if($data1->pegawai_id == $data->id): ?>
														<td><?php echo e($data1->Jumlah_jam); ?></td>
														<td><?php echo e($data1->Jumlah_jam*$data1->kategori->besar_uang); ?></td>
														<?php  $b=$data1->Jumlah_jam*$data1->kategori->besar_uang;  ?>

													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
												<td><?php echo e($data->golongan->besar_uang+$data->jabatan->besar_uang); ?></td>
												<?php  $c=$data->golongan->besar_uang+$data->jabatan->besar_uang;  ?>

												<td><?php echo e($a + $b + $c); ?></td>
												<td>
													
														<?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
													<?php $__currentLoopData = $penggajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
														<?php if($data2->tunjangan_pegawai_id == $data1->id && $data1->pegawai->id == $data->id ): ?>  
															<?php echo e($data2->tanggal_pengambilan); ?>

														<?php elseif($data2->tunjangan_pegawai_id != $data1->id && $data1->pegawai->id != $data->id ): ?>
														
														<?php elseif($data2->tunjangan_pegawai_id == $data1->id && $data1->pegawai->id != $data->id ): ?>
															
														<?php else: ?>
														Belum Diambil
														<?php endif; ?>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
												</td>
												<td><?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
													<?php $__currentLoopData = $penggajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
														<?php if($data2->tunjangan_pegawai_id == $data1->id && $data1->pegawai->id == $data->id ): ?>  
															<?php echo e($data2->status_pengambilan); ?>

														<?php elseif($data2->tunjangan_pegawai_id != $data1->id && $data1->pegawai->id != $data->id ): ?>
														
														<?php elseif($data2->tunjangan_pegawai_id == $data1->id && $data1->pegawai->id != $data->id ): ?>
															
														<?php else: ?>
														Belum diambial
														<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/penggajian')); ?>">
							                        <?php echo e(csrf_field()); ?>

							                        	<?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
															<?php if($data1->pegawai_id == $data->id): ?>
									                        	<input type="hidden" name="tunjangan_pegawai_id" value="<?php echo e($data1->id); ?>">
																<?php  $a=$data1->tunjangan->besar_uang; ;  ?>
															<?php endif; ?>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							                        	<?php $__currentLoopData = $lemburp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
															<?php if($data1->pegawai_id == $data->id): ?>
																<input type="hidden" name="jumlah_jam_lembur" value="<?php echo e($data1->Jumlah_jam); ?>">
																<input type="hidden" name="jumlah_uang_lembur" value="<?php echo e($data1->Jumlah_jam*$data1->kategori->besar_uang); ?>">
															<?php endif; ?>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
														<input type="hidden" name="gaji_pokok" value="<?php echo e($data->golongan->besar_uang+$data->jabatan->besar_uang); ?>">
							                        <input type="hidden" name="tanggal_pengambilan" value="<?php echo e(date('Y-m-d')); ?>" >
							                        <input type="hidden" name="status_pengambilan" value="1" >
							                       <input type="hidden" name="petugas_penerima" value="dj">
							                        <div class="form-group">
							                            <div class="col-md-10 col-md-offset-0">
							                                <button type="submit" class="btn btn-primary form-control">
							                                    Ambil
							                                </button>
							                            </div>
							                        </div>
							                    </form>
														<?php endif; ?>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

													
												</td>
												<td>dj</td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
										</tbody>
									</table>
				                </div>
				            </div>
				        </div>
	        		</div>
        	</div>
        </div>

 						</div>
                    </div>
                </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>