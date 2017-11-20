<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
		
	function __construct()
	{
		parent::__construct();
		$this->load->model('Loginmodel','login');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
	        $this->form_validation->set_rules('password', 'password', 'required');
	        $this->form_validation->set_error_delimiters('', '<br/>');

	        if ($this->form_validation->run() == TRUE) {
	            $username = $this->input->post('username');
	            $password = $this->input->post('password');

	            $user = $this->login->checkLogin($username, $password);

	            if (!empty($user)) {
	                $sessionData['id'] = $user['id_user'];
	                $sessionData['username'] = $user['username'];
	                $sessionData['full_name'] = $user['nama'];
	                $sessionData['level'] = $user['level'];
	                $sessionData['is_login'] = TRUE;

	                $this->session->set_userdata($sessionData);

	                redirect('dashboard');
	            }

	            $this->session->set_flashdata('error', 'Login gagal!, username dan password salah! ');
	            redirect('home');
	        }
			$data['title'] = 'Login';
			$data['page']  = 'login';
			$this->load->view('home_v',$data);
	}
}
