<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProduksiController extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('Produksi_Model');
        
	}

	public function index()
	{
		$data['row'] = $this->Produksi_Model->getMaxId();
		$this->template->load('template','Component/produksiview', $data);
	}
	public function tampil()
	{
		$a = $this->Produksi_Model->get();
		$b = $this->Produksi_Model->getMax1();
		$c = $this->Produksi_Model->getMax2();
		$d = $this->Produksi_Model->getMax3();
		$data = array (
			'row' => $a,
			'tampil1' => $b,
			'tampil2' => $c,
			'tampil3' => $d
		);
		$this->template->load('template','Component/DataView',$data);
	}

	public function fuzzyfikasi(){
		$a = $this->Produksi_Model->get();
		$b = $this->Produksi_Model->getMax1();
		$c = $this->Produksi_Model->getMax2();
		$d = $this->Produksi_Model->getMax3();
		$data = array (
			'row' => $a,
			'tampil1' => $b,
			'tampil2' => $c,
			'tampil3' => $d
		);
		$this->template->load('template','Component/FuzzyfikasiView', $data);
	}
	public function Inferensi(){
		$a = $this->Produksi_Model->get();
		$b = $this->Produksi_Model->getMax1();
		$c = $this->Produksi_Model->getMax2();
		$d = $this->Produksi_Model->getMax3();
		$data = array (
			'row' => $a,
			'tampil1' => $b,
			'tampil2' => $c,
			'tampil3' => $d
		);
		$this->template->load('template','Component/InferensiView', $data);
	}
	public function Defuzzyfikasi(){
		$a = $this->Produksi_Model->get();
		$b = $this->Produksi_Model->getMax1();
		$c = $this->Produksi_Model->getMax2();
		$d = $this->Produksi_Model->getMax3();
		$data = array (
			'row' => $a,
			'tampil1' => $b,
			'tampil2' => $c,
			'tampil3' => $d
		);
		$this->template->load('template','Component/Defuzzyfikasi/Defuzzyfikasi', $data);
	}
	public function hitung(){
		$id = $this->input->post('kode');
		$tgl = $this->input->post('tgl_keluar');
		$post1 = $this->input->post('permintaan');
		$post2 = $this->input->post('persediaan');
		$tampil1 = $this->Produksi_Model->getMax1();
		$tampil2 = $this->Produksi_Model->getMapost2();
		$tampil3 = $this->Produksi_Model->getMax3();
		foreach ($tampil1->result() as $data) :
				$a11 = $data->minpermintaan;
				$a12 = $data->maxpermintaan;
				$i1 = ($a12 - $a11)/2;
				$a13 = $a11+$i1;
				$a14 = $a11+($i1/2);
				$a15 = $a13+($i1/2); 
				endforeach;
		foreach ($tampil2->result() as $data) :
				$a21 = $data->minpersediaan;
				$a22 = $data->maxpersediaan;
				$i2 = ($a22 - $a21)/2;
				$a23 = $a21+$i2;
				$a24 = $a21+($i2/2);
				$a25 = $a23+($i2/2); 
				endforeach;
		foreach ($tampil3->result() as $data) :
				$a31 = $data->minproduksi;
				$a32 = $data->maxproduksi;
				$i3 = ($a32 - $a31)/2;
				$a33 = $a31+$i3;
			$a34 = $a31+($i3/2);
				$a35 = $a33+($i3/2); 
				endforeach;
			$no=1;

			//  Varibael Permintaan

			
		//   Himpunan Sedikit
			if($post1<= $a11) {
				$h11 = 1;
			}
			else if($post1>= $$a13) {
				$h11 = 0;
			}
			else{
				$h11 = ($a13 - $post1)/($a13 - $a11);
			}
		//   Himpunan Sedang
			if($post1<= $a11 || $post1>= $a12) {
				$h12 = 0;
			}
			else if($post1>= $a11 && $post1<= $a13) {
				$h12 = ($post1-$a11)/($a13 - $a11);
			}
			else if($post1<= $a12 && $x1>= $a13) {
				$h12 = ($a12-$post1)/($a12 - $a13);
			}
		//   himpunan Banyak
			if($post1>=$a12){
				$h13 = 1;
			}
			else if($$post1<=$a13){
				$h13 = 0;
			}
			else{
				$h13 = ($post-$a13)/($a12-$a13);
			}


		//   Himpunan Sedikit
			if($post2<= $a21) {
				$h21 = 1;
			}
			else if($post2>= $a23) {
				$h21 = 0;
			}
			else{
				$h21 = ($a23 - $post2)/($a23 - $a21);
			}
			$y1 = $h21;
		//   Himpunan Sedang
			if($post2<= $a21 || $post2>= $a22) {
				$h22 = 0;
			}
			else if($post2>= $a21 && $post2<= $a23) {
				$h22 = ($post2-$a21)/($a23 - $a21);
			}
			else if($post2<= $a22 && $post2>= $a23) {
				$h22 = ($a22-$post2)/($a22 - $a23);
			}
			$y2 = $h22;
		//   himpunan Banyak
			if($post2>=$a22){
				$h23 = 1;
			}
			else if($post2<=$a23){
				$h23 = 0;
			}
			else{
				$h23 = ($post2-$a23)/($a22-$a23);
			} 

			if(isset($_POST['simpan'])){
			$this->Produksi_Model->addData($id,$tgl,$post1,$post2);
			$this->Produksi_Model->addFuzzyfikasi($id,$h11,$h12,$h13,$h21,$h22,$h23);
		}
			if($this->db->affected_rows()>0){
				$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
			}
				redirect('AkunController');
                      
	}
	
    

    
}