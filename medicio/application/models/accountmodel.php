<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountmodel extends CI_Model {

	public function getAccount(){
		$id = $this->session->userdata('id_account');
		return $this->db->query('SELECT * FROM `users` WHERE id = "'.$id.'"')->result();
	}
	public function add_Account()
	{
		$data = array(
		'ID_ACCOUNT' => NULL,
		'USERNAME' => $this->input->post('username'),
		'PASSWORD' => $this->input->post('password'),
		'EMAIL' => $this->input->post('email'),
		'ROLE' => 0,
		'FULL_NAME' => $this->input->post('full_name'),
		'ADDRESS' => $this->input->post('address'),
		'PHONE_NUMBER' => $this->input->post('phone_number')
		);
		$this->db->insert('users',$data);
		if($this->db->affected_rows() >0) {
			return TRUE;
		}else{
			return FALSE;
		}
	//return $this->db->query('insert into customer values blblbl');
	}

	public function login($username, $password)
		{
			$this->db->select('USERNAME, PASSWORD, ROLE, id');
			$this->db->from('users');
			$this->db->where('USERNAME', $username);
			$this->db->where('PASSWORD', $password);
			$this->db->limit(1);
			$query=$this->db->get();
			if ($query->num_rows()==1) {
				return $query->result();
			} else {
				return false;
			}
		}



}

/* End of file accountmodel.php */
/* Location: ./application/models/accountmodel.php */