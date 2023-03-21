<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_Model extends CI_Model {

    public function login($post)
	{
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->where('username', $post['username']);
		$this->db->where('password', sha1($post['password']));
		$query =  $this->db->get();
		return $query;
	}
	public function get($id = null){
        $this->db->from('akun');
        if($id!=null){
            $this->db->where('id',$id);
        }
        $query = $this->db->get();
        return $query;
	 }
	 public function del($id){
		 $this->db->where('id', $id);
		$this->db->delete('akun');
	 }
	 public function add($post){
		
		$params = [
            'username' => $post['username'],
            'password' => sha1($post['password']),
            'level' => $post['level']
        ];
		$this ->db->insert('akun', $params);
	
	 }
	 public function edit($post){
		 $params = [
            'username' => $post['username'],
            'password' => sha1($post['password']),
            'level' => $post['level']
        ];
		$this ->db->where('id', $post['id']);
        $this->db->update('akun',$params);
	 }

}