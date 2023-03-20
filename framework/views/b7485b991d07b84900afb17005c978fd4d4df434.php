<?php $__env->startSection('title'); ?>
  Online platform for all your pet's need
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="dc_main">
	<img src="<?php echo e(asset('storage/images/pet/dog.png')); ?>" class="banner-img" style="width: 100%">
   

<div class="container mt-100">
    <div class="row" style="justify-content: center;">
    	<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-6 col-md-3 col-sm-4">
            <div class="card mb-30"><a class="card-img-tiles" href="<?php echo e(route('dog-products-list',$category->slug)); ?>" data-abc="true">
                    <div class="inner">
                        <div class="main-img"><img src="<?php echo e(asset('storage/images/pet/category/cat1.png')); ?>" alt="Category"></div>
                        <a href="<?php echo e(route('dog-products-list',$category->slug)); ?>"> <div class="c-title"><?php echo e($category->name); ?></div></a>
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/pets/dog/dogs-category.blade.php ENDPATH**/ ?>