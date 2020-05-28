<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class header_transaksi_model extends CI_Model {

	public function getHeader(){
		return $this->db->query('SELECT * FROM `header_transaction` WHERE id_header_transaction = "'.$id.'"')->result();
	}
	public function addHeader()
	{
		$data = array(
        'ID' => $this->input->post('id_account'),
        'KODE_TRANSAKSI' => $this->input->post('kode_transaksi'),
		'EMAIL' => $this->input->post('email'),
		'FULL_NAME' => $this->input->post('full_name'),
		'ADDRESS' => $this->input->post('address'),
        'PHONE_NUMBER' => $this->input->post('phone_number'),
      //  'DATE' => $this->input->post('date'),
        'TOTAL' => $this->input->post('total')
        
		);
		$this->db->insert('header_transaction',$data);
		if($this->db->affected_rows() >0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

}

/* End of file accountmodel.php */
/* Location: ./application/models/accountmodel.php */