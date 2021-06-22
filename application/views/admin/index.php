<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>
  <?php $this->load->view('template/header.php') ?>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">



    <!-- Navbar -->
    <?php $this->load->view('template/navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Sidebar -->
      <?php $this->load->view('template/sidebar.php'); ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- /.content-header -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body" >
                  <h3 class="text-primary"><marquee style="font-family: times new roman;" onmouseover="this.stop()" onmouseout="this.start()" direction="left" scrollamount="5" align="center">
                    Optimasi Biaya Pembuatan Mesin Menggunakan Algoritma Genetika
                  </marquee></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Bahan</span>
                  <span class="info-box-number">
                    <?php echo $toban[0]['toban'] ?> Jenis
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cogs"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Mesin</span>
                  <span class="info-box-number"><?php echo $tomes[0]['tomes'] ?> Jenis</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cubes"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Material</span>
                  <span class="info-box-number"><?php echo $tomat[0]['tomat'] ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-sync-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Percobaan</span>
                  <span class="info-box-number"><?php echo $toper[0]['toper'] ?></span>
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
              <!-- Box Comment -->
              <div class="card card-widget">
               
                <div class="card-body">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo base_url() ?>assets/admin/dist/img/page.png" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo base_url() ?>assets/admin/dist/img/centrifugal.png" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo base_url() ?>assets/admin/dist/img/backfilter.png" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-custom-icon" aria-hidden="true">
                        <i class="fas fa-chevron-left"></i>
                      </span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-custom-icon" aria-hidden="true">
                        <i class="fas fa-chevron-right"></i>
                      </span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer card-comments">
                  <div class="card-comment">
                    <!-- User image -->
                    <div class="comment-text">
                      <span class="username">
                       <h3 style="font-size:30px; font-weight:bold; color:white;">Latar Belakang</h3>
                       <p align="justify">&emsp;&emsp;Perkembangan dunia industri semakin banyak menuntut penerapan teknologi dan efisiensi di bidang pengendalian debu industri dan sirkulasi udara dikarenakan sejumlah peralatan yang menimbulkan panas dan polusi udara. Debu yang dihasilkan oleh msein pada kegiatan produksi di suatu industry harus dapat dikontrol dengan teknologi yang ramah lingkungan, agar mendapatkan performa yang maksim al dari suatu mesin dan pekerja. Karena kondisi lingkungan yang baim dapat mempengaruhi tingkat produktifitas dari hasil kerja pada indusri apapun. PT. Dutaprima Indah perusahaan swasta yang memberikan solusi atas permasalahan tersebut dengan membuat terobosan dibidang pengendalian debu industri dan sirkulasi udara denga desain dan teknologi berstandart ISO 9001 dengan produk – produk mesin seperti  wall fan, exhaust fan, blower, centrifugal, axial dan dust collector system. Mesin – mesin seperti itu yang membuat pengendalian debu industri dan sirkulasi udara di dalam pabrik menjadi lebih baik.</p>
                       <p align="justify">&emsp;&emsp;Salah satu produk yang paling diminati adalah mesin dust collector system aadalah salah satu mesin yang berfungsi sebagai penghisap debu atau asap dan menghidap udara panas yang dihasilkan dalam proses industri. Dalam proses pembuatan mesin dust collector system ini juga menghitung estimasi biaya dan waktu  pembuatan mesin tersebut. Kendala yang terjadi saat di PT. Dutaprima Indah masih menggunakan perhitungan manual untuk menghitung estimasi biaya dan waktu pembuatan mesin. Selain itu perusahaan juga sering mendapat teguran dari customer karena estimasi biaya dan waktu pembuata mesin sering tidak sesuai dengan yang terjadi dilapangan.</p>
                       <p align="justify">&emsp;&emsp;Algoritma genetik adalah teknik pencarian di dalam ilmu komputer untuk menemukan penyelesaian perkiraan untuk optimasi dan masalah pencarian. Secara umum algoritma genetika memiliki representasi genetik, cara membentuk populasi, memiliki nilai dan parameter genetik. Algoritma genetika dinilai mempunyai hasil yang optimal untuk banyak masalah, hal ini telah dibuktikan bahwa algoritma 
                        genetika dapat menghasilkan himpunan solusi optimal yang sangat berguna dengan banyak obyektif. Kekuatan utama algoritma genetika adalah kemampuannya untuk menyelesaikan masalah kompleks dalam waktu yang relative cepat. Algoritma genetika menjadi kelas khusus dari algoritma evolusioner dengan menggunakan teknik yang terinspirasi oleh biologi evolusioner seperti warisan, mutasi, seleksi alam dan rekombinasi atau crossover. Algoritma Genetik khususnya diterapkan sebagai simulasi komputer dimana sebuah populasi representasi abstrak disebut kromosom dari solusi-solusi calon disebut individual pada sebuah masalah optimasi akan berkembang menjadi solusi-solusi yang lebih baik. Secara tradisional, solusi-solusi dilambangkan dalam biner sebagai string '0' dan '1'.
                      </p>
                      <p align="justify">&emsp;&emsp;Berdasarkan latar belakang di atas, maka dibuatlah tugas akhir ini sebagai pemecah kasus yang masih menggunakan perhitungan manual, sehingga berdampak diantaranya perbedaan biaya dan waktu yang sudah di rancang dengan yang terjadi dilapangan. metode algoritma genetika diterapkan dalam penelitian ini untuk mengoptimasi proses estimasi biaya dan waktu yang ada di PT. Dutaprima Indah. Tugas akhir ini berjudul “Optimasi Biaya dan Waktu Pembuatan Mesin Dust Collector System Menggunakan Algoritma Genetika Study kasus PT. Dutaprima Indah”.</p>
                    </span><!-- /.username -->
                  </div>
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="progress-group">
                      Add Products to Cart
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Complete Purchase
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Visit Premium Page</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Send Inquiries
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL COST</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section>







    <section class="content">
      <div class="container-fluid">
        <div class="col-12">
          <!-- Info Boxes Style 2 -->
          <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fas fa-tag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inventory</span>
              <span class="info-box-number">5,200</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="far fa-heart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mentions</span>
              <span class="info-box-number">92,050</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Downloads</span>
              <span class="info-box-number">114,381</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-info">
            <span class="info-box-icon"><i class="far fa-comment"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Direct Messages</span>
              <span class="info-box-number">163,921</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<?php $this->load->view('template/footer.php'); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

</body>
</html>