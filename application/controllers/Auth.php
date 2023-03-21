<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function index()
	{
		check_already_login();
        $this->load->view('loginView');
        
	}
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('Akun_Model');
			$query =$this->Akun_Model->login($post);
			?>
			<script src="<?=base_url()?>assets/dist/sweetalert/sweetalert2.min.js"></script>
			<link rel="stylesheet" href="<?=base_url()?>assets/dist/sweetalert/sweetalert2.min.css">
			<style>
			body{
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-size: 1.124em;
				font-weight: normal;
			}
			</style>
			<style>
				.swal2-popup{
					font-size: 1.6rem !important;
				}
				</style>
			<body></body>
			<?php
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
						'id' => $row->id,
						'level' => $row->level,
					);
				$this->session->set_userdata($params);
				?>
				<script>
					Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Login Berhasil!'
					}).then(result =>{
						window.location='<?=site_url('DashboardController')?>';
					})
				</script>
				<?php
			}
            else{
				?>
				<script>
					Swal.fire({
					icon: 'error',
					title: 'Gagal',
					text: 'username / Kata Sandi Salah!'
					}).then(result =>{
						window.location='<?=site_url('Auth')?>';
					})
				</script>
				<?php
			}
        }
    }
    public function logout()
	{
			$params = array('id' , 'level');
			$this->session->unset_userdata($params);
			redirect('Auth');

	}
   
}
