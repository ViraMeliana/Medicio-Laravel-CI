<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transactionmodel extends CI_Model {

	public function getTransaksi(){
		return $this->db->query('SELECT * FROM `transaction` WHERE ID_TRANSACTION = "'.$id.'"')->result();
	}

	public function addTransaksi($data)
	{
		$this->db->insert('transaction',$data);
	}

	public function getTransbyUser()
	{
		$id = $this->session->userdata('id_account');
		return $this->db->query('SELECT id, KODE_TRANSAKSI FROM `transaction` WHERE id = "'.$id.'" group by KODE_TRANSAKSI')->result();
	}
	public function getDetailbyUser($kode)
	{
		return $this->db->where('KODE_TRANSAKSI',$kode)->get('transaction')->result();
	}
	// public function getKode()
	// {
	// 	$this->db->select('KODE_TRANSAKSI');
	// 		$this->db->from('users');
	// 		$this->db->where('USERNAME', $username);
	// 		$this->db->where('PASSWORD', $password);
	// 		$this->db->limit(1);
	// 		$query=$this->db->get();
	// 		if ($query->num_rows()==1) {
	// 			return $query->result();
	// 		} else {
	// 			return false;
	// 		}
	// }





}

/* End of file accountmodel.php */
/* Location: ./application/models/accountmodel.php */