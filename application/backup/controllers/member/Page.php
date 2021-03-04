<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member_model');
		$this->load->model('Cek_login');
	}

	public function index()
	{
		$this->pencari();
	}
	public function pencari(){
		$bidang = $this->Member_model->get_bidang();
		$city   = $this->Member_model->get_city();
		$data = array(
			'bidang'=>$bidang,
			'city'=>$city,
			'email' => '',
			'username' => '',
			'full_name' => '',
			'company' => '',
			'phone' => '',
			'mobile_number' => '',
			'birth_date' => '',
			'birth_place' => '',
			'address' => '',
			'city_id' => '',
			'postal_code' => '',
			'country' => '',
			'marriage_status' => '',
			'religion' => '',
			'id_kat_pendidikan' => '',
			'nim' => '',
			'ipk'  => '',
			'id_bidang' => '',
			'ket_disabilitas' => '',
			'id_number' => '',
			'message' => '',
		);
		$this->slice->view('member.registrasi',$data);
	}
	public function profil(){
		$data_login = $this->Cek_login->is_login();
		$this->data = $data_login;
		$this->data['bidang'] = $this->Member_model->get_bidang();
		$this->data['city_id']   = $this->Member_model->get_city();
		$this->data['kat_pendidikan']   = $this->Member_model->get_kat_pendidikan();
		$this->data['data_user'] = $this->Member_model->get_user_profile($data_login['id_user']);
		$this->slice->view('member.profile',$this->data);
	}
	public function change_profile(){
		$login = $this->Cek_login->is_login();
		$data = array(
			'full_name' => $this->input->post('full_name'),
			'company' => $this->input->post('company'),
			'phone' => $this->input->post('phone'),
			'mobile_number' => $this->input->post('mobile_number'),
			'birth_date' => $this->input->post('birth_date'),
			'birth_place' => $this->input->post('birth_place'),
			'address' => $this->input->post('address'),
			'city_id' => $this->input->post('city_id'),
			'postal_code' => $this->input->post('postal_code'),
			'country' => $this->input->post('country'),
			'marriage_status' => $this->input->post('marriage_status'),
			'religion' => $this->input->post('reliogion'),
			'id_kat_pendidikan' => $this->input->post('id_kat_pendidikan'),
			'nim' => $this->input->post('nim'),
			'ipk'  => $this->input->post('ipk'),
			'id_bidang' => $this->input->post('id_bidang'),
			'id_number' => $this->input->post('id_number'),
			'ket_disabilitas' => $this->input->post('ket_disabilitas'),
		);
		$this->db->where('id', $login['id_user']);
		$send = $this->db->update('users', $data);
		if($send){
			redirect(site_url('member/page/profil'),'refresh');
		}

	}
	public function lamaran(){
		$this->data = $this->Cek_login->is_login();
		$this->slice->view('member.lamaran',$this->data);
	}
	public function lowongan(){
		$this->data = $this->Cek_login->data_login();
		$this->data['loker'] = $this->Member_model->get_loker();
		$this->slice->view('member.lowongan',$this->data);
	}
	public function cari_lowongan(){
		$data = $this->Cek_login->data_login();
		$string = $this->input->get('search');
		$data['loker'] = $this->Member_model->get_loker_by_search($string);
		$this->slice->view('member.lowongan',$data);
	}
	public function detail_lowongan(){
		$this->data = $this->Cek_login->data_login();
		$str = explode('-',$this->uri->segment(4));
		$id = $str[0];
		$this->data['loker'] = $this->Member_model->get_loker_detail($id);
		$this->slice->view('member.detail_lowongan',$this->data);
	}
	public function testimoni(){
		$this->data = $this->Cek_login->is_login();
		$this->slice->view('template.simple.app',$this->data);
	}
	public function perusahaan(){
		$this->data = $this->Cek_login->data_login();
		$this->data['data_perusahaan'] = $this->Member_model->get_perusahaan();
		$this->slice->view('member.perusahaan',$this->data);	
	}
	public function change_password(){
		$this->data = $this->Cek_login->is_login();
		$this->slice->view('template.simple.app',$this->data);
	}
}

/* End of file registrasi.php */
/* Location: ./application/controllers/member/registrasi.php */