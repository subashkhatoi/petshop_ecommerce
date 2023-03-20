<?php $__env->startSection('title'); ?>
 Order Successfully
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container user-area">
 <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 success-order-main">
 	<?php if(Session::has('status')): ?>
 	<div class="success-order-details">
 		<div class="success-order-msg">Thank you for your order!</div>
 		<div class="sod-order-nmbr-main">Your Order Number is</div>
 		<div class="sod-order-nmbr"><?php echo e(session()->get('unique_order_id')); ?></div>
 		<div class="cs-btn-main"><a class="cs-btn" href="<?php echo e(url('/')); ?>">Continue Shopping</a></div>
 	</div>
 	<?php else: ?>
 	 <script>window.location = "/";</script>
 	<?php endif; ?>
 </div>
</div>
<?php 
    session()->forget('status');   
?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
	.success-order-details{
		margin-top: 45px;
		margin-bottom: 40px;
	}
	.success-order-msg{
		font-size: 21px;
		margin-bottom: 8px;
	}
	.cs-btn-main{
		margin-top: 8px;
	}
	.cs-btn{
		border:1px solid #000080;
		background-color: #000080;
		color: #fff;
		font-size: 12px;
		padding: 4px 6px 6px 6px;
		border-radius: 5px;
	}
	.cs-btn:hover{
		border:1px solid #000080;
		background-color: #000080;
		color: #fff;
		font-size: 12px;
		padding: 4px 6px 6px 6px;
		border-radius: 5px;
	}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/order-success.blade.php ENDPATH**/ ?>