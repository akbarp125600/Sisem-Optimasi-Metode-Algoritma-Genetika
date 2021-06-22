
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>
<nav class="main-header navbar navbar-expand navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
  </ul>
  <?php if($this->session->userdata('level') == "admin"){ ?>
  <ul class="nav nav-pills ml-auto p-2">
    <li class="nav-item dropdown">
      <a class="nav " data-toggle="dropdown" href="#">
        <div class="user-block">
          <img class="img-circle" src="<?php echo base_url() ?>assets/admin/dist/img/user1-128x128.jpg" alt="User Image">
          <span class="username">Selamat Datang, <?php echo $this->session->userdata('uname');?></span>
          <span class="description"><?php date_default_timezone_set('Asia/Jakarta'); echo date("l, d/m/Y H:i:s"); 
 ?></span>  
        </div>
      </a>
      <div class="dropdown-menu">

       <div class="col-md-auto">
            
            <div class="card card-widget widget-user">
              
              <div class="widget-user-header bg-primary">
                <h3 class="widget-user-username">Akbar Pratama</h3>
                <h5 class="widget-user-desc">Founder & CEO</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="<?php echo base_url() ?>assets/admin/dist/img/user1-128x128.jpg" alt="User Avatar">
              </div>
            </div>
            </br>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" tabindex="-1" href="<?php echo base_url('profile/logout') ?>"><i class="fas fa-user-circle text-primary">&nbsp;&nbsp;&nbsp;</i>Profile</a>
            <a class="dropdown-item" tabindex="-1" href="<?php echo base_url('profile/logout') ?>"><i class="fas fa-cogs text-primary">&nbsp;&nbsp;&nbsp;</i>Setting</a>
            <a class="dropdown-item" tabindex="-1" href="<?php echo base_url('admin/logout') ?>"><i class="fas fa-sign-out-alt text-primary">&nbsp;&nbsp;&nbsp;</i>Logout</a>


          </div>


      </div>
    </li>
  </ul>
<?php } ?>
  <!-- Right navbar links -->

</nav><!-- jQuery -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
