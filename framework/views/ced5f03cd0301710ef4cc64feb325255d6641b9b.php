<?php $__env->startSection('title'); ?>
  Checkout
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
<div class="col-sm-12 col-md-12 col-lg-12">
  <div>
		<div class="back-to-cart"><a href="<?php echo e(url('/cart')); ?>" class="btc-btn"><i class="fa fa-arrow-left"></i> Back to Cart</a></div>
  </div>
  <div class="row">
  	<div class="col-sm-12 col-md-8 col-lg-8">

  	  <?php 
     	  $delivery_address_count = \App\Address::where('is_default','1')->where('user_id',Auth::user()->id)->where('status','1')->count();
     	  if($delivery_address_count > 0){
            $delivery_address = \App\Address::where('is_default','1')->where('user_id',Auth::user()->id)->where('status','1')->first();
            $service_available = \App\Pincode::where('pincode',$delivery_address->pincode)->count();
          }
     	?>
     	<div class="checkout-address">
     	 <div class="col-12 col-md-12 col-sm-12">
     	  <?php if($delivery_address_count > 0): ?>
     		Deliver to : <span class="da-name"><?php echo e($delivery_address->name); ?></span>
     		<div><?php echo e($delivery_address->address); ?>, <?php if($delivery_address->locality != ""): ?> <?php echo e($delivery_address->locality); ?>, <?php endif; ?> <?php if($delivery_address->landmark != ""): ?> <?php echo e($delivery_address->landmark); ?>, <?php endif; ?> <?php echo e($delivery_address->city); ?>, <?php echo e($delivery_address->state); ?>, <?php echo e($delivery_address->pincode); ?></div>
     	  <?php else: ?>
           No Address
     	  <?php endif; ?>
     	  <div>
     	  	
            <a href="<?php echo e(route('checkout-addresses')); ?>" class="btn address-btn">
             <?php if($delivery_address_count > 0): ?>
              Change Address 
             <?php else: ?> 
              Add Address 
             <?php endif; ?>
            </a>
     	  </div>
         </div>
     	</div>

      <?php if($delivery_address_count > 0 && $service_available == 0): ?>
      <div class="service-not-available">Currenty we are not serving to this area. please add another to place your order.</div>
      <?php endif; ?>

  	  <div class="shopping-cart">
  	    <div style="font-size: 17px;font-weight: 600">Order Summary</div><hr>
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
        $wallet = \App\Wallet::where('user_id',Auth::user()->unique_user_id)->value('wallet_balance');
        $wallet_balance = 0;
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
       
		    <div class="product-quantity">
		      <?php echo e($item['quantity']); ?>

		    </div>
		    
		    <div class="product-line-price" style="float: right;"><i class="fa fa-inr" aria-hidden="true"></i><?php echo e($item['price']); ?></div>
		  </div>
	      <?php
	        $total_price = $total_price + ($item['product']['price'] * $item['quantity']); 
	        $discount_price = $discount_price + ($item['product']['price'] * $item['quantity'] - $item['product']['offer_price'] * $item['quantity']);
	        $subtotal = $subtotal + ($item['product']['offer_price'] * $item['quantity']);
	        $total_weight = $total_weight + ($item['product']['weight'] * $item['quantity']);
	        $delivery_price = $total_weight * 50;
          if($delivery_price < 50){
           $delivery_price = 50;
          }else{
           $delivery_price = $delivery_price;
        }
	      ?>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	    </div>
    </div>

  	<div class="col-sm-12 col-md-4 col-lg-4">
         
	<div class="price-summary-main">
		<?php
          if(session()->get('usewalletbalance') == "check"){
	           $wallet_balance = \App\Wallet::where('user_id',Auth::user()->unique_user_id)->value('wallet_balance');
	        }
	        else{
	           $wallet_balance = 0;
	        }
		?>
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
              <?php if(session()->get('usewalletbalance') == "check"): ?>
        	  <div class="ddc-info">
        		<span>Wallet Balance</span>
        		<span class="p-details-value pdv-clr">- <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($wallet_balance); ?></span>
        	  </div>
              <?php endif; ?>
        	  <!-- <div class="ddc-info">
        		<span>Coupon Discount </span>
        		<span class="p-details-value pdv-clr">- <i class="fa fa-inr" aria-hidden="true"></i> 22</span>
        	  </div>
            -->
        	</div><hr>
        	<div class="total-amount">
        		Total Amount
        		<span class="t-amount"><i class="fa fa-inr" style="color: #212529 !important" aria-hidden="true"></i><?php echo e($subtotal + $delivery_price - $wallet_balance); ?></span>
        	</div>
          <hr>
          <?php if($wallet > 0): ?>
          <div class="wallet-blnc">
            <?php if(session()->get('usewalletbalance') == "check"): ?>
            <div class="ctr-unchk"><a href="<?php echo e(route('uncheck-wallet-balance-in-cart')); ?>"><i class="fa fa-check-square" style="font-size: 19px;color: #000080"></i></a><div class="ctr-line">Use Wallet Balance <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($wallet_balance); ?></div></div>
            <?php else: ?>
            <div class="ctr-unchk"><a href="<?php echo e(route('use-wallet-balance-in-cart')); ?>"><div class="ctr-box"></div></a><div class="ctr-line">Use Wallet Balance <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($wallet); ?></div></div>
            <?php endif; ?>
          </div>
          <?php endif; ?>

          <div class="payment-mode">
            <input type="radio" name="payment_mode" id="online" value="online" checked> Online Payment
          </div>
          <div class="payment-mode" style="margin-bottom: 8px;">
            <?php if(session()->get('usewalletbalance') == "check"): ?>
              <input type="radio" name="payment_mode" id="cod" disabled> <del>Cash on Delivery</del>
            <?php else: ?>
              <input type="radio" name="payment_mode" id="cod" value="cod"> Cash on Delivery
            <?php endif; ?>
            <div class="cod-charge-apply">COD charge of <i class="fa fa-inr" style="font-size: 9px !important" aria-hidden="true"></i>50 may apply.</div>
          </div>
          
          <?php
            $pay_total_amount = ($subtotal + $delivery_price - $wallet_balance) * 100;
            session()->put('total_price',$total_price);
            session()->put('discount_price',$discount_price);
            session()->put('total_payable_amount',$subtotal + $delivery_price - $wallet_balance);
            session()->put('wallet_amount',$wallet_balance);
            session()->put('delivery_price',$delivery_price);
          ?>
          <?php if($delivery_address_count > 0 && $service_available > 0): ?>
            <div class="place-order" id="cod-show">
              <form action="<?php echo e(route('place-cod-order')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="submit" id="cod-order" class="btn po-cstm-btn" value="PLACE ORDER">
              </form>
            </div>
          	<div class="place-order" id="online-show">
             <form action="<?php echo e(route('place-online-order')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <script src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key=<?php echo e(config('custom.razor_key')); ?>

                        data-amount="<?php echo e($pay_total_amount); ?>"
                        data-buttontext="PAY NOW"
                        data-name="MawAndBaw"
                        data-description="Online Pet Shop"
                        data-image="<?php echo e(asset('storage/images/logo/logo.png')); ?>"
                        data-prefill.name="<?php echo e($delivery_address->name); ?>"
                        data-prefill.email="<?php echo e(Auth::user()->email); ?>"
                        data-prefill.contact = "<?php echo e($delivery_address->mobile); ?>"
                        data-theme.color="#000080">
                </script>
             </form>
        	  </div>
          <?php else: ?>
           <div class="place-order">
              <input type="submit" class="btn po-cstm-btn-disabled disabled" value="PLACE ORDER">
            </div>
          <?php endif; ?>
        </div>

  	</div>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
.wallet-blnc{
	margin-left: 5px;
	margin-top: -11px;
	margin-bottom: 8px;
}
.ctr-unchk{
    display: flex;
    margin-bottom: 10px;
}
.ctr-box{
    height: 17px;
    width:17px;
    border:1px solid #bfbfbf;
    border-radius: 2px;
    margin-top: 2px;
}
.ctr-line{
    margin-left: 5px;
    margin-top: -2px;
}
.btc-btn{
    padding: 6px 11px 6px 11px;
    border-right: 3px;
    font-size: 14px;
    box-shadow: 0px 0px 2px 1px #ccc;
    background-color: #fff;
  }
  .btc-btn:hover{
    color: #fff;
    background-color: #000080;
  }
  .checkout-address{
        background-color: #fff;
        margin-top: 15px;
        padding: 6px 0px 37px 0px;
        -webkit-box-shadow: 0px 0px 2px 1px #ccc;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
        -moz-box-shadow: 0px 0px 2px 1px #ccc;  /* Firefox 3.5 - 3.6 */
        box-shadow: 0px 0px 3px 0px #ccc;
        margin-bottom: 20px;
    }
    .da-name{
     font-weight: bold;
    }
    .address-btn{
    color: #fff;
    background-color: #000080;
    border-color: #000080;
    float: right;
    padding: 3px 7px 3px 7px;
    }
    .address-btn:hover{
        color: #fff;
    }
    .service-not-available{
      color: #ff1a1a;
      font-size: 13px;
      margin-top: -20px;
      margin-bottom: 5px;
    }
    .cod-charge-apply{
      font-size: 9px;
      margin-left: 19px;
      margin-bottom: 5px;
    }
    .razorpay-payment-button{
    width: 100%;
    color: #fff;
    background-color: #000080;
    font-size: 16px;
    border: 1px solid #000080;
    cursor: pointer;
    height: 45px;
    border-radius: 2px;
  }
  .razorpay-payment-button:active{
    border: 1px solid #000080 !important;
  }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
<script type="text/javascript">
  $("#cod-show").hide();
  $(document).ready(function() {

        $("#cod").click(function() {
          $("#online-show").hide();
          $("#cod-show").show();
        });
        $("#online").click(function() {
          $("#cod-show").hide();
          $("#online-show").show();
        });
      });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/checkout.blade.php ENDPATH**/ ?>