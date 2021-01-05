<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <!-- <img src="<?php //echo base_url('assets/dist/img/AdminLTELogo.png') 
                    ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light">Online</span>
    <!-- <span class="brand-text font-weight-light">AdminLTE</span> -->
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <!-- <img src="<?php //echo base_url('assets/dist/img/user2-160x160.jpg') 
                            ?>" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">

        </div>
    </div>

    <!-- Sidebar Menu -->
    <!-- has-treeview menu-open -->
    <!-- active -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?= site_url('/admin') ?>" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('admin/menu') ?>" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Menu</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('admin/product') ?>" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Product</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>