<?php $__env->startSection('title'); ?>
  Empty cart
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="empty-cart-main">
	<div class="empty-cart">
		<div class="niic">No Items in cart </div>
		<div class="gth"><a href="<?php echo e(url('/')); ?>" class="gth-btn">Go to Homepage</a></div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style>
	.empty-cart-main{
		margin-top: 60px;
		margin-bottom: 60px;
	}
	.empty-cart{
		text-align: center;
	}
	.niic{
		font-size: 22px;
		font-weight: 600;
		color: #999999;
	}
	.gth{
       margin-top: 18px;
	}
	.gth-btn{
		border:1px solid #000099;
		padding: 5px;
		font-size: 12px;
		background-color: #000099;
		color: #fff;
		border-radius: 4px;
	}
	.gth-btn:hover{
		border:1px solid #000099;
		padding: 5px;
		font-size: 12px;
		background-color: #000099;
		color: #fff;
		border-radius: 4px;
	}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/empty-cart.blade.php ENDPATH**/ ?>