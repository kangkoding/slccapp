<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cek_login');
		$this->Cek_login->is_admin();
		
	}
	public function index()
	{
		$this->Cek_login->is_admin();
		//loading model
		$this->load->model('Header_model');
		//end loading model

		$this->slice->view('admin.home',$data = '');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/Admin/home.php */