<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Vehicles Bazar | <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap/bootstrap.min.css')); ?>">
    <link href="<?php echo e(asset('css/fonts/circular-std/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/fonts/fontawesome/css/fontawesome-all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/charts/chartist-bundle/chartist.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/charts/morris-bundle/morris.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/fonts/material-design-iconic-font/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/charts/c3charts/c3.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/fonts/flag-icon-css/flag-icon.min.css')); ?>">
    
</head>
<body>
    <div class="dashboard-main-wrapper">
        <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="dashboard-wrapper">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
 
     <!-- jquery 3.3.1 -->
    <script src="<?php echo e(asset('js/jquery/jquery-3.3.1.min.js')); ?>"></script>
    <!-- bootstap bundle js -->
    <script src="<?php echo e(asset('js/bootstrap/bootstrap.bundle.js')); ?>"></script>
    <!-- slimscroll js -->
    <script src="<?php echo e(asset('js/slimscroll/jquery.slimscroll.js')); ?>"></script>
    <!-- main js -->
    <script src="<?php echo e(asset('js/admin/main-js.js')); ?>"></script>
    <!-- chart chartist js -->
    <script src="<?php echo e(asset('js/charts/chartist-bundle/chartist.min.js')); ?>"></script>
    <!-- sparkline js -->
    <script src="<?php echo e(asset('js/charts/sparkline/jquery.sparkline.js')); ?>"></script>
    <!-- morris js -->
    <script src="<?php echo e(asset('js/charts/morris-bundle/raphael.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/charts/morris-bundle/morris.js')); ?>"></script>
    <!-- chart c3 js -->
    <script src="<?php echo e(asset('js/charts/c3charts/c3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/charts/c3charts/d3-5.4.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/charts/c3charts/C3chartjs.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin/dashboard.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\vehiclesbazar\resources\views/admin/layouts/dashboard-master.blade.php ENDPATH**/ ?>