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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Data Jenis Pekerjaan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Jenis Pekerjaan</li>
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
                        <th>Nama</th>
                        <?php if($this->session->userdata('level') == "admin"){ ?>
                          <th>Action</th>
                        <?php } ?>
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
                          <?php if($this->session->userdata('level') == "admin"){ ?>
                            <td>

                              <button class="btn btn-outline-primary"><i class="fas fa-eye"></i><?php echo anchor('material/detail/'.$u->id,'Detail'); ?></button>

                              <button class="btn btn-outline-primary"><i class="fas fa-edit"></i><?php echo anchor('material/edit/'.$u->id,'Edit'); ?></button>

                              <!-- <button type="button" class="btn btn-outline-primary "  data-toggle="modal" data-target="#modal-edit <?php echo $u->id;?>"><i class="fas fa-trash-alt"> Edit</i></button> -->

                              <button type="button" class="btn btn-outline-danger "  data-toggle="modal" data-target="#modal-danger"><i class="fas fa-trash-alt"> Hapus</i></button>
                            </td>
                          <?php }?>
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

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

  <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Material</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php echo form_open_multipart("material/tambah_material"); ?>
        <?php echo validation_errors(); ?>
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="id">ID</label>
              <?php 
              $plus=1; 
              foreach ($idmax as $value) { ?>
                <input name="id" type="text" class="form-control" placeholder="Id" value="<?php echo $value['id']+$plus ?>" readonly>
              <?php } ?>  
            </div>
            <div class="form-group">
              <label for="nama_jenis">Nama</label>
              <input type="text" name="nama_jenis" class="form-control" id="nama_jenis" placeholder="nama jenis">
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
          <a href="<?php echo site_url('material/hapus_material/'.$u->id); ?>">
            <button type="button" class="btn btn-outline-light">
            Save</button>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
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