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
            <h1>Tambah Data Optimasi</h1>
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
                <h3 class="card-title">Optimasi Data</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <?php echo form_open_multipart("Optimasi/optimasi"); ?>
                <?php echo validation_errors(); ?>
                <form>
                <div class="card-body">

                  <div class="form-group">
                  <label>Pilih Jenis Mesin</label>
                  <select class="select2 chosen-selectpp"  data-placeholder="Pilih Jenis Mesin..." style="width: 100%;" name="usia">
                    <?php 
                    foreach ($keb as $value) 
                      { ?>
                     <option value="<?php echo $value->id ?>"><?php echo $value->nama ?> (<?php echo $value->umur ?>Hari)</option>
                        <?php } ?>
                  </select>
                  </div>

                <!--   <div class="form-group">
                  <label>Masukkan Kegiatan 1</label>
                  <select  class="select2" multiple="multiple" tabindex="-1" data-placeholder="Masukkan Materila (Bahan)..." style="width: 100%;" name="pilihbmt[]">
                      <?php 
                      foreach ($data as $value) 
                        { ?>
                     <input type="text"  value="<?php echo $value['a'] ?>"><?php echo $value['a'] ?>
                        <?php } ?>
                  </select>
                  </div> -->

                 <!-- <div class="form-group">
                  <label>Masukkan Kegiatan 2</label>
                  <select  class="text-primary" multiple="multiple" tabindex="-1" data-placeholder="Masukkan Materila (Bahan)..." style="width: 100%;" name="pilihbmt[]">
                      <?php 
                      foreach ($data as $value) 
                        { ?>
                     <option type="text"  value="<?php $value['nama']; ?>"><?php $value->nama ?></option>
                        <?php } ?>
                  </select>
                  </div> -->

                 <!--  <div class="form-group">
                  <label>Masukkan Kegiatan 1</label>
                  <select  class="select2" multiple="multiple" tabindex="-1" data-placeholder="Masukkan Materila (Bahan)..." style="width: 100%;" name="pilihbmt[]">
                      <?php 
                      foreach ($bmt as $value) 
                        { ?>
                     <option type="hidden"  value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                        <?php } ?>
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Masukkan Kegiatan 2</label>
                  <select  class="select2" multiple="multiple" tabindex="-1" data-placeholder="Masukkan Materila (Bahan)..." style="width: 100%;" name="pilihbmt[]">
                      <?php 
                      foreach ($bmt2 as $value) 
                        { ?>
                     <option type="hidden"  value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                        <?php } ?>
                  </select>
                  </div> -->
                  <!-- <div class="form-group"> -->
                   <!--  <label>Tentukan Sub Jenis Pkerjaan</label> -->
                    <!-- <?php foreach($data as $d) : ?>
                    <input class="text-primary" multiple="multiple" type="text" name="pilihbmt[]" class="form-control" value="<?= $d['id']; ?>">
                  <?php endforeach; ?>
                  </div> -->
                  
                  <!-- <div class="form-group">
                    <label>Tentukan</label>
                    <?php foreach($data as $d) : ?>
                    <input class="text-primary" multiple="multiple" type="text" name="pilihbmt[]" class="form-control" value="<?= $d['id']; ?>" >
                  <?php endforeach; ?>
                  </div> -->

                  <!-- <div class="form-group">
                    <label>Tentukan</label>
                    <?php foreach($data as $d) : ?>
                    <input class="text-primary" type="text" name="pilihbmt[]" class="form-control" value="<?= $d['id']; ?>" >
                  <?php endforeach; ?>
                  </div> -->

                  <div class="form-group">
                   <!--  <label>Tentukan jumlah komposisi bahan yang diinginkan</label> -->
                    <input class="text-primary" type="hidden" min="1" max="100" name="jmlingin" class="form-control" value="12" >
                  </div>

                  <div class="form-group">
                      
                          <label>Probabilitas crossover</label>
                          <input class="touchspin2 text-primary" type="text" value="" name="pcr">
                      
                  </div>

                  <div class="form-group">
                      
                          <label>Probabilitas mutasi</label>
                          <input class="touchspin2 text-primary " type="text" value="" name="pmt">
                      
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-outline-danger "  data-toggle="modal" data-target="#modal-proses"><i class="fas fa-trash-alt"> Proses</i></button> -->
                  <a href="<?php echo site_url('optimasi/optimasi'); ?>">
                <button type="submit" class="btn btn-outline-primary">
                Proses</button></a>
                   <!-- <a href="<?php echo base_url('material'); ?>"class="btn btn-danger">Kembali</a> -->
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
  
  </aside>
  <!-- /.control-sidebar -->
</div>
<div class="modal fade" id="modal-proses">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Optimasi Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open_multipart("optimasi/optimasi"); ?>
            <?php echo validation_errors(); ?>
            <div class="modal-body">
              <p>Apakah Data Yang di Inputkan Sudah Benar ?,Jika Sudah Benar Silahkan Klik Proses&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
              <a href="<?php echo site_url('optimasi/optimasi'); ?>">
              <button type="submit" class="btn btn-outline-light toastrDefaultSuccess">
              Proses</button></a>
            </div>
              <?php echo form_close(); ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

  <?php $this->load->view('template/footer.php'); ?>
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
 <script>
  $(document).ready(function() {
  $('#titulo').html("Bootstrap TouchSpin");

  $("input[name='touchspin']").TouchSpin({
    min: -1000,
    max: 1000,
    step: 50,
    maxboostedstep: 10000000,
    prefix: '$',
    buttondown_class: "btn btn-link",
    buttonup_class: "btn btn-link",
    initval: 200,
  });
});
  </script>
</body>
</html>
