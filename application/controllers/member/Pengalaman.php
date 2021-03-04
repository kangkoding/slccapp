<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengalaman extends CI_Controller {

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
		$this->data['pengalaman'] = $this->Member_model->get_pengalaman();
		$this->slice->view('member.pengalaman',$this->data);
	}
	public function create()
	{
		$this->data = $this->Cek_login->is_login();
		$this->data['pengalaman'] = $this->Member_model->get_pengalaman();
		$this->data['action'] = site_url('member/pengalaman/create_action');
		//data pengalaman
		$this->data['nama_perusahaan'] = '';
		$this->data['jabatan'] 		   = '';
		$this->data['tahun_masuk']     = '';
		$this->data['tahun_keluar']    = '';
		$this->data['id']			   = '';
		//end data pengalaman
		$this->slice->view('member.form_pengalaman',$this->data);
	}
	function create_action(){
		$data_login = $this->Cek_login->is_login();
		$data = array(
			'nama_perusahaan'=>$this->input->post('nama_perusahaan'),
			'jabatan'=>$this->input->post('jabatan'),
			'tahun_masuk'=>$this->input->post('tahun_masuk'),
			'tahun_keluar'=>$this->input->post('tahun_keluar'),
			'id_user'=>$data_login['id_user'],
		);
		$this->db->where('id_user', $data_login['id_user']);
		$this->db->insert('pengalaman', $data);
		redirect(site_url('member/pengalaman'),'refresh');
	}
	public function edit(){
		$data_login = $this->Cek_login->is_login();
		$this->data = $data_login;
		$id = $this->uri->segment(4);
		$data = $this->Member_model->get_pengalaman_by_id($id);
		//data pengalaman
		$this->data['nama_perusahaan'] = $data->nama_perusahaan;
		$this->data['jabatan'] 		   = $data->jabatan;
		$this->data['tahun_masuk']     = $data->tahun_masuk;
		$this->data['tahun_keluar']    = $data->tahun_keluar;
		$this->data['id']			   = $data->id;
		//end data pengalaman
		$this->data['action'] = site_url('member/pengalaman/edit_action');
		$this->slice->view('member.form_pengalaman',$this->data);
	}
	function edit_action(){
		$data_login = $this->Cek_login->is_login();
		$id = $this->input->post('id');
		$data = array(
			'nama_perusahaan'=>$this->input->post('nama_perusahaan'),
			'jabatan'=>$this->input->post('jabatan'),
			'tahun_masuk'=>$this->input->post('tahun_masuk'),
			'tahun_keluar'=>$this->input->post('tahun_keluar'),
		); 
		$this->db->where('id', $id);
		$this->db->update('pengalaman', $data);
		redirect(site_url('member/pengalaman'),'refresh');
	}

}

/* End of file Pengalaman.php */
/* Location: ./application/controllers/member/Pengalaman.php */