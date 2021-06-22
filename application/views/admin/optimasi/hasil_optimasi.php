<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIOBI | PT. DUTAPRIMA INDAH</title>

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
          <div class="col-12">
            <div class="card">
              <div class="card-body" >
                <h3 class= "card-title col-12"><center>Hasil Optimasi Menggunakan Algoritma Genetika</center></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Jenis Mesin yang dipilih</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="#">
                <div class="card-body">
                  <div class="form-group">
                    <label>Jenis Mesin Yang dipilih</label>
                      <?php foreach ($umur as $value) { ?>
                      <input name="umur" type="text" class="form-control" value="<?php echo $value->nama ?>" readonly>
                      <?php } ?>
                  </div>

                  <div class="form-group">
                        <label>Sub Jenis Pekerjaan yang terpilih</label>
                          <textarea class="form-control" name="bmtterpilih" disabled><?php 
                          $no=1; 
                          foreach ($pilihan as $value) { 
                          echo $value['id'].". ".$value['nama']."\n"; 
                          $no++; 
                          } ?></textarea>
                      </div>

                  <div class="form-group">
                   <label>Panjang Gen Yang di inginkan</label>
                    <input name="jmliinginterpilih" type="text" class="form-control" value="<?php echo $jmlingin ?>" readonly>
                  </div>
                   <div class="card-footer">
                  <!-- <button type="submit"  class="btn btn-primary">Submit</button> -->
                  <p class="text-danger">Apabila ingin merubah silahkan klik tombol kembali (back) untuk menginputkan ulang</p>
                   <a href="<?php echo base_url('optimasi'); ?>"class="btn btn-danger">Kembali</a>
                </div>
                 
                </div>

                <!-- /.card-body -->
              </form>

            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Parameter Algoritma Genetika</h3>
              </div>
              
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label>Jumlah Gen</label>
                    <input name="jmlgen" type="text" class="form-control" value="<?php echo $jmlingin ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Ukuran Populasi</label>
                    <input name="jmlkrm" type="text" class="form-control" value="<?php echo $jmlkrm ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah Generasi</label>
                    <input name="jmlgnrs" type="text" class="form-control" value="<?php echo $jmlgnrs ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Probabilitas Crossover</label>
                    <input name="pcr" type="text" class="form-control" value="<?php echo $pcr ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Probabilitas Mutasi</label>
                    <input name="pmt" type="text" class="form-control" value="<?php echo $pmt ?>" readonly>
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->
              </form>

            </div>
            <!-- /.card -->
          </div>

          <!-- right column -->
          <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Hasil Optimasi </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo form_open_multipart("History/add"); ?>
                <?php echo validation_errors(); ?>
                <form>
                  <div class="row">
                    <div class="col-md-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <!-- <label>Rekomendasi Bahan</label> -->
                        <textarea class="form-control" name="bmtrekomen" disabled><?php 
                          $prefix=" ";foreach ($hasil as $value) { 
                              echo $prefix.$value['nama']; 
                          $prefix=", ";}
                          ?></textarea>
                          <?php foreach ($hasil as $value) { ?>
                          <input name="id_rekom[]" type="hidden" class="form-control" value="<?php echo $value['id'] ?>">
                          <?php } ?>
                      </div>
                    </div>
                    <?php foreach ($umur as $value) { ?>
                      <input name="id_usia" type="hidden" class="form-control" value="<?php echo $value->id ?>">
                      <?php } foreach ($pilihan as $value) { ?>
                      <input name="id_bmt[]" type="hidden" class="form-control" value="<?php echo $value['id'] ?>">
                      <?php } ?>
                      <input name="jml_komp" type="hidden" class="form-control" value="<?php echo $jmlingin ?>">
                      <input name="popsize" type="hidden" class="form-control" value="<?php echo $jmlkrm ?>">
                      <input name="generasi" type="hidden" class="form-control" value="<?php echo $jmlgnrs ?>">
                      <input name="cr" type="hidden" class="form-control" value="<?php echo $pcr ?>">
                      <input name="mr" type="hidden" class="form-control" value="<?php echo $pmt ?>">
                      <input name="fitness" type="hidden" class="form-control" value="<?php echo $fitnesstertinggi ?>">
                      <?php $plus=1; foreach ($idmaxhistori as $value) { ?>
                      <input name="id" type="hidden" class="form-control" value="<?php echo $value['id']+$plus ?>">
                      <?php } ?>
                      <?php $plus=1; foreach ($idmaxhistoribmt as $value) { ?>
                      <input name="iddetilbmt" type="hidden" class="form-control" value="<?php echo $value['id']+$plus ?>">
                      <?php } ?>
                      <?php $plus=1; foreach ($idmaxhistorirekom as $value) { ?>
                      <input name="iddetilrekom" type="hidden" class="form-control" value="<?php echo $value['id']+$plus ?>">
                      <?php } ?>
                </form>
                <?php echo form_close(); ?>
              </div>
              <div class="basic-login-inner">
                <?php echo form_open_multipart("Kandopt"); ?>
                <?php echo validation_errors(); ?>
                <form action="#">
                  <?php foreach ($hasil as $value) { ?>
                    <input name="bmtopt[]" type="hidden" class="form-control" value="<?php echo $value['id'] ?>">
                    <?php } foreach ($umur as $value) { ?>
                    <input name="uspil" type="hidden" class="form-control" value="<?php echo $value->id ?>">
                    <?php } foreach ($pilihan as $value) { ?>
                    <input name="id_bmt[]" type="hidden" class="form-control" value="<?php echo $value['id'] ?>">
                    <?php } ?>
                    <input name="jml_komp" type="hidden" class="form-control" value="<?php echo $jmlingin ?>">
                    <input name="popsize" type="hidden" class="form-control" value="<?php echo $jmlkrm ?>">
                    <input name="generasi" type="hidden" class="form-control" value="<?php echo $jmlgnrs ?>">
                    <input name="cr" type="hidden" class="form-control" value="<?php echo $pcr ?>">
                    <input name="mr" type="hidden" class="form-control" value="<?php echo $pmt ?>">
                    <input name="fitness" type="hidden" class="form-control" value="<?php echo $fitnesstertinggi ?>">
                  <div class="form-group">
                        <button type="submit" class="btn btn-primary waves-effect waves-light pull-left">Lihat Kandungan</button>
                    </div>
                 </form>
                <?php echo form_close(); ?>
            </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.card -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->

         <div class="card">
           <div class="card card-primary">
              <div class="card-header">
                 <h3 class="card-title">Seluruh Kromosom dari Setiap Generasi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>No</th>
                      <th>Kromosom</th>
                      <th>Fitnes</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php $no=1; foreach ($populs as $key => $value) { foreach ($value as $ke => $val) { if ($no==count($value)+1){$no=1;}?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $ke ?></td>
                        <td><?php echo $val ?></td>
                    </tr>
                    <?php $no++; } } ?>
                  </tbody>
                  
                </table>
              </div>
            </form>
              <!-- /.card-body -->
            </div>
          </div>

            <div class="card">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Proses Reproduksi</h3>
                </div>

                <ul class="nav nav-pills mr-auto p-2">
                  <?php foreach ($populsfortab as $key => $value) { ?>
                  <li class="<?php if($key==0){ echo "active"; } ?> nav-item p-1">
                    <a class="nav-link" data-toggle="tab" href="<?php echo "#Tab".$key; ?>" >
                    <span class="edu-icon edu-analytics tab-custon-ic"></span>
                    <?php echo "Populasi ".$key; ?>
                  </a>
                </li>
                  <?php } ?>
                  <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                      Dropdown <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" tabindex="-1" href="#">Action</a>
                      <a class="dropdown-item" tabindex="-1" href="#">Another action</a>
                      <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>
                    </div>
                  </li> -->
                </ul>
                            
                  <!-- <ul class="nav nav-pills mr-auto p-2">
                      <?php foreach ($populsfortab as $key => $value) { ?>
                      <li class="<?php if($key==0){ echo "active"; } ?>">
                          <a data-toggle="tab" href="<?php echo "#Tab".$key; ?>">
                              <span class="edu-icon edu-analytics tab-custon-ic"></span>
                              <?php echo  "Populasi ".$key; ?>
                          </a>
                      </li>
                      <?php } ?>
                  </ul> -->
                       <div class="tab-content">
                           <?php foreach ($populsfortab as $key => $value) { ?>
                           <div id="<?php echo "Tab".$key; ?>" class="tab-pane in active animated flipInX custon-tab-style1">
                               <?php foreach ($value as $ke => $val) { ?>
                                
                                <div class="card card-info">
                                <div class="card-header">
                                <h3 class="card-title" ><?php echo $ke; ?></h3>
                               
                              </div>
                            </div>
                            <table class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                  <th>Kromosom</th>
                                  <th>Fitnes</th>
                              </tr>
                              </thead>
                              
                              <tbody>
                                 <?php foreach ($val as $ky => $vl) { ?>
                              <tr>
                                  <td><?php echo $ky ?></td>
                                  <td><?php echo $vl ?></td>
                              </tr>
                              <?php } ?>
                              </tbody>
                  
                            </table>
                              
                              
                               <?php } ?>
                           </div>
                           <?php } ?>
                          </div>
                      <!--   </div>
                      </div> -->
                    </div>
                </div>

               <!--  <div class="col-md-12"> -->
                      <div class="card">
                      <div class="card card-success">

                        <div class="card-header">
                          <h3 class="card-title">Kromosom Setiap Populasi</h3>
                          </div>
                            
                            <ul class="nav nav-pills mr-auto p-2">
                                <?php foreach ($populs as $key => $value) { ?>
                                <li class="<?php if($key==0){ echo "active"; } ?> nav-item p-1">
                                  <a class="nav-link" data-toggle="tab" href="<?php echo "#Tabkrm".$key; ?>">
                                    <span class="edu-icon edu-analytics tab-custon-ic"></span>
                                    <?php echo "Populasi ".$key; ?>
                                  </a>
                                </li>
                                <?php } ?>
                            </ul>

                            <div class="tab-content">
                                <?php foreach ($populs as $key => $value) { ?>
                                <div id="<?php echo "Tabkrm".$key; ?>" class="tab-pane in active animated flipInX custon-tab-style1">

                                    
                                    <table class="table table-bordered table-striped">
                                    <thead>
                                      <?php foreach ($value as $ke => $val) { ?>
                                      <tr>
                                          <th>Kromosom</th>
                                          <th>Fitnes</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                            <td><?php echo $ke ?></td>
                                            <td><?php echo $val ?></td>
                                        </tr>
                                        <?php } ?>
                                      </tbody>
                                    </table>

                                </div>
                                <?php } ?>
                            </div>

                        </div>
                      </div>
                    </div>
            </div>
          </div>

                    

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
