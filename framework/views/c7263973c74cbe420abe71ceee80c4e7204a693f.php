<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo e(asset('storage/images/logo/logo.png')); ?>">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title>MawAndBaw | <?php echo $__env->yieldContent('title'); ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(asset('lib/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('lib/icofont/icofont.min.css')); ?>" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/toastr/toastr.min.css')); ?>">

  <!-- Template Main CSS File -->
  <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/responsive.css')); ?>" rel="stylesheet">
  <style>
    .py-4{
      margin-top: 70px !important;
    }
  </style>
  <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body>

  <!-- ======= Top Bar ======= -->


  <!-- ======= Header ======= -->
  <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- End Header -->

  <main class="py-4">
    <?php echo $__env->yieldContent('content'); ?>
  </main>
  
  <!-- ======= Footer ======= -->
  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- End Footer -->


  <!-- Vendor JS Files -->
  <script src="https://kit.fontawesome.com/3072e5cc16.js" crossorigin="anonymous"></script>
  <script src="<?php echo e(asset('lib/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- Template Main JS File -->
  <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
  <script src="<?php echo e(asset('js/main.js')); ?>"></script>
  <script src="<?php echo e(asset('js/toastr/toastr.min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('js'); ?>

    <script>
  <?php if(Session::has('message')): ?>
  toastr.options =
  {
    "closeButton" : true
  }
        toastr.success("<?php echo e(session('message')); ?>");
  <?php endif; ?>

  <?php if(Session::has('error')): ?>
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.error("<?php echo e(session('error')); ?>");
  <?php endif; ?>

  <?php if(Session::has('info')): ?>
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.info("<?php echo e(session('info')); ?>");
  <?php endif; ?>

  <?php if(Session::has('warning')): ?>
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.warning("<?php echo e(session('warning')); ?>");
  <?php endif; ?>
</script>
</body>

</html><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/layouts/app.blade.php ENDPATH**/ ?>