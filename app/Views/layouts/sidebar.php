 <!-- Sidebar -->
 <div class="sidebar-wrapper">
     <div class="sidebar-brand-box">
         <div class="sidebar-brand">
             <div class="brand-img">
                 <img src="<?= base_url('assets/img/brand.png') ?>" alt="Brand">
             </div>
             <div class="brand-title">
                 <span>BRANDING</span>
             </div>
         </div>
     </div>
     <div class="sidebar-menu-box">
         <div class="sidebar-menu">
             <ul class="nav-menu">
                 <li class="nav-item">
                     <div class="menu-header">Header Menu</div>
                 </li>
                 <li class="nav-item">
                     <a href="<?= route_to('admin.dashboard'); ?>">
                         <i class="bx bxs-rocket"></i>
                         <span>Dashboard</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#">
                         <i class="bx bxs-cog"></i>
                         <span>Pengaturan</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <div class="menu-header">Header Menu</div>
                 </li>
                 <li class="nav-item">
                     <a href="javascript:void(0)" class="menu-collapse">
                         <i class="bx bxs-folder"></i>
                         <span>Folder</span>
                     </a>
                     <div class="menu-dropdown">
                         <ul>
                             <li class="nav-item">
                                 <a href="#">Link 1</a>
                             </li>
                             <li class="nav-item">
                                 <a href="#">Link 2</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a href="javascript:void(0)" class="menu-collapse">
                         <i class="bx bxs-camera"></i>
                         <span>Kamera</span>
                     </a>
                     <div class="menu-dropdown">
                         <ul>
                             <li class="nav-item">
                                 <a href="#">Link 1</a>
                             </li>
                             <li class="nav-item">
                                 <a href="#">Link 2</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a href="<?= route_to('admin.logout'); ?>" onclick="return confirm('Anda yakin ingin keluar?');">
                         <i class="bx bx-log-out"></i>
                         <span>Keluar</span>
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </div>