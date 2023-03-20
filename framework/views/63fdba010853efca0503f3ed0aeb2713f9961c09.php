<?php $__env->startSection('title'); ?>
  Tables
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="all-tbls">
    <div class="table_title"><span style="font-size: 20px;">Manage Health Considerations</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-hc">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>HC Type</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        <?php $__currentLoopData = $health_considerations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($hc->hc_type); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
  <div class="all-tbls">
    <div class="table_title"><span style="font-size: 20px;">Manage Breeds</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-breed">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>All Breeds</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        <?php $__currentLoopData = $breeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($breed->breed); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>
 <div class="row">
    <div class="all-tbls" style="margin-top: 20px">
    <div class="table_title"><span style="font-size: 20px;">Weights</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-weights">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>Weights</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        <?php $__currentLoopData = $weights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($weight->weight); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
  <div class="all-tbls" style="margin-top: 20px">
    <div class="table_title"><span style="font-size: 20px;">Volumes</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-volumes">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>Volumes</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        <?php $__currentLoopData = $volumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $volume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($volume->volume); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>
<div class="row">
    <div class="all-tbls" style="margin-top: 20px">
    <div class="table_title"><span style="font-size: 20px;">Tablet Quantity</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-quantity">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        <?php $__currentLoopData = $quantites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($quantity->quantity); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
  <div class="all-tbls" style="margin-top: 20px">
    <div class="table_title"><span style="font-size: 20px;">Composition</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-composition">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>Composition</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        <?php $__currentLoopData = $compositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $composition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($composition->composition); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>
<div class="row">
    <div class="all-tbls" style="margin-top: 20px">
    <div class="table_title"><span style="font-size: 20px;">Color</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-color">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>Color</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($color->color); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>
</div>

<!-- Modal health consideration -->
<div id="add-hc" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Health Consideration</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('post-add-hc')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <input type="text" name="hc" placeholder="Enter health consideration..." class="form-control" required>
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
<!-- End Modal health consideration-->
<!-- Modal breed -->
<div id="add-breed" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add New Breed</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('post-add-breed')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <input type="text" name="breed" placeholder="Enter breed..." class="form-control" required>
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
<!-- End Modal breed-->
<!-- Modal weights -->
<div id="add-weights" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Weight</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('post-add-weight')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <input type="text" name="weight" placeholder="Enter weight..." class="form-control" required>
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
<!-- End Modal weights-->
<!-- Modal volumes -->
<div id="add-volumes" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Volume</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('post-add-volume')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <input type="text" name="volume" placeholder="Enter volume..." class="form-control" required>
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
<!-- End Modal volumes-->
<!-- Modal quantity -->
<div id="add-quantity" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Tablet Quantity</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('post-add-quantity')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <input type="text" name="quantity" placeholder="Enter quantity..." class="form-control" required>
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
<!-- End Modal quantity-->
<!-- Modal composition -->
<div id="add-composition" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Composition</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('post-add-composition')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <input type="text" name="composition" placeholder="Enter composition..." class="form-control" required>
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
<!-- End Modal composition-->
<!-- Modal color -->
<div id="add-color" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Color</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?php echo e(route('post-add-color')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <input type="text" name="color" placeholder="Enter color..." class="form-control" required>
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
<!-- End Modal color-->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style type="text/css">
  .all-tbls{
    width: 45%;
    margin-left: auto;
    margin-right: auto;
  }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/misc/all-tables.blade.php ENDPATH**/ ?>