<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?php echo base_url('uploads/logo/logo1.png')?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-10"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">School</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo school_url('dashboard/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               <!-- <i class="right fas fa-angle-left"></i>-->
              </p>
            </a>
           
          </li>


          <li class="nav-item has-treeview">
            <a href="<?php echo school_url('Student'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Students
             
              </p>
            </a>
          
          </li>

          <li class="nav-item has-treeview">
            <a href="<?php echo school_url('School_session'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Session
             
              </p>
            </a>
          
          </li>

          <li class="nav-item has-treeview">
            <a href="<?php echo school_url('Export'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Export
             
              </p>
            </a>
          
          </li>

          <li class="nav-item has-treeview">
            <a href="<?php echo school_url('Fees'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Fees
             
              </p>
            </a>
          
          </li>

          <li class="nav-item has-treeview">
            <a href="<?php echo school_url('Fees/fees_transaction'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Fees Transaction
             
              </p>
            </a>
          
          </li>
         








        </ul>


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>