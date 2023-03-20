<?php $__env->startSection('title'); ?>
  Order Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $order_products = \App\OrderProduct::orderBy('id','desc')->where('order_id',$order->id)->get(); ?>
<div class="container">
  <div class="ui-details">
	<div class="order-details-main">
	 <div class="uid-title">
		Order Details
	 </div>
	<div>
	 <table class="table">
		<tbody>
	      <tr>
	        <td width="20%">Order Id</td>
	        <td>: <?php echo e($order->unique_order_id); ?></td>
	      </tr>
	      <tr>
	        <td>Status</td>
	        <td>: <?php echo e($order->order_status); ?> </td>
	      </tr>
	    </tbody>
     </table>
	</div>
	</div>
  </div>

  <div class="order-details-main">
  	<div class="od-product-dtls">
    <div class="product-dtls-section">
    <?php $__currentLoopData = $order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $thumb = \App\ProductImage::where('product_id',$product->product_id)->where('is_thumbnail',1)->where('status',1)->value('image');
        $slug = \App\Product::where('id',$product->product_id)->value('slug');
      ?>
     <div class="product pd-products">
	    <div class="product-image pd-pi">
	      <img src="<?php echo e(asset('storage/images/products/'.$thumb)); ?>" style="width: 70px;">
	    </div>
	    <div class="product-details">
	      <div class="product-title">
	      	<a href="/p/food/<?php echo e($slug); ?>" target="_blank"><?php echo e(app('\App\Http\Controllers\BaseController')->getProductName($product->product_id)); ?></a></div>
	    </div>
	    <div class="product-quantity">
	      Qty : <?php echo e($product->product_qty); ?>

	    </div>
	  </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
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
    	border:1px solid #ccc;
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/order/order-details.blade.php ENDPATH**/ ?>