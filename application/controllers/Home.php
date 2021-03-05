<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cek_login');
		$this->load->model('Sliders_model');
		$this->load->model('Member_model');
		$this->load->model('Post_model');
	}

	public function index()
	{
		$data = $this->Cek_login->data_login();
		$data['message'] = $this->session->flashdata('message');
		$data['data_sliders'] = $this->Sliders_model->get_all_order_level();
		$data['prodi'] = $this->db->get('program_studi')->result();
		$data['pengumuman'] = $this->Post_model->get_last_3(2);
		$data['event'] = $this->Post_model->get_last_3(3);
		$data['post'] = $this->Post_model->get_last_5(1);
		$data['feature_section'] = $this->db->get('feature_section')->result();
		$this->slice->view('template.simple.home', $data);
	}
	public function faq()
	{
		$this->slice->view('faq');
	}
	public function contact()
	{
		$this->slice->view('contact');
	}
	public function campus_hiring()
	{
		$this->load->model('Campus_hiring_model');
		// init params
		$params = array();
		$limit_per_page = 10;
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
		$total_records = $this->Campus_hiring_model->get_total();

		if ($total_records > 0) {
			// get current page records
			$params["results"] = $this->Campus_hiring_model->get_current_page_records($limit_per_page, $page * $limit_per_page);

			$config['base_url'] = base_url() . 'home/campus_hiring';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;

			// custom paging configuration
			$config['num_links'] = 2;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;

			/* This Application Must Be Used With BootStrap 3 *  */
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] = "</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";
			$this->pagination->initialize($config);

			// build paging links
			$params["links"] = $this->pagination->create_links();
		}

		$this->slice->view('campus_hiring', $params);
	}
	public function lang($id)
	{
		$array = array(
			'swu_lang' => $id,
		);

		$this->session->set_userdata($array);
		//redirect(site_url(),'refresh');
		echo '<script>window.history.back();</script>';
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */