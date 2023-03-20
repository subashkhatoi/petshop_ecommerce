<?php $__env->startSection('title'); ?>
  Product Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
   $thumbnail = \App\ProductImage::where('product_id',$product->id)->where('is_thumbnail',1)->where('status',1)->value('image');
   $images = \App\ProductImage::where('product_id',$product->id)->where('is_thumbnail',0)->where('status',1)->get();
   $coin = round($product->offer_price / 100);
 ?>
<div class="pd-card">
	<div class="container-fliud">
		<div class="wrapper row">
			<div class="preview col-md-5">
				
				<div class="preview-pic tab-content">
				  <div class="tab-pane active" id="pic-1"><img src="<?php echo e(asset('storage/images/products/'.$thumbnail)); ?>" /></div>
          <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				   <div class="tab-pane" id="pic-<?php echo e($image->id); ?>"><img src="<?php echo e(asset('storage/images/products/'.$image->image)); ?>" /></div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  <!-- <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
				  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
				  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div> -->
				</div>
				<ul class="preview-thumbnail nav nav-tabs">
				  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="<?php echo e(asset('storage/images/products/'.$thumbnail)); ?>" /></a></li>
          <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				   <li><a data-target="#pic-<?php echo e($image->id); ?>" data-toggle="tab"><img src="<?php echo e(asset('storage/images/products/'.$image->image)); ?>" /></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  <!-- <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
				  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
				  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li> -->
				</ul>
				
			</div>
			<div class="details col-md-7">
				<h3 class="product-title"><?php echo e($product->title); ?></h3>
				<?php if($product->stock > 0): ?>
				<span class="pd-instock">In Stock</span>
				<?php else: ?>
				<span class="pd-outofstock">Out Of Stock</span>
				<?php endif; ?>
				<div class="pd-price">
					<span class="pd-currentPrice"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e($product->offer_price); ?></span>
					<span class="pd-discPrice"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e($product->price); ?></span>
					<span class="percentage-off">( <?php echo e(app("App\Http\Controllers\BaseController")->offPercentage($product->price,$product->offer_price)); ?>% OFF )</span>
				</div>
				<div class="tax-inclusive">Inclusive of all taxes</div>
				<!-- <div class="rating">
					<div class="stars">
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
					</div>
					<span class="review-no">41 reviews</span>
				</div> -->
				<p class="product-description">By buying this product you can collect up to <?php echo e($coin); ?> points. That can be converted into a voucher of ₹<?php echo e($coin); ?></p>
				<span class="cstm-hr"></span>
				<div class="pd-other-info">
           <table class="table table-bordered">
             <tr>
               <td class="pdoi-tbl" width="40%"><b>Category</b></td>
               <td class="pdoi-tbl"><?php echo e(app("App\Http\Controllers\BaseController")->getCategoryName($product->category)); ?></td>
             </tr>
             <tr>
               <td class="pdoi-tbl" width="40%"><b>Suitable</b></td>
               <td class="pdoi-tbl"><?php echo e(app("App\Http\Controllers\BaseController")->getPetName($product->pet_type)); ?></td>
             </tr>
             <tr>
               <td class="pdoi-tbl" width="40%"><b>Brand</b></td>
               <td class="pdoi-tbl"><?php echo e(app("App\Http\Controllers\BaseController")->getBrandName($product->brand)); ?></td>
             </tr>
           </table>
        </div>
        <form action="<?php echo e(route('add-to-cart')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="pd-qty-title">QUANTITY :
          <select name="quantity" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
          </select>
        </div>

        <input type="hidden" name="productid" value="<?php echo e($product->id); ?>">
        <input type="hidden" name="offerprice" value="<?php echo e($product->offer_price); ?>">
				<div class="action">
					<input type="submit" class="add-to-cart btn btn-default" value="Add to Cart">
					<!-- <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> -->
				</div>
        </form>

         <span class="cstm-hr" style="margin-top: 12px;"></span>
         <div class="search-pincode" style="margin-top: 8px;">
          <div style="margin-bottom: 4px;">Delivery Pincode</div>
          <div class="input-group">
            <input type="text" id="pincode" class="form-control" placeholder="Enter pincode">
            <div class="input-group-append">
              <!-- <button class="btn btn-secondary" type="button">
                <i class="fa fa-search"></i>
              </button> -->
              <input type="submit" id="btn" class="btn btn-secondary" value="Check">
            </div>
          </div>
          <div id="result"></div>
         </div>

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
  .has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}
  .table .pdoi-tbl{
    padding: 3px !important;
  }
.action{
	margin-top: 7px;
}
.pd-price{
	    padding: 0 9px 11px 0px
}
.pd-currentPrice{
	color: #ff9f1a;
	font-weight: 600;
	font-size: 1.3rem;
	letter-spacing: -1px;
}
.pd-discPrice{
	font-size: 0.9rem;
	color: #585858;
	position: relative;
	display: inline-block;
	margin: 0 5px
}
.pd-discPrice::after{
	content: "";
	position: absolute;
	top: 50%;
	left: 0;
	width: 110%;
	height: 1px;
	background-color: #585858;
	/*transform: rotate(10deg);*/
}
.tax-inclusive{
	margin-top: -14px;
    margin-bottom: 5px;
    font-size: 11px;
}
.cstm-hr{
	border-bottom: 1px solid #ccc;
    margin-top: 5px;
}
.pd-instock{
	/*border: 1px solid green;*/
    width: 56px;
    padding: 0px 0px 0px 12px;
    font-size: 9px;
    background-color: green;
    border-radius: 3px;
    color: #fff;
    margin-bottom: 10px;
}
.pd-outofstock{
	/*border: 1px solid #ff3333;*/
    width: 70px;
    padding: 0px 0px 0px 8px;
    font-size: 9px;
    background-color: #ff3333;
    border-radius: 3px;
    color: #fff;
    margin-bottom: 10px;
}
.percentage-off{
	font-size: 12px;
}
.pd-other-info{
  margin-top: 12px;
    width: 40%;
    font-size: 13px
}
.pd-qty-title{
  font-size: 13px;
    font-weight: bold;
    margin-bottom: 5px;
    letter-spacing: .5px;
    color: #262626;
}

	img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media  screen and (max-width: 996px) {
    .preview {
      /*margin-bottom: 20px; */
      margin-bottom: 124px;
      } 
    }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.pd-card {
  /*margin-top: 50px;*/
  /*background: #eee;*/
  padding: 2em;
  line-height: 1.5em; }

@media  screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  /*text-transform: UPPERCASE;*/
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }
.product-description{
	font-size: 12px;
}
.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 7px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 10px 13px 10px 13px;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes  opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

/*# sourceMappingURL=style.css.map */
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
<script>
  $(document).ready(function() {
            $("#btn").click(function() {
              var pincode = $('#pincode').val();
                $.ajax({
                  url: "<?php echo e(route('check-pincode')); ?>",
                  type: 'get', 
                  data: {pincode: pincode},
                  success: function(result) {
                    $("#result").html(result);
                }});
            });
        });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/pets/product-details.blade.php ENDPATH**/ ?>