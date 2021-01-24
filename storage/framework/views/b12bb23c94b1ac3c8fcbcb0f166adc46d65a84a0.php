<?php $__env->startSection('content'); ?>
 <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <img src="<?php echo e(url('/front_theme/images/logo-white.png')); ?>" alt="branding logo">
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        
                        <?php if($message = Session::get('error')): ?>
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php endif; ?>
                    
                        <form class="form-horizontal" action="<?php echo e(url('admin/login')); ?>" method="post" novalidate>
                            <?php echo e(csrf_field()); ?>

                            <?php if($errors->has('email')): ?>
                                    <span style="color:red">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                            <?php endif; ?>
                            <fieldset class="form-group position-relative has-icon-left">
                                 
                                <input type="text" class="form-control" id="user-name" name="email" placeholder="Your Username" required>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                            </fieldset>
                            <?php if($errors->has('password')): ?>
                                    <span style="color:red">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                            <?php endif; ?>
                            <fieldset class="form-group position-relative has-icon-left">     
                                <input type="password" class="form-control" id="user-password"  name="password" placeholder="Enter Password" required>
                                <div class="form-control-position">
                                    <i class="la la-key"></i>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-md-6 col-12 text-center text-sm-left">
                                    <fieldset>
                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                        <label for="remember-me"> Remember Me</label>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="<?php echo e(url('admin/password/reset')); ?>" class="card-link">Forgot Password?</a></div>
                            </div>
                            <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pneck_backend\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>