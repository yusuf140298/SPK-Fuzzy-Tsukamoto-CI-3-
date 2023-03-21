<?php

function check_already_login(){
	$ci =& get_instance();
	$user_session =$ci->session->userdata('id');
	if ($user_session) {
		redirect('DashboardController');
	}
}
function check_not_login(){
	$ci =& get_instance();
	$user_session =$ci->session->userdata('id');
	if (!$user_session) {
		redirect('Auth');
	}
}
function check_admin(){
	$ci =& get_instance();
	$ci->load->library('fungsi');
	if ($ci->fungsi->user_login()->level != 1){
		redirect('DashboardController');

	}
}