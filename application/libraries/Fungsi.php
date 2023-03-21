<?php

Class Fungsi{

    protected $ci;

    public function __construct(){
        $this->ci =& get_instance();
    }

    function user_login(){
        $this->ci->load->model('Akun_Model');
        $user_id = $this->ci->session->userdata('id');
        $user_data = $this->ci->Akun_Model->get($user_id)->row();
        return $user_data;
    }

}