<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Upload_model');
	}
	public function index()
	{
		$data = array(
			'action'=>site_url('admin/settings/update'),
			'data'=>$this->db->get('settings')->row(),
			);
		$this->slice->view('admin/settings/form',$data);
	}
		function update(){
            $logo = '';
            if(!empty($_FILES['logo']['name'])){
            	@unlink(site_url('assets/images/').$this->input->post('old_logo'));
             	$file = $this->Upload_model->upload_files('assets/images/','dc',$_FILES['logo']);
                $logo = $file;
            }else{
                $logo = $this->input->post('old_logo');
            }
            $lbanner_images = '';
            if(!empty($_FILES['lbanner_images']['name'])){
            	@unlink(site_url('assets/images/').$this->input->post('old_banner'));
             	$file = $this->Upload_model->upload_files('assets/images/','dc',$_FILES['lbanner_images']);
                $lbanner_images = $file;
            }else{
                $lbanner_images = $this->input->post('old_banner');
            }
			$data = array(
				'logo'=>$logo,
				'website_name'=>$this->input->post('website_name'),
				'website_url'=>$this->input->post('website_url'),
				'facebook_url'=>$this->input->post('facebook_url'),
				'instagram_url'=>$this->input->post('instagram_url'),
				'twitter_url'=>$this->input->post('twitter_url'),
				'email'=>$this->input->post('email'),
				'about_section'=>$this->input->post('about_section'),
				'feature_section'=>$this->input->post('feature_section'),
				'foot1'=>$this->input->post('foot1'),
				'foot2'=>$this->input->post('foot2'),
				'foot3'=>$this->input->post('foot3'),
				'foot4'=>$this->input->post('foot4'),
				'lbanner_images'=>$lbanner_images,
				'lbanner_tagline'=>$this->input->post('lbanner_tagline'),
				'site_tagline'=>$this->input->post('site_tagline'),
			);
			$this->db->where('id', 0);
			$this->db->update('settings', $data);
			redirect(site_url('admin/settings'),'refresh');
		}

}

/* End of file Site.php */
/* Location: ./application/controllers/admin/Site.php */