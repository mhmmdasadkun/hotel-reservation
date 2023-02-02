 <!-- Sidebar -->
 <?php $uri = new \CodeIgniter\HTTP\URI(current_url(true)); ?>
 <div class="sidebar-wrapper">
     <div class="sidebar-brand-box">
         <div class="sidebar-brand">
             <div class="brand-img">
                 <img src="<?= base_url('assets/img/brand.png') ?>" alt="Brand">
             </div>
             <div class="brand-title">
                 <span>Aat Hotel</span>
             </div>
         </div>
     </div>
     <div class="sidebar-menu-box">
         <div class="sidebar-menu">
             <ul class="nav-menu">
                 <li class="nav-item">
                     <div class="menu-header">Menu Utama</div>
                 </li>
                 <li class="nav-item">
                     <a href="<?= route_to('dashboard'); ?>">
                         <i class="bx bxs-rocket"></i>
                         <span>Dashboard</span>
                     </a>
                 </li>
                 <li class="nav-item <?= ($uri->getSegment(2) == "room-category" || $uri->getSegment(2) == "room-facility" ? 'menu-collapsing' : ''); ?>">
                     <a href="javascript:void(0)" class="menu-collapse">
                         <i class="bx bxs-bed"></i>
                         <span>Kamar</span>
                     </a>
                     <div class="menu-dropdown">
                         <ul>
                             <li class="nav-item">
                                 <a href="<?= route_to('room.list'); ?>" class="">Daftar Kamar</a>
                             </li>
                             <li class="nav-item">
                                 <a href="<?= route_to('rcategory.list'); ?>" class="<?= ($uri->getSegment(2) == "room-category" ? 'active' : ''); ?>">Daftar Kategori</a>
                             </li>
                             <li class="nav-item">
                                 <a href="<?= route_to('rfacility.list'); ?>" class="<?= ($uri->getSegment(2) == "room-facility" ? 'active' : ''); ?>">Daftar Fasilitas</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a href="#">
                         <i class="bx bxs-user-rectangle"></i>
                         <span>Guests</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <div class="menu-header">Pengaturan</div>
                 </li>
                 <li class="nav-item">
                     <a href="javascript:void(0)" class="menu-collapse">
                         <i class="bx bxs-shield"></i>
                         <span>Accounts</span>
                     </a>
                     <div class="menu-dropdown">
                         <ul>
                             <li class="nav-item">
                                 <a href="#">User</a>
                             </li>
                             <li class="nav-item">
                                 <a href="#">Admin</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a href="<?= route_to('auth.logout'); ?>" onclick="return confirm('Anda yakin ingin keluar?');">
                         <i class="bx bx-log-out"></i>
                         <span>Keluar</span>
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </div>