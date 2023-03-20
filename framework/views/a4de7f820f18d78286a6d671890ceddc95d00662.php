<?php $__env->startSection('title'); ?>
  List New Product
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php 
  $categories = \App\Category::all();
  $subcategories = \App\Subcategory::all();
  $brands = \App\Brand::all();
?>
<div class="container">
  <div class="anp-main">
  	<?php if(session()->has('products')): ?>
  	<a href="<?php echo e(route('add-new-product-step1')); ?>">
  	<div class="step1">
  		Step-1 (All Information)
  	</div>
    </a>
  	<?php else: ?>
    <div class="step1">
  		Step-1 (All Information)
  	</div>
  	<?php endif; ?>

  	<div class="step1-main">
  		
        <form method="post" action="<?php echo e(route('post-add-product-step1')); ?>">
          <?php echo csrf_field(); ?>
          <div class="col-sm-12 col-md-12">
          	<div class="form-group">
              <input type="text" name="title" placeholder="Enter product title *" class="form-control" value="<?php echo e(session()->get('products.title')); ?>" required>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
          	<div class="row">
          	  <div class="col-sm-6 col-md-6">
		        <div class="form-group">
		            <select id="pet" name="pet" class="form-control" required>
		              <option value="" disabled selected hidden>Select Pet Type *</option>
		              <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              <option value="<?php echo e($pet->id); ?>" <?php echo e((!empty(session()->get('products.pet')) && session()->get('products.pet') == $pet->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($pet->pet_name); ?></option>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            </select>
		        </div>
		      </div>
		      <div class="col-sm-6 col-md-6">
	            <div class="form-group">
	                <select id="category" name="category" class="form-control" required>
	                  <option value="" disabled selected hidden>Select Category *</option>
	                  <?php if(session()->get('products.category')): ?>
		                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                  <option value="<?php echo e($category->id); ?>" <?php echo e((!empty(session()->get('products.category')) && session()->get('products.category') == $category->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($category->name); ?></option>
		                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
		              <?php endif; ?>
	                </select>
	            </div>
	          </div>
	        </div>
          </div>

          <div class="col-sm-12 col-md-12">
          	<div class="row">
          	  <div class="col-sm-6 col-md-6">
		        <div class="form-group">
		            <select id="subcategory" name="subcategory" class="form-control" required>
		              <option value="" disabled selected hidden>Select Subcategory *</option>
		              <?php if(session()->get('products.subcategory')): ?>
		                <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                  <option value="<?php echo e($subcategory->id); ?>" <?php echo e((!empty(session()->get('products.subcategory')) && session()->get('products.subcategory') == $subcategory->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($subcategory->subcategory_name); ?></option>
		                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
		              <?php endif; ?>
		            </select>
		        </div>
		      </div>
		      <div class="col-sm-6 col-md-6">
	            <div class="form-group">
	                <select id="brand" name="brand" class="form-control" required>
	                  <option value="" disabled selected hidden>Select Brand *</option>
	                  <?php if(session()->get('products.brand')): ?>
		                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                  <option value="<?php echo e($brand->id); ?>" <?php echo e((!empty(session()->get('products.brand')) && session()->get('products.brand') == $brand->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($brand->brand_name); ?></option>
		                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
		              <?php endif; ?>
	                </select>
	            </div>
	          </div>
	        </div>
          </div>

          <div class="col-sm-12 col-md-12">
          	<div class="row">
          	  <div class="col-sm-6 col-md-6">
		        <div class="form-group">
		           <div class="form-group">
                      <input type="text" name="price" placeholder="Enter price *" class="form-control" value="<?php echo e(session()->get('products.price')); ?>" required>
                   </div>
		        </div>
		      </div>
		      <div class="col-sm-6 col-md-6">
	            <div class="form-group">
	               <div class="form-group">
                      <input type="text" name="offerprice" placeholder="Enter offer price *" class="form-control" value="<?php echo e(session()->get('products.offerprice')); ?>" required>
                   </div>
	            </div>
	          </div>
	        </div>
          </div>

          <div class="col-sm-12 col-md-12">
          	<div class="row">
          	  <div class="col-sm-6 col-md-6">
		        <div class="form-group">
		            <select id="lifestage" name="lifestage" class="form-control">
		              <option value="" disabled selected hidden>Select Lifestage</option>
		              <?php $__currentLoopData = $lifestages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              <option value="<?php echo e($ls->id); ?>" <?php echo e((!empty(session()->get('products.lifestage')) && session()->get('products.lifestage') == $ls->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($ls->lifestage_category); ?> (<?php echo e($ls->lifestage_subcategory); ?>)</option>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            </select>
		        </div>
		      </div>
		      <div class="col-sm-6 col-md-6">
	            <div class="form-group">
	                <select id="health_consideration" name="health_consideration" class="form-control">
	                  <option value="" disabled selected hidden>Select Health Consideration</option>
	                  <?php $__currentLoopData = $health_considerations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                  <option value="<?php echo e($hc->id); ?>" <?php echo e((!empty(session()->get('products.health_consideration')) && session()->get('products.health_consideration') == $hc->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($hc->hc_type); ?></option>
	                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                </select>
	            </div>
	          </div>
	        </div>
          </div>

          <div class="col-sm-12 col-md-12">
          	<div class="row">
          	  <div class="col-sm-6 col-md-6">
		        <div class="form-group">
		            <select id="breed" name="breed" class="form-control">
		              <option value="" disabled selected hidden>Select Breed</option>
		              <?php $__currentLoopData = $breeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              <option value="<?php echo e($breed->id); ?>" <?php echo e((!empty(session()->get('products.breed')) && session()->get('products.breed') == $breed->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($breed->breed); ?></option>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            </select>
		        </div>
		      </div>
		      <div class="col-sm-6 col-md-6">
	            <div class="form-group">
	                <select id="composition" name="composition" class="form-control">
	                  <option value="" disabled selected hidden>Select Composition</option>
	                  <?php $__currentLoopData = $compositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $composition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              <option value="<?php echo e($composition->id); ?>" <?php echo e((!empty(session()->get('products.composition')) && session()->get('products.composition') == $composition->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($composition->composition); ?></option>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                </select>
	            </div>
	          </div>
	        </div>
          </div>

          <div class="col-sm-12 col-md-12">
          	<div class="row">
          	  <div class="col-sm-6 col-md-6">
		        <div class="form-group">
		            <select id="weight" name="weight" class="form-control">
		              <option value="" disabled selected hidden>Select Weight</option>
		              <?php $__currentLoopData = $weights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              <option value="<?php echo e($weight->weight); ?>" <?php echo e((!empty(session()->get('products.weight')) && session()->get('products.weight') == $weight->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($weight->weight); ?></option>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            </select>
		        </div>
		      </div>
		      <div class="col-sm-6 col-md-6">
	            <div class="form-group">
	                <select id="volume" name="volume" class="form-control">
	                  <option value="" disabled selected hidden>Select Volume</option>
	                  <?php $__currentLoopData = $volumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $volume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              <option value="<?php echo e($volume->id); ?>" <?php echo e((!empty(session()->get('products.volume')) && session()->get('products.volume') == $volume->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($volume->volume); ?></option>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                </select>
	            </div>
	          </div>
	        </div>
          </div>

          <div class="col-sm-12 col-md-12">
          	<div class="row">
          	  <div class="col-sm-6 col-md-6">
		        <div class="form-group">
		            <select id="tablet_quantity" name="tablet_quantity" class="form-control">
		              <option value="" disabled selected hidden>Select tablet quantity</option>
		              <?php $__currentLoopData = $quantities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              <option value="<?php echo e($quantity->id); ?>" <?php echo e((!empty(session()->get('products.tablet_quantity')) && session()->get('products.tablet_quantity') == $quantity->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($quantity->quantity); ?></option>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            </select>
		        </div>
		      </div>
		      <div class="col-sm-6 col-md-6">
	            <div class="form-group">
	                <select id="color" name="color" class="form-control">
	                  <option value="" disabled selected hidden>Select Color</option>
	                  <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              <option value="<?php echo e($color->id); ?>" <?php echo e((!empty(session()->get('products.color')) && session()->get('products.color') == $color->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($color->color); ?></option>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                </select>
	            </div>
	          </div>
	        </div>
          </div>

          <div class="col-sm-12 col-md-12">
          	<div class="row">
          	  <div class="col-sm-6 col-md-6">
		        <div class="form-group">
		            <select id="size" name="size" class="form-control">
		              <option value="" disabled selected hidden>Select Size</option>
		              <option value="S" <?php echo e((!empty(session()->get('products.size')) && session()->get('products.size') == 'S') ? "selected=\"selected\"" : ""); ?>>S</option>
		              <option value="M" <?php echo e((!empty(session()->get('products.size')) && session()->get('products.size') == 'M') ? "selected=\"selected\"" : ""); ?>>M</option>
		              <option value="L" <?php echo e((!empty(session()->get('products.size')) && session()->get('products.size') == 'L') ? "selected=\"selected\"" : ""); ?>>L</option>
		            </select>
		        </div>
		      </div>
		      <div class="col-sm-6 col-md-6">
	            <div class="form-group">
	                <input type="number" name="stock" placeholder="Enter number of stock *" class="form-control" value="<?php echo e(session()->get('products.stock')); ?>" required>
	            </div>
	          </div>
	        </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="row">
              <div class="col-sm-6 col-md-6">
            <div class="form-group">
                <select id="gst" name="gst" class="form-control" required>
                  <option value="" disabled selected hidden>Select GST percentage</option>
                  <option value="5" <?php echo e((!empty(session()->get('products.gst')) && session()->get('products.gst') == '5') ? "selected=\"selected\"" : ""); ?>>5%</option>
                  <option value="12" <?php echo e((!empty(session()->get('products.gst')) && session()->get('products.gst') == '12') ? "selected=\"selected\"" : ""); ?>>12%</option>
                  <option value="18" <?php echo e((!empty(session()->get('products.gst')) && session()->get('products.gst') == '18') ? "selected=\"selected\"" : ""); ?>>18%</option>
                  <option value="28" <?php echo e((!empty(session()->get('products.gst')) && session()->get('products.gst') == '28') ? "selected=\"selected\"" : ""); ?>>28%</option>
                </select>
            </div>
          </div>
          </div>
          </div>

          
            
          <div style="text-align: center;display: flex;justify-content: center;">
            <input type="submit" class="btn btn-success" value="Next">
          </div>
        </form>
       
  	</div>
    
    <?php if(session()->has('products')): ?>
    <a href="<?php echo e(route('add-new-product-step2')); ?>">
  	<div class="step2" style="border-bottom: 1px solid #ccc">
  		Step-2 (Description & Thumbnail)
  	</div>
  	</a>
  	<?php else: ?>
    <div class="step2" style="border-bottom: 1px solid #ccc">
  		Step-2 (Description & Thumbnail)
  	</div>
  	<?php endif; ?>

  	<?php if(session()->has('description') || session()->has('thumbnail')): ?>
    <a href="<?php echo e(route('add-new-product-step3')); ?>">
  	<div class="step2">
  		Step-3 (Preview)
  	</div>
    </a>
    <?php else: ?>
    <div class="step2">
      Step-3 (Preview)
    </div>
    <?php endif; ?>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
<script type="text/javascript">
  $('#pet').change(function(){
    var petID = $(this).val();    
    if(petID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(route('get-category-list' )); ?>?pet_id="+petID,
            success:function(res){  
            jQuery('select[name="category"]').empty();             
            if(res){
                $("#category").append('<option value="" disabled selected hidden>Select Category *</option>');
                $.each(res,function(key,value){
                    $("#category").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#category").empty();
            }
           }
        });
    }else{
        $("#category").empty();
    }      
   });

  $('#category').change(function(){
    var categoryID = $(this).val();    
    if(categoryID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(route('get-subcategory-list' )); ?>?category_id="+categoryID,
            success:function(res){  
            jQuery('select[name="subcategory"]').empty();             
            if(res){
                $("#subcategory").append('<option value="" disabled selected hidden>Select Subcategory *</option>');
                $.each(res,function(key,value){
                    $("#subcategory").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#subcategory").empty();
            }
           }
        });
    }else{
        $("#subcategory").empty();
    }      
   });

  $('#category').change(function(){
    var categoryID = $(this).val();    
    if(categoryID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(route('get-brand-list' )); ?>?category_id="+categoryID,
            success:function(res){  
            jQuery('select[name="brand"]').empty();             
            if(res){
                $("#brand").append('<option value="" disabled selected hidden>Select Brand *</option>');
                $.each(res,function(key,value){
                    $("#brand").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#brand").empty();
            }
           }
        });
    }else{
        $("#brand").empty();
    }      
   });

  
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/product/add-new-product-step1.blade.php ENDPATH**/ ?>