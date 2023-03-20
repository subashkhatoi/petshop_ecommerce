<?php $__env->startSection('title'); ?>
  Online platform for all your pet's need
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="home-main">
	<img src="<?php echo e(asset('storage/images/banner/banner1.jpg')); ?>" class="banner-img" style="width: 100%">
</div>
<?php echo $__env->make('frontend.homepage.most-selling-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.homepage.dog-food-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.homepage.cat-food-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/welcome.blade.php ENDPATH**/ ?>