<?php $__env->startSection('title'); ?>
  Manage Users
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="table_title" style="margin-bottom: 8px;"><span style="font-size: 20px;">Manage Users</span> </div>  

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="search-area">
    <form method="get" action="<?php echo e(route('manage-users')); ?>">
    <div class="row">
      <div class="col-md-2 col-sm-2 col-xs-2">
        <div class="form-group">
         <input type="date" name="start_date" class="form-control" value="<?php echo e(request()->get('start_date')); ?>">
        </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-2">
        <div class="form-group">
         <input type="date" name="end_date" class="form-control" value="<?php echo e(request()->get('end_date')); ?>">
        </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-2">
        <div class="form-group">
        <input type="text" name="search" placeholder="Search Order Id" class="form-control" value="<?php echo e(request()->get('search')); ?>">
        </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-2">
        <div class="form-group">
        <button id="findBtn" class="btn btn-info" style="padding-top: 8px;padding-bottom: 8px">Search</button>
        </div>
      </div>
  </div>
  </form>
 </div>
</div>

  <table class="table table-bordered cstm-admin-tbl">
    <thead class="cstm-tbl-th">
      <tr>
        <th>Name</th>
        <th>User Id</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Wallet</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="cstm-tbl-td">
      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php 
        $wallet_balance = \App\Wallet::where('user_id',$user->unique_user_id)->value('wallet_balance');
      ?>
      <tr>
        <td><?php echo e($user->name); ?> <?php echo e($user->lname); ?></td>
        <td><?php echo e($user->unique_user_id); ?></td>
        <td><?php echo e($user->email); ?></td>
        <td><?php echo e($user->mobile); ?></td>
        <td><?php echo e($wallet_balance); ?></td>
        <td>
          <?php if($user->status == 1): ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/users/manage-users.blade.php ENDPATH**/ ?>