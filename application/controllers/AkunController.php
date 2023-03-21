<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AkunController extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();
        $this->load->model('Akun_Model');
        
	}

	public function index()
	{
        $data ['row'] = $this->Akun_Model->get();
		$this->template->load('template','Component/akunview', $data);
	}
    public function add(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['tambah'])){
			$this->Akun_Model->add($post);
		}
		if($this->db->affected_rows()>0){
				$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
			}
				redirect('AkunController');

	}
    public function del($id){
		$this->Akun_Model->del($id);
		if($this->db->affected_rows()> 0){
				$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
			}
				redirect('AkunController');
    }
    public function edit(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['edit'])){
			$this->Akun_Model->edit($post);
		}
		if($this->db->affected_rows()>0){
				$this->session->set_flashdata('success', 'Data Berhasil Berubah');
			}
				redirect('AkunController');

	}
}