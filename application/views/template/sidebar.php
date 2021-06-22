<a href="index3.html" class="brand-link">
  <img src="<?php echo base_url() ?>assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">SIOBI</span>
</a>    
<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">PT. Dutaprima Indah</a>
    </div>
  </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item menu-open">
            <a href="<?php echo site_url('admin') ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard Admin
              </p>
            </a>
          </li>
          <?php if($this->session->userdata('level') == "0"){ ?>
          <li class="nav-item">
            <a href="<?php echo site_url('login') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign text-primary"></i>
              <p>
                Login
              </p>
            </a>
           <?php } ?>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder-open text-primary"></i>
              <p>
                Data Mater
                <i class="fas fa-angle-left right text-primary"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('bahan') ?>" class="nav-link">
                  <i class="fas fa-folder nav-icon"></i>
                  <p>Sub jenis Pekerjaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('mesin') ?>" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Jenis Mesin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('material') ?>" class="nav-link">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Jenis Pekerjaan</p>
                </a>
              </li>
            </ul>
          </li>
         <!--  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder-open text-primary"></i>
              <p>
                Data Bahan
                <i class="fas fa-angle-left right text-primary"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('satuan') ?>" class="nav-link">
                  <i class="fas fa-folder nav-icon"></i>
                  <p>Data Satuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('harga_bahan') ?>" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Data Harga Bahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('material') ?>" class="nav-link">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Data Harga Satuan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder-open text-primary"></i>
              <p>
                Data Pekerjaan
                <i class="fas fa-angle-left right text-primary"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('jenis_pekerjaan') ?>" class="nav-link">
                  <i class="fas fa-folder nav-icon"></i>
                  <p>Data Jenis Pekerjaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('pekerjaan') ?>" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Data Pekerjaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('bahan_pekerjaan') ?>" class="nav-link">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Data Bahan Pekerjaan</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo site_url('optimasi') ?>" class="nav-link">
              <i class="nav-icon fas fa-dna text-danger"></i>
              <p class="text">Optimasi GA</p>
            </a>
          </li>
          <li class="nav-header">Hasil</li>
          <li class="nav-item">
            <a href="<?php echo site_url('history') ?>" class="nav-link">
              <i class="nav-icon fas fa-archive text-primary"></i>
              <p class="text">Histori Optimasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('report') ?>" class="nav-link">
              <i class="nav-icon fas fa-file-alt text-primary"></i>
              <p class="text">Laporan Pengujian</p>
            </a>
          </li>
          <li class="nav-header">LAPORAN</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print text-primary"></i>
              <p class="text">Print Laporan</p>
            </a>
          </li>
          <li class="nav-header">User</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-secret text-primary"></i>
              <p class="text">Management User</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>