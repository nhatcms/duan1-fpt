 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="?action=home" class="brand-link">
         <img src="./assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span style="margin-left:10px" class="brand-text font-weight-light">ADMIN</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" style="margin-left: 7px;" class="d-block"><?php echo $_SESSION['real_name'];?></a>
             </div>
         </div>



         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php '?action=dashboard' ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Dashboard</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="?action=cate" class="nav-link">
                         <i class="fas fa-file-invoice "></i>
                         <p>
                             Quản lí danh mục
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="?action=product"class="nav-link">
                         <i class="fas fa-mobile-alt"></i>
                         <p>
                             Quản lí sản phẩm
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="?action=order" class="nav-link">
                         <i class="fas fa-file-invoice-dollar"></i>
                         <p>
                             Quản lí đơn hàng
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href='?action=comment' class="nav-link">
                         <i class="fas fa-comment"></i>
                         <p>
                             Quản lí đánh giá
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href='?action=user' class="nav-link">
                         <i class="fas fa-users"></i>
                         <p>
                             Quản lí người dùng
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>