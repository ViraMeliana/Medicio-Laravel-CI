<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('accountmodel');
		
	}
	public function index()
	{
		if ($this->session->userdata('role')=="0") {
			redirect('user/home','refresh');
		}
		$data['account'] = $this->accountmodel->getAccount();
		$this->load->view('admin/header');
		$this->load->view('admin/account',$data);
		$this->load->view('admin/footer');
	}
	
	public function addAccount()
	{
		if ($this->input->post('submit')) {
			if ($this->session->userdata('role')=="1") {
				if ($this->accountmodel->add_Account()==TRUE) {
					$data['pesan'] = "Add account's success";
					$this->load->view('admin/header');
					$this->load->view('admin/account',$data);
					$this->load->view('admin/footer');
				} else {
					$data['pesan'] = "Failed to add account";
					$this->load->view('admin/header');
					$this->load->view('admin/account',$data);
					$this->load->view('admin/footer');
				}
			} else {
				if ($this->accountmodel->add_Account()==TRUE) {
					redirect('user/home/','refresh');
				} else {
					redirect('user/home','refresh');
				}
			}
			
		}
	}
	
	public function loginAccount()
	{
		$username =htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars($this->input->post('pwd'));
		$ceklogin = $this->accountmodel->login($username, $password);
		if ($ceklogin) {
			foreach ($ceklogin as $row);
				$this->session->set_userdata('id_account', $row->id);
				$this->session->set_userdata('user', $row->USERNAME );
				$this->session->set_userdata('role', $row->ROLE );

				//var_dump($row);
				if ($this->session->userdata( 'role' )=="1") {
					redirect('admin/account');
				} elseif ($this->session->userdata( 'role' ) == "0") {
					redirect('user/home');
				}	
				else {
					redirect('user/home','refresh');
				}	
		}else {
			$data['pesan'] = "Username dan Password Anda salah";
			$this->load->view('user/header');
			$this->load->view('user/home',$data);
			$this->load->view('user/footer');
	
		}
	}
	public function logout()
	{
		if ($this->session->userdata('role')=="0") {
			$this->session->sess_destroy();
			redirect('user/home','refresh');
		} else {
			$this->session->sess_destroy();
			redirect('user/home','refresh');
		}
		
	}

	

}

/* End of file account.php */
/* Location: ./application/controllers/admin/account.php */