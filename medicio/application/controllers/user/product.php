<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('medicinemodel');
		$this->load->model('categorymodel');
		$this->load->library('cart');
		//$this->load->model('cartmodel');

			
	}
	public function index()
	{
		$data['cat']= $this->categorymodel->getCategory();
		$data['product']=$this->medicinemodel->getMedicine();
		$this->load->view('user/header');
		$this->load->view('user/product',$data);
		$this->load->view('user/footer');
	}
	public function getbycat()
	{
		if ($this->input->post('submit')) {
			$category = $this->input->post('cat');
			$data['cat']= $this->categorymodel->getCategory();
			$data['product'] = $this->categorymodel->getByCategory($category);
			$this->load->view('user/header');
			$this->load->view('user/product',$data);
			$this->load->view('user/footer');
		}
	}

}

/* End of file product.php */
/* Location: ./application/controllers/user/product.php */