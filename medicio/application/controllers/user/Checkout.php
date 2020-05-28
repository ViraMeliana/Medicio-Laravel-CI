<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Checkout extends CI_Controller {
        public function __construct()
	{
		parent::__construct();
		$this->load->model('medicinemodel');
		$this->load->model('categorymodel');
		$this->load->model('accountmodel');
		$this->load->library('cart');
		$this->load->helper('string');
		
	}
    
        public function index()
        {
            $this->load->view('user/header');
            $this->load->view('user/checkout');
            $this->load->view('user/footer');
            
        }
    
    }
    
    /* End of file S.php */
    
?>