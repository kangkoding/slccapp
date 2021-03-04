<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_section extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Upload_model');
	}
	public function index()
	{
		$data['data'] = $this->db->get('settings')->row();
		$this->slice->view('admin.about_section.form',$data);
	}
	public function update()
	{
		if($this->input->post('about_text')){
			$files = '';
	        if(!empty($_FILES['about_images']['name'])){
    		 $old_image = $this->input->post('old_image');
	         if(!empty($old_image)){
	         	@unlink(site_url('assets/images/').$old_image);
	         }
	         $file = $this->Upload_model->upload_files('assets/images/','SWU'.rand('10','100').date('Y').date('s'),$_FILES['about_images']);
	            $files = $file;
	        }else{
	        	$files = $this->input->post('old_image');
	        }
			$data = array(
				'about_images'=>$files,
				'about_text'=>$this->input->post('about_text'),
			);
			$this->db->where('id', 0);
			$update = $this->db->update('settings', $data);
			if($update){
				redirect(site_url('admin/about-section'),'refresh');
			}
		}
	}

}

/* End of file About_section.php */
/* Location: ./application/controllers/admin/About_section.php */