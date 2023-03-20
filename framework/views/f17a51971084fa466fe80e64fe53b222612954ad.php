<div class="sidebar" data-color="purple" data-background-color="white">
      <div class="logo"><a href="" class="simple-text logo-normal">
          Achaldhan
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php echo e(request()->is('crm/home') ? 'active' : ''); ?>">
            <a class="nav-link" href="">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php echo e(request()->is('crm/my-profile') || request()->is('crm/bank-account-change-request') ? 'active' : ''); ?>">
            <a class="nav-link" href="">
              <i class="material-icons">person</i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item <?php echo e(request()->is('crm/all-projects') || request()->is('crm/property-details/*') ? 'active' : ''); ?>">
            <a class="nav-link" href="">
              <i class="fa fa-building-o" aria-hidden="true"></i>
              <p>Project Details</p>
            </a>
          </li>
          <li class="nav-item <?php echo e(request()->is('crm/site-visit') ? 'active' : ''); ?>">
            <a class="nav-link" href="">
              <i class="fa fa-car" aria-hidden="true"></i>
              <p>Site Visit</p>
            </a>
          </li>
          <li class="nav-item <?php echo e(request()->is('crm/settings') ? 'active' : ''); ?>">
            <a class="nav-link" href="">
              <i class="material-icons">library_books</i>
              <p>Settings</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
        </ul>
      </div>
    </div><?php /**PATH C:\xampp\htdocs\oshotr\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>