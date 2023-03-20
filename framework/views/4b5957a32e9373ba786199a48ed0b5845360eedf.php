<div class="sidebar" data-color="purple" data-background-color="white">
      <div class="logo"><a href="<?php echo e(url('admin/dashboard')); ?>" class="simple-text logo-normal">
          <img src="<?php echo e(asset('storage/images/logo/logo.png')); ?>" style="height: 61px;">
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php echo e(request()->is('admin/dashboard') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(url('admin/dashboard')); ?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <div class="cstm-sidebar-hr"></div>
          <!-- <li class="nav-item <?php echo e(request()->is('crm/my-profile') || request()->is('crm/bank-account-change-request') ? 'active' : ''); ?>">
            <a class="nav-link" href="">
              <i class="material-icons">person</i>
              <p>Profile</p>
            </a>
          </li> -->
          <li class="nav-item <?php echo e(request()->is('admin/manage-orders') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('manage-orders')); ?>">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <p>Orders</p>
            </a>
          </li>
          <div class="cstm-sidebar-hr"></div>
          <li class="nav-item <?php echo e(request()->is('admin/manage-products') || request()->is('admin/add-new-product-step1') || request()->is('admin/add-new-product-step2') || request()->is('admin/add-new-product-step3') ? 'active' : ''); ?>">
              <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"> 
                <i class="fa fa-industry" style="font-size: 18px;"></i>
                <p>Product List</p>
              </a>
               <div id="submenu-1" class="collapse submenu" style="">
                  <ul class="nav flex-column ad-submenu">
                      <li class="nav-item <?php echo e(request()->is('admin/add-new-product-step1') || request()->is('admin/add-new-product-step2') || request()->is('admin/add-new-product-step3') ? 'active' : ''); ?>">
                          <a class="nav-link" href="<?php echo e(route('add-new-product-step1')); ?>"> <i class="fa fa-circle" style="font-size: 18px;"></i><p> List Product</p></a>
                      </li>
                      <li class="nav-item <?php echo e(request()->is('admin/manage-products') ? 'active' : ''); ?>">
                          <a class="nav-link" href="<?php echo e(route('manage-products')); ?>"> <i class="fa fa-circle" style="font-size: 18px;"></i> <p>Manage Products</p></a>
                      </li>
                  </ul>
              </div>
          </li>
          <div class="cstm-sidebar-hr"></div>
          <li class="nav-item <?php echo e(request()->is('admin/manage-admin') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('manage-admin')); ?>">
              <i class="fa fa-user" aria-hidden="true"></i>
              <p>Admins</p>
            </a>
          </li>
          <div class="cstm-sidebar-hr"></div>
          <li class="nav-item <?php echo e(request()->is('admin/manage-users') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('manage-users')); ?>">
              <i class="fa fa-user" aria-hidden="true"></i>
              <p>Users</p>
            </a>
          </li>
          <!-- <div class="cstm-sidebar-hr"></div>
          <li class="nav-item <?php echo e(request()->is('crm/settings') ? 'active' : ''); ?>">
            <a class="nav-link" href="">
              <i class="material-icons">library_books</i>
              <p>Settings</p>
            </a>
          </li> -->
          <div class="cstm-sidebar-hr"></div>
          <li class="nav-item <?php echo e(request()->is('admin/manage-pets') ? 'active' : ''); ?>">
              <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"> 
                <i class="fa fa-info-circle" style="font-size: 18px;"></i>
                <p>MISC</p>
              </a>
               <div id="submenu-2" class="collapse submenu" style="">
                  <ul class="nav flex-column ad-submenu">
                      <li class="nav-item <?php echo e(request()->is('admin/manage-pets') ? 'active' : ''); ?>">
                          <a class="nav-link" href="<?php echo e(route('manage-pets')); ?>"> <i class="fa fa-circle" style="font-size: 18px;"></i><p> Manage Pets</p></a>
                      </li>
                      <li class="nav-item <?php echo e(request()->is('admin/manage-categories') ? 'active' : ''); ?>">
                          <a class="nav-link" href="<?php echo e(route('manage-categories')); ?>"> <i class="fa fa-circle" style="font-size: 18px;"></i> <p>Manage Categories</p></a>
                      </li>
                      <li class="nav-item <?php echo e(request()->is('admin/manage-subcategories') ? 'active' : ''); ?>">
                          <a class="nav-link" href="<?php echo e(route('manage-subcategories')); ?>"> <i class="fa fa-circle" style="font-size: 18px;"></i> <p>Manage Subcategories</p></a>
                      </li>
                      <li class="nav-item <?php echo e(request()->is('admin/manage-brands') ? 'active' : ''); ?>">
                          <a class="nav-link" href="<?php echo e(route('manage-brands')); ?>"> <i class="fa fa-circle" style="font-size: 18px;"></i> <p>Manage Brands</p></a>
                      </li>
                      <li class="nav-item <?php echo e(request()->is('admin/manage-lifestages') ? 'active' : ''); ?>">
                          <a class="nav-link" href="<?php echo e(route('manage-lifestages')); ?>"> <i class="fa fa-circle" style="font-size: 18px;"></i> <p>Manage Lifestages</p></a>
                      </li>
                  </ul>
              </div>
          </li>
          <div class="cstm-sidebar-hr"></div>
          <li class="nav-item <?php echo e(request()->is('admin/tables') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('all-tables')); ?>">
              <i class="fa fa-table"></i>
              <p>Tables</p>
            </a>
          </li>
          <div class="cstm-sidebar-hr"></div>
        </ul>
      </div>
    </div><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>