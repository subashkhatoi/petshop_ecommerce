<?php $__env->startSection('title'); ?>
  Manage Products
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php 
  $categories = \App\Category::all();
  $subcategories = \App\Subcategory::all();
  $brands = \App\Brand::all();
?>
<div class="container">
  <div class="table_title"><span style="font-size: 20px;">Manage Products</span></div>  

<div class="col-md-12 col-sm-12 col-xs-12">
 <div class="search-area">
  <form action="<?php echo e(route('manage-products')); ?>" method="get">
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-2">
         <div class="form-group">
          <input type="date" name="start_date" class="form-control">
         </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2">
         <div class="form-group">
          <input type="date" name="end_date" class="form-control">
         </div>
        </div>

        <div class="col-md-2 col-sm-2 col-xs-2">
        <div class="form-group">
            <select id="pet" name="pet" class="form-control" required>
              <option value="" disabled selected hidden>Pet Type</option>
              <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($pet->id); ?>" <?php echo e((!empty(session()->get('products.pet')) && session()->get('products.pet') == $pet->id) ? "selected=\"selected\"" : ""); ?>><?php echo e($pet->pet_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
         </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-2">
        <div class="form-group">
          <select id="category" name="category" class="form-control" required>
            <option value="" disabled selected hidden>Category</option>
            
          </select>
         </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-2">
        <div class="form-group">
          <select id="subcategory" name="subcategory" class="form-control" required>
            <option value="" disabled selected hidden>Subcategory</option>
             
          </select>
         </div>
      </div>
    
        <div class="col-md-2 col-sm-2 col-xs-2">
        <div class="form-group">
        <button type="submit" class="btn btn-info">Search</button>
      </div>
        </div>
    </div>
  </form>
 </div>
</div>

  <table class="table table-bordered cstm-admin-tbl">
    <thead class="cstm-tbl-th">
      <tr>
      	<th width="18%">Product Name</th>
      	<th width="12%">Product Code</th>
        <th>Pet Type</th>
        <th>Category</th>
        <th>Subategory</th>
        <th>Brand</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="cstm-tbl-td" style="font-size: 14px;">
      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
      	<td><?php echo e($product->title); ?></td>
      	<td>
      		<a href="#" target="_blank"> <?php echo e($product->unique_product_id); ?></a><br>
            <a href="<?php echo e(route('admin-manage-product-stock',$product->id)); ?>" target="_blank" class="manage-stocks">Manage Stocks</a>
      	</td>
        <td><?php echo e(app("App\Http\Controllers\BaseController")->getPetName($product->pet_type)); ?></td>
        <td><?php echo e(app("App\Http\Controllers\BaseController")->getCategoryName($product->category)); ?></td>
        <td><?php echo e(app("App\Http\Controllers\BaseController")->getSubcategoryName($product->subcategory)); ?></td>
        <td><?php echo e(app("App\Http\Controllers\BaseController")->getBrandName($product->brand)); ?></td>
        <td>
          <?php if($product->status == 1): ?>
          <span style="color: green;font-weight: bold;">Active</span>
          <?php else: ?>
          <span style="color: red;font-weight: bold;">Inactive</span>
          <?php endif; ?>
          <br>
          <?php if($product->stock > 0): ?>
          <span class="in-stock">In Stock (<?php echo e($product->stock); ?>)</span>
          <?php else: ?>
          <span class="out-of-stock">Out of Stock</span>
          <?php endif; ?>
        </td>
        <td>
          <?php if($product->status == 1): ?>
            <button class="btn-danger openModal" style="font-size: 11px;" data-target="#inactiveStatus" data-id="<?php echo e($product->id); ?>" data-toggle="modal"><i class="fa fa-times btn-color" aria-hidden="true"></i></button>
          <?php else: ?>
            <button class="btn-success openModal" style="font-size: 11px;" data-target="#activeStatus" data-id="<?php echo e($product->id); ?>" data-toggle="modal"><i class="fa fa-check btn-color" aria-hidden="true"></i></button>
          <?php endif; ?>
           <a href="<?php echo e(route('admin-edit-product',$product->id)); ?>" target="_blank"><button class="btn-info" style="font-size: 11px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <?php echo e($products->links()); ?>

</div>

<!-- Modal inactive status -->
<div id="inactiveStatus" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center;width: 100%">Are you sure?</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Do you really want to inactive status ?</p>
      </div>
      <form method="post" action="<?php echo e(route('admin-inactive-product-status')); ?>">
        <?php echo csrf_field(); ?>
        <input type='hidden' name='id' class='modal_hidden_id' value='1'>
      <div class="modal-footer" style="text-align: center;display: flex;justify-content: center;">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Inactive</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- End Modal inactive status -->
<!-- Modal active Status -->
<div id="activeStatus" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center;width: 100%">Are you sure?</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Do you really want to active status ?</p>
      </div>
      <form method="post" action="<?php echo e(route('admin-active-product-status')); ?>">
        <?php echo csrf_field(); ?>
        <input type='hidden' name='id' class='modal_hidden_id' value='1'>
      <div class="modal-footer" style="text-align: center;display: flex;justify-content: center;">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Active</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- End Modal active status-->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
<script>
  $(document).on('click','.openModal',function(){
    var id = $(this).data('id');
    $('.modal_hidden_id').val(id);
  });

  $('#pet').change(function(){
    var petID = $(this).val();    
    if(petID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(route('get-category-list' )); ?>?pet_id="+petID,
            success:function(res){  
            jQuery('select[name="category"]').empty();             
            if(res){
                $("#category").append('<option value="" disabled selected hidden>Category</option>');
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
                $("#subcategory").append('<option value="" disabled selected hidden>Subcategory</option>');
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
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/product/manage-products.blade.php ENDPATH**/ ?>