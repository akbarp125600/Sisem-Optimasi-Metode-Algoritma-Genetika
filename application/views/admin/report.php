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

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content">
        <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body" >
                <h3 class= "card-title col-12">Hasil Pengujian Optimasi</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- <h5 class="mb-2">Info Box</h5> -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-sync-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Percobaan</span>
                  <span class="info-box-number"><?php echo $totid[0]['totid'] ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-database"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Jumlah Cr:Mr</span>
                  <span class="info-box-number"><?php echo $totcr[0]['totcr'] ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fas fa-signal"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Cr:Mr Terbaik</span>
                  <span class="info-box-number"><?php echo $thebest[0]['cr'].":".$thebest[0]['mr'] ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fas fa-chart-line"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Rata-rata Fitness Tertinggi</span>
                  <span class="info-box-number"><?php echo round($thebest[0]['avgfit'], 5) ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
        </div>
      </section>

      <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <!-- AREA CHART -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Grafik Hasil Pengujian</h3>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
          </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                 <h3 class="card-title">Hasil Uji Coba Kombinasi Cr dan Mr</h3>
               </div>
               <!-- /.card-header -->

               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Cr</th>
                      <th>Mr</th>
                      <?php for ($j=1; $j <= $countid[0]['jmlcob']; $j++) { ?>
                        <th>Percobaan ke-<?php echo $j ?></th>
                      <?php } ?>
                      <th>Rata-rata Fitness</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1; $idx=0;

                    foreach ($report as $value) { ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $value->cr ?></td>
                        <td><?php echo $value->mr ?></td>
                        <?php for ($j=1; $j <= $countid[0]['jmlcob']; $j++) { ?>
                          <td><?php echo array_key_exists($idx, $rapot) ? $rapot[$idx]['fitness'] : ""; ?></td>
                          <?php $idx++; } ?>
                          <td><?php echo round($value->ratafitness, 5) ?></td>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>

                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
          </section>

          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box bg-gradient-info">
                    <span class="info-box-icon"><i class="fas fa-sync-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Total Percobaan</span>
                      <span class="info-box-number"><?php echo $totid[0]['totid'] ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box bg-gradient-success">
                    <span class="info-box-icon"><i class="fas fa-chart-bar"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Total Generasi</span>
                      <span class="info-box-number"><?php echo $totgen[0]['jmlgen'] ?></span>

                      
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box bg-gradient-primary">
                    <span class="info-box-icon"><i class="fas fa-award"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Generasi Terbaik</span>
                      <span class="info-box-number"><?php echo $bestgen[0]['generasi'] ?></span>

                      
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box bg-gradient-danger">
                    <span class="info-box-icon"><i class="fas fa-chart-line"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Rata-rata Fitness Tertinggi</span>
                      <span class="info-box-number"><?php echo round($bestgen[0]['avgfitnese'], 5) ?></span>

                      
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </section>

          



          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <!-- LINE CHART -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Line Chart</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
          </section>

          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card card-primary">
                    <div class="card-header">
                     <h3 class="card-title">Hasil Uji Coba Jumlah Generasi</h3>
                   </div>
                   <!-- /.card-header -->

                   <div class="card-body">
                    <table id="example3" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Jumlah Generasi</th>
                          <th>Rata-rata Fitness</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($reportgen as $value) { ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $value->generasi ?></td>
                            <td><?php echo round($value->ratafitness, 5) ?></td>
                          </tr>
                          <?php $no++; } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </section>

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
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
   var areaChartData1 = {
      labels  : [<?php $prefix=''; foreach($report as $value){ echo $prefix.'"'.$value->cr.':'.$value->mr.'"'; $prefix=', '; }?>],
      datasets: [
        {
          label: "Rata-rata Fitness",
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
           data: [<?php $prefix=''; foreach($report as $value){ echo $prefix.$value->ratafitness; $prefix=', '; }?>]
        },
        
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
       datasetFill             : false,
      
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData1,
      options: areaChartOptions
    })






    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartData = {
      labels  : [<?php $prefix=''; foreach($reportgen as $value){ echo $prefix.'"'.$value->generasi.'"'; $prefix=', '; }?>],
      datasets: [{
        label: "Rata-rata Fitness",
        
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          /*pointRadius          : false,*/
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php $prefix=''; foreach($reportgen as $value){ echo $prefix.round($value->ratafitness,5); $prefix=', '; }?>]

      }]
    }

    var lineChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false,
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

  })
</script>


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
    <script>
      $(function () {
        $("#example3").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
        $('#example4').DataTable({
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
