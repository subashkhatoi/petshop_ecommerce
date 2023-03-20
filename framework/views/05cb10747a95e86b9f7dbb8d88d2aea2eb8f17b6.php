<?php $__env->startSection('title'); ?>
  Stocks Management
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container" style="width: 70%">  
  <div class="add-stock-main">
  	<form action="<?php echo e(route('post-add-stock')); ?>" method="post">
  	 <?php echo csrf_field(); ?>
  	  <div class="asm_form">
  	  	<div class="asm_form_title">Add Stock :</div>
  	  	<span style="font-weight: bold;font-size: 14px;">Quantity</span>
  		<div class="form-group">
            <input type="number" name="quantity" placeholder="Enter quantity" class="form-control" required>
        </div>
        <span style="font-weight: bold;font-size: 14px;">Expiry Date</span>
        <div class="form-group">
            <input type="date" name="expiry" class="form-control" required>
        </div>
        <input type="hidden" name="pid" value="<?php echo e($id); ?>">
        <div class="form-group">
            <input type="submit" class="btn btn-info" value="Submit">
        </div>
      </div>
  	</form>
  </div>   
  <table class="table table-bordered cstm-admin-tbl">
    <thead class="cstm-tbl-th">
      <tr>
        <th>Stock</th>
        <th>Expiry Date</th>
      </tr>
    </thead>
    <tbody style="background-color: #fff;font-size: 14px">
     <?php if($stocks_count > 0): ?>
     <?php $stocks = DB::table('stock_managements')->orderBy('id','desc')->where('product_id',$id)->get(); ?>
      <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
         $today = time();
		 $expiry_date = strtotime($stock->expiry_date);
		 $datediff =  $expiry_date - $today;
		 $date_diff = round($datediff / (60 * 60 * 24));
       ?>
      <tr>
    	<td>
    		<span style="font-weight: bold;font-size: 16px"><?php echo e($stock->quantity); ?></span><br>
    		<div>
    	      <form action="<?php echo e(route('admin-update-expiry-stock')); ?>" method="post">
    	      	<?php echo csrf_field(); ?>
	    		 <select name="deduct_stock" style="width: 18%">
	    		 	<option value="1">-1</option>
	    		 	<option value="2">-2</option>
	    		 	<option value="3">-3</option>
	    		 	<option value="4">-4</option>
	    		 	<option value="5">-5</option>
	    		 </select>
	    		 <input type="hidden" name="sid" value="<?php echo e($stock->id); ?>">
	    		 <input type="submit" class="btn stock-cstm-btn" value="Update">
    		  </form>
    		</div>
    	</td>
    	<td><?php echo e(date('d-m-Y',strtotime($stock->expiry_date))); ?>  <?php if($date_diff > 0): ?> <span style="font-weight: bold;">( <?php echo e($date_diff); ?> Days Left )</span> <?php elseif($date_diff == 0): ?> <span style="font-weight: bold;color: #ffad33">( Expire Today ) </span> <?php else: ?> <span style="font-weight: bold;color: #ff5c33">( Expired )</span>  <?php endif; ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <?php endif; ?>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
	.stock-cstm-btn{
	height: 0px;
    width: 1px;
    font-size: 13px;
    padding: 6px 57px 22px 9px;
	}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/product/manage-product-stock.blade.php ENDPATH**/ ?>