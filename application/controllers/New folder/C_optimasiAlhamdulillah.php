<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_optimasi extends CI_Controller {

	function __construct(){ 
		parent::__construct();
		$this->load->model('M_kebutuhan');
		$this->load->model('M_bmt');
		$this->load->model('M_optimasi');
		$this->load->library('Combinations');	
	}

	public function index()
	{
		$data['keb']=$this->M_kebutuhan->kebutuhan();
		$data['bmt']=$this->M_bmt->bmt();
		$this->load->view('tentukanbmt', $data);
	}

	public function optimasi(){
		$idusia=$this->input->post('usia');
		$data['umur']=$this->M_optimasi->getKebWhereId($idusia);

		$dat['pil']=$this->input->post('pilihbmt');
		$data['pilihan']=$this->M_optimasi->getKanWhereId($dat);

		$data['jmlada']=count($this->input->post('pilihbmt'));
		$data['jmlingin']=$this->input->post('jmlingin');
		$data['pcr']=$this->input->post('pcr');
		$data['pmt']=$this->input->post('pmt');

		//fungsikombinasi=jumlahkromosom
		$n=count($this->input->post('pilihbmt'));
		$nfak = $this->faktorial($n);
		$r=$this->input->post('jmlingin');
		$rfak = $this->faktorial($r);
		$d = $n-$r;
		$dfak = $this->faktorial($d);
		$jmlkrm = $this->kombinasi($nfak,$rfak,$dfak);
		$data['jmlkrm'] = $this->kombinasi($nfak,$rfak,$dfak);

		//array tampung semua
		$populasi = array();
		//array tampung populasi awal+offspring dri cr dan mt
		$popoff = array();
		//array tampung offspring dri cr dan mt
		$offspring = array();

		//inisialisasipopulasi
		$keb=$this->M_optimasi->getKebWhereId($idusia);
		foreach ($keb as $value) {
			$s1 = $value->pk;
			$s2 = $value->em;
			$s3 = $value->met;
			$s4 = $value->lis;
			$s5 = $value->ca;
			$s6 = $value->p;
		}

		$arr = $this->input->post('pilihbmt');
		foreach(new Combinations($arr, $r) as $comb){
			$bar[] = implode(" ", $comb);
		}

		$jmlstop = 0;
		$stopp = 0;
		do{
			for($i=0; $i<sizeof($bar); $i++){
				$ex['id'] = explode(" ", $bar[$i]);
				$dtid = $this->M_optimasi->getKanWhereId($ex);
				$rpk = $this->pk($dtid);
				$rem = $this->em($dtid);
				$rmet = $this->met($dtid);
				$rlis = $this->lis($dtid);
				$rca = $this->ca($dtid);
				$rpe = $this->pe($dtid);
				$fitness = $this->fitness($rpk, $rem, $rmet, $rlis, $rca, $rpe, $s1, $s2, $s3, $s4, $s5, $s6);
				$fit[] = $fitness;
			}
			// echo "<pre/>";
			// var_dump($bar);
			// var_dump($fit);
			//variabel populasi menampung semua populasi dari setiap iterasi
			$pop = array_combine($bar, $fit);//kromosom awal serta fitnessnya
			$populasi[] = $pop;

			//crossover
			$barfit=array_combine($bar, $fit);//kromosom awal serta fitnessnya
			$popoff[] = $barfit;
			$pcr=$this->input->post('pcr');
			if ($pcr!=0) {
				$ank=$pcr*$jmlkrm;
				$anak = ceil($ank);
				list($cr, $fitcr) = $this->crossover($barfit, $anak, $s1, $s2, $s3, $s4, $s5, $s6);
			}
			$crfit=array_combine($cr, $fitcr);
			$popoff[] = $crfit;
			$offspring[] = $crfit;

			//mutasi
			$pmt=$this->input->post('pmt');
			if ($pmt!=0) {
				$gmut=$pmt*$r;
				$genmut = ceil($gmut);
				list($mt, $fitmt) = $this->mutasi($barfit, $arr, $genmut, $s1, $s2, $s3, $s4, $s5, $s6);
			}
			$mtfit=array_combine($mt, $fitmt);
			$popoff[] = $mtfit;
			$offspring[] = $mtfit;

			//bandingin nilai offspring dg pop awal
			foreach ($offspring as $key => $value) { 
				foreach ($value as $ke => $val) {
					if (in_array($val, $barfit)) {
						$stopp = $stopp + 1;
					}
				}
			}
			// var_dump($jmlstop);
			// var_dump($stopp);

			if ($stopp>5) {
				break;
			}

			//evaluasi
			$popnext = $this->evaluasi($popoff, $jmlkrm);
			$bar = array_replace($bar, $popnext);
			$fit = array();
		}while (++$jmlstop);
		//end loop

		//untuk menampilkan hasil
		foreach($populasi as $key => $value) {
			foreach ($value as $ke => $val) {
				$ky[] = $ke;
				$vl[] = $val;
			}
		}
		$kyvl=array_combine($ky, $vl);
		asort($kyvl);
		foreach($kyvl as $key => $value) {
			$kak = $key;//keprint yg terakhir yaitu yg tertinggi fitnessnya
			$f = $value;
		}
		$exkak = explode(" ", $kak);
		$ka['id'] = $exkak;
		$data['hasil'] = $this->M_optimasi->getKanWhereId($ka);

		$data['populs'] = $populasi;
		$data['totkomgen'] = sizeof($kyvl);
		if($n < 3 || $r < 2){
			$this->load->view('optimasibelum', $data);
		}else{
			$this->load->view('optimasi', $data);
		}
	}

	public function hasil()
	{
		$this->load->view('hasiloptimasi');
	}

	public function faktorial($f){
		$hasil = 1;
		for ($i=1; $i <= $f; $i++) { 
			$hasil = $hasil*$i;
		}
		return $hasil;
	}

	public function kombinasi($fakn, $fakr,$fakd){
		return $fakn/($fakr*$fakd);
	}

	public function pk($arr){
		foreach ($arr as $value) {
			$pk[] = $value['pk'];
		}
		return array_sum($pk)/count($pk);
	}

	public function em($arr){
		foreach ($arr as $value) {
			$em[] = $value['em'];
		}
		return array_sum($em)/count($em);
	}

	public function met($arr){
		foreach ($arr as $value) {
			$met[] = $value['met'];
		}
		return array_sum($met)/count($met);
	}

	public function lis($arr){
		foreach ($arr as $value) {
			$lis[] = $value['lis'];
		}
		return array_sum($lis)/count($lis);
	}

	public function ca($arr){
		foreach ($arr as $value) {
			$ca[] = $value['ca'];
		}
		return array_sum($ca)/count($ca);
	}

	public function pe($arr){
		foreach ($arr as $value) {
			$pe[] = $value['p'];
		}
		return array_sum($pe)/count($pe);
	}

	public function fitness($w1, $w2, $w3, $w4, $w5, $w6, $s1, $s2, $s3, $s4, $s5, $s6){
		$fitness = ((($w1-$s1)/$w1)+(($w2-$s2)/$w2)+(($w3-$s3)/$w3)+(($w4-$s4)/$w4)+(($w5-$s5)/$w5)+(($w6-$s6)/$w6));
		return $fitness;
	}

	public function crossover($barfit, $offspring, $s1, $s2, $s3, $s4, $s5, $s6){
		arsort($barfit);
		foreach($barfit as $key => $value) {
			$ba = $key;
			$bar[] = $ba;
		}
		//mengambil kromosom tertinggi sesuai banyak offspring
		for ($i=0; $i < 2; $i++) {//awalnya krg dri offspring ku ganti krg dri 2 spy mudah disilangkan 
			$b = $bar[$i];
			$be[] = $b;
		}
		//diexplode jadiin array
		for ($j=0; $j < count($be); $j++) { 
			${"expl".$j} = explode(" ", $be[$j]); //jdi per array
			${"ev".$j} = end(${"expl".$j});
			array_pop(${"expl".$j});
			// $arr[] = array_push(${"expl".$j}, ${"ev".$j});
			$explo[] = explode(" ", $be[$j]);//ga dipakek dulu 02-03-2020
		}
		//mengsilangkan kromosom
		array_push($expl0, $ev1);
		array_push($expl1, $ev0);
		$gabexpl[] = implode(" ", $expl0);
		$gabexpl[] = implode(" ", $expl1);
		for ($k=0; $k < 2; $k++) { 
			$arr['id'] = ${"expl".$k};
			$dad = $this->M_optimasi->getKanWhereId($arr);
			$rpk = $this->pk($dad);
			$rem = $this->em($dad);
			$rmet = $this->met($dad);
			$rlis = $this->lis($dad);
			$rca = $this->ca($dad);
			$rpe = $this->pe($dad);
			$fitness = $this->fitness($rpk, $rem, $rmet, $rlis, $rca, $rpe, $s1, $s2, $s3, $s4, $s5, $s6);
			$fit[] = $fitness;
		}
		return array($gabexpl, $fit);
	}

	public function mutasi($barfit, $arr, $genmut, $s1, $s2, $s3, $s4, $s5, $s6){
		arsort($barfit);
		foreach($barfit as $key => $value) {
			$ba = $key;//keprint yg terakhir yaitu yg terendah fitnessnya
		}
		$ex = explode(" ", $ba);
		//mendapat acakan sejumlah gen yg termutasi
		if ($genmut<=sizeof($arr) && $genmut>1) {//jika jml gen yg dimutasi krg dri atau sama dg ukuran array yg ada
			$randkey=array_rand($arr, $genmut);
			// echo "<pre/>";
			// var_dump($arr);
			// var_dump($randkey);
			for ($o=0; $o < $genmut; $o++) { 
				$neoval = $arr[$randkey[$o]];
				array_pop($ex);
				array_push($ex, $neoval);
			}
		}else{
			$genmut=1;
			$rdkey=array_rand($arr, $genmut);
			$nwval = $arr[$rdkey];
			array_pop($ex);
			array_push($ex, $nwval);
		}
		$krmut[] = implode(" ", $ex);
		//fitnes
		$ray['id'] = $ex;
		$dtaid = $this->M_optimasi->getKanWhereId($ray);
		$rpk = $this->pk($dtaid);
		$rem = $this->em($dtaid);
		$rmet = $this->met($dtaid);
		$rlis = $this->lis($dtaid);
		$rca = $this->ca($dtaid);
		$rpe = $this->pe($dtaid);
		$fitness[] = $this->fitness($rpk, $rem, $rmet, $rlis, $rca, $rpe, $s1, $s2, $s3, $s4, $s5, $s6);
		return array($krmut, $fitness);
	}

	public function evaluasi($onepop, $jmlkrm){
		foreach($onepop as $key => $value) {
			foreach ($value as $ke => $val) {
				$krm[] = $ke;
				$krmval[] = $val;
			}
		}
		$kv=array_combine($krm, $krmval);
		arsort($kv);
		foreach ($kv as $key => $value) {
			$krms[] = $key;
		}
		//mengambil kromosom tertinggi sesuai banyak jmlkrm
		for ($i=0; $i < $jmlkrm; $i++) { 
			$k = $krms[$i];
			$krmsm[] = $k;
		}
		return $krmsm;
	}
}
