<?php $__env->startSection('title'); ?>
  Order Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
    if($delivery_address->locality != ""){
	  $locality = ',' .$delivery_address->locality;
	}else{
	  $locality = '';
	}
	if($delivery_address->landmark != ""){
	  $landmark = ',' .$delivery_address->landmark;
	}else{
	  $landmark = '';
	}
	$order_products = \App\OrderProduct::orderBy('id','desc')->where('order_id',$order_details->id)->get();
?>

<div class="orders-main">

  <div class="order-details-main">
  	<div class="dt_title">Order Details</div>
  	<div class="dt_info">
  		<div class="dt_info_title">Order Id</div>
  		<div class="dt_info_value">: <b><?php echo e($order_details->unique_order_id); ?></b></div>
  	</div>
    <div class="dt_info">
      <div class="dt_info_title">Placed On</div>
      <div class="dt_info_value">: <?php echo e(date('d-m-Y h:i A',strtotime($order_details->created_at))); ?></div>
    </div>
  	<div class="dt_info">
  		<div class="dt_info_title">Status</div>
  		<div class="dt_info_value">: <?php echo e($order_details->order_status); ?></div>
  	</div>
    <?php if($order_details->expected_delivery_date != "" && $order_details->order_status == "Shipped"): ?>
    <div class="dt_info">
      <div class="dt_info_title">Expected Delivery</div>
      <div class="dt_info_value">: <?php echo e(date('d-m-Y',strtotime($order_details->expected_delivery_date))); ?></div>
    </div>
    <?php endif; ?>
    <?php if($order_details->expected_delivery_date != "" && $order_details->order_status == "Delivered"): ?>
    <div class="dt_info">
      <div class="dt_info_title">Delivery On</div>
      <div class="dt_info_value">: <?php echo e(date('d-m-Y',strtotime($order_details->expected_delivery_date))); ?></div>
    </div>
    <?php endif; ?>
  </div>

  <div class="od-product-dtls">
    <div class="product-dtls-section">
    <?php $__currentLoopData = $order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $thumbnail = \App\ProductImage::where('product_id',$product->product_id)->where('is_thumbnail',1)->where('status',1)->value('image');
      ?>
     <div class="product pd-products">
	    <div class="product-image pd-pi">
	      <img src="<?php echo e(asset('storage/images/products/'.$thumbnail)); ?>">
	    </div>
	    <div class="product-details">
	      <div class="product-title">
	      	<?php echo e(app('\App\Http\Controllers\BaseController')->getProductName($product->product_id)); ?></div>
	    </div>
	    <div class="product-quantity">
	      <?php echo e($product->product_qty); ?>

	    </div>
	  </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>

  <div class="delivery-details-main">
  	<div class="dt_title">Delivery Details</div>
  	<div class="dt_info">
  		<div class="dt_info_title">Name</div>
  		<div class="dt_info_value">: <?php echo e($delivery_address->name); ?></div>
  	</div>
  	<div class="dt_info">
  		<div class="dt_info_title">Mobile</div>
  		<div class="dt_info_value">: <?php echo e($delivery_address->mobile); ?></div>
  	</div>
  	<div class="dt_info">
  		<div class="dt_info_title">Address</div>
  		<div class="dt_info_value">: 
  			<?php echo e($delivery_address->address); ?> <?php echo e($locality); ?> <?php echo e($landmark); ?>

            <?php echo e($delivery_address->city); ?>

            <?php echo e($delivery_address->state); ?>, <?php echo e($delivery_address->pincode); ?>

  		</div>
  	</div>
  </div>

  <div class="order-details-main">
  	<div class="dt_title">Payment Details</div>
  	<table class="table table-bordered" style="margin-bottom: 0px !important;background-color: #fff">
   	 	<tr>
   	 		<td width="35%">Total Price</td>
   	 		<td><i class="fa fa-inr" aria-hidden="true"></i><?php echo e($order_details->total_price); ?></td>
   	 	</tr>
   	 	<tr>
   	 		<td width="35%">Discount</td>
   	 		<td><span>- <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($order_details->discount_price); ?></span></td>
   	 	</tr>
   	 	
   	 	<tr>
   	 		<td width="35%">Delivery Fee</td>
   	 		<td><?php if($order_details->shipping_charges>0): ?> + <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($order_details->shipping_charges); ?> <?php else: ?> <span style="color: green">FREE</span> <?php endif; ?></td>
   	 	</tr>

   	 	<?php if($order_details->wallet_deduction>0): ?>
        <tr>
   	 		<td width="35%">Wallet Deduction</td>
   	 		<td><span>- <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($order_details->wallet_deduction); ?></span></td>
   	 	</tr>
   	 	<?php endif; ?>

   	 	<?php if($order_details->cod_charge != ""): ?>
        <tr>
   	 		<td width="35%">cod Charge</td>
   	 		<td><span>+ <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($order_details->cod_charge); ?></span></td>
   	 	</tr>
   	 	<?php endif; ?>
     
   	 	<tr>
   	 		<td width="35%"><b>Total Amount</b></td>
   	 		<td><b><i class="fa fa-inr" aria-hidden="true"></i><?php echo e($order_details->payable_amount); ?></b></td>
   	 	</tr>
   	 </table>
  </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
	.delivery-details-main{
		border:1px solid #ccc;
		box-shadow: 0px 0px 2px 0px #ccc;
	}
	.dt_title{
		background: #000080;
	    color: #fff;
	    padding: 3px 0px 4px 4px;
	}
	.dt_info{
		display: flex;
		padding: 4px;
		background-color: #fff;
	}
	.dt_info_title{
		width: 15%;
	}
	.dt_info_value{
		width: 85%;
	}
	.order-details-main{
		margin-top: 8px;
		border:1px solid #ccc;
		box-shadow: 0px 0px 2px 0px #ccc;
	}
	.od-product-dtls{
		display: flex;
		margin-bottom: 8px;
	}
	.product-dtls-section{
       width: 100%;
       background: #fff;
       margin-top: 3px;
       box-shadow: 0px 0px 3px 0px #ccc;
       margin-left: auto;
       margin-right: auto;
	}
	/*.product-image
	{
		width: 23%;
	}*/
    .product-details{
    	width: 60%;
    }
    .pd-products{
    	padding: 4px 0px 4px 2px;
    	margin-bottom: 0px !important;
    }
    .pd-pi{
    	/*margin-left: 2px;*/
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/order/order-details.blade.php ENDPATH**/ ?>