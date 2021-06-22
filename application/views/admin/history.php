<!DOCTYPE html>
<html lang="en">
<head>
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
              <h1>Riwayat Optimasi</h1>
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
                  <!-- <h3 class="card-title">Hasil Uji Coba Kombinasi Cr dan Mr</h3> -->
                  <a href="<?php echo base_url('Optimasi')?>">
                   <button class="btn btn-outline-primary ">
                    <span><a href="<?php echo base_url('Optimasi')?>">
                      <i class="fa fa-plus"></i> Optimasi
                    </a></span>
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Jenis Mesin</th>
                        <th>Jenis Pekerjaan</th>
                        <th>Jumlah Generasi</th>
                        <!-- <th>Rekomendasi Pakan</th> -->
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no=1;
                      foreach ($history as $value) { ?>
                        <tr>
                          <td><?php echo $value['id'] ?></td>
                          <td><?php echo $value['nama_usia'] ?></td>
                          <td><?php echo $value['id_bmt'] ?></td>
                          <td><?php echo $value['jml_komp'] ?></td>
                          <!-- <td><?php echo $value['id_rekom'] ?></td> -->
                          <td>
                            <a href="<?php echo base_url('History/lihatkandungan/'.$value['id'].'/'.$value['id_usia']) ?>">
                            <button data-toggle="tooltip" title="Detail" class="btn btn-outline-primary"> <i class="fa fa-eye" aria-hidden="true"></i>
                            </button></a>
                            <?php if($this->session->userdata('level') == "admin"){ ?>
                            <!-- <a href="<?php echo base_url('History/deletehistory/'.$value['id'].'/'.$value['id_usia']) ?>">
                            <button data-toggle="tooltip" title="Hapus" class="btn btn-outline-danger"><i class="fas fa-trash" aria-hidden="true"></i></a> -->
                            </button>
                            <button type="button" class="btn btn-outline-danger "  data-toggle="modal" data-target="#modal-danger"><i class="fas fa-trash-alt"></i></button>
                          <?php } ?>
                          </td>
                        </tr>
                        <?php
                        $no++; 
                      } ?>
                    </tbody>

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

    <div class="modal fade" id="modal-danger">
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
              <a href="<?php echo base_url('History/deletehistory/'.$value['id'].'/'.$value['id_usia']) ?>">
              <button type="button" class="btn btn-outline-light toastrDefaultSuccess">
              Hapus</button></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->

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
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
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
