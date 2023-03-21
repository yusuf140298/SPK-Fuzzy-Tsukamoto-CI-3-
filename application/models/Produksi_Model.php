<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi_Model extends CI_Model {

	public function get($id = null){
        $this->db->from('data_input_produksi');
        if($id!=null){
            $this->db->where('id_ip',$id);
        }
        $query = $this->db->get();
        return $query;
	 }
     public function getMax1()
     {
         $this->db->select_max('permintaan','maxpermintaan');
         $this->db->select_min('permintaan','minpermintaan');
         $query = $this->db->get('data_input_produksi');
         return $query;
     }
     public function getMax2()
     {
         $this->db->select_max('persediaan','maxpersediaan');
         $this->db->select_min('persediaan','minpersediaan');
         $query = $this->db->get('data_input_produksi');
         return $query;
     }
     public function getMax3()
     {
         $this->db->select_max('produksi','maxproduksi');
         $this->db->select_min('produksi','minproduksi');
         $query = $this->db->get('data_input_produksi');
         return $query;
     }
     public function getMaxId(){
         $this->db->select_max('id_ip');
         $query = $this->db->get('data_input_produksi');
         return $query;
     }
    //  public function getFuzzyfikasi($id = null){
    //     $this->db->from('data_fuzzyfikasi');
    //     $this->db->join('data_input_produksi', 'data_input_produksi.id_ip = data_fuzzyfikasi.id_ip');
    //     if($id!=null){
    //         $this->db->where('id_fuzzyfikasi',$id);
    //     }
    //     $query = $this->db->get();
    //     return $query;
	//  }
    public function addData($id,$tgl,$post1,$post2){
		
		$params = [
            'id_ip' => $id,
            'tanggal_ip' => $tgl,
            'permintaan' => $post1,
            'persediaan' => $post2

        ];
		$this ->db->insert('data_input_produksi', $params);
	
	 }
    public function addFuzzyfikasi($id,$h11,$h12,$h13,$h21,$h22,$h23){
		$params = [
            'id_ip' => $id,
            'x_sedikit' => $h11,
            'x_sedang' => $h12,
            'x_banyak' => $h13,
            'y_sedikit' => $h21,
            'y_sedang' => $h22,
            'y_banyak' => $h23

        ];
		$this ->db->insert('data_fuzzyfikasi', $params);
	}
}