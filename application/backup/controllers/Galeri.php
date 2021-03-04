<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gallery_model');
	}
	public function index()
	{
		$data['gallery'] = $this->Gallery_model->get_all();
		$this->slice->view('gallery/list',$data);		
	}
	public function show($id = '')
	{
		$data['gallery'] = $this->Gallery_model->get_album_gambar($id);
		$this->slice->view('gallery/list_gambar',$data);
	}

}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */