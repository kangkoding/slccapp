<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cek_login');
		$this->data = $this->Cek_login->is_login();
	}
	public function index()
	{
		$data = $this->Cek_login->is_login();
		$data['page_title'] = 'Sertifikasi';
		$data['action'] = site_url('member/sertifikasi/add');
		$data['json'] = site_url('member/sertifikasi/json');
		$this->slice->view('member.sertifikasi',$data);
	}
	public function add(){

		$this->load->model('Member_model');
		//data form
		$data['id'] = '';
		$data['nomor'] = '';
		$data['level'] = '';
		$data['id_sertifikasi']  = '';
		$data['id_lembaga'] = '';
		$data['bidang']  = $this->Member_model->get_kat_bidang();
		$data['lembaga'] = $this->Member_model->get_kat_lembaga();
		$data['action'] = site_url('member/sertifikasi/add_action');
		$data['button'] = 'Tambah';

		$this->slice->view('member.form_sertifikasi',$data);
	}
	public function add_action(){
		$data_login = $this->Cek_login->is_login();
		$data = array(
			'id_user' => $data_login['id_user'],
			'id_bidang_sertifikasi'=> $this->input->post('bidang'),
			'id_lembaga_sertifikasi'=>$this->input->post('lembaga'),
			'nomor'=>$this->input->post('nomor'),
			'level'=>$this->input->post('level'),
		);
		$send = $this->db->insert('data_sertifikasi', $data);
		if($send){
			redirect(site_url('member/sertifikasi'),'refresh');
		}
	}
	public function update($id){
		//load model
		$this->load->model('Member_model');
		$row = $this->Member_model->get_data_sertifikasi_by_id($id);

		//data form
		$data['id'] = $row->id;
		$data['nomor'] = $row->nomor;
		$data['level'] = $row->level;
		$data['id_sertifikasi']  = $row->id_bidang_sertifikasi;
		$data['id_lembaga'] = $row->id_lembaga_sertifikasi;
		$data['bidang']  = $this->Member_model->get_kat_bidang();
		$data['lembaga'] = $this->Member_model->get_kat_lembaga();
		$data['action'] = site_url('member/sertifikasi/update_action');
		$data['button'] = 'Ubah';

		//end data form
		$this->slice->view('member.form_sertifikasi',$data);
	}
	public function update_action(){
		$data_login = $this->Cek_login->is_login();
		$id = $this->input->post('id');
		$data = array(
			'id_bidang_sertifikasi'=> $this->input->post('bidang'),
			'id_lembaga_sertifikasi'=>$this->input->post('lembaga'),
			'nomor'=>$this->input->post('nomor'),
			'level'=>$this->input->post('level'),
		);
		$this->db->where('id', $id);
		$this->db->where('id_user', $data_login['id_user']);
		if($this->db->update('data_sertifikasi', $data)){
			redirect(site_url('member/sertifikasi'),'refresh');
		};
	}
	public function delete($id){
		$data_login = $this->Cek_login->is_login();
		$this->db->where('id', $id);
		$this->db->where('id_user', $data_login['id_user']);
		if($this->db->delete('data_sertifikasi')){
			redirect(site_url('member/sertifikasi'),'refresh');
		};
	}
	public function json(){
		header('Content-Type: application/json');
		$this->load->model('Member_model');
		$json = $this->Member_model->get_data_sertifikasi();
		$json_data = array();
		foreach($json as $value) {
			$json_data[] = array(
				'nomor'=>$value->nomor,
				'level'=>$value->level,
				'lembaga' => $value->lembaga,
				'bidang' => $value->bidang,
				'button' => '<a href="'.site_url('member/sertifikasi/delete/'.$value->id).'"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> <a href="'.site_url('member/sertifikasi/update/'.$value->id).'"  class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>',
				);
		}
		$data = array('data'=>$json_data);
		echo json_encode($data);
	}
}

/* End of file Controller.php */
/* Location: ./application/controllers/member/Pendidikan/Controller.php */