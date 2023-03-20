<?php $__env->startSection('title'); ?>
  Manage Brands
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="table_title"><span style="font-size: 20px;">Manage Brand</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-brand">+ Add New</a></div></div>      
  <table class="table table-bordered cstm-admin-tbl">
    <thead class="cstm-tbl-th">
      <tr>
        <th>Category</th>
        <th>Brand Name</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="cstm-tbl-td">
      <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e(app("App\Http\Controllers\BaseController")->getCategoryName($brand->category_id)); ?></td>
        <td><?php echo e($brand->brand_name); ?></td>
        <td>
        	<?php if($brand->status == 1): ?>
          <span style="color: green">Active</span>
          <?php else: ?>
          <span style="color: red">Inactive</span>
          <?php endif; ?>
        </td>
        <td></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <?php echo e($brands->links()); ?>

</div>

<!-- Modal add new brand -->
<div id="add-brand" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add a brand</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-fabrics-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('post-add-brand')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <select id="pet" name="pet" class="form-control" required>
              <option disabled selected hidden>--Select Pet Type--</option>
              <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($pet->id); ?>"><?php echo e($pet->pet_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
            <select id="category" name="category" class="form-control" required>
              <option disabled selected hidden>--Select Category--</option>
             
            </select>
          </div>
          <div class="form-group">
            <input type="text" name="brand" placeholder="Enter brand name..." class="form-control" required>
          </div>
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
<!-- End Modal add new brand-->
<?php $__env->stopSection(); ?>

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
                $("#category").append('<option value="1" disabled selected hidden>--Select Category--</option>');
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
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/misc/manage-brands.blade.php ENDPATH**/ ?>