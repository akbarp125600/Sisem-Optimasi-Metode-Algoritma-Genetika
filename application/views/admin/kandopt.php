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
             <a href="<?php echo base_url('optimasi'); ?>">
              <button type="submit" class="btn btn-primary waves-effect waves-light">
                <i class="fa fa-arrow-left-square-o" aria-hidden="true"></i>Optimasi
              </button></a>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <ul class="breadcome-menu">
                 <?php if(isset($tohistory)){ ?>
                   <?php echo form_open_multipart("History/add"); ?>
                   <?php echo validation_errors(); ?>
                   <form action="#">
                     <?php for ($r=0; $r < sizeof($tohistory['id_rekom']) ; $r++) { ?>
                       <input name="id_rekom[]" type="hidden" class="form-control" value="<?php echo $tohistory['id_rekom'][$r] ?>">
                     <?php } ?>
                     <input name="id_usia" type="hidden" class="form-control" value="<?php echo $tohistory['id_usia'] ?>">
                     <?php for ($z=0; $z < sizeof($tohistory['id_bmt']) ; $z++) { ?>
                       <input name="id_bmt[]" type="hidden" class="form-control" value="<?php echo $tohistory['id_bmt'][$z] ?>">
                     <?php } ?>
                     <input name="jml_komp" type="hidden" class="form-control" value="<?php echo $tohistory['jml_komp'] ?>">
                     <input name="popsize" type="hidden" class="form-control" value="<?php echo $tohistory['popsize'] ?>">
                     <input name="generasi" type="hidden" class="form-control" value="<?php echo $tohistory['generasi'] ?>">
                     <input name="cr" type="hidden" class="form-control" value="<?php echo $tohistory['cr'] ?>">
                     <input name="mr" type="hidden" class="form-control" value="<?php echo $tohistory['mr'] ?>">
                     <input name="fitness" type="hidden" class="form-control" value="<?php echo $tohistory['fitness'] ?>">
                     <?php $plus=1; foreach ($tohistory['idmaxhistori'] as $value) { ?>
                       <input name="id" type="hidden" class="form-control" value="<?php echo $value['id']+$plus ?>">
                     <?php } foreach ($tohistory['idmaxhistoribmt'] as $valu) { ?>
                       <input name="iddetilbmt" type="hidden" class="form-control" value="<?php echo $valu['id']+$plus ?>">
                     <?php } foreach ($tohistory['idmaxhistorirekom'] as $vale) { ?>
                       <input name="iddetilrekom" type="hidden" class="form-control" value="<?php echo $vale['id']+$plus ?>">
                     <?php } ?>
                     <button type="submit" class="btn btn-primary waves-effect waves-light">
                       <i class="fa fa-arrow-left-square-o" aria-hidden="true"></i>Save to History
                     </button>
                   </form>
                   <?php echo form_close(); ?>
                 <?php } ?>
               </ul>
             </ol>
           </div>
         </div>
       </div><!-- /.container-fluid -->
     </section>


     <section class="content">
        <div class="container-fluid">

     <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Jenis Mesin</h3> 
      </div>
      <!-- /.card-header -->

      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Jenis</th>
              <th>Waktu (minggu)</th>
              <!-- <th>Pk </th>
              <th>En</th>
              <th>Met</th>
              <th>Lis</th>
              <th>Ca </th>
              <th>P </th> -->
              <th>Biaya </th>
              <th>Waktu (Hari) </th>

            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach ($uspil as $value) { ?>
              <tr>
                <td><?php echo $value->nama ?></td>
                <td><?php echo $value->umur ?></td>
                <!-- <td><?php echo $value->pk ?></td>
                <td><?php echo $value->em ?></td>
                <td><?php echo $value->met ?></td>
                <td><?php echo $value->lis ?></td>
                <td><?php echo $value->ca ?></td>
                <td><?php echo $value->p ?></td> -->
                <td>Rp. <?php echo number_format($value->harga, 0, ",", ".");?></td>
                <td><?php echo $value->waktu ?></td>
              </tr>
              <?php $no++; } ?>
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </section>


<section class="content">
        <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Sub Jenis Pekerjaan Yang Terpilih</h3> 
        </div>
        <!-- /.card-header -->

        <div class="card-body">
          <table id="example3" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Sub Jenis</th>
                <!-- <th>P</th> -->
                <!-- <th>En</th>
                <th>Met</th> -->
                <!-- <th>Lis</th> -->
                <!-- <th>Ca</th> -->
                <!-- <th>P</th> -->
                <th>Harga</th>
                <th>Waktu(Hari)</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($kandopt as $value) { ?>
                <tr>
                  <td><?php echo $value['id'] ?></td>
                  <td><?php echo $value['nama'] ?></td>
                  <!-- <td><?php echo $value['pk'] ?></td>
                  <td><?php echo $value['em'] ?></td>
                  <td><?php echo $value['met'] ?></td>
                  <td><?php echo $value['lis'] ?></td>
                  <td><?php echo $value['ca'] ?></td> -->
                  <!-- <td><?php echo $value['p'] ?></td> -->
                  <td>Rp. <?php echo number_format($value['harga'], 0, ",", ".");?></td>
                  <td><?php echo $value['waktu'] ?></td>
                </tr>
              <?php } ?>
              <tr>
               <td colspan="2">Total</td>
               <?php foreach($totkandopt as $valu){ ?>
                 <td><?php echo $valu ?></td>
               <?php } ?>
             </tr>

           </tbody>

         </table>
       </div>
       <!-- /.card-body -->
     </div>
     <!-- /.card -->
   </div>
 </section>

    <section class="content">
        <div class="container-fluid">
     <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Perbandingan</h3>
      </div>
      <!-- /.card-header -->

      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Kebutuhan</th>
              <th>Total</th>
              <th>+/-</th>
              <th>Conclusion</th>
            </tr>
          </thead>
          <tbody>
            <?php $sisa=0; $idx=0; $zat=array( "Total Biaya", "Total Hari"); 
            foreach ($comparison as $kekeyi => $valir) { $sisa=$valir-$kekeyi; $arrsisa[]=$sisa; ?>
              <tr>
                <td><?php echo $zat[$idx] ?></td>
                <td><?php echo $kekeyi ?></td>
                <td><?php echo $valir ?></td>
                <td><?php echo $sisa ?></td>
                <?php if($valir>$kekeyi){ ?>
                  <td>
                    <button type="button" class="btn btn-custon-rounded-three btn-success btn-xs"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Terpenuhi</button>
                  </td>
                <?php }else{ ?>
                  <td>
                    <button type="button" class="btn btn-custon-rounded-three btn-danger btn-xs"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Belum</button>
                  </td>
                <?php } ?>
              </tr>
              <?php $idx++; } ?>
            </tbody>
          </table>
          <?php if(min($arrsisa) < 0){ ?>
            <div class="card-footer">
              Total :
                <?php $idx=0; $zat = array( "Total Biaya", "Total Hari"); 
                foreach ($comparison as $kekeyi => $valir){ if($valir<$kekeyi){ ?>
                  <li><?php echo $zat[$idx] ?> : (<?php echo $kekeyi ?>)</li>
                <?php } $idx++; } ?>
              </div>
            <?php } ?>
          </div>              
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </section>
<!-- <td>Rp. <?php echo number_format($u->harga, 0, ",", ".");?></td> -->
        <!-- <?php if(min($arrsisa) < 0){ ?>
          <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Kandungan Nutrisi pada Bahan Makan Ternak</h3>
            </div>
           

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Protein Kasar (%)</th>
                    <th>Energi (kkal EM/kg)</th>
                    <th>Metionin (%)</th>
                    <th>Lisin (%)</th>
                    <th>Ca (%)</th>
                    <th>P (%)</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($bmt as $value) { ?>
                    <tr>
                      <td><?php echo $value->id ?></td>
                      <td><?php echo $value->nama ?></td>
                      <td><?php echo $value->pk ?></td>
                      <td><?php echo $value->em ?></td>
                      <td><?php echo $value->met ?></td>
                      <td><?php echo $value->lis ?></td>
                      <td><?php echo $value->ca ?></td>
                      <td><?php echo $value->p ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
           
          </div>
          
          <?php } ?> -->


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
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
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
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Data Berhasil Di Hapus')
    });
  });
</script>
</body>
</html>