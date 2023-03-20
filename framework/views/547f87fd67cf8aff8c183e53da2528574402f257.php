<?php $__env->startSection('title'); ?>
  Order Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="wallet-main">
	<?php if($wallet_count > 0): ?>
	<?php $wallet = \App\Wallet::where('user_id',Auth::user()->unique_user_id)->first(); ?>
	 <div class="wm-balance">
		<div class="wmb-title">Balance</div>
		<div><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e($wallet->wallet_balance); ?></div>
	 </div>
	 <div class="wm-pending-balance">
		<div class="wmb-title">Pending Balance</div>
		<div><i class="fa fa-inr" aria-hidden="true"></i><?php if($wallet->pending_wallet_balance != ""): ?> <?php echo e($wallet->pending_wallet_balance); ?> <?php else: ?> 0 <?php endif; ?></div>
	 </div>
	<?php else: ?>
     <div class="wm-balance">
		<div class="wmb-title">Balance</div>
		<div><i class="fa fa-inr" aria-hidden="true"></i>0</div>
	 </div>
	 <div class="wm-pending-balance">
		<div class="wmb-title">Pending Balance</div>
		<div><i class="fa fa-inr" aria-hidden="true"></i>0</div>
	 </div>
	<?php endif; ?>
</div>
<div class="wallet-main wallet-history-main">
	<?php 
       $history_count = \App\WalletFollowup::where('user_id',Auth::user()->unique_user_id)->count();
	?>
  <div class="col-md-12 col-sm-12">
  	<div class="wm-history">Transaction History</div>
	<div class="row">
	  <?php if($history_count): ?>
	  <?php 
	    $histories = \App\WalletFollowup::where('user_id',Auth::user()->unique_user_id)->get(); 
	    $pending_wallets = \App\WalletFollowup::where('user_id',Auth::user()->unique_user_id)->where('add_deduct_type','add')->where('order_id','!=','')->where('coin','!=','')->where('wallet_added_status',NULL)->get(); 
	  ?>
		<div class="col-md-6 col-sm-12">
		  <?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  <div class="wmh-main">
		    <div class="weh-date"><?php echo e(date('d-m-Y h:i A', strtotime($history->created_at))); ?></div>
            <div class="weh-desc">
            	<?php echo e($history->description); ?> <?php if($history->add_deduct_type == "add" && $history->order_id == ""): ?> for refer <?php echo e($history->refer_to); ?> <?php elseif($history->add_deduct_type == "deduct" && $history->order_id != ""): ?> <?php echo e(app('App\Http\Controllers\BaseController')->getOrder($history->order_id)); ?> <?php elseif($history->add_deduct_type == "add" && $history->order_id != ""): ?> for your order <?php echo e(app('App\Http\Controllers\BaseController')->getOrder($history->order_id)); ?>  <?php endif; ?>
            </div>
          </div>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

		<div class="col-md-6 col-sm-12">
		  <?php $__currentLoopData = $pending_wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		   <?php
		    $today = date('d-m-Y h:i A');
		    $date = date('d-m-Y h:i A', strtotime('+7 day', strtotime($pw->created_at)));
		   ?>
            <div class="weh-desc">
            	<?php if($today < $date): ?>
                  <div>Move <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($pw->coin); ?> to main balance <span><a class="btn weh-m-btn disabled">Add</a></span></div>
                  <div class="cmm-msg">Can move to main wallet balance after <?php echo e($date); ?> . </div>
                <?php else: ?>
                  <div>Move <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($pw->coin); ?> to main balance <span><a class="btn weh-m-btn" href="<?php echo e(route('move-to-wallet',$pw->id)); ?>">Add</a></span></div>
            	<?php endif; ?>
            </div>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	  <?php else: ?>

	  <?php endif; ?>	
	</div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
	.wallet-main{
		display: flex;
		background-color: #fff;
	    padding: 4px;
	    box-shadow: 0px 0px 3px 0px #ccc;
	}
	.wm-balance{
		width: 50%;
	}
	.wm-pending-balance{
		width: 50%;
	}
	.wmb-title{
		font-size: 17px;
		font-weight: 600;
		color: #666666;
	}
	.wallet-history-main
	{
		margin-top: 8px;
	}
	.wm-history{
		font-size: 19px;
        margin-bottom: 6px;
        color: #666666;
        font-weight: 600;
	}
	.weh-date{
		font-size: 10px;
		margin-bottom: -3px;
	}
	.weh-desc{
		margin-bottom: 6px;
	}
	.wmh-main{
		border: 1px solid #ccc;
        padding: 4px 0px 0px 4px;
        margin-bottom: 4px;
	}
	.weh-m-btn{
        border: 1px solid #0da9ef;
	    padding: 0px 5px 2px 5px;
	    border-radius: 4px;
	    font-size: 14px;
	    margin-left: 25px;
	    color: #fff;
	    background-color:#0da9ef;
	    cursor: no-drop;
	}
	.cmm-msg{
		font-size: 10px;
		margin-bottom: 8px;
	}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/wallet/wallet.blade.php ENDPATH**/ ?>