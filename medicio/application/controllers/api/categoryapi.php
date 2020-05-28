<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Categoryapi extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categorymodel');
	}
	public function index_get()
	{
		$id = $this->get('ID_CATEGORY');
		if ($id===null) {
			$cat = $this->categorymodel->getCategory();
		} else {
			$cat = $this->categorymodel->getCategory($id);
		}
		if ($cat) {
			$this->response([
				'status' => true,
				'data' => $cat
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
		$id=$this->delete('ID_CATEGORY');
		if ($id===null) {
			$this->response([
				'status' => false,
				'message' => 'provide an id!'
			], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if ($this->categorymodel->deleteCategory($id)>0) {
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
		if ($this->categorymodel->add_Category()>0) {
			$this->response([
					'status' => true,
					'message' => 'new category has been created'
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
		'CAT_NAME' => $this->put('CAT_NAME')
		];
		$id = $this->put('ID_CATEGORY');
		if ($this->categorymodel->updateCategoryApi($data,$id)>0) {
			$this->response([
					'status' => true,
					'message' => 'data category has been updated'
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