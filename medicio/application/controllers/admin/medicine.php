<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicine extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categorymodel');
		$this->load->model('medicinemodel');
		if ($this->session->userdata('role')=="0") {
			redirect('user/home','refresh');
		}
	}
	public function index()
	{
		$data['cat']=$this->categorymodel->getCategory();
		$data['med']=$this->medicinemodel->getMedicine();
		$this->load->view('admin/header');
		$this->load->view('admin/medicine',$data);
		$this->load->view('admin/footer');
	}

	public function addMedicine()
	{
 		if ($this->input->post('submit')) {
 			
 			$config['upload_path']          = './med_img/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2000;
			$this->load->library('upload', $config);
 			if ($this->upload->do_upload('medimage')){
 				if ($this->medicinemodel->add_Medicine($this->upload->data())==TRUE) {
 					$this->session->set_flashdata('success',"Data Berhasil Ditambah");
					redirect('admin/medicine','refresh');
				}else{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('admin/header');
					$this->load->view('admin/h',$data);
					$this->load->view('admin/footer');
				}
	 		} else {
	 			$data = $this->upload->display_errors();
				$data['cat']=$this->categorymodel->getCategory();
				$this->load->view('admin/header');
				$this->load->view('admin/medicine',$data);
				$this->load->view('admin/footer');
	 		}
		} else {
			redirect('admin/medicine','refresh');
		}
	}
	public function deleteMed($id_medicine){
		if($this->medicinemodel->deleteMedicine($id_medicine)==TRUE){
			$this->session->set_flashdata('notif', ' dihapus');
			redirect('admin/medicine','refresh');
		}else{
			redirect('admin/medicine','refresh');
		}	
		
	}


	public function editMed(){
		if ($this->input->post('submit')) {
			$data=array(				
							"med_name"=>$_POST['med_name'],
							"image"=>$_POST['image'],
							"price"=>$_POST['price'],
							"desc_med"=>$_POST['desc_med'],
				        );
				        $this->db->where('id_medicine', $_POST['id_medicine']);
				        $this->db->update('medicine',$data);
				        $this->session->set_flashdata('success',"Data Berhasil Diedit");
						redirect('admin/medicine');
		}else {
			redirect('admin/medicine','refresh');
		}
	}

}

/* End of file medicine.php */
/* Location: ./application/controllers/admin/medicine.php */