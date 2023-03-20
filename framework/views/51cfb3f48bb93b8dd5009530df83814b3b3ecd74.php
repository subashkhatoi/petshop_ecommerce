<?php
  $session_id = Session::get('session_id');
  if(Auth::check()){
    $cart_count = \App\Cart::where('user_id',Auth::user()->id)->orwhere('session_id',$session_id)->count();
  }else{
    $cart_count = \App\Cart::where('session_id',$session_id)->count();
  }
?>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

     <!--  <h1 class="logo mr-auto"><a href="index.html">BizLand<span>.</span></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="<?php echo e(url('/')); ?>" class="logo mr-auto"><img src="<?php echo e(asset('storage/images/logo/logo.png')); ?>" style="height: 61px;"></a>
       <a href="" class="cart-mobile-view"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
        <?php if($cart_count>0): ?><div class="notif-nmbr"><?php echo e($cart_count); ?></div><?php endif; ?>
       </a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="<?php echo e(request()->is('/') ? 'active' : ''); ?>"><a href="<?php echo e(url('/')); ?>">Home</a></li>
          <li class="<?php echo e(request()->is('dog') ? 'active' : ''); ?>"><a href="<?php echo e(route('dog')); ?>">Dog</a></li>
          <li class="<?php echo e(request()->is('cat') ? 'active' : ''); ?>"><a href="<?php echo e(route('cat')); ?>">Cat</a></li>
          <li><a href="#">Bird</a></li>
          <li><a href="#">Fish</a></li>
          <li><a href="#"><span style="margin-right: 200px;">Service</span></a></li>
          <li class="cart-system-view">
            <a href="<?php echo e(url('/cart')); ?>">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <?php if($cart_count>0): ?><div class="notif-nmbr"><?php echo e($cart_count); ?></div><?php endif; ?>
            </a>
          </li>
          <?php if(auth()->guard()->guest()): ?>
          <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
          <?php else: ?>
          <li class="drop-down"><a href="javascript:void(0)"><?php echo e(Auth::user()->name); ?></a>
            <ul>
              <li><a href="<?php echo e(route('my-profile')); ?>"><i class="fa fa-user"></i><span style="margin-left: 8px;">My Profile</span></a></li>
              <li><a href="<?php echo e(route('my-order')); ?>"><i class="fa fa-shopping-bag"><span style="margin-left: 8px;"></i>Orders</span></a></li>
              <li><a href="<?php echo e(route('addresses')); ?>"><i class="fa fa-address-card"></i><span style="margin-left: 8px;">Addresses</span></a></li>
              <li><a href="<?php echo e(route('wallet')); ?>"><i class="fa fa-wallet"></i><span style="margin-left: 8px;">Wallet</span></a></li>
              <!-- <li><a href="#"><i class="fa fa-cog"></i><span style="margin-left: 8px;">Settings</span></a></li> -->
              <li>
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i><span style="margin-left: 8px;">Logout</span></a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
              </li>
            </ul>
          </li>
          <?php endif; ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/layouts/header.blade.php ENDPATH**/ ?>