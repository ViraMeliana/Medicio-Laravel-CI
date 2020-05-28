<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('medicinemodel');
		$this->load->model('categorymodel');
		$this->load->model('accountmodel');
		$this->load->model('cartmodel');
		$this->load->model('header_transaksi_model');
		$this->load->model('transactionmodel');
		$this->load->library('cart');
		$this->load->helper('string');
		
	}

	public function index()
	{
		$this->load->view('user/header');
		$this->load->view('user/cart');
		$this->load->view('user/footer');
	}

	public function add(){
		$id = $this->input->post('id');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		$name = $this->input->post('name');
		$img = $this->input->post('img');
		//$redirect_page = $this->input->post('redirect_page');

		$data = array(
			'id' => $id,
			'qty' => $qty,
			'price' => $price,
			'name' => $name,
			'img' => $img,

		);
		$this->cart->insert($data);
		
		redirect('user/product');
		
	}

	//update cart
	public function update_cart($rowid){
		$data = array('rowid' => $rowid,
						  'qty' => $this->input->post('qty'));
		$this->cart->update($data);
		$this->session->set_flashdata('sukses','Success update cart!');
		redirect('user/cart','refresh');
	}

	//clear cart
	public function hapus($rowid=''){
		if($rowid){
			//hapus per item
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses','Success delete product!');
			redirect('user/cart','refresh');

		}else{
				//clear cart
			$this->cart->destroy();
			$this->session->set_flashdata('sukses','Success clear cart!');
			redirect('user/cart','refresh');
		}

	}

	public function checkout(){

		if ($this->session->userdata('role')=="0") { 		
				$cart = $this->cart->contents();

				$valid = $this->form_validation;

				$valid->set_rules('id_account','ID Account','required',
				array('required' => '%s harus diisi'));

				$valid->set_rules('kode_transaksi','Kode Transaksi','required',
				array('required' => '%s harus diisi'));
				
                $valid->set_rules('full_name','Full Name','required',
                array('required' => '%s harus diisi'));

                $valid->set_rules('email','Email','required|valid_email',
                array('  required' => '%s harus diisi',
                        'valid_Email' => '%s tidak valid'));

                $valid->set_rules('address','Address','required',
                array('required' => '%s harus diisi'));

                $valid->set_rules('phone_number','Phone Number','required',
                array('required' => '%s harus diisi'));
               
            
                if($valid->run()===FALSE){
                    // $this->load->view('user/header');
                    // $this->load->view('user/checkout');
					// $this->load->view('user/footer');
				}else{
					$this->header_transaksi_model->addHeader(); 

					foreach($cart as $cart){
						$sub_total = $cart['price'] * $cart['qty'];
						
						$data = array ( 'ID' => $this->input->post('id_account'),
								'KODE_TRANSAKSI' => $this->input->post('kode_transaksi'),
								'MED_NAME' => $cart['name'],
								'ID_MEDICINE' => $cart['id'],
								'PRICE' =>  $cart['price'],
								'QTY' =>  $cart['qty'],
								'TOTAL' =>  $this->cart->total(),
								'DATE' => date("Y-m-d H:i:s"));
						$this->transactionmodel->addTransaksi($data);  
					}

					$this->cart->destroy();    
					$this->session->set_flashdata('sukses','Checkout Success');
					redirect('user/suksescek','refresh');
					
				}
				
				$data['account']= $this->accountmodel->getAccount();
				$this->load->view('user/header');
				$this->load->view('user/checkout',$data);
				$this->load->view('user/footer');
			
		} else {
				$this->session->set_flashdata('sukses', 'Please login or register first !');
				redirect('user/registrasi','refresh');
		}

	}

	public function getHistory()
	{
		$trans = $this->transactionmodel->getTransbyUser();
		$data['transaksi'] = $trans;
		// $data['detail'] = $this->transactionmodel->getDetailbyUser($trans->KODE_TRANSAKSI);
		$this->load->view('user/header');
		$this->load->view('user/history',$data);
		$this->load->view('user/footer');
	}
	
}