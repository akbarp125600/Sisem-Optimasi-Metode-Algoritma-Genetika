<?php $this->load->view('template/header'); ?>
<!-- Start Left menu area -->
<?php $this->load->view('template/navbar'); ?>
<!-- Mobile Menu end -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <a href="<?php echo base_url('optimasi'); ?>">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        <i class="fa fa-arrow-left-square-o" aria-hidden="true"></i>Back
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <!-- <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Basic Element</span>
                                            </li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Form Start -->
        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline8-list mt-b-30">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <!-- <h1>Basic Login Form</h1> -->
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="basic-login-inner">
                                                        <h3>BMT yang Dipilih</h3>
                                                        <p>(Apabila ingin merubah silahkan klik tombol kembali untuk menginputkan ulang)</p>
                                                        <form action="#">
                                                            <div class="form-group-inner">
                                                                <label>Usia itik yang dipilih</label>
                                                                <?php foreach ($umur as $value) { ?>
                                                                <input name="umur" type="text" class="form-control" value="<?php echo $value->nama ?>" readonly>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="form-group res-mg-t-15">
                                                                <label>Pakan yang dipilih</label>
                                                                <textarea name="bmtterpilih" disabled><?php 
                                                                $no=1; 
                                                                foreach ($pilihan as $value) { 
                                                                    echo $value['id'].". ".$value['nama']."\n"; 
                                                                    $no++; 
                                                                } ?></textarea>
                                                            </div>
                                                            <?php if($jmlada < 3){ ?>
                                                            <div class="form-group-inner input-with-error">
                                                                <label>Jumlah pakan yang dipilih (disarankan lebih dari 2)</label>
                                                                <div class="form-select-list">
                                                                    <input name="jmladaterpilih" type="text" class="form-control" value="<?php echo $jmlada ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <?php }else{ ?>
                                                            <div class="form-group-inner">
                                                                <label>Jumlah pakan yang dipilih</label>
                                                                <input name="jmladaterpilih" type="text" class="form-control" value="<?php echo $jmlada ?>" disabled>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if($jmlingin < 2){ ?>
                                                            <div class="form-group-inner input-with-error">
                                                                <label>Jumlah komposisi bahan yang diinginkan (disarankan lebih dari 1)</label>
                                                                <div class="form-select-list">
                                                                    <input name="jmlinginterpilih" type="text" class="form-control" value="<?php echo $jmlingin ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <?php }else{ ?>
                                                            <div class="form-group-inner">
                                                                <label>Jumlah komposisi bahan yang diinginkan</label>
                                                                <input name="jmliinginterpilih" type="text" class="form-control" value="<?php echo $jmlingin ?>" readonly>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if($pcr < 0 || $pcr >= 1){ ?>
                                                            <div class="form-group-inner input-with-error">
                                                                <label>Probabilitas crossover (disarankan bernilai lebih dari sama dengan 0 atau kurang dari 1)</label>
                                                                <div class="form-select-list">
                                                                    <input name="pcr" type="text" class="form-control" value="<?php echo $pcr ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <?php }else{ ?>
                                                            <div class="form-group-inner">
                                                                <label>Probabilitas crossover</label>
                                                                <input name="pcr" type="text" class="form-control" value="<?php echo $pcr ?>" readonly>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if($pmt < 0 || $pmt >= 1){ ?>
                                                            <div class="form-group-inner input-with-error">
                                                                <label>Probabilitas mutasi (disarankan bernilai lebih dari sama dengan 0 atau kurang dari 1)</label>
                                                                <div class="form-select-list">
                                                                    <input name="pmt" type="text" class="form-control" value="<?php echo $pmt ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <?php }else{ ?>
                                                            <div class="form-group-inner">
                                                                <label>Probabilitas cmutasi</label>
                                                                <input name="pmt" type="text" class="form-control" value="<?php echo $pmt ?>" readonly>
                                                            </div>
                                                            <?php } ?>
                                                            <div class="login-btn-inner">
                                                                <!-- <if($jmlada < 3 && $jmlingin < 2){ ?>
                                                                <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit" disabled>Next</button>
                                                                <}else{ ?>
                                                                <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit">Next</button>
                                                                <} ?> -->
                                                                <!-- <button type="submit" class="btn btn-primary waves-effect waves-light">Next</button> -->
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Form End-->
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('template/footer'); ?>