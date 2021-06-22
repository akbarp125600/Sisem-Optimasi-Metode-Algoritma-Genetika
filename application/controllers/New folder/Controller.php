<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	function __construct(){ 
		parent::__construct();	
	}

	public function init(){
		$n=count($this->input->post('pilihbmt'));
		$r=$this->input->post('jmlingin');

		//inisialisasipopulasi
		// Driver Code 
		$arr = $this->input->post('pilihbmt');
		//$data['krm']=$this->printCombination($arr, $n, $r);
		var_dump($this->printCombination($arr, $n, $r));

		if($n < 3 && $r < 2){
			$this->load->view('optimasibelum', $data);
		}else{
			$this->load->view('optimasi', $data);
		}
	}

	// Program to print all 
	// combination of size r 
	// in an array of size n 
	// The main function that 
	// prints all combinations 
	// of size r in arr[] of 
	// size n. This function 
	// mainly uses combinationUtil() 
	public function printCombination($arr, $n, $r){ 
	// A temporary array to 
	// store all combination 
	// one by one 
		$data = array(); 

	// Print all combination 
	// using temprary array 'data[]' 
		$this->combinationUtil($arr, $data, 0, $n - 1, 0, $r);
	}

	/* arr[] ---> Input Array 
	data[] ---> Temporary array to store current combination 
	start & end ---> Staring and Ending indexes in arr[] 
	index ---> Current index in data[] 
	r ---> Size of a combination to be printed */
	function combinationUtil($arr, $data, $start, $end, $index, $r){ 
	// Current combination is ready to be printed, print it 
		$bar = array();
		if ($index == $r){ 
			for ($j = 0; $j < $r; $j++){ 
				$bar[] = $data[$j];
				echo $data[$j];
			} 
			echo "\n";
			var_dump($bar);
			return $bar;
		}


	// replace index with all possible elements. The condition "end-i+1 >= r-index" makes sure that including one element at index will make a combination
	//with remaining elements at remaining positions 
		for ($i = $start; $i <= $end && $end - $i + 1 >= $r - $index; $i++){ 
			$data[$index] = $arr[$i]; 
			$this->combinationUtil($arr, $data, $i + 1, $end, $index + 1, $r); 
		} 
	} 
}
