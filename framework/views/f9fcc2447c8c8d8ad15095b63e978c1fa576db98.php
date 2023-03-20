<?php $__env->startSection('title'); ?>
  Manage Lifestage
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="table_title"><span style="font-size: 20px;">Manage Lifestages</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-lifestage">+ Add New</a></div></div>      
  <table class="table table-bordered cstm-admin-tbl">
    <thead class="cstm-tbl-th">
      <tr>
        <th>Lifestage Category</th>
        <th>Lifestage Subcategory</th>
      </tr>
    </thead>
    <tbody class="cstm-tbl-td">
      <?php $__currentLoopData = $lifestages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lifestage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($lifestage->lifestage_category); ?></td>
        <td><?php echo e($lifestage->lifestage_subcategory); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>

<!-- Modal add new lifestage -->
<div id="add-lifestage" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-fabrics-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('post-add-lifestage')); ?>">
          <?php echo csrf_field(); ?>
          
          <div class="form-group">
            <select name="lifestage_category" class="form-control" required>
              <option disabled selected hidden>--Select Lifestage Category--</option>
              <option>Starter</option>
              <option>Puppy</option>
              <option>Adult</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name="lifestage_subcategory" placeholder="Enter lifestage subcategory..." class="form-control" required>
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
<!-- End Modal add new lifestage-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/misc/manage-lifestages.blade.php ENDPATH**/ ?>