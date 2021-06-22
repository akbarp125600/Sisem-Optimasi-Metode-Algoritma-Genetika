<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Optimasi extends CI_Controller {

	function __construct(){ 
		parent::__construct();
		$this->load->model('M_kebutuhan');
		$this->load->model('M_bmt');
		$this->load->model('M_optimasi');
		$this->load->model('M_history');
		$this->load->library('Combinations');	
	}


	public function rand(){

		/*allele 1*/
		$input1 = $this->M_optimasi->getdata1();
		$random_keys1 = array_rand($input1, 1);

		/*allele 2*/
		$input2 = $this->M_optimasi->getdata2();
		$random_keys2=array_rand($input2, 1);

		/*allele 3*/
		$input3 = $this->M_optimasi->getdata3();
		$random_keys3=array_rand($input3, 1);

		/*allele 4*/
		$input4 = $this->M_optimasi->getdata4();
		$random_keys4=array_rand($input4, 1);

		/*allele 5*/
		$input5 = $this->M_optimasi->getdata5();
		$random_keys5=array_rand($input5, 1);

		/*allele 6*/
		$input6 = $this->M_optimasi->getdata6();
		$random_keys6=array_rand($input6, 1);

		/*allele 7*/
		$input7 = $this->M_optimasi->getdata7();
		$random_keys7=array_rand($input7, 1);

		/*allele 8*/
		$input8 = $this->M_optimasi->getdata8();
		$random_keys8=array_rand($input8, 1);

		/*allele 9*/
		$input9 = $this->M_optimasi->getdata9();
		$random_keys9=array_rand($input9, 1);

		/*allele 10*/
		$input10 = $this->M_optimasi->getdata10();
		$random_keys10=array_rand($input10, 1);

		/*allele 11*/
		$input11 = $this->M_optimasi->getdata11();
		$random_keys11=array_rand($input11, 1);

		/*allele 12*/
		$input12 = $this->M_optimasi->getdata12();
		$random_keys12=array_rand($input12, 1);

		/*data array allele*/
		$dat = array(
			'a' => $input1[$random_keys1],
			'b' => $input2[$random_keys2],
			'c' => $input3[$random_keys3],
			'd' => $input4[$random_keys4],
			'e' => $input5[$random_keys5],
			'f' => $input6[$random_keys6],
			'g' => $input7[$random_keys7],
			'h' => $input8[$random_keys8],
			'i' => $input9[$random_keys9],
			'j' => $input10[$random_keys10],
			'k' => $input11[$random_keys11],
			'l' => $input12[$random_keys12]
		);
		$data['data'] = $dat;

		return $data;
	}

	public function index()
	{
		
		/*$data = $this->rand();*/
		$data['keb']=$this->M_kebutuhan->kebutuhan();
		$data['bmt']=$this->M_bmt->bmt();
		// $data = $this->rand();
		
		
		/*$data['bmt2']=$this->M_bmt->bmt2();*/

		/*$datab = $this->rand();*/
		/*echo "<pre/>";
		var_dump($datab, $data);
		die();*/
		$this->load->view('admin/optimasi/optimasi_input', $data);

	}
	public function echo_hasil(){
		$hasil[] = null;
		for ($i=0; $i <12 ; $i++) { 
			array_push($hasil,$this->rand());
		}
		return $hasil;
	}

	/*public function hasil_optimasi(){
		$this->load->view('admin/optimasi/hasil_optimasi');
	}*/

	public function optimasi(){
		global $hasila;
		$idusia=$this->input->post('usia');
		$data['umur']=$this->M_optimasi->getKebWhereId($idusia);

		$dat=$this->input->post('pilihbmt');
		$data['pilihan'] = $this->M_optimasi->getKanWhereId($dat);
		$data['jmlada']  = count(array_count_values($this->echo_hasil()));
		// echo "<pre/>";
		// var_dump($this->echo_hasil());
		// die();
		$data['jmlingin']=$this->input->post('jmlingin');
		$data['pcr']=$this->input->post('pcr');
		$data['pmt']=$this->input->post('pmt');

		//fungsikombinasi=jumlahkromosom
		$n=count(array_count_values($this->input->post('pilihbmt')));
		$nfak = $this->faktorial($n);
		$r=$this->input->post('jmlingin');
		$rfak = $this->faktorial($r);
		$d = $n-$r;
		$dfak = $this->faktorial($d);
		$jmlkrm = $this->kombinasi($nfak,$rfak,$dfak);
		$data['jmlkrm'] = $this->kombinasi($nfak,$rfak,$dfak);
		/*echo "<pre/>";
		var_dump($dfak);
		die();*/

		//inisialisasipopulasi
		$arr = $this->input->post('pilihbmt');
		foreach(new Combinations($arr, $r) as $comb){
			$bar[] = implode(" ", (array)$comb);
		/*echo "<pre/>";
		var_dump($r);
		die();*/
		}
		//crossover
		$pcr=$this->input->post('pcr');
		//mutasi
		$pmt=$this->input->post('pmt');

		if($n < 3 || $r < 2 || $pcr<0 || $pmt<0 || $pcr>=1 || $pmt>=1){
			$this->load->view('admin/optimasi/optimasigagal', $data);
		}else{
			//proses optimasi
			list($populasi, $popofffortebb) = $this->proses($bar, $idusia, $pcr, $jmlkrm, $pmt, $r, $arr);
			/*echo "<pre/>";
			var_dump($popofffortebb);
			die();*/
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
				$fal = $value;
			}
			$exkak = explode(" ", $kak);
			$ka = $exkak;
			$data['hasil'] = $this->M_optimasi->getKanWhereId($ka);
			$data['fitnesstertinggi'] = $fal;
			/*var_dump($data['hasil']);*/

			$data['populs'] = $populasi;
			$data['populsfortab'] = $popofffortebb;
			/*echo "<pre/>";
			var_dump($popofffortebb);
			var_dump($populasi);
			die();*/
			$data['idmaxhistori'] = $this->M_history->maxIdHistori();
			$data['idmaxhistoribmt'] = $this->M_history->maxIdHistoriBmt();
			$data['idmaxhistorirekom'] = $this->M_history->maxIdHistoriRekom();
			$data['jmlgnrs'] = sizeof($populasi);
			$this->load->view('admin/optimasi/hasil_optimasi',$data);
			/*echo "<pre/>";
			var_dump($data);
			die();*/
		}
	}

	public function faktorial($f){
		$hasil = 1;
		for ($i=1; $i <= $f; $i++) { 
			$hasil = $hasil*$i;
		}
		/*var_dump($hasil*$i);
		die();*/
		return $hasil;
	}

	public function kombinasi($fakn, $fakr,$fakd){
		/*var_dump($fakn/($fakr*$fakd));
		die();*/
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
		$fitness = (1/$w1);
		/*var_dump(($w1-$s1));
		die();*/
		return $fitness;
	}

	public function crossover($barfit, $offspring, $s1, $s2, $s3, $s4, $s5, $s6){
		arsort($barfit);//mengurutkan kromosom dg fitnessnya sesuai nilai fitness dri tertinggi
		foreach($barfit as $key => $value) {//mengambil key nya yakni kromosom nya
			$ba = $key;
			$bar[] = $ba;
			/*echo "<pre/>";
			var_dump($key);
			die();*/
		}
		//mengambil kromosom tertinggi sesuai banyak offspring
		// for ($i=0; $i < 2; $i++) {//awalnya krg dri offspring ku ganti krg dri 2 spy mudah disilangkan 
		for ($i=0; $i < $offspring; $i++) {
			$b = $bar[$i];
			$be[] = $b;
		}
		//diexplode jadiin array
		for ($j=0; $j < count($be); $j++) { 
			${"expl".$j} = explode(" ", $be[$j]); //jdi per array
			${"ev".$j} = end(${"expl".$j});//ambil nilai terakhir dri tiap array
			// array_pop(${"expl".$j});
			// $explo[] = explode(" ", $be[$j]);//ga dipakek dulu 02-03-2020
		}

		//mengsilangkan kromosom
		$noidx=0;
		for ($l=0; $l < count($be); $l++) { 
			array_pop(${"expl".$l});//mendelete nilai array terakhir

			if ($l==count($be)-1) {
				array_push(${"expl".$l}, $ev0);//memasukkan nilai end value (ev) ke expl yg posisi terakhir kosong abis dipop
			}else{
				array_push(${"expl".$l}, ${"ev".++$noidx});//knp ga digabung aja dg array atas karna harus menampung dulu semua ev, kalo gak gitu ngikuti index, ga terdefinisi ev 1 ketika i nya masih 0
			}
			$gabexpl[]=implode(" ", ${"expl".$l});
		}

		//mengsilangkan kromosom
		// array_push($expl0, $ev1);
		// array_push($expl1, $ev0);
		// $gabexpl[] = implode(" ", $expl0);
		// $gabexpl[] = implode(" ", $expl1);

		for ($k=0; $k < $offspring; $k++) { 
			$arr = ${"expl".$k};
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
		/*var_dump($gabexpl);
		die();*/
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
			$randkey=array_rand($arr, $genmut);//randkey berbentuk array, mengambil random index array sejumlah genmut
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
		$ray = $ex;
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
		//jadi 1 array, tadinya kromosom, crossover, dan mutasi sendiri2
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

	public function proses($bar, $idusia, $pcr, $jmlkrm, $pmt, $r, $arr){
		$keb=$this->M_optimasi->getKebWhereId($idusia);
		foreach ($keb as $value) {
			$s1 = $value->pk;
			$s2 = $value->em;
			$s3 = $value->met;
			$s4 = $value->lis;
			$s5 = $value->ca;
			$s6 = $value->p;
			/*var_dump($s1);
			die();*/
		}

		$jmlstop = 0;
		$stopp = 0;
		do{
			for($i=0; $i<sizeof($bar); $i++){
				$ex = explode(" ", $bar[$i]);
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
			/*echo "<pre/>";
			var_dump($bar);
			var_dump($fit);
			die();*/
			//variabel populasi menampung semua populasi dari setiap iterasi
			$pop = array_combine($bar, $fit);//kromosom awal serta fitnessnya
			$populasi[] = $pop;

			$barfit=array_combine($bar, $fit);//kromosom awal serta fitnessnya
			$popoff[] = $barfit;
			$popofffortab['kromosom'] = $barfit;

			//crossover
			$ank=$pcr*$jmlkrm;
			$anak = ceil($ank);
			// if ($pcr!=0 && $anak<=$jmlkrm && $anak%2==0) {
			if ($pcr!=0 && $anak<=$jmlkrm) {
				list($cr, $fitcr) = $this->crossover($barfit, $anak, $s1, $s2, $s3, $s4, $s5, $s6);
				$crfit=array_combine($cr, $fitcr);
				$popoff[] = $crfit;
				$popofffortab['crossover'] = $crfit;
				$offspring[] = $crfit;
			}

			//mutasi
			$gmut=$pmt*$r;
			$genmut = ceil($gmut);
			if ($pmt!=0 && $genmut<=$r) {
				list($mt, $fitmt) = $this->mutasi($barfit, $arr, $genmut, $s1, $s2, $s3, $s4, $s5, $s6);
				$mtfit=array_combine($mt, $fitmt);
				$popoff[] = $mtfit;
				$popofffortab['mutasi'] = $mtfit;
				$offspring[] = $mtfit;
			}
			

			$popofffortebb[] = $popofffortab;

			//bandingin nilai offspring dg pop awal
			foreach ($offspring as $key => $value) { 
				foreach ($value as $ke => $val) {
					if (in_array($val, $barfit)) {
						$stopp = $stopp + 1;
					}
				}
			}
			/*var_dump($jmlstop);
			var_dump($stopp);
			die();*/

			if ($stopp>100) {
				break;
			}

			//evaluasi
			$popnext = $this->evaluasi($popoff, $jmlkrm);
			$bar = array_replace($bar, $popnext);
			$fit = array();//mengkosongkan lagi fitnessnya karna sudah ganti generasi
			/*echo "<pre/>";*/
			/*var_dump($popofffortab);
			die();*/
		}while (++$jmlstop);

		return array($populasi, $popofffortebb);
		/*var_dump($populasi);
		die();*/
	}
}
