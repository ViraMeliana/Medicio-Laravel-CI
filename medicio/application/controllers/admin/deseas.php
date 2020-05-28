<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deseas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('diseasmodel');
	}
	public function index()
	{
		$data['dis'] = $this->diseasmodel->getDiseas();
		$this->load->view('admin/header');
		$this->load->view('admin/deseas',$data);
		$this->load->view('admin/footer');
	}
	public function addDiseas()
    {
    	if ($this->input->post('submit')) {
			if ($this->diseasmodel->add_Diseas()==TRUE) {
				redirect('admin/deseas','refresh');
			} else {
				redirect('admin/deseas','refresh');
			}
		}
    }
}

/* End of file deseas.php */
/* Location: ./application/controllers/admin/deseas.php */