<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_section extends CI_Controller {

	public function index()
	{
		$this->slice->view('admin/news_section/index');		
	}

}

/* End of file News_section.php */
/* Location: ./application/controllers/admin/News_section.php */