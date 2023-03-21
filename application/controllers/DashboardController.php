<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('Produksi_Model');
	}

	public function index()

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
		$this->template->load('template','Component/dashboardview',$data);
	}
}