<?php $session =session(); ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('assets/backend'); ?>/index3.html" class="brand-link">
      <img src="<?= base_url('assets/backend'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">QR Menu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/backend'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
           <a href="#" class="d-block"><?php echo $session->get('ad')." ".$session->get('soyad');  ?></a>
          <a href="#" class="d-block" style="text-align:center"><small>(<?php echo $session->get('unvan')  ?>)</small></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('/panel') ?>" class="nav-link">
              <i class="nav-icon fas fa-home" style="color:orange"></i>
              <p>
                Anasayfa             
              </p>
            </a>
          </li>
          <?php if($session->get('yetki')==0 || $session->get('yetki')==1): ?>
          <li class="nav-item">
            <a href="<?= base_url('panel/category'); ?>" class="nav-link">
              <i class="nav-icon fas fa-bars" style="color:yellow"></i>
              <p>
                Kategori Ekle            
              </p>
            </a>
          </li>
          <?php endif ?>
          <?php if($session->get('yetki')==0 || $session->get('yetki')==1): ?>
          <li class="nav-item">
            <a href="<?= base_url('panel/product') ?>" class="nav-link">
              <i class="nav-icon fas fa-eye" style="color:#339999"></i>
              <p>
              Ürünler             
              </p>
            </a>
          </li>
          <?php endif ?>
          <?php if($session->get('yetki')==0 || $session->get('yetki')==1): ?>
          <li class="nav-item">
            <a href="<?= base_url('panel/productInsertView') ?>" class="nav-link">
              <i class="nav-icon fas fa-plus" style="color:#669e85"></i>
              <p>
                Ürün Ekle             
              </p>
            </a>
          </li>
          <?php endif ?>
          <li class="nav-item">
            <a href="<?= base_url('panel/callView') ?>" class="nav-link">
              <i class="nav-icon fas fa-bullhorn" style="color:#629e85"></i>
              <p>
                Garson Bekleyenler            
              </p>
            </a>
          </li>
        <?php if($session->get('yetki')==0): ?>
         <li class="nav-item">
            <a href="<?= base_url('panel/employeAddView') ?>" class="nav-link">
            <i class="fa fa-user-plus" style="color:pink" aria-hidden="true"></i>
              <p>
              Personel Ekle          
              </p>
            </a>
          </li>
         <?php endif ?>
           <?php if($session->get('yetki')==0 || $session->get('yetki')==1): ?>
         <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa fa-qrcode" style="color:gray" aria-hidden="true"></i>
              <p>
              Qr cod Oluştur         
              </p>
            </a>
          </li>
         <?php endif ?>
          <li class="nav-item">
            <a href="<?= base_url('panel/quit') ?>" class="nav-link">
            <i class="fa fa-arrow-right" style="color:red" aria-hidden="true"></i>
              <p>
                Çıkış            
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>