<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
		
	function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboardmodel','dash');
		isLogin();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['page']  = 'dashboard';
		$this->load->view('dashboard_v',$data);
	}

	public function logout() 
	{
		$this->session->sess_destroy();
	    redirect('home');
	}
}
