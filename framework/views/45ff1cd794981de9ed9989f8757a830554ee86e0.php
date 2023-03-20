<?php $__env->startSection('title'); ?>
  Orders
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="orders-main">
  <div style="font-size:1.5rem;margin-bottom: 8px;font-weight: 600;">Order History</div>
  <?php if($orders_count > 0): ?>
	  <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  <?php
	    $item_count = \App\OrderProduct::where('order_id',$order->id)->count();
	  ?>
	  <a class="u-order-dtls_link" href="<?php echo e(route('order-details',$order->id)); ?>">
	  <div class="order-details">
	  	<div class="u_orderid_main"><span class="u_orderid">Order Id : <?php echo e($order->unique_order_id); ?></span>
	      <span class="uo_status">
	      	Status : <?php echo e($order->order_status); ?>

	      </span>
	  	</div>
	  	<div>Total Items : <?php echo e($item_count); ?></div>
	  	<div>Amount : <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($order->payable_amount); ?>

	      <button class="cstm_u_order_dtls_btn">View</button>
	  	</div>
	  </div>
	  </a>
	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php else: ?>
   <hr>
    <div class="no-order-main">
       <div class="no-order">You haven't placed any order yet.</div>
       <div class="no-order-info">After placing order, you can track them from here</div>
       <a href="<?php echo e(url('/')); ?>" class="btn cstm-ss-btn">Start Shopping</a>
    </div>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
	a.u-order-dtls_link{
		color: #212529 !important;
	}
	.order-details{
		border: 1px solid #ccc;
	    padding: 4px 5px 4px 5px;
	    background-color: #fff;
	    box-shadow: 0px 0px 2px 0px #ccc;
	    margin-bottom: 4px;
	}
	.u_orderid_main{
		margin-bottom: 5px;
	}
	.u_orderid{
       font-weight: 600;
	}
	.uo_status{
		float: right;
	}
	.cstm_u_order_dtls_btn{
      border:1px solid #000080;
      background-color: #fff;
      color: #000080;
      padding: 2px 16px 3px 16px;
      border-radius: 3px;
      font-size: 12px;
      float: right;
	}
	.cstm_u_order_dtls_btn:hover{
      border:1px solid #000080;
      background-color: #000080;
      color: #fff;
      padding: 2px 16px 3px 16px;
      border-radius: 3px;
      font-size: 12px;
      float: right;
	}
	.cstm-ss-btn{
		border:1px solid #000080;
		background-color: #000080;
		color: #fff;
		font-size: 12px;
		padding: 4px 6px 6px 6px;
		border-radius: 5px;
		margin-top: 10px;
	}
	.cstm-ss-btn:hover{
		border:1px solid #000080;
		background-color: #000080;
		color: #fff;
		font-size: 12px;
		padding: 4px 6px 6px 6px;
		border-radius: 5px;
	}
	.no-order-main{
		margin-bottom: 18px;
	}
	.no-order{
		font-size: 16px;
		margin-bottom: 4px;
	}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/order/orders.blade.php ENDPATH**/ ?>