<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Post_model');
	}
	public function index()
	{
		// init params
        $params = array();
        $limit_per_page = 5;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->Post_model->get_total(1);
     	$data = array();
        if ($total_records > 0)
        {
            // get current page records
            $data["post"] = $this->Post_model->get_current_page_records($limit_per_page, $page*$limit_per_page,1);
                 
            $config['base_url'] = base_url() . 'post/index/';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
             
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
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
            $data["links"] = $this->pagination->create_links();
        }
        //print_r($this->Post_model->get_current_page_records($limit_per_page, $page*$limit_per_page,$kat));
		$this->slice->view('post.post',$data);
	}
	public function kategori($kategori)
	{
		if(!empty($kategori)){
			$row = $this->db->where('slug',$kategori)->get('post_kategori')->row();
			$kat = $row->id;
		}else{
			$kat = 1;
		}
		// init params
        $params = array();
        $limit_per_page = 5;
        $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
        $total_records = $this->Post_model->get_total($kat);
     	$data = array();
        if ($total_records > 0)
        {
            // get current page records
            $data["post"] = $this->Post_model->get_current_page_records($limit_per_page, $page*$limit_per_page,$kat);
                 
            $config['base_url'] = base_url() . 'post/kategori/'.$kategori.'/';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 4;
             
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
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
            $data["links"] = $this->pagination->create_links();
        }
        //print_r($this->Post_model->get_current_page_records($limit_per_page, $page*$limit_per_page,$kat));
		$this->slice->view('post.post',$data);
	}
	public function read($url)
	{
		$data['data'] = $this->Post_model->get_by_slug($url);
        if(!empty($data['data'])){
		    $this->slice->view('post.read',$data);
        }else{
            redirect(site_url('page/error_404'),'refresh');
        }
	}

}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */