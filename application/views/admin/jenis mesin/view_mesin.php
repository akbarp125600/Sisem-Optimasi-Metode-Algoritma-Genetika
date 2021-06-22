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
              <h1>Data Jenis Mesin</h1>
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
                   <button  class="btn btn-outline-primary"><span><i class="fa fa-plus"></i> <?php echo anchor('mesin/tambah','Tambah Data'); ?></span></button><?php } ?>
                 </div>
                 <!-- /.card-header -->

                 <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Biaya</th>
                        <th>Waktu</th>
                        <!-- <th>Em</th>
                        <th>Met</th>
                        <th>Lis</th>
                        <th>Ca</th>
                        <th>P</th> -->
                        <?php if($this->session->userdata('level') == "admin"){ ?>
                          <th>Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach($mesin as $u){ 
                        ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $u->nama ?></td>
                          <td><?php echo $u->harga ?></td>
                          <td><?php echo $u->waktu ?></td>
                          <!-- <td><?php echo $u->em ?></td>
                          <td><?php echo $u->met ?></td>
                          <td><?php echo $u->lis ?></td>
                          <td><?php echo $u->ca ?></td>
                          <td><?php echo $u->p ?></td> -->
                          <?php if($this->session->userdata('level') == "admin"){ ?>
                            <td>
                              <button class="btn btn-outline-primary"><i class="fas fa-edit"></i><?php echo anchor('mesin/edit/'.$u->id,'Edit'); ?></button>
                              <!-- <button class="btn btn-outline-danger"><i class="fas fa-trash"></i><?php echo anchor('mesin/hapus_mesin/'.$u->id,'Hapus'); ?></button> -->
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
          <a href="<?php echo site_url('mesin/hapus_jmesin/'.$u->id); ?>">
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
</body>
</html>
