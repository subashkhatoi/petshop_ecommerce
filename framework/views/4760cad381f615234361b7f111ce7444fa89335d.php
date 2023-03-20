<?php $__env->startSection('title'); ?>
  Manage Pets
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <h3>Manage Pets</h3>        
  <table class="table table-bordered cstm-admin-tbl">
    <thead class="cstm-tbl-th">
      <tr>
        <th>Pet Type</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="cstm-tbl-td">
      <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($pet->pet_name); ?></td>
        <td>
        	<?php if($pet->status == 1): ?>
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
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/pets/manage-pets.blade.php ENDPATH**/ ?>