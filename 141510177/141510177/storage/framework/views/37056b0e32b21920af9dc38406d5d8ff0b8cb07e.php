<?php $__env->startSection('judul'); ?>
    Welcome
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <center><h2>Anda Masuk Sebagai <?php echo e(Auth::user()->type_user); ?></h2></center>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>