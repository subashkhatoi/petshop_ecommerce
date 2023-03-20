<?php $__env->startSection('title'); ?>
 Register
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 retail-register-form">
            <div class="card">
                <div class="card-header"><?php echo e(__('User Register')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('user-post-register')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('First Name')); ?></label> -->

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" value="<?php echo e(old('name')); ?>" placeholder="Enter First Name *" required autocomplete="name" autofocus>

                                <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="lname" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Last Name')); ?></label> -->

                            <div class="col-md-12">
                                <input id="lname" type="text" class="form-control <?php if ($errors->has('lname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('lname'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="lname" value="<?php echo e(old('lname')); ?>" placeholder="Enter Last Name *" required autocomplete="lname" autofocus>

                                <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label> -->

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter Email *" required autocomplete="email">

                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="mobile" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Mobile')); ?></label> -->

                            <div class="col-md-12">
                                <input type="number" name="mobile" id="mobile" class="form-control <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="Enter Mobile *" value="<?php echo e(old('mobile')); ?>" autocomplete="mobile" />
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

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label> -->

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="new-password" placeholder="Enter Password *">

                                <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label> -->

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Confirm Password *">
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label> -->

                            <div class="col-md-12">
                                <input id="referby" type="text" class="form-control <?php if ($errors->has('referby')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('referby'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="referby" autocomplete="referby" placeholder="Enter Reference Id" value="<?php echo e(Request::get('referId')); ?>">
                            <div id="msg"></div>
                                <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn cstm-reg-btn">
                                    <?php echo e(__('Register')); ?>

                                </button>
                            </div>
                        </div>
                        Have Account? <a href="<?php echo e(route('login')); ?>">Login</a>
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

<?php $__env->startPush('js'); ?>
<script>
 $(document).ready(function(){
   $("#referby").keyup(function(){
      var referid = $(this).val().trim();
      if(referid != ''){
         $.ajax({
            url: "<?php echo e(route('check-referid')); ?>",
            type: 'get',
            data: {referid: referid},
            success: function(response){

                $('#msg').html(response);

             }
         });
      }else{
         $("#msg").html("");
      }

    });

 });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/auth/register.blade.php ENDPATH**/ ?>