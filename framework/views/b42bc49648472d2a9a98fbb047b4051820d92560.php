<?php $__env->startSection('title'); ?>
  User Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="ui-details">
	<div class="uid-title">
		User Details
	</div>
	<div>
	 <table class="table">
		<tbody>
	      <tr>
	        <td width="30%">Id</td>
	        <td>: <?php echo e($user->unique_user_id); ?></td>
	      </tr>
	      <tr>
	        <td>Name</td>
	        <td>: <?php echo e($user->name); ?> <?php echo e($user->lname); ?></td>
	      </tr>
	      <tr>
	        <td>Mobile</td>
	        <td>: <?php echo e($user->mobile); ?></td>
	      </tr>
	      <tr>
	        <td>Email</td>
	        <td>: <?php echo e($user->email); ?></td>
	      </tr>
	    </tbody>
     </table>
	</div>
  </div>

    <div class="order-details">
	<div class="uid-title">
		Order Details
	</div>
	<div>
	 <table class="table">
	 	<thead>
 		  <tr>
 			<th><b>Order Id</b></th>
 			<th><b>Created at</b></th>
 			<th><b>Status</b></th>
 		  </tr>
	 	</thead>
		<tbody>
		  <?php $orders = \App\Order::orderBy('id','desc')->where('user_id',$user->id)->get(); ?>
		  <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	      <tr>
	        <td><?php echo e($order->unique_order_id); ?></td>
	        <td><?php echo e(date('d-m-Y h:i A',strtotime($order->created_at))); ?></td>
	        <td>
	        	<?php if($order->order_status == "Delivered"): ?>
                  <span style="color: green"><?php echo e($order->order_status); ?></span>
	        	<?php elseif($order->order_status == "Rejected"): ?>
                  <span style="color: red"><?php echo e($order->order_status); ?></span>
                <?php else: ?>
                  <span><?php echo e($order->order_status); ?></span>
	        	<?php endif; ?>
	        </td>
	      </tr>
	      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </tbody>
     </table>
	</div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/users/user-info.blade.php ENDPATH**/ ?>