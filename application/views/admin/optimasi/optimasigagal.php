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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <a href="<?php echo base_url('optimasi'); ?>">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                    <i class="fa fa-arrow-left-square-o" aria-hidden="true"></i>Kembali</button>
                    </button>
                </a>

              <div class="card-header bg-danger">
                <h3 class="card-title">Optimasi Gagal</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <form >
                <div class="card-body">
                  <div class="form-group">
                    <label>Jenis Mesin</label>
                      <?php foreach ($umur as $value) { ?>
                      <input name="umur" type="text" class="form-control" value="<?php echo $value->nama ?>" readonly>
                      <?php } ?>
                  </div>

                  <div class="form-group">
                        <label>Jenis Pekerjaan</label>
                        <textarea class="form-control" name="bmtterpilih" disabled><?php 
                        $no=1; 
                        foreach ($pilihan as $value) { 
                        echo $value['id'].". ".$value['nama']."\n"; 
                        $no++; 
                        } ?></textarea>
                      </div>
                      
                      <?php if($jmlada < 3){ ?>

                  <div class="form-group">
                    <label>Jumlah pekerjaan yang dipilih (disarankan lebih dari 2)</label>
                      <div class="form-select-list">
                          <input name="jmladaterpilih" type="numeric" class="form-control" value="<?php echo $jmlada ?>" readonly>
                        </div>
                  </div>
                  <?php }else{ ?>
                  <div class="form-group">
                    <label>Jumlah pekerjaan yang dipilih</label>
                    <input name="jmladaterpilih" type="text" class="form-control" value="<?php echo $jmlada ?>" disabled>
                  </div>
                  <?php } ?>
                  <?php if($jmlingin < 2){ ?>
                  <div class="form-group">
                    <label>Jumlah Pekerjaan (disarankan lebih dari 1)</label>
                      <div class="form-select-list">
                          <input name="jmlinginterpilih" type="text" class="form-control" value="<?php echo $jmlingin ?>" readonly>
                      </div>
                  </div>
                  <?php }else{ ?>
                  <div class="form-group">
                    <label>Jumlah komposisi bahan yang diinginkan</label>
                      <input name="jmliinginterpilih" type="text" class="form-control" value="<?php echo $jmlingin ?>" readonly>
                  </div>
                  <?php } ?>
                  <?php if($pcr < 0 || $pcr >= 1){ ?>
                  <div class="form-group">
                    <label>Probabilitas crossover (disarankan bernilai lebih dari sama dengan 0 atau kurang dari 1)</label>
                    <div class="form-select-list">
                        <input name="pcr" type="text" class="form-control" value="<?php echo $pcr ?>" readonly>
                    </div>
                  </div>
                  <?php }else{ ?>
                  <div class="form-group">
                    <label>Probabilitas crossover</label>
                      <input name="pcr" type="text" class="form-control" value="<?php echo $pcr ?>" readonly>
                  </div>
                  <?php } ?>
                  <?php if($pmt < 0 || $pmt >= 1){ ?>
                  <div class="form-group">
                    <label>Probabilitas mutasi (disarankan bernilai lebih dari sama dengan 0 atau kurang dari 1)</label>
                      <div class="form-select-list">
                          <input name="pmt" type="text" class="form-control" value="<?php echo $pmt ?>" readonly>
                      </div>
                  </div>
                  <?php }else{ ?>
                  <div class="form-group">
                    <label>Probabilitas cmutasi</label>
                      <input name="pmt" type="text" class="form-control" value="<?php echo $pmt ?>" readonly>
                  </div>
                  <?php } ?>

                 
                </div>
              </form>
              
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
