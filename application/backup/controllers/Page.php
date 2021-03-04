<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Page_model');
	}
	public function index($url)
	{
		$data['data'] = $this->Page_model->get_by_slug($url);
		if(!empty($data['data'])){
			$this->slice->view('page',$data);
		}else{
			$this->error_404();
		}
	}
    public function error_404(){
        $this->slice->view('error_404');
    }

}

/* End of file Page.php */
/* Location: ./application/controllers/Page.php */