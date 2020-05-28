<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Medicioapi extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('medicinemodel');
	}
	public function index_get()
	{
		$id = $this->get('ID_MEDICINE');
		if ($id===null) {
			$med = $this->medicinemodel->getMedicineApi();
		} else {
			$med = $this->medicinemodel->getMedicineApi($id);
		}
		if ($med) {
			$this->response([
				'status' => true,
				'data' => $med
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => false,
				'message' => 'id not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	public function index_delete()
	{
		$id=$this->delete('ID_MEDICINE');
		if ($id===null) {
			$this->response([
				'status' => false,
				'message' => 'provide an id!'
			], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if ($this->medicinemodel->deleteMedicine($id)>0) {
				$this->response([
					'status' => true,
					'id' => $id,
					'message' => 'deleted.'
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => false,
					'message' => 'id not found'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

	public function index_post()
	{
		if ($this->medicinemodel->createMedicine()>0) {
			$this->response([
					'status' => true,
					'message' => 'new medicine has been created'
				], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
					'status' => false,
					'message' => 'failed to create new data'
				], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_put()
	{
		$data =[
		'ID_CATEGORY' => $this->put('ID_CATEGORY'),
		'MED_NAME' => $this->put('MED_NAME'),
		'PRICE' => $this->put('PRICE'),
		'IMAGE' => $this->put('IMAGE'),
		'DESC_MED' => $this->put('DESC_MED')
		];
		$id = $this->put('ID_MEDICINE');
		if ($this->medicinemodel->updateMedicineApi($data,$id)>0) {
			$this->response([
					'status' => true,
					'message' => 'data medicine has been updated'
				], REST_Controller::HTTP_OK);
		} else {
			$this->response([
					'status' => false,
					'message' => 'failed to update data'
				], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

}

/* End of file medicioapi.php */
/* Location: ./application/controllers/api/medicioapi.php */