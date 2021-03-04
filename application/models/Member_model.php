<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cek_login');
		//Do your magic here
	}
	function get_loker(){
		$data = $this->db->select('l.*,p.perusahaan,p.logo')
						 ->from('lowongan as l')
						 ->join('perusahaan as p','l.id_perusahaan = p.id','left')
						 ->order_by('id','desc')
						 ->get()->result();
		return $data;
	}
	function get_loker_by_search($string){
		$data = $this->db->select('l.*,p.perusahaan,p.logo')
						 ->from('lowongan as l')
						 ->join('perusahaan as p','l.id_perusahaan = p.id','left')
						 ->where("lowongan like '%".$string."%' or perusahaan like '%".$string."%' or penempatan like '%".$string."%' or min_pendidikan like '%".$string."%'")
						 ->order_by('id','desc')
						 ->get()->result();
		return $data;
	}
	function get_loker_detail($id){
		$data = $this->db->select('l.*,p.perusahaan,p.logo')
						 ->from('lowongan as l')
						 ->join('perusahaan as p','l.id_perusahaan = p.id','left')
						 ->where('l.id',$id)
						 ->order_by('id','desc')
						 ->get()->row();
		return $data;
	}
	function get_user_profile($id_users){
		$data_login = $this->Cek_login->data_login();
		$data = $this->db->where('id',$data_login['id_user'])->get('users')->row();
		return $data;
	}
	function get_kat_pendidikan(){
		$data = $this->db->get('kategori_pendidikan')->result();
		return $data;
	}
	function get_perusahaan(){
		$data = $this->db->get('perusahaan')->result();
		return $data;
	}
	function get_pengalaman(){
		$data_login = $this->Cek_login->is_login();
		$data = $this->db->where('id_user',$data_login['id_user'])->get('pengalaman')->result();
		return $data;
	}
	function get_pengalaman_by_id($id){
		return $this->db->where('id',$id)->get('pengalaman')->row();
	}
	function get_bidang(){
		return $this->db->get('bidang')->result();
	}
	function get_city(){
		return $this->db->order_by('name','asc')->get('city')->result();
	}
	function get_data_pendidikan($type){
		$data_login = $this->Cek_login->data_login();
		return $this->db->select('dp.*,kp.pendidikan as pendidikan')->from('data_pendidikan as dp')->join('kategori_pendidikan as kp','kp.id = dp.id_kat_pendidikan')->where('id_user', $data_login['id_user'])->where('type',$type)->get()->result();
	}
	function get_pendidikan_by_id($id){
		$data_login = $this->Cek_login->data_login();
		return $this->db->where('id_user',$data_login['id_user'])->where('id',$id)->get('data_pendidikan')->row();
	}
	function get_kat_bidang(){
		return $this->db->where('jenis', 1)->get('kat_sertifikasi')->result();
	}
	function get_kat_lembaga(){
		return $this->db->where('jenis',2)->get('kat_sertifikasi')->result();
	}
	function get_data_sertifikasi(){
		$data_login = $this->Cek_login->data_login();
		return $this->db->select('ds.*,ks.sertifikasi as bidang,kl.sertifikasi as lembaga')
						->from('data_sertifikasi as ds')
						->join('kat_sertifikasi as ks','ks.id = ds.id_bidang_sertifikasi')
						->join('kat_sertifikasi as kl','kl.id = ds.id_lembaga_sertifikasi')
						->where('ds.id_user', $data_login['id_user'])
						->get()->result();
	}
	function get_data_sertifikasi_by_id($id){
		$data_login = $this->Cek_login->data_login();
		return $this->db->select('ds.*,ks.sertifikasi as bidang,kl.sertifikasi as lembaga')
						->from('data_sertifikasi as ds')
						->join('kat_sertifikasi as ks','ks.id = ds.id_bidang_sertifikasi')
						->join('kat_sertifikasi as kl','kl.id = ds.id_lembaga_sertifikasi')
						->where('ds.id_user', $data_login['id_user'])
						->where('ds.id',$id)
						->get()->row();
	}
	function get_testimoni(){
		$data_login = $this->Cek_login->data_login();
		return $this->db->where('id_user', $data_login['id_user'])->get('testimoni')->result();
	}
	

}

/* End of file Member_model.php */
/* Location: ./application/models/Member_model.php */