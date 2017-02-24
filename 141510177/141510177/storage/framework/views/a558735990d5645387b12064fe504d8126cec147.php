<?php $__env->startSection('judul'); ?>
    Login
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="wrapper">
        <form method="post" name="Login_Form" class="form-signin" action="<?php echo e(url('/login')); ?>">       <?php echo e(csrf_field()); ?>

            <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
              <hr class="colorgraph"><br>
              
                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">

                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="Email">
                                 <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                          
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            
                                <input id="password" type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" required autofocus placeholder="Password">
                                 
                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>    
             
              <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>            
        </form>         
    </div>
               
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>