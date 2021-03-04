<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan_formal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cek_login');
		$this->data = $this->Cek_login->is_login();
	}
	public function index()
	{
		$data['page_title'] = 'Pendidikan Formal';
		$data['action'] = site_url('member/pendidikan-formal/add');
		$data['json'] = site_url('member/pendidikan-formal/json');
		$this->slice->view('member.pendidikan',$data);
	}
	public function add(){
		$this->load->model('Member_model');

		//data form
		$data['kat_pendidikan'] = $this->Member_model->get_kat_pendidikan();
		$data['action'] = site_url('member/pendidikan-formal/add_action');
		$data['id'] = '';
		$data['button'] = 'Tambah';
		$data['kat_pen'] = '';
		$data['nama'] = '';
		$data['tahun_lulus'] = '';
		//end data form
		$this->slice->view('member.form_pendidikan',$data);
	}
	public function add_action(){
		$data_login = $this->Cek_login->is_login();
		$data = array(
			'id_user'=> $data_login['id_user'],
			'nama'=>$this->input->post('nama'),
			'id_kat_pendidikan'=>$this->input->post('id_kat_pendidikan'),
			'tahun_lulus'=>$this->input->post('tahun_lulus'),
			'type'=>1,
		);
		$send = $this->db->insert('data_pendidikan', $data);
		if($send){
			redirect(site_url('member/pendidikan-formal'),'refresh');
		}
	}
	public function update($id){
		//load model
		$this->load->model('Member_model');
		$row = $this->Member_model->get_pendidikan_by_id($id);

		//data form
		$data['kat_pendidikan'] = $this->Member_model->get_kat_pendidikan();
		$data['id'] = $row->id;
		$data['nama'] = $row->nama;
		$data['tahun_lulus'] = $row->tahun_lulus;
		$data['kat_pen'] = $row->id_kat_pendidikan;
		$data['action'] = site_url('member/pendidikan-formal/update_action');
		$data['button'] = 'Ubah';
		//end data form
		$this->slice->view('member.form_pendidikan',$data);
	}
	public function update_action(){
		$data_login = $this->Cek_login->is_login();
		$id = $this->input->post('id');
		$data = array(
			'id_kat_pendidikan' => $this->input->post('id_kat_pendidikan'),
			'nama' => $this->input->post('nama'),
			'tahun_lulus' => $this->input->post('tahun_lulus'),
		);
		$this->db->where('id', $id);
		$this->db->where('id_user', $data_login['id_user']);
		if($this->db->update('data_pendidikan', $data)){
			redirect(site_url('member/pendidikan-formal'),'refresh');
		};
	}
	public function delete($id){
		$data_login = $this->Cek_login->is_login();
		$this->db->where('id', $id);
		$this->db->where('id_user', $data_login['id_user']);
		if($this->db->delete('data_pendidikan')){
			redirect(site_url('member/pendidikan-formal'),'refresh');
		};
	}
	public function json(){
		header('Content-Type: application/json');
		$this->load->model('Member_model');
		$json = $this->Member_model->get_data_pendidikan(1);
		$json_data = array();
		foreach ($json as $value) {
			$json_data[] = array(
				'id'=>$value->id,
				'id_user'=>$value->id_user,
				'nama'=>$value->nama,
				'id_kat_pendidikan' => $value->pendidikan,
				'tahun_lulus' => $value->tahun_lulus,
				'type' => $value->type,
				'button' => '<a href="'.site_url('member/pendidikan-formal/delete/'.$value->id).'"  class="btn btn-danger btn-sm" onclick="return confirm("apakah anda yakin?")"><i class="fa fa-trash" ></i></a> <a href="'.site_url('member/pendidikan-formal/update/'.$value->id).'"  class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>',
				);
		}
		$data = array('data'=>$json_data);
		echo json_encode($data);
	}
}

/* End of file Controller.php */
/* Location: ./application/controllers/member/Pendidikan/Controller.php */