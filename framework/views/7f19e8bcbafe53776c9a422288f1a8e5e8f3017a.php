<?php $__env->startSection('title'); ?>
  Category
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <h3>Manage Category</h3>        
  <table class="table table-bordered cstm-admin-tbl">
    <thead class="cstm-tbl-th">
      <tr>
        <th>Pet Type</th>
        <th>Category Name</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="cstm-tbl-td">
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e(app("App\Http\Controllers\BaseController")->getPetName($category->pet_id)); ?></td>
        <td><?php echo e($category->name); ?></td>
        <td>
        	<?php if($category->status == 1): ?>
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
  <?php echo e($categories->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/pets/manage-categories.blade.php ENDPATH**/ ?>