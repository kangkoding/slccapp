<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	public function index()
	{
		$this->load->model('Faq_model');
		$data = $this->Faq_model->get_all();
		$this->slice->view('faq',$data);
	}

}

/* End of file Faq.php */
/* Location: ./application/controllers/Faq.php */