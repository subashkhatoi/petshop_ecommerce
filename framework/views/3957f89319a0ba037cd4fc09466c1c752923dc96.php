<?php $__env->startSection('title'); ?>
  Cart
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
<div class="col-sm-12 col-md-12 col-lg-12">
  <div class="row">
  	<div class="col-sm-12 col-md-8 col-lg-8">
  	  <div class="shopping-cart">
  	    <div style="font-size: 17px;font-weight: 600">My Cart : <?php echo e($userCartItems_count); ?> <?php if($userCartItems_count>1): ?> Items <?php else: ?> Item <?php endif; ?></div><hr>
		  <div class="column-labels">
		    <label class="product-image">Image</label>
		    <label class="product-details">Product</label>
		    <label class="product-price">Price</label>
		    <label class="product-quantity">Quantity</label>
		    <label class="product-removal">Remove</label>
		    <label class="product-line-price">Total</label>
		  </div>
      <?php 
        $total_price = 0;
        $discount_price = 0;
        $delivery_price = 0;
        $subtotal = 0;
        $total_weight = 0;
        $coupon_discount = 0;
      ?>
      <?php $__currentLoopData = $userCartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        $thumbnail = \App\ProductImage::where('product_id',$item['product']['id'])->where('is_thumbnail',1)->where('status',1)->value('image');
      ?>
		  <div class="product">
		    <div class="product-image">
		      <img src="<?php echo e(asset('storage/images/products/'.$thumbnail)); ?>">
		    </div>
		    <div class="product-details">
		      <div class="product-title"><?php echo e($item['product']['title']); ?></div>
		    </div>
		    <div class="product-price">
          <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($item['product']['offer_price']); ?><br>
           <span class="cart-discPrice"><i class="fa fa-inr" aria-hidden="true"></i><?php echo e($item['product']['price']); ?></span>
        </div>
        <form method="post" action="<?php echo e(route('update-remove-cart')); ?>">
        <?php echo csrf_field(); ?>
		    <div class="product-quantity">
		      <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" min="1">
		    </div>
        <input type="hidden" name="cartid" value="<?php echo e($item['id']); ?>">
		    <div class="product-removal">
		      <input type="submit" name="btn" class="update-cart" value="Update">
		      <input type="submit" name="btn" class="remove-product" value="Remove">
		    </div>
        </form>
		    <div class="product-line-price"><i class="fa fa-inr" aria-hidden="true"></i><?php echo e($item['price']); ?></div>
		  </div>
      <?php
        $total_price = $total_price + ($item['product']['price'] * $item['quantity']); 
        $discount_price = $discount_price + ($item['product']['price'] * $item['quantity'] - $item['product']['offer_price'] * $item['quantity']);
        $subtotal = $subtotal + ($item['product']['offer_price'] * $item['quantity']);
        $total_weight = $total_weight + ($item['product']['weight'] * $item['quantity']);
        $delivery_price = $total_weight * 50;
        if($delivery_price < 50){
          $delivery_price = 50;
        }elseif($delivery_price < 120){
          $delivery_price = $delivery_price;
        }else{
          $delivery_price = 120;
        }
      ?>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	    </div>
    </div>

  	<div class="col-sm-12 col-md-4 col-lg-4">
         
	<div class="price-summary-main">
        	<div class="price-dtls">Price Details <span style="font-size: 12px;">(<?php echo e($userCartItems_count); ?> items)</span></div>
        	<div class="pd-all-info">
        
        	  <div class="total-mrp">
        		<span>Total MRP</span>
        		<span class="p-details-value"><i class="fa fa-inr" aria-hidden="true"></i><?php echo e($total_price); ?></span>
        	  </div>
        	  <div class="ddc-info">
        		<span>Discount on MRP</span>
        		<span class="p-details-value pdv-clr">- <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($discount_price); ?></span>
        	  </div>
        	  <div class="ddc-info">
        		<span>Delivery Fee</span>
        		<span class="p-details-value pdv-clr"><i class="fa fa-inr" aria-hidden="true"></i><?php echo e($delivery_price); ?></span>
        	  </div>
        	  <!-- <div class="ddc-info">
        		<span>Coupon Discount </span>
        		<span class="p-details-value pdv-clr">- Rs. 22</span>
        	  </div> -->
           
        	</div><hr>
        	<div class="total-amount">
        		Total Amount
        		<span class="t-amount"> <i class="fa fa-inr" aria-hidden="true" style="color: #212529 !important"></i><?php echo e($subtotal + $delivery_price); ?></span>
        	</div>
          <hr>
       
          <?php if(Auth::user()): ?>
          	<div class="place-order">
             
               <a href="<?php echo e(url('/order-summary/checkout')); ?>" class="btn po-cstm-btn">CONTINUE</a>
        	  </div>
          <?php else: ?>
           <div class="place-order">
              <a href="<?php echo e(url('/login')); ?>" class="btn po-cstm-btn">Login & Continue</a>
            </div>
          <?php endif; ?>
        </div>

  	</div>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>

</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/cart.blade.php ENDPATH**/ ?>