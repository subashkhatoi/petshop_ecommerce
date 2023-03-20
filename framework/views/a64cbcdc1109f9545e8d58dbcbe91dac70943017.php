<?php $__env->startSection('title'); ?>
 Checkout Addresses
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container user-area">
 <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 checkout-addresses-main">
  <div class="checkout-addresses-title">My Addresses <div class="back-to-cart"><a href="<?php echo e(route('add-new-address')); ?>" class="btn add-address-btn"> Add Address</a></div></div>
   
     	<?php 
     	  $delivery_address_count = \App\Address::where('is_default','1')->where('status','1')->where('user_id',Auth::user()->id)->count();
     	  if($delivery_address_count > 0){
            $delivery_address = \App\Address::where('is_default','1')->where('status','1')->where('user_id',Auth::user()->id)->first();
          }
          $other_addresses_count = \App\Address::where('is_default','0')->where('status','1')->where('user_id',Auth::user()->id)->count();
          if($other_addresses_count > 0){
            $other_addresses = \App\Address::where('is_default','0')->where('status','1')->where('user_id',Auth::user()->id)->get();
          }
     	?>
     	<div class="checkout-address">
         <div class="dda">DEFAULT DELIVERY ADDRESS</div>
     	 <div class="col-12 col-md-12 col-sm-12">
     	  <?php if($delivery_address_count > 0): ?>
     		<span class="da-name"><?php echo e($delivery_address->name); ?></span>
     		<div><?php echo e($delivery_address->address); ?>, <?php if($delivery_address->locality != ""): ?> <?php echo e($delivery_address->locality); ?>, <?php endif; ?> <?php if($delivery_address->landmark != ""): ?> <?php echo e($delivery_address->landmark); ?>, <?php endif; ?> </div>
            <div><?php echo e($delivery_address->city); ?>, <?php echo e($delivery_address->state); ?>, <?php echo e($delivery_address->pincode); ?></div>
            <div>Mobile : <?php echo e($delivery_address->mobile); ?></div>
            <div class="other-addresses-main">
                <div class="dda-edit-main">
                   <a href="<?php echo e(route('update-address',$delivery_address->id)); ?>" class="odm-edit">EDIT</a>
                </div>
            </div>
     	  <?php else: ?>
           No Address
     	  <?php endif; ?>
         </div>
     	</div>
        
        <?php if($other_addresses_count > 0): ?>
        <div class="checkout-address">
         <div class="dda">OTHER ADDRESSES</div>
         <div class="col-12 col-md-12 col-sm-12">
          <?php if($other_addresses_count > 0): ?>
           <?php $__currentLoopData = $other_addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other_address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="da-name"><?php echo e($other_address->name); ?></span>
            <div><?php echo e($other_address->address); ?>, <?php if($other_address->locality != ""): ?> <?php echo e($other_address->locality); ?>, <?php endif; ?> <?php if($other_address->landmark != ""): ?> <?php echo e($other_address->landmark); ?>, <?php endif; ?> </div>
            <div><?php echo e($other_address->city); ?>, <?php echo e($other_address->state); ?>, <?php echo e($other_address->pincode); ?></div>
            <div>Mobile : <?php echo e($other_address->mobile); ?></div>
            
            <div class="other-addresses-main"><a href="<?php echo e(route('set-default-address',$other_address->id)); ?>" class="btn btn-default-address-set">SET DEFAULT ADDRESS</a> 
                <div class="odm-edit-remove-main">
                   <a href="<?php echo e(route('update-address',$other_address->id)); ?>" class="odm-edit">EDIT</a>
                   <a href="<?php echo e(route('remove-address',$other_address->id)); ?>" class="odm-remove">REMOVE</a>
                </div>
            </div>
            <hr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
           no address
          <?php endif; ?>
         </div>
        </div>
        <?php endif; ?>
    	
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/address/checkout-addresses.blade.php ENDPATH**/ ?>