<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicinemodel extends CI_Model {

	public function add_Medicine($pict)
	{
		$data = array(
		'ID_MEDICINE' => NULL,
		'ID_CATEGORY' => $this->input->post('category'),
		'MED_NAME' => $this->input->post('medname'),
		'PRICE' => $this->input->post('price'),
		'IMAGE' => $pict['file_name'],
		'DESC_MED' => $this->input->post('desc')
		);

		$this->db->insert('medicine',$data);
		if($this->db->affected_rows() >0) {
			return TRUE;
		}else{
			return FALSE;
		}
	//return $this->db->query('insert into customer values blblbl');
	}
	public function getMedicine()
	{
		return $this->db->query('select ID_MEDICINE, m.ID_CATEGORY, c.CAT_NAME, MED_NAME, IMAGE,PRICE, DESC_MED from medicine m join category c on c.ID_CATEGORY = m.ID_CATEGORY')->result();
	}
	public function getMedicineApi($id=null)
	{
		if ($id==null) {
			return $this->db->query('select ID_MEDICINE, m.ID_CATEGORY, c.CAT_NAME, MED_NAME, IMAGE,PRICE, DESC_MED from medicine m join category c on c.ID_CATEGORY = m.ID_CATEGORY')->result();
		} else {
			return $this->db->query('select ID_MEDICINE, m.ID_CATEGORY, c.CAT_NAME, MED_NAME, IMAGE,PRICE, DESC_MED from medicine m join category c on c.ID_CATEGORY = m.ID_CATEGORY where ID_MEDICINE='.$id.'')->result();
		}
	}
	 public function deleteMedicine($id)
    {
    	$this->db->delete('medicine',['ID_MEDICINE' => $id]);
    	return $this->db->affected_rows();
    }

    public function createMedicine()
    {
    	$data = array(
		'ID_MEDICINE' => NULL,
		'ID_CATEGORY' => $this->input->post('ID_CATEGORY'),
		'MED_NAME' => $this->input->post('MED_NAME'),
		'PRICE' => $this->input->post('PRICE'),
		'IMAGE' => $this->input->post('IMAGE'),
		'DESC_MED' => $this->input->post('DESC_MED')
		);
    	$this->db->insert('medicine', $data);
    	return $this->db->affected_rows();
    }
    public function updateMedicineApi($data,$id)
    {
    	$this->db->update('medicine',$data, ['ID_MEDICINE'=>$id]);
    	return $this->db->affected_rows();
    }
    public function updateMedicine($id_medicine){
		$data = array(
			'ID_MEDICINE' => $this->input->post('ID_CATEGORY'),
			'ID_CATEGORY' => $this->input->post('ID_CATEGORY'),
			'MED_NAME' => $this->input->post('MED_NAME'),
			'IMAGE' => $this->input->post('IMAGE'),
			'PRICE' => $this->input->post('PRICE'),
			'STOCK' => $this->input->post('STOCK'),
			'DESC_MED' => $this->input->post('DESC_MED')
			);
			$this->db->update('medicine',$data, ['ID_MEDICINE'=>$id_medicine]);
			return $this->db->affected_rows();
	}

	

}

/* End of file medicinemodel.php */
/* Location: ./application/models/medicinemodel.php */