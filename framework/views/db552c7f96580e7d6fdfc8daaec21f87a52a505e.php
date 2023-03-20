<?php $__env->startSection('title'); ?>
 Forgot Password
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container" style="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
               <div class="forgot-pwd-main">
               	  <form action="<?php echo e(route('send-otp')); ?>" method="post">
               	  	 <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="mobile" type="mobile" placeholder="<?php echo e(__('Enter your registered mobile number')); ?>" class="form-control <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="mobile" value="<?php echo e(old('mobile')); ?>" required autocomplete="mobile" autofocus>

                            <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn cstm-reg-btn">
                                <?php echo e(__('Send Otp')); ?>

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
<style>
	.forgot-pwd-main{
		padding: 20px 20px 20px 20px;
    box-shadow: 0px 0px 3px 0px #ccc;
	}
	.cstm-reg-btn{
          background-color: #000033;
          color: #fff; 
          border-color: #000033;
        }
        .cstm-reg-btn:hover{
          background-color: #000033;
          color: #fff; 
          border-color: #000033;
        }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>