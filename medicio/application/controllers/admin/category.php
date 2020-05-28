<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('categorymodel');
    if ($this->session->userdata('role')=="0") {
            redirect('user/home','refresh');
    }
}
    public function index()
    {
    	$data['cat']= $this->categorymodel->getCategory();
        $this->load->view('admin/header');
        $this->load->view('admin/medicinecat', $data);
        $this->load->view('admin/footer');
    }

    public function addcategory()
    {
    	if ($this->input->post('submit')) {
			if ($this->categorymodel->add_Category()==TRUE) {
                $this->session->set_flashdata('success',"Data Berhasil Ditambah");
				redirect('admin/category','refresh');
			} else {
				$data['pesan'] = "Failed to add category";
				redirect('admin/category','refresh');
			}
		}
    }
    public function deleteCat($id_category){
            if($this->categorymodel->deleteCategory($id_category)==TRUE){
                $this->session->set_flashdata('notif', 'Berhasil dihapus');
                redirect('admin/category','refresh');
            }else{
                $this->session->set_flashdata('notif', ' dihapus');
                redirect('admin/category','refresh');
            }   
    }
    
    public function editCat()
    {
        $this->form_validation->set_rules('id_category', 'id_category', 'required');
        $this->form_validation->set_rules('cat_name', 'cat_name', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Edit");
            redirect('admin/category');
        }else{
            $data=array(
                "cat_name"=>$_POST['cat_name'],
            );
            $this->db->where('id_category', $_POST['id_category']);
            $this->db->update('category',$data);
            $this->session->set_flashdata('success',"Data Berhasil Diedit");
            redirect('admin/category');
        }
    }

}

/* End of file category.php */
/* Location: ./application/controllers/admin/category.php */