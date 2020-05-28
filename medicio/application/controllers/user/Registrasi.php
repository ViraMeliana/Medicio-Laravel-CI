<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Registrasi extends CI_Controller {

        public function __construct(){
                parent::__construct();
                $this->load->model('accountmodel');
                $this->load->model('medicinemodel');
		        $this->load->model('categorymodel');
        }


        public function index()
        {
            
                $valid = $this->form_validation;
                $valid->set_rules('full_name','Full Name','required',
                array('required' => '%s harus diisi'));

                $valid->set_rules('username','Usename','required',
                array('required' => '%s harus diisi'));

                $valid->set_rules('email','Email','required|valid_email|is_unique[account.email]',
                array('  required' => '%s harus diisi',
                        'valid_Email' => '%s tidak valid',
                        'is_unique  ' => '%s sudah terdaftar'));

                $valid->set_rules('address','Address','required',
                array('required' => '%s harus diisi'));

                $valid->set_rules('phone_number','Phone Number','required',
                array('required' => '%s harus diisi'));
               
            
                if($valid->run()===FALSE){
                    $this->load->view('user/header');
                    $this->load->view('user/registrasi');
                    $this->load->view('user/footer');
                }else{
                    if ($this->input->post('submit')) {
                   
                    $this->accountmodel->add_Account();    
                    $this->session->set_flashdata('sukses','Register Success');
                    redirect('user/sukses','refresh');
                    }      
                    
                }
            
        }


    }
    
    /* End of file Controllername.php */
    
?>