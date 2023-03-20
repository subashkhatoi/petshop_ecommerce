<?php $__env->startSection('title'); ?>
 Update Address
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container user-area">
 <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 checkout-addresses-main">
   <div class="add-address-main">
     Edit Address
   </div>
    <form method="post" action="<?php echo e(route('post-update-address')); ?>">
      <?php echo csrf_field(); ?>
      <div class="form-group">
        <input type="text" name="name" value="<?php echo e($address->name); ?>" placeholder="Enter name*" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
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
      <div class="form-group">
        <input type="text" name="mobile" value="<?php echo e($address->mobile); ?>" placeholder="Enter mobile*" class="form-control <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
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
      <div class="form-group">
        <input type="text" name="alt_mobile" value="<?php echo e($address->alt_mobile); ?>" placeholder="Enter alternative mobile" class="form-control">
      </div>
      <div class="form-group">
        <textarea name="address" class="form-control <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="Address*"><?php echo e($address->address); ?></textarea>
        <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?>
          <span class="invalid-feedback" role="alert">
              <strong><?php echo e($message); ?></strong>
          </span>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
      </div>
      <div class="form-group">
        <input type="text" name="locality" value="<?php echo e($address->locality); ?>" placeholder="Enter Locality" class="form-control">
      </div>
      <div class="form-group">
        <input type="text" name="landmark" value="<?php echo e($address->landmark); ?>" placeholder="Enter Landmark" class="form-control">
      </div>
      <div class="form-group">
        <input type="text" name="city" value="<?php echo e($address->city); ?>" placeholder="Enter City*" class="form-control <?php if ($errors->has('city')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
        <?php if ($errors->has('city')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city'); ?>
          <span class="invalid-feedback" role="alert">
              <strong><?php echo e($message); ?></strong>
          </span>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
      </div>
      <div class="form-group">
        <select name="state" class="form-control <?php if ($errors->has('state')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('state'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
          <option disabled hidden selected>Select State*</option>
          <option value="Odisha" <?php if($address->state == "Odisha"): ?> selected <?php endif; ?>>Odisha</option>
          <option value="Bihar" <?php if($address->state == "Bihar"): ?> selected <?php endif; ?>>Bihar</option>
        </select>
        <?php if ($errors->has('state')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('state'); ?>
          <span class="invalid-feedback" role="alert">
              <strong><?php echo e($message); ?></strong>
          </span>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
      </div>
      <div class="form-group">
        <select name="country" class="form-control <?php if ($errors->has('country')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('country'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
          <option disabled hidden selected>Select Country*</option>
          <option value="India" <?php if($address->country == "India"): ?> selected <?php endif; ?>>India</option>
        </select>
        <?php if ($errors->has('country')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('country'); ?>
          <span class="invalid-feedback" role="alert">
              <strong><?php echo e($message); ?></strong>
          </span>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
      </div>
      <div class="form-group">
        <input type="number" name="pincode" value="<?php echo e($address->pincode); ?>" placeholder="Enter Pincode" class="form-control <?php if ($errors->has('pincode')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('pincode'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
        <?php if ($errors->has('pincode')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('pincode'); ?>
          <span class="invalid-feedback" role="alert">
              <strong><?php echo e($message); ?></strong>
          </span>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
      </div>
      <div class="form-group">
        <label>Save Address As</label>
        <div>
          <input type="radio" name="save_as" value="Home" <?php if($address->this_is_my == "Home"): ?> checked <?php endif; ?>> Home <input type="radio" name="save_as" value="Work" style="margin-left: 5px" <?php if($address->this_is_my == "Work"): ?> checked <?php endif; ?>> Work
          <?php if ($errors->has('save_as')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('save_as'); ?>
          <span class="invalid-feedback" role="alert">
              <strong><?php echo e($message); ?></strong>
          </span>
          <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
        </div>
      </div>
      <input type="hidden" name="address_id" value="<?php echo e($id); ?>">
    <div style="text-align: center;display: flex;justify-content: center;">
      <button type="submit" class="btn btn-success cstm-add-address-btn">Update Address</button>
    </div>
    </form>
 </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/address/edit-address.blade.php ENDPATH**/ ?>