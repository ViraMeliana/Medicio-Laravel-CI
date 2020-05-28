<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountUser extends CI_Controller {
	private $url;
	public function __construct()
	{
		parent::__construct();
		$this->url = new GuzzleHttp\Client(['base_uri' => "http://localhost:8000/api/"]);
        $this->load->library("form_validation");
	}
	
	public function index()
	{
		$id=$this->session->userdata('id_account');
        try {
            $response = $this->url->get('account/'.$id);
        } catch (GuzzleException $th) {
            echo $th->getMessage();
            return null;
        }
        if ($response->getStatusCode() == 200) {
			$body = json_decode($response->getBody()->getContents(), true);
			$data['show'] = $body['data'];
			$this->load->view('user/header');
			$this->load->view('user/showAccount',$data);
			$this->load->view('user/footer');
        }
		
	}
	public function add()
    {
        
		try {
			$response = $this->url->post('account', [
				'form_params' => [
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
					'role' =>'0',
					'FULL_NAME' => $this->input->post('full_name'),
					'ADDRESS' => $this->input->post('address'),
					'PHONE_NUMBER' => $this->input->post('phone_number'),
				]
			]);
		} catch (GuzzleException $th) {
			echo $th->getMessage();
			return null;
		}
		if ($response->getStatusCode() == 201) {
			$this->session->set_flashdata('flash', 'Berhasil Disimpan');
			redirect('user/home');
		} else {
			$this->session->set_flashdata('flash', 'Gagal Disimpan');
			redirect('user/home');
		}
    }
    public function update()
    {
        $id = $this->session->userdata('id_account');
        if($this->input->post('submit')){
            try {
                $response = $this->url->get('account/' . $id);
            } catch (GuzzleException $th) {
                echo $th->getMessage();
                return null;
            }
            if ($response->getStatusCode() == 200) {
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('full_name', 'Full Name', 'required');
                $this->form_validation->set_rules('address', 'Address', 'required');
                $this->form_validation->set_rules('phone_number', 'Phone Number','numeric', 'required');

                if ($this->form_validation->run() == FALSE) {
                    // $body = json_decode($response->getBody()->getContents(), true);
                    // $data['dt_meja'] = $body['data'];
                    // $this->load->view("app-Header", $data);
                    // $this->load->view("Meja/form_meja", $data);
                    // $this->load->view("app-Footer");
                    redirect('user/accountUser');
                } else {
                    try {
                        $response = $this->url->put('account/' . $id, [
                            'form_params' => [
                                'username' => $this->input->post('username'),
                                'email' => $this->input->post('email'),
                                'password' => $this->input->post('password'),
                                'role' =>'0',
                                'FULL_NAME' => $this->input->post('full_name'),
                                'ADDRESS' => $this->input->post('address'),
                                'PHONE_NUMBER' => $this->input->post('phone_number'),
                                    ]
                        ]);
                    } catch (GuzzleException $th) {
                        echo $th->getMessage();
                        return null;
                    }
                    if ($response->getStatusCode() == 202) {
                        $this->session->set_flashdata('flash', 'Success updated data');
                        redirect('user/accountUser');
                    } else {
                        $this->session->set_flashdata('flash', 'Gagal Diubah');
                        redirect('user/accountUser');
                    }
                }
            }
        } else {
            //delete
            try {
                $response = $this->url->delete('account/' . $id);
            } catch (GuzzleException $th) {
                echo $th->getMessage();
                return null;
            }
            if ($response->getStatusCode() == 204) {
                $this->session->set_flashdata('flash', 'Success Delete Data');
                redirect('admin/account/logout');
            } else {
                $this->session->set_flashdata('flash', 'Gagal Dihapus');
                redirect('user/accountUser');
            }
        }
    }

}

/* End of file accountUser.php */
/* Location: ./application/controllers/user/accountUser.php */