<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class suksescek extends CI_Controller {
    
        public function index()
        {
            $this->load->view('user/header');
            $this->load->view('user/suksescek');
            $this->load->view('user/footer');
            
        }
    
    }
    
    /* End of file S.php */
    
?>