<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorymodel extends CI_Model {

	public function add_Category()
	{
		$data = array(
		'ID_CATEGORY' => NULL,
		'CAT_NAME' => $this->input->post('CAT_NAME')
		);

		$this->db->insert('category',$data);
		if($this->db->affected_rows() >0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getCategory($id=null)
	{
		if ($id==null) {
			return $this->db->get('category')
						->result();
		} else {
			return $this->db->get_where('category',['ID_CATEGORY'=>$id])->result();
		}
		
	}

	
	 public function deleteCategory($id)
    {
    	$this->db->delete('category',['ID_CATEGORY' => $id]);
    	return $this->db->affected_rows();
    }

   
    public function updateCategoryApi($data,$id)
    {
    	$this->db->update('category',$data, ['ID_CATEGORY'=>$id]);
    	return $this->db->affected_rows();
    }

    public function getByCategory($cat)
    {
    	//return $this->db->query('select * from medicine where ID_CATEGORY = '.$cat.'')->result_array();
    	return $this->db->get_where('medicine',['ID_CATEGORY'=>$cat])->result();
    }
    public function updateCategory($id_category){
		$data = array(
			'ID_CATEGORY' => $this->input->post('ID_CATEGORY'),
			'CAT_NAME' => $this->input->post('CAT_NAME'),

			);
			$this->db->update('category',$data, ['ID_CATEGORY'=>$id_category]);
			return $this->db->affected_rows();
	}
}

/* End of file categorymodel.php */
/* Location: ./application/models/categorymodel.php */