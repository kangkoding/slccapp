<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_login extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('ion_auth');
		$this->load->model('ion_auth_model');
	}
	function is_login(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else
		{
			$username = $this->session->userdata('username');
			$query = $this->db->where('email',$username)->get('users')->row();
			if(count($query) > 0){
				$data = array(
					'id_user'=>$query->id,
					'username'=>$username,
					);
				return $data;
			}else {
				$data = array('');
				return $data;
			}
		}
	}
	function is_admin(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect(site_url(), 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
	}
	function data_login(){
		$username = $this->session->userdata('username');
		$query = $this->db->where('email',$username)->get('users')->row();
		if($query != ''){
			$data = array(
				'id_user'=>$query->id,
				'username'=>$username,
				);
			return $data;
		}else {
			$data = array('');
			return $data;
		}
	}

}

/* End of file Cek_login.php */
/* Location: ./application/models/Cek_login.php */