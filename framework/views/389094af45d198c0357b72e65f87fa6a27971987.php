<?php $__env->startSection('title'); ?>
 My Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container user-area">
 <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 checkout-addresses-main">
  <div class="account-title-cmcp">My Profile</div>
   <div class="account-details">
   	 <table class="table table-bordered oi-tbl">
        <tbody>
          <tr>
            <td width="28%">Full Name</td>
            <td>: <?php echo e($user_details->name); ?> <?php echo e($user_details->lname); ?></td>
          </tr>
          <tr>
            <td>ID</td>
            <td>: <?php echo e($user_details->unique_user_id); ?></td>
          </tr>
          <tr>
            <td>Mobile</td>
            <td>: <?php echo e($user_details->mobile); ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td>: <?php echo e($user_details->email); ?></td>
          </tr>
         
        </tbody>
      </table>
   </div>

<div class="row">
  <!-- <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12">
    <div class="account-title-cmcp">Change Mobile</div>
    <div class="ma-update-mobile">
      <form class="form-group">
        <input type="text" class="form-control" name="mobile" value="<?php echo e(Auth::user()->mobile); ?>">
        <div style="float: right;margin-top: 10px;"><input type="submit" class="btn ma-cstm-btn" value="Update"></div>
      </form>
    </div>
  </div> -->
  <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12">
    <div class="account-title-cmcp">Change Password</div>
    <div class="ma-update-pwd">
      <form method="post" action="<?php echo e(route('user-change-password')); ?>" class="form-group">
        <?php echo csrf_field(); ?>
        <div class="form-group"> 
            <input type="password" name="currentpassword" class="form-control <?php if ($errors->has('currentpassword')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('currentpassword'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="Current Password" autocomplete="currentpassword" autofocus value="<?php echo e(old('currentpassword')); ?>"> 
             <?php if ($errors->has('currentpassword')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('currentpassword'); ?>
             <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
             </span>
            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
        </div> 
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
        
        <div style="float: right;"><input type="submit" class="btn ma-cstm-btn" value="Update"></div>
      </form>
    </div>
  </div>
</div>

 </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
  .oi-tbl td, .oi-tbl th{
    border:none;
    padding: 4px;
    padding-left: 5px;
  }
  .gender-update{
    text-decoration: underline;
  }
  .gender-update:hover{
    text-decoration: underline;
  }
  label {
    display: inline;
}
  .item {
    display: inline-flex;
    margin-right: 10px;
}
.ma-cstm-btn{
  border:1px solid #ccc;
}
#gender{
    margin-top: 4px;
    margin-left: 10px;
    margin-right: 3px;
}
.account-title-cmcp{
 margin-bottom: 8px;
    font-size: 15px;
    font-weight: 600;
}
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/profile/my-profile.blade.php ENDPATH**/ ?>