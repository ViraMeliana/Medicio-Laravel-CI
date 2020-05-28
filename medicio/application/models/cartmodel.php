<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class cartmodel extends CI_Model {

    public function getProduct($medicine)
    {
        $select = $this->db->get($table_name);
        return $select->result_array();
    }

    public function getProductCart($medicine,$id_medicine){
		$this->db->where('id_medicine',$id_medicine);
		$ambilData = $this->db->get('medicine');
		return $ambilData->row();
    }
    public function getDetailbyUser($kode)
    {
        return $this->db->where('KODE_TRANSAKSI',$kode)->get('header_transaction')->result();
    }

}

/* End of file Controllername.php */

