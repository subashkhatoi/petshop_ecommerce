<?php $__env->startSection('title'); ?>
 Verify Mobile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php
   $data = session()->get('user');
   $otp = session()->get('otp');
  ?>


<div class="container" style="margin-top: 10px">
  <div id="wrapper">
  <div id="mobile-verify">
    <div class="mobile-verify-title">Enter the verification code sent via SMS:</div>
    <div id="form">
      <form action="<?php echo e(route('verify-user-otp')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="number" name="n1" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
        <input type="number" name="n2" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
        <input type="number" name="n3" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
        <input type="number" name="n4" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
        <input type="submit" class="btn cstm-btn-verify" value="Verify">
      </form>
    </div><br>
    <div class="mobile-verify-resend-otp">
      Didn't receive the code?
      <a href="<?php echo e(route('user-resend-otp')); ?>">Send code again</a><br />
    </div>
    <div>
        <a class="btn cstm-btn-go-back" href="<?php echo e(route('register')); ?>">Go back</a>
    </div>
  </div>
</div>
<?php echo e($otp); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
 <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style type="text/css">
    #wrapper {
    /*font-family: Lato;*/
    font-size: 18px;
    text-align: center;
    box-sizing: border-box;
    color: #333;
    /*margin-top: 120px;*/
}
#mobile-verify {
    margin: 10px auto;
    padding: 20px 30px;
    display: inline-block;
    box-shadow: 0px 0px 3px 0px #ccc;
    background-color: #fff;
    overflow: hidden;
    position: relative;
    max-width: 450px;
    }
    .mobile-verify-title{
        font-size: 19px;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .mobile-verify-resend-otp{
        font-size: 15px;
    }
    .cstm-btn-verify{
      background-color: #00004d;
      color: #fff;
      border-color: #00004d;
      margin-top: -3px;
     padding: 5px 11px 5px 11px;
    }
    .cstm-btn-go-back{
      background-color: #00004d;
      color: #fff;
      border-color: #00004d;
      margin-top: -3px;
     padding: 5px 11px 5px 11px;
     margin-top: 10px;
    }
    .cstm-btn-go-back:hover{
      background-color: #00004d;
      color: #fff;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
  <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/jquery/jquery-3.3.1.min.js')); ?>"></script>
<script>
  $(function() {
  'use strict';

  var body = $('body');

  function goToNextInput(e) {
    var key = e.which,
      t = $(e.target),
      sib = t.next('input');

    if (key != 9 && (key < 48 || key > 57)) {
      e.preventDefault();
      return false;
    }

    if (key === 9) {
      return true;
    }

    if (!sib || !sib.length) {
      sib = body.find('input').eq(0);
    }
    sib.select().focus();
  }

  function onKeyDown(e) {
    var key = e.which;

    if (key === 9 || (key >= 48 && key <= 57)) {
      return true;
    }

    e.preventDefault();
    return false;
  }
  
  function onFocus(e) {
    $(e.target).select();
  }

  body.on('keyup', 'input', goToNextInput);
  body.on('keydown', 'input', onKeyDown);
  body.on('click', 'input', onFocus);

})
</script>
<?php $__env->stopPush(); ?>
       

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/otp/user/verify-mobile.blade.php ENDPATH**/ ?>