<?php $__env->startSection('title'); ?>
  Manage Orders
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <h3>Manage Orders</h3>  

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="search-area">
    <form method="get" action="<?php echo e(route('manage-orders')); ?>">
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
          <select class="form-control" name="status" id="updateStatus">
            <option hidden value="">Status</option>
            <option value="Placed" <?php echo e((!empty(request()->get('status')) && request()->get('status') == 'Placed') ? "selected=\"selected\"" : ""); ?>>Placed</option>
            <option value="Confirmed" <?php echo e((!empty(request()->get('status')) && request()->get('status') == 'Confirmed') ? "selected=\"selected\"" : ""); ?>>Confirmed</option>
            <option value="Shipped" <?php echo e((!empty(request()->get('status')) && request()->get('status') == 'Shipped') ? "selected=\"selected\"" : ""); ?>>Shipped</option>
            <option value="Delivered" <?php echo e((!empty(request()->get('status')) && request()->get('status') == 'Delivered') ? "selected=\"selected\"" : ""); ?>>Delivered</option>
            <option value="Cancelled" <?php echo e((!empty(request()->get('status')) && request()->get('status') == 'Cancelled') ? "selected=\"selected\"" : ""); ?>>Cancelled</option>
          </select>
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

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="rslt-count">
    <?php echo e($orders_count); ?> results found
    </div>
</div>

  <table class="table table-bordered cstm-admin-tbl">
    <thead class="cstm-tbl-th">
      <tr>
        <th width="15%">Order Placed on</th>
        <th width="20%">Delivery Details</th>
        <th width="15%">Order Id</th>
        <th width="10%">Order By</th>
        <th width="15%">Amount</th>
        <th width="15%">Payment Type</th>
        <th width="10%">Status</th>
      </tr>
    </thead>
    <tbody class="cstm-tbl-td">
      <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php 
        $delivery_address = app('App\Http\Controllers\BaseController')->getDeliveryAddress($order->delivery_address);
        $user_id = app('App\Http\Controllers\BaseController')->getUserId($order->user_id);
        $order_placed_date = date("F j, Y", strtotime($order->created_at));
        $order_placed_time = date("g:i A", strtotime($order->created_at));
        if($delivery_address->locality != ""){
          $locality = ',' .$delivery_address->locality;
        }else{
          $locality = '';
        }
        if($delivery_address->landmark != ""){
          $landmark = ',' .$delivery_address->landmark;
        }else{
          $landmark = '';
        }
        if($order->order_status == "Placed"){
          $status_color = "#000";
        }elseif($order->order_status == "Cancelled"){
          $status_color = "red";
        }
        elseif($order->order_status == "Confirmed"){
          $status_color = "#0000ff";
        }elseif($order->order_status == "Shipped"){
          $status_color = "#ffcc00";
        }else{
          $status_color = "green";
        }
      ?>
      <tr>
        <td>
          <div><?php echo e($order_placed_date); ?></div>
          <div><?php echo e($order_placed_time); ?></div>
        </td>
        <td>
           <div><?php echo e($delivery_address->name); ?></div>
           <div><?php echo e($delivery_address->mobile); ?></div>
           <div id="moreText">
             <div><?php echo e($delivery_address->address); ?> <?php echo e($locality); ?> <?php echo e($landmark); ?></div>
             <div><?php echo e($delivery_address->city); ?></div>
             <div><?php echo e($delivery_address->state); ?>, <?php echo e($delivery_address->pincode); ?></div>
           </div>
           
        </td>
        <td><a href="<?php echo e(route('admin-order-details',$order->id)); ?>" target="_blank"><?php echo e($order->unique_order_id); ?></a></td>
        <td><a href="<?php echo e(route('user-info',$user_id)); ?>" target="_blank"><?php echo e($user_id); ?></a></td>
        <td>
          <div> Rs. <?php echo e($order->payable_amount); ?></div>
            <div><a href="" style="font-size:12px;text-decoration:underline" data-toggle="modal" id="paymentDetails" data-target="#practice_modal" data-id='<?php echo e($order->id); ?>'>Payment details</a></div>
        </td>
        <td>
        	<?php echo e($order->payment_method); ?>

        </td>
        <td>
          <span style="color: <?php echo e($status_color); ?>"><?php echo e($order->order_status); ?></span>
          <?php if($order->order_status == "Shipped"): ?>
            <div style="font-size: 11px;margin-top: -5px;">Exp. delivery date <b><?php echo e(date('d-m-Y',strtotime($order->expected_delivery_date))); ?></b></div>
          <?php elseif($order->order_status == "Delivered"): ?>
            <div style="font-size: 11px;margin-top: -5px;">Delivered on <b><?php echo e(date('d-m-Y',strtotime($order->expected_delivery_date))); ?></b></div>
          <?php endif; ?>
          <?php if($order->order_status == "Shipped" || $order->order_status == "Placed" || $order->order_status == "Confirmed"): ?>
          <form action="/admin/update-order-status" method="post">
           <?php echo csrf_field(); ?>
            <select name="update_status" id="updateStatus">
              <option selected hidden disabled>Update status</option>
              <option>Confirmed</option>
              <option>Shipped</option>
              <option>Delivered</option>
              <option>Cancelled</option>
            </select>
            <input id="exp_delivery_date" type="date" name="exp_delivery_date" style="width:60%;">
            <input type="hidden" name="orderid" value="<?php echo e($order->id); ?>">
            <div><input type="submit" value="Update"></div>
           </form>
           <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <?php echo e($orders->links()); ?>

</div>

<div class="modal fade" id="practice_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
        <div class="paymentdetails-main">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td width="50%">Total MRP</td>
                <td width="50%"><div id="total_mrp"></div></td>
              </tr>
              <tr>
                <td width="50%">Discount Amount</td>
                <td width="50%"><div id="discount_price" style="color:green"></div></td>
              </tr>
              <tr>
                <td width="50%">Shipping Charge</td>
                <td width="50%"><div id="shipping_charges" style="color:red"></div></td>
              </tr>
             
              <tr>
                <td width="50%">Cod Charge</td>
                <td width="50%"><div id="cod_charge" style="color:red"></div></td>
              </tr>
              <tr>
                <td width="50%">Wallet Deduct</td>
                <td width="50%"><div id="wallet_deduct" style="color:green"></div></td>
              </tr>
             
              <tr>
                <td width="50%"><b>Total Payable Amount</b></td>
                <td width="50%"><div id="payable_amount"></div></td>
               </tr>
            </tbody>
          </table>
        </div>
        <div class="pd-txn">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td width="40%">Payment Mode</td>
                <td width="60%"><div id="payment_mode"></div></td>
              </tr>
              
              <tr>
                <td width="40%">Txn Id</td>
                <td width="60%"><div id="txn_id"></div></td>
              </tr>
             
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
 <script>
        // function toggleText() {
        //     var points = 
        //         document.getElementById("points");
        //     var showMoreText =
        //         document.getElementById("moreText");
        //     var buttonText =
        //         document.getElementById("textButton");
        //     if (points.style.display === "none") {
        //         showMoreText.style.display = "none";
        //         points.style.display = "inline";
        //         buttonText.innerHTML = "Show More";
        //     }
        //     else {
        //         showMoreText.style.display = "inline";
        //         points.style.display = "none";
        //         buttonText.innerHTML = "Show Less";
        //     }
        // }

        $('body').on('click', '#paymentDetails', function (event) {

          event.preventDefault();
          var id = $(this).data('id');
          $.get('payment-details/' + id , function (data) {
               $('#total_mrp').html('Rs.' + data.total_price);
               $('#discount_price').html('- Rs.' + data.discount_price);;
               $('#shipping_charges').html('+ Rs.' + data.shipping_charges);
               $('#cod_charge').html('+ Rs.' + data.cod_charge);
               $('#wallet_deduct').html('- Rs.' + data.wallet_deduction);
               $('#payable_amount').html('<b>Rs.' + data.payable_amount + '</b>');
               $('#payment_mode').html(data.payment_method);
               $('#txn_id').html(data.txn_id);
           })
      });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/order/manage-orders.blade.php ENDPATH**/ ?>