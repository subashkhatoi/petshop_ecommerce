<?php $__env->startSection('title'); ?>
  Manage Admins
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="table_title"><span style="font-size: 20px;">Manage Admin</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-admin">+ Add New</a></div></div>      
  <table class="table table-bordered cstm-admin-tbl">
    <thead class="cstm-tbl-th">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="cstm-tbl-td">
      <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($admin->name); ?></td>
        <td><?php echo e($admin->email); ?></td>
        <td><?php echo e($admin->mobile); ?></td>
        <td>
          <?php if($admin->status == 1): ?>
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
  <!-- paginate -->
</div>

<!-- Modal add new admin -->
<div id="add-admin" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-fabrics-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('add-new-admin')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <input type="text" name="name" placeholder="Enter name..." class="form-control" required>
          </div>
          <div class="form-group">
            <input type="text" name="email" placeholder="Enter Email..." class="form-control" required>
          </div>
          <div class="form-group">
            <input type="text" name="mobile" placeholder="Enter Mobile..." class="form-control" required>
          </div>
          <div class="form-group">
	        <input type="text" name="password" placeholder="Enter password..." class="form-control">
	      </div>
          <div class="form-group">
	        	<label><div style="color: black;margin-bottom: 8px">Is Super</div></label>
	          <div class="item">
		        <input type="radio" name="issuper" id="yes" value="1">
		        <label for="yes"><div class="size-position">Yes</div></label>
		      </div>
		      <div class="item">
		        <input type="radio" name="issuper" id="no" value="0" checked>
		        <label for="no"><div class="size-position">No</div></label>
		      </div>
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
<!-- End Modal add new admin-->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style type="text/css">
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
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/admins/manage-admin.blade.php ENDPATH**/ ?>