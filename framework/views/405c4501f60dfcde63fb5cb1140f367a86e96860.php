\<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section-2-main">
	<?php
	   $pet = DB::table('pets')->where('pet_name','Dog')->value('id');
	   $category = DB::table('categories')->where('pet_id',$pet)->where('name','Food')->first();
	   $products = DB::table('products')->orderBy('id','desc')->where('pet_type',$pet)->where('category',$category->id)->where('status',1)->take(5)->get();
	 ?>
	<div class="st-main">DOG FOODS</div>

    <div class="Cust-df-row">
    	<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	<?php
	          $thumbnail = \App\ProductImage::where('product_id',$product->id)->where('is_thumbnail',1)->where('status',1)->value('image');
              $sc = \App\Category::where('id',$product->category)->value('slug');
              $off_percentage = ($product->price - $product->offer_price) / $product->price * 100;
              $round_off_percentage = round($off_percentage);
         ?>
		<div class="Cust-col"><a href="<?php echo e(route('product-details',[$sc,$product->slug])); ?>">
				<div class="plm-details">
					<div class="main-img"><img src="<?php echo e(asset('storage/images/products/'.$thumbnail)); ?>" alt="Category"></div>
				    <div class="InnerP-tit"> <?php echo e($product->title); ?> </div>
					<div class="InnerP-cont">
						<span class="currentPrice"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e($product->offer_price); ?></span>
						<span class="discPrice"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e($product->price); ?></span>
						<span class="off-per">( <?php echo e($round_off_percentage); ?>% OFF )</span>
					</div>
				</div></a>
      </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

	<div class="all-view-more"><a href="<?php echo e(url('/dog/food')); ?>">View More</a></div>

</div>
<?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/homepage/dog-food-section.blade.php ENDPATH**/ ?>