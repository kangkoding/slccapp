<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member_model');
		$this->load->model('Cek_login');
	}
	public function index()
	{
		$data_login = $this->Cek_login->is_login();
		$this->data = $data_login;
		$this->data['page_title'] = 'Testimoni';
		$this->data['action'] = site_url('member/testimoni/add');
		$this->data['json'] = site_url('member/testimoni/json');
		$this->slice->view('member.testimoni',$this->data);
	}
	public function add(){
		$this->load->model('Member_model');
		$this->data = $this->Cek_login->is_login();
		$this->data['action']  = site_url('member/testimoni/add_action');
		//
		$this->data['id']  = '';
		$this->data['isi'] = '';
		//
		$this->slice->view('member.form_testimoni',$this->data);
	}
		function add_action(){
			$data_login = $this->Cek_login->is_login();
			$data = array(
				'id_user'=>$data_login['id_user'],
				'isi'=>$this->input->post('isi'),
			);
			if($this->db->insert('testimoni', $data)){
				redirect(site_url('member/testimoni'),'refresh');
			}
		}
	public function json(){
		header('Content-Type: application/json');
		$json = $this->Member_model->get_testimoni();
		$json_data = array();
		foreach($json as $value) {
			$json_data[] = array(
				'tanggal'=>$value->tanggal,
				'isi'=>$value->isi,
				'button' => '<a href="'.site_url('member/testimoni/delete/'.$value->id).'"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> <a href="'.site_url('member/testimoni/update/'.$value->id).'"  class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>',
				);
		}
		$data = array('data'=>$json_data);
		echo json_encode($data);
	}
}

/* End of file Testimoni.php */
/* Location: ./application/controllers/member/Testimoni.php */