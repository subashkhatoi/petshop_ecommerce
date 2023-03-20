<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section-2-main">
	<?php
	   $products = DB::select("SELECT * FROM products INNER JOIN (select product_id from order_products group by product_id order by count(*) desc limit 5) as order_products ON products.id = order_products.product_id");
	 ?>
	<div class="st-main">MOST SELLING</div>

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
</div>
<?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/homepage/most-selling-section.blade.php ENDPATH**/ ?>