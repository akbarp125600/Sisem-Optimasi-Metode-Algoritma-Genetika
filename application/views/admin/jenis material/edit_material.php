<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Validation Form</title>

  <?php $this->load->view('template/header.php') ?>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php $this->load->view('template/navbar.php') ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    

    <!-- Sidebar -->
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
            <h1>Tambah Data Bahan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Data</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php echo form_open_multipart("material/edit_material"); ?>
              <?php echo validation_errors(); ?>
                <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="id">ID</label>
                    <input type="number" name="id" class="form-control" id="id" value="<?php echo $material['id'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="nama_jenis">Nama</label>
                    <input type="text" name="nama_jenis" class="form-control" id="nama_jenis" value="<?php echo $material['nama_jenis'] ?>" placeholder="Material">
                  </div>
                  <!-- <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" name="umur" class="form-control" id="umur" value="<?php echo $mesin['umur'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="pk">Pk</label>
                    <input type="number" name="pk" class="form-control" id="pk" value="<?php echo $mesin['pk'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="em">Em</label>
                    <input type="number" name="em" class="form-control" id="em" value="<?php echo $mesin['em'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="met">Met</label>
                    <input type="number" name="met" class="form-control" id="met" value="<?php echo $mesin['met'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="lis">Lis</label>
                    <input type="number" name="lis" class="form-control" id="lis" value="<?php echo $mesin['lis'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="ca">Ca</label>
                    <input type="number" name="ca" class="form-control" id="ca" value="<?php echo $mesin['ca'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="p">P</label>
                    <input type="number" name="p" class="form-control" id="p" value="<?php echo $mesin['p'] ?>">
                  </div> -->
                  
                  <!-- <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit"  class="btn btn-primary">Submit</button>
                   <a href="<?php echo base_url('material'); ?>"class="btn btn-danger">Kembali</a>
                </div>
              </form>
              <?php echo form_close(); ?>
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
    <?php $this->load->view('template/footer.php'); ?>
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- <script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script> -->
</body>
</html>