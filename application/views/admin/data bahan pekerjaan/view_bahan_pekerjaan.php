<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <?php $this->load->view('template/header.php') ?>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    
    <?php $this->load->view('template/navbar.php') ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <?php $this->load->view('template/sidebar.php') ?>

      
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Data Bahan Pekerjaan</h1>
            </div> 
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card ">
                <div class="card-header">
                  <?php if($this->session->userdata('level') == "admin"){ ?>
                   <button type="button"class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-tambah"><span><i class="fa fa-plus"> Tambah Data</i></span></button>
                 <?php } ?>
                 </div>
                 <!-- /.card-header -->

                 <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Jenis Pekerjaan</th>
                        <th>Nama Pekerjaan</th>
                        <th>Bahan Pekerjaan</th>
                        
                        <?php if($this->session->userdata('level') == "admin"){ ?>
                          <th>Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach($bahan_pekerjaan as $u){ 
                        ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $u->id_bahan_pekerjaan ?></td>
                          <td><?php echo $u->jenis_pekerjaan ?></td>
                          <td><?php echo $u->nama_pekerjaan ?></td>
                          <td><?php echo $u->nama_bahan ?></td>
                          
                          <?php if($this->session->userdata('level') == "admin"){ ?>
                            <td>
                              <!-- <button class="btn btn-outline-primary"><i class="fas fa-edit"></i><?php echo anchor('mesin/edit/'.$u->id_satuan,'Edit'); ?></button> -->
                              <button type="button" class="btn btn-outline-primary " data-toggle="modal" data-target="#modaledit<?php echo $u->id_bahan_pekerjaan;?>"><i class="fas fa-trash-alt">  Edit</i></button>
                              <!-- <button class="btn btn-outline-danger"><i class="fas fa-trash"></i><?php echo anchor('mesin/hapus_mesin/'.$u->id_satuan,'Hapus'); ?></button> -->
                              <button type="button" class="btn btn-outline-danger "  data-toggle="modal" data-target="#modal-hapus"><i class="fas fa-trash-alt"> Hapus</i></button>
                            </td>
                          <?php } ?>
                        </tr>
                      </tbody>
                    <?php } ?>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Pekerjaan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php echo form_open_multipart("bahan_pekerjaan/tambah_bahan_pekerjaan"); ?>
        <?php echo validation_errors(); ?>
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="id_satuan">ID</label>
              <?php 
              $plus=1; 
              foreach ($idmax as $value) { ?>
                <input name="id_bahan_pekerjaan" type="text" class="form-control" placeholder="Id" value="<?php echo $value['id_bahan_pekerjaan']+$plus ?>" readonly>
              <?php } ?>  
            </div>

           <div class="form-group">
              <label for="bahan_pekerjaan">Pilih Jenis Pekerjaan</label>
              <select name="id_jenis_pekerjaan" id=""class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
                <?php foreach ($jenis_pekerjaan as $key => $value) { ?>
                      <option value="<?php echo $value->id_jenis_pekerjaan ?>"><?php echo $value->jenis_pekerjaan ?></option>
                      <?php } ?>
                  </select>
            </div>

            <div class="form-group">
              <label for="id_pekerjaan">Pilih Nama Pekerjaan</label>
              <select name="id_pekerjaan" id=""class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
                <?php foreach ($nama_pekerjaan as $key => $value) { ?>
                      <option value="<?php echo $value->id_pekerjaan ?>"><?php echo $value->nama_pekerjaan ?></option>
                      <?php } ?>
                  </select>
            </div>

            <div class="form-group">
              <label for="id_pekerjaan">Pilih Nama Bahan</label>
              <select name="id_harga" id=""class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
                <?php foreach ($nama_bahan as $key => $value) { ?>
                      <option value="<?php echo $value->id_harga ?>"><?php echo $value->nama_bahan ?></option>
                      <?php } ?>
                  </select>
            </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
        <?php echo form_close(); ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <?php 
  foreach($bahan_pekerjaan as $u){ 
    ?>
  <div class="modal fade" id="modaledit<?php echo $u->id_bahan_pekerjaan;?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data Satuan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       <!--  <?php echo form_open_multipart("pekejaan/edit_pekerjaan"); ?>
        <?php echo validation_errors(); ?> -->
        <form action="<?php echo base_url('bahan_pekerjaan/edit_bahan_pekerjaan')?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="id">ID</label>
             
                <input name="id_bahan_pekerjaan" type="text" class="form-control" placeholder="Id" value="<?php echo $u->id_bahan_pekerjaan; ?>" readonly>
              
            </div>

           <div class="form-group">
              <label for="bahan_pekerjaan">Pilih Jenis Pekerjaan</label>
              <select name="id_jenis_pekerjaan" id=""class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
                <?php foreach ($jenis_pekerjaan as $key => $value) { ?>
                      <option value="<?php echo $value->id_jenis_pekerjaan ?>"><?php echo $value->jenis_pekerjaan ?></option>
                      <?php } ?>
                  </select>
            </div>

            <div class="form-group">
              <label for="id_pekerjaan">Pilih Nama Pekerjaan</label>
              <select name="id_pekerjaan" id=""class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
                <?php foreach ($nama_pekerjaan as $key => $value) { ?>
                      <option value="<?php echo $value->id_pekerjaan ?>"><?php echo $value->nama_pekerjaan ?></option>
                      <?php } ?>
                  </select>
            </div>

            <div class="form-group">
              <label for="id_pekerjaan">Pilih Nama Bahan</label>
              <select name="id_harga" id=""class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
                <?php foreach ($nama_bahan as $key => $value) { ?>
                      <option value="<?php echo $value->id_harga ?>"><?php echo $value->nama_bahan ?></option>
                      <?php } ?>
                  </select>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
            <button type="sumbit" class="btn btn-outline-primary">
            Save</button>
         
          </div>
           
        </form>
       <!--  <?php echo form_close(); ?> -->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <?php } ?>

  <div class="modal fade" id="modal-hapus">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Yakin Ingin Menghapus Data&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
          <a href="<?php echo site_url('bahan_pekerjaan/hapus_pekerjaan/'.$u->id_bahan_pekerjaan); ?>">
            <button type="button" class="btn btn-outline-light">
            Save</button>
          </a>
        </div>
      </div>
    </div>
  </div>
    
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <?php $this->load->view('template/footer.php'); ?>
  <!-- jQuery -->

  <!-- Page specific script -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

  <?php if ($this->session->flashdata('msg') == 'success'): ?>
      <script>
        $(function() {
          var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.success('Data Berhasil Di Tambahkan')
        });
      </script>

      <?php elseif ($this->session->flashdata('msg') == 'edit'): ?>
        <script>
          $(function() {
            var Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });

            toastr.info('Data Berhasil Di Update')
          });
        </script>

        <?php elseif ($this->session->flashdata('msg') == 'hapus'): ?>
          <script>
            $(function() {
              var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              toastr.error('Data Berhasil Di Delete')
            });
          </script>
        <?php endif ?>
</body>
</html>