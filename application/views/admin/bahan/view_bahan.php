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
              <h1>Data Sub Jenis Mesin</h1>
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
                    <!-- <a href="<?php base_url('bahan/tambah'); ?>">
                     <button  class="btn btn-outline-primary"><span><i class="fa fa-plus"></i> Tambah</span></button> -->
                     <button type="button"class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-tambah"><span><i class="fa fa-plus"> Tambah Data</i></span></button>
                   <?php } ?>
                 </div>
                 <!-- /.card-header -->

                 <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                          <!-- <th>Pk</th>
                          <th>Em</th>
                          <th>Met</th>
                          <th>Lis</th>
                          <th>Ca</th>
                          <th>P</th> -->
                          <th>Jenis</th>
                          <th>Harga</th>
                          <th>Waktu (hari)</th>
                          <?php if($this->session->userdata('level') == "admin"){ ?>
                            <th>Action</th>
                          <?php } ?>
                        </tr>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach($bahan as $u){ 
                        ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $u->nama ?></td>
                          <!-- <td><?php echo $u->pk ?></td>
                          <td><?php echo $u->em ?></td>
                          <td><?php echo $u->met ?></td>
                          <td><?php echo $u->lis ?></td>
                          <td><?php echo $u->ca ?></td>
                          <td><?php echo $u->p ?></td> -->
                          <td><?php echo $u->nama_jenis ?></td>
                          <td>Rp. <?php echo number_format($u->harga, 0, ",", ".");?></td>
                          <td><?php echo $u->waktu ?></td>
                          <?php if($this->session->userdata('level') == "admin"){ ?>
                            <td>
                              <a href="<?php echo base_url('bahan/edit/' . $u->id);?>">
                                <button class="btn btn-outline-primary"><i class="fas fa-edit"></i> Edit</button></a>
                                <!-- <button type="button" class="btn btn-outline-primary " data-toggle="modal" data-target="#modaledit<?php echo $u->id;?>"><i class="fas fa-trash-alt">edit</i></button> -->
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
            <?php echo form_open_multipart("bahan/tambah_data"); ?>
            <?php echo validation_errors(); ?>
            <form>
              <div class="modal-body">
                <div class="form-group">
                  <label for="id_satuan">ID</label>
                  <?php 
                  $plus=1; 
                  foreach ($idmax as $value) { ?>
                    <input name="id" type="text" class="form-control" placeholder="Id" value="<?php echo $value['id']+$plus ?>" readonly>
                  <?php } ?>  
                </div>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="nama">
                </div>
                <div class="form-group">
                  <label for="nama_pekerjaan">Pk</label>
                  <input type="text" name="pk" class="form-control" id="jenis_pekerjaan" placeholder="jenis_pekerjaan">
                </div>
                <div class="form-group">
                  <label for="bahan_pekerjaan">Em</label>
                  <input type="text" name="em" class="form-control" id="bahan_pekerjaan" placeholder="bahan pekerjaan">
                </div>
                <div class="form-group">
                  <label for="bahan_pekerjaan">Met</label>
                  <input type="text" name="met" class="form-control" id="bahan_pekerjaan" placeholder="bahan pekerjaan">
                </div>
                <div class="form-group">
                  <label for="bahan_pekerjaan">Lis</label>
                  <input type="text" name="lis" class="form-control" id="bahan_pekerjaan" placeholder="bahan pekerjaan">
                </div>
                <div class="form-group">
                  <label for="bahan_pekerjaan">Ca</label>
                  <input type="text" name="ca" class="form-control" id="bahan_pekerjaan" placeholder="bahan pekerjaan">
                </div>
                <div class="form-group">
                  <label for="bahan_pekerjaan">P</label>
                  <input type="text" name="p" class="form-control" id="bahan_pekerjaan" placeholder="bahan pekerjaan">
                </div>
                <div class="form-group">
                  <label for="bahan_pekerjaan">Harga</label>
                  <input type="number" name="harga" class="form-control" id="bahan_pekerjaan" placeholder="bahan pekerjaan">
                </div>
                <div class="form-group">
                  <label for="waktu">Waktu</label>
                  <input type="number" name="waktu" class="form-control" id="waktu" placeholder="bahan pekerjaan">
                </div>
                <div class="form-group">
                  <label for="bahan_pekerjaan">Pilih Jenis Bahan</label>
                  <select name="id_jenis" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
                    <?php foreach ($jenisbmt as $key => $value) { ?>
                      <option value="<?php echo $value->id ?>"><?php echo $value->nama_jenis ?></option>
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
      foreach($bahan as $u){ 
        ?>
        <div class="modal fade" id="modaledit<?php echo $u->id;?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Data Bahan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
       <!--  <?php echo form_open_multipart("satuan/edit_data_satuan"); ?>
       <?php echo validation_errors(); ?> -->
       <form action="<?php echo base_url('bahan/edit_bahan')?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="id">ID</label>

            <input name="id" type="text" class="form-control" placeholder="Id" value="<?php echo $u->id ?>" readonly>

          </div>
          <div class="form-group">
            <label for="namas">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $u->nama ?>">
          </div>

          <div class="form-group">
            <label for="nama_jenis">Harga</label>
            <input type="text" name="harga" class="form-control" id="harga" value="<?php echo $u->harga ?>">
          </div>

          <div class="form-group">
            <label for="id_pekerjaan">Pilih Nama Pekerjaan</label>
            <select name="id_jenis" id=""class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
              <?php foreach ($jenisbmt as $key => $value) { ?>
                <option value="<?php echo $value->id ?>"><?php echo $value->nama_jenis ?></option>
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
          <a href="<?php echo site_url('bahan/hapus/'.$u->id); ?>">
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
