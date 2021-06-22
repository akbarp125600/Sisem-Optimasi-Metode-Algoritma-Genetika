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
            <h1>DataTables</h1>
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

            <div class="card">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Jenis</th>
                      <th>Nama Mesin</th>
                      <th>PK</th>
                      <th>EM</th>
                      <th>LIS</th>
                      <th>CA</th>
                      <th>P</th>
                      <th>HARGA</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  foreach($material as $u){ 
                  ?>
                  <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $u->nama_jenis ?></td>
                  <td><?php echo $u->nama ?></td>
                  <td><?php echo $u->pk ?></td>
                  <td><?php echo $u->em ?></td>
                  <td><?php echo $u->lis ?></td>
                  <td><?php echo $u->ca ?></td>
                  <td><?php echo $u->p ?></td>
                  <td>Rp. <?php echo number_format($u->harga, 2, ",", ".");?></td>
                  </tr>
                  </tbody>
                  <?php } ?>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                 <a href="<?php echo site_url('material'); ?>">
              <button type="button" class="btn btn-primary">Kembali</button></a>
               </div>
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