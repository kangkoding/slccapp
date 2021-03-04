<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permalink extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['p'] = $this->db->get('settings')->row();
		$this->slice->view('admin.permalink.index',$data);
	}
	public function update()
	{
		$data = array('permalink'=>$this->input->post('permalink'));
		$this->db->where('id', 0);
		$this->db->update('settings', $data);
		redirect(site_url('admin/permalink'),'refresh');
	}

}

/* End of file Permalink.php */
/* Location: ./application/controllers/admin/Permalink.php */