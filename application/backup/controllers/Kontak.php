<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function index()
	{
		$data['error'] = $this->session->flashdata('error');
		$data['captcha'] = $this->recaptcha->getWidget(); // menampilkan recaptcha
        $data['script_captcha'] = $this->recaptcha->getScriptTag(); // javascript recaptcha ditaruh di head
		$this->slice->view('kontak',$data);
	}
	public function send()
	{
		$recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
 
		if (!isset($response['success']) || $response['success'] <> true) {
			$this->session->set_flashdata('error', 'recaptcha failed');
			redirect(site_url('kontak'),'refresh');
		}else{
			$data = array(
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'phone'=>$this->input->post('phone'),
				'message'=>$this->input->post('message')
			);
			if($this->db->insert('contact', $data)){
				redirect('kontak/terimakasih','refresh');
			}
		};
	}
		function terimakasih(){
			$this->slice->view('terimakasih');
		}

}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */