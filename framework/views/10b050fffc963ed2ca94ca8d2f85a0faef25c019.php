<?php $__env->startSection('title'); ?>
 Reset Password
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container" style="margin-top: 10px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><?php echo e(__('Reset Password')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('post-reset-password')); ?>">
                        <?php echo csrf_field(); ?>

                         <div class="form-group"> 
                            <input type="password" name="newpassword" class="form-control <?php if ($errors->has('newpassword')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('newpassword'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="New Password" autocomplete="newpassword" autofocus value="<?php echo e(old('newpassword')); ?>"> 
                            <?php if ($errors->has('newpassword')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('newpassword'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div> 
                        
                        <div class="form-group"> 
                            <input type="password" name="confirmpassword" class="form-control <?php if ($errors->has('confirmpassword')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('confirmpassword'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="Confirm Password"> 
                            <?php if ($errors->has('confirmpassword')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('confirmpassword'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn cstm-reg-btn">
                                    <?php echo e(__('Submit')); ?>

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

<?php $__env->startPush('css'); ?>
<style type="text/css">
    .new-account-div{
            text-align: center;
            margin-top: 23px;
        }
        .cstm-reg-btn{
          background-color: #01BEA2;
          color: #fff; 
          border-color: #01BEA2;
        }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/auth/passwords/reset-password.blade.php ENDPATH**/ ?>