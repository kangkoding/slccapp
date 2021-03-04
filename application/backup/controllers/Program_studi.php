<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_studi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Program_studi_model');
	}
	public function index($url)
	{
		$exp = explode('-', $url);
		$id  = $exp[0];
		$data['prodi'] = $this->Program_studi_model->get_by_id($id);
		$this->slice->view('program_studi',$data);		
	}

}

/* End of file Program_studi.php */
/* Location: ./application/controllers/Program_studi.php */