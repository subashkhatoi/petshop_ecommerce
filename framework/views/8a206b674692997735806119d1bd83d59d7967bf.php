<?php $__env->startSection('title'); ?>
  Manage product
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
  $thumbnail = \App\ProductImage::where('product_id',$product->id)->where('is_thumbnail',1)->value('image');
  $images_count = \App\ProductImage::where('product_id',$product->id)->where('is_thumbnail',0)->count();
  $images = \App\ProductImage::where('product_id',$product->id)->where('is_thumbnail',0)->get();
    $lifestages = \App\Lifestage::all();
	$health_considerations = \App\HealthConsideration::all();
	$breeds = \App\Breed::all();
	$weights = \App\Weight::all();
	$volumes = \App\Volume::all();
	$quantities = \App\TabletQuantity::all();
	$compositions = \App\Composition::all();
	$colors = \App\Color::all();
 ?>
<div class="row dashboard-main">
  <div class="col-md-12 col-sm-12 col-xs-12">
  	<div class="row">
  	<div class="col-md-7 col-sm-7 col-xs-7">
  	  <div class="edit-list-product-title">
  		 <div>Product code : <b><?php echo e($product->unique_product_id); ?></b></div>
  		 <div class="sts">
  			Status : <?php if($product->status == 1): ?> <b><span style="color: green">Active</span></b> <?php else: ?> <b><span style="color: red">Inactive</span></b> <?php endif; ?>
  		 </div>
      </div>
      
      <div class="edit-list-product-main">
  	  	<div class="edit-list-product-main-ttl">Basic Info</div>
  	  	<div class="edit-list-product-main-form">
  	  		<table class="table table-bordered cstm-admin-tbl">
			    <tbody class="cstm-tbl-td">
			      <tr>
			      	<td width="25%">Name</td>
			      	<td><?php echo e($product->title); ?></td>
			      	<td>
			      		<a href="#" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#update-title">Edit</a>
			      	</td>
			      </tr>
			      <tr>
			      	<td>Pet Type</td>
			      	<td><?php echo e(app("App\Http\Controllers\BaseController")->getPetName($product->pet_type)); ?></td>
			      </tr>
			      <tr>
			      	<td>Category</td>
			      	<td><?php echo e(app("App\Http\Controllers\BaseController")->getCategoryName($product->category)); ?></td>
			      </tr>
			      <tr>
			      	<td>Subcategory</td>
			      	<td><?php echo e(app("App\Http\Controllers\BaseController")->getSubcategoryName($product->subcategory)); ?></td>
			      </tr>
			      <tr>
			      	<td>Brand</td>
			      	<td><?php echo e(app("App\Http\Controllers\BaseController")->getBrandName($product->brand)); ?></td>
			      </tr>
			    </tbody>
			 </table>
  	  	</div>

        <div class="edit-list-product-main-ttl">Other Info</div>
  	  	<div class="edit-list-product-main-form">
  	  		<table class="table table-bordered cstm-admin-tbl">
			    <tbody class="cstm-tbl-td">
			      <tr>
			      	<td width="25%">Lifestage</td>
			      	<td>
			      		<?php if($product->lifestage != ""): ?>
			      		 <?php $lifestage =  app("App\Http\Controllers\BaseController")->getLifestage($product->lifestage); ?>
			      		 <?php echo e($lifestage->lifestage_category); ?> (<?php echo e($lifestage->lifestage_subcategory); ?>)
			      		<?php else: ?>
                          --
			      		<?php endif; ?>
			      	</td>
			      	<td rowspan="9">
			      		<a href="#" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#update-other-info">Edit</a>
			      	</td>
			      </tr>
			      <tr>
			      	<td>Health Consideration</td>
			      	<td>
			      		<?php if($product->health_consideration != ""): ?>
			      	     <?php echo e(app("App\Http\Controllers\BaseController")->getHealthConsideration($product->health_consideration)); ?>

			      	    <?php else: ?>
                         --
			      	    <?php endif; ?>
			      	</td>
			      </tr>
			      <tr>
			      	<td>Breed</td>
			      	<td>
			      		<?php if($product->breed != ""): ?>
			      	     <?php echo e(app("App\Http\Controllers\BaseController")->getBreed($product->breed)); ?>

			      	    <?php else: ?>
                         --
			      	    <?php endif; ?>
			      	</td>
			      </tr>
			      <tr>
			      	<td>Weight</td>
			      	<td>
			      		<?php if($product->weight != ""): ?>
			      	     <?php echo e($product->weight); ?>

			      	    <?php else: ?>
                         --
			      	    <?php endif; ?>
			      	</td>
			      </tr>
			      <tr>
			      	<td>Volume</td>
			      	<td>
			      		<?php if($product->volume != ""): ?>
			      	     <?php echo e(app("App\Http\Controllers\BaseController")->getVolume($product->volume)); ?>

			      	    <?php else: ?>
                         --
			      	    <?php endif; ?>
			      	</td>
			      </tr>
			      <tr>
			      	<td>Tablet Quantity</td>
			      	<td>
			      		<?php if($product->tablet_quantity != ""): ?>
			      	     <?php echo e(app("App\Http\Controllers\BaseController")->getTabQuantity($product->tablet_quantity)); ?>

			      	    <?php else: ?>
                         --
			      	    <?php endif; ?>
			      	</td>
			      </tr>
			      <tr>
			      	<td>Composition</td>
			      	<td>
			      		<?php if($product->composition != ""): ?>
			      	     <?php echo e(app("App\Http\Controllers\BaseController")->getComposition($product->composition)); ?>

			      	    <?php else: ?>
                         --
			      	    <?php endif; ?>
			      	</td>
			      </tr>
			      <tr>
			      	<td>Color</td>
			      	<td>
			      		<?php if($product->color != ""): ?>
			      	     <?php echo e(app("App\Http\Controllers\BaseController")->getColor($product->color)); ?>

			      	    <?php else: ?>
                         --
			      	    <?php endif; ?>
			      	</td>
			      </tr>
			      <tr>
			      	<td>Size</td>
			      	<td>
			      		<?php if($product->size != ""): ?>
			      	     <?php echo e(app("App\Http\Controllers\BaseController")->getSize($product->size)); ?>

			      	    <?php else: ?>
                         --
			      	    <?php endif; ?>
			      	</td>
			      </tr>
            <tr>
              <td>Description</td>
              <td>
                <?php echo $product->description; ?>

              </td>
              <td>
                <a href="#" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#update-product-description">Edit</a>
              </td>
            </tr>
			    </tbody>
			 </table>
  	  	</div>

  	  	<div class="edit-list-product-main-ttl">Price Details</div>
  	  	<div class="edit-list-product-main-form">
  	  		<table class="table table-bordered cstm-admin-tbl">
			    <tbody class="cstm-tbl-td">
			    	<tr>
			    		<td width="25%">Price</td>
			    		<td>Rs. <?php echo e($product->price); ?></td>
			    		<td rowspan="2" width="20%">
			    			<a href="#" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-product-subcategory-type">Edit</a>
			    		</td>
			    	</tr>
			    	<tr>
			    		<td>Offer Price</td>
			    		<td>Rs. <?php echo e($product->offer_price); ?></td>
			    	</tr>
			    </tbody>
			</table>
  	  	</div>

  	  </div>

  	  
  	</div>
  	<div class="col-md-5 col-sm-5 col-xs-5">
  	  <div class="edit-list-product-thumb">
  		<div class="thumbnail">Thumbnail</div>
  		<hr>
  		<div class="col-md-12 col-sm-12 col-xs-12">
  		 <div class="row">
  		   <div class="col-md-6 col-sm-6 col-xs-6">
  			   <img src="<?php echo e(asset('storage/images/products/'.$thumbnail)); ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
  		   </div>
  		   <div class="col-md-6 col-sm-6 col-xs-6">
  			   <form method="post" action="<?php echo e(route('admin-update-product-thumbnail')); ?>" enctype="multipart/form-data">
  		     	<?php echo csrf_field(); ?>
                  <input type="file" name="image" class="form-control" style="margin-bottom: 5px;" required>
                  <input type="hidden" name="productid" value="<?php echo e($product->id); ?>">
                  <input type="submit" class="btn btn-info" value="Update">
  		       </form>
  			</div>
  		 </div>
  		</div>
  	  </div>

  	  <div class="edit-list-product-upload-img">
  		<div class="thumbnail">Upload Images</div>
  		<hr>
  		<div class="col-md-12 col-sm-12 col-xs-12">
  			   <form method="post" action="<?php echo e(route('admin-upload-product-images')); ?>" enctype="multipart/form-data">
  		     	<?php echo csrf_field(); ?>
                  <input type="file" name="images[]" class="form-control" multiple style="margin-bottom: 5px;" required>
                  <input type="hidden" name="productid" value="<?php echo e($product->id); ?>">
                  <input type="submit" class="btn btn-info" value="Upload">
  		       </form>
  		</div>
  		<?php if($images_count > 0): ?>
	  		<div class="col-md-12 col-sm-12 col-xs-12" style="height: 160px;overflow-y: scroll;">
	  		 <table class="table">
	  		 	<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  		 	<tr>
	  		 		<td><img src="<?php echo e(asset('storage/images/products/'.$img->image)); ?>" id="imgProfile" style="width: 87px; height: 67px" class="img-thumbnail" /></td>
	  		 		<td>
	  		 			<?php if($img->status == 1): ?>
	  		 			 <span style="color: green;">Active</span>
	  		 			<?php else: ?>
	                     <span style="color: red;">Inactive</span>
	  		 			<?php endif; ?>
	  		 		</td>
	  		 		<td>
	  		 			 <?php if($img->status == 1): ?>
	                        <!-- <span class="manage-product-category"><a href="<?php echo e(route('product-image-status-inactive',$img->id)); ?>" class="btn-danger" style="font-size: 15px;padding: 1px 4px 2px 4px;"><i class="fa fa-times btn-color" aria-hidden="true"></i></a></span> -->
	                       <?php else: ?>
	                        <!-- <span class="manage-product-category"><a href="<?php echo e(route('product-image-status-active',$img->id)); ?>" class="btn-success" style="font-size: 15px;padding: 1px 4px 2px 4px;"><i class="fa fa-check btn-color" aria-hidden="true"></i></a></span> -->
	                       <?php endif; ?>
	  		 		</td>
	  		 	</tr>
	  		 	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  		 </table>
	  		</div>
  		<?php else: ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
             No images found...
            </div>
  		<?php endif; ?>
  	  </div>

  	</div>
  	</div>
  </div>
</div>

<!-- Modal update titile -->
<div id="update-title" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-fabrics-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('admin-update-product-title')); ?>">
          <?php echo csrf_field(); ?>
          
          <div class="form-group">
          	Title *
            <input type="text" name="title" class="form-control" placeholder="Enter Price" value="<?php echo e($product->title); ?>" required>
          </div>
          
          <input type="hidden" name="pid" class="form-control" value="<?php echo e($product->id); ?>">
        <div style="text-align: center;display: flex;justify-content: center;">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal update titile-->

<!-- Modal update desc -->
<div id="update-product-description" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-fabrics-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('admin-update-product-desc')); ?>">
          <?php echo csrf_field(); ?>
          
          <div class="form-group">
            <textarea name="description" id="summernote"><?php echo $product->description; ?></textarea>
          </div>
          
          <input type="hidden" name="pid" class="form-control" value="<?php echo e($product->id); ?>">
        <div style="text-align: center;display: flex;justify-content: center;">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal update desc-->

<!-- Modal update other info -->
<div id="update-other-info" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-fabrics-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('admin-update-other-info')); ?>">
          <?php echo csrf_field(); ?>
          
          <div class="form-group">
          	Lifestage
            <select id="lifestage" name="lifestage" class="form-control">
              <option value="" disabled selected hidden>Select Lifestage</option>
              <?php $__currentLoopData = $lifestages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($ls->id); ?>" <?php echo e((!empty($product->lifestage) && $product->lifestage == $ls->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($ls->lifestage_category); ?> (<?php echo e($ls->lifestage_subcategory); ?>)</option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
          	Health Consideration
            <select id="health_consideration" name="health_consideration" class="form-control">
              <option value="" disabled selected hidden>Select Health Consideration</option>
              <?php $__currentLoopData = $health_considerations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($hc->id); ?>" <?php echo e((!empty($product->health_consideration) && $product->health_consideration == $hc->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($hc->hc_type); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
          	Breed
            <select id="breed" name="breed" class="form-control">
              <option value="" disabled selected hidden>Select Breed</option>
              <?php $__currentLoopData = $breeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($breed->id); ?>" <?php echo e((!empty($product->breed) && $product->breed == $breed->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($breed->breed); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
          	Composition
            <select id="composition" name="composition" class="form-control">
              <option value="" disabled selected hidden>Select Composition</option>
              <?php $__currentLoopData = $compositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $composition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($composition->id); ?>" <?php echo e((!empty($product->composition) && $product->composition == $composition->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($composition->composition); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
          	Weight
            <select id="weight" name="weight" class="form-control">
              <option value="" disabled selected hidden>Select Weight</option>
              <?php $__currentLoopData = $weights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($weight->weight); ?>" <?php echo e((!empty($product->weight) && $product->weight == $weight->weight) ? "selected=\"selected\"" : ""); ?>><?php echo e($weight->weight); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
          	Volume
            <select id="volume" name="volume" class="form-control">
              <option value="" disabled selected hidden>Select Volume</option>
              <?php $__currentLoopData = $volumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $volume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($volume->id); ?>" <?php echo e((!empty($product->volume) && $product->volume == $volume->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($volume->volume); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
          	Quantity
            <select id="tablet_quantity" name="tablet_quantity" class="form-control">
              <option value="" disabled selected hidden>Select tablet quantity</option>
              <?php $__currentLoopData = $quantities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($quantity->id); ?>" <?php echo e((!empty($product->tablet_quantity) && $product->tablet_quantity == $quantity->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($quantity->quantity); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
          	Color
            <select id="color" name="color" class="form-control">
              <option value="" disabled selected hidden>Select Color</option>
              <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($color->id); ?>" <?php echo e((!empty($product->color) && $product->color == $color->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($color->color); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
          	Size
            <select id="size" name="size" class="form-control">
              <option value="" disabled selected hidden>Select Size</option>
              <option value="S" <?php echo e((!empty($product->size) && $product->size == 'S') ? "selected=\"selected\"" : ""); ?>>S</option>
              <option value="M" <?php echo e((!empty($product->size) && $product->size == 'M') ? "selected=\"selected\"" : ""); ?>>M</option>
              <option value="L" <?php echo e((!empty($product->size) && $product->size == 'L') ? "selected=\"selected\"" : ""); ?>>L</option>
            </select>
          </div>
          
          <input type="hidden" name="pid" class="form-control" value="<?php echo e($product->id); ?>">
        <div style="text-align: center;display: flex;justify-content: center;">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal update other info-->

<!-- Modal edit price -->
<div id="add-product-subcategory-type" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-fabrics-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('admin-update-product-price')); ?>">
          <?php echo csrf_field(); ?>
          
          <div class="form-group">
          	Price *
            <input type="text" name="price" class="form-control" placeholder="Enter Price" value="<?php echo e($product->price); ?>" required>
          </div>
          <div class="form-group">
          	Offer Price *
            <input type="text" name="offerprice" class="form-control" placeholder="Enter Offer Price" value="<?php echo e($product->offer_price); ?>" required>
          </div>
          <input type="hidden" name="pid" class="form-control" value="<?php echo e($product->id); ?>">
        <div style="text-align: center;display: flex;justify-content: center;">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Add</button>
        </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal edit price-->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
<style type="text/css">
	.edit-list-product-title{
		background-color: #fff;
		padding: 6px 6px 6px 6px;
		box-shadow: 0 3px 8px #d2d2d2;
		display: flex;
	}
	.edit-list-product-thumb{
		background-color: #fff;
		padding: 6px 6px 6px 6px;
		box-shadow: 0 3px 8px #d2d2d2;
	}
	.edit-list-product-upload-img{
		background-color: #fff;
		padding: 6px 6px 6px 6px;
		box-shadow: 0 3px 8px #d2d2d2;
		margin-top: 5px;
	}
	.edit-list-product-main{
		margin-top: 5px;
		background-color: #fff;
		padding: 6px 6px 6px 6px;
		box-shadow: 0 3px 8px #d2d2d2;
		height: 510px;
		overflow-y: scroll;
	}
	.edit-list-product-main-ttl{
		font-weight: 400;
		font-size: 17px;
		background-color: #999999;
		color: #fff;
		padding: 7px;
	}
	.edit-list-product-main-form{
		margin-top: 20px;
	}
	.sts{
		margin-left: 200px;
	}
	.thumbnail{
		font-weight: 400;
		font-size: 17px;
		margin-bottom: -7px;
	}
	.item {
    display: flex;
    width: 50px;
    float: left;
    margin-right: 10px;
}
label {
    display: inline;
}
input[type=checkbox] {
    display: inline;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
<script>
  $('textarea#summernote').summernote({
       placeholder: 'Enter Product Description',
       tabsize: 2,
       height: 100,
       toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        //['fontname', ['fontname']],
       // ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        // ['insert', ['link', 'picture', 'hr']],
        //['view', ['fullscreen', 'codeview']],
        // ['help', ['help']]
      ],
      });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/product/edit-product.blade.php ENDPATH**/ ?>