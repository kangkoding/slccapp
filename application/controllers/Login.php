<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User_mhs_model', 'mhs', true);
		$this->load->library('encrypt');
	}

	public function index()
	{
		$data = array(
			'action' => site_url('login/check_login'),
			'nim' => set_value("nim"),
			'password' => set_value("password"),
		);
		$this->load->view('auth/swu_login', $data, FALSE);
	}

	public function check_login()
	{
		error_reporting(E_ALL^E_DEPRECATED);
		$this->_rules();
		if ($this->form_validation->run() === TRUE) {
			if ($this->mhs->cek_akun()) {
				$nim = $this->input->post('nim', true);
				$row_mhs = $this->mhs->get_by_nim($nim);
				if ($row_mhs) {
					if ($row_mhs->alumni==1) {
						// alumni
		                $login_data = array(
	                		'id' => $row_mhs->id_user_mhs,
	                		'id_mhs' => $row_mhs->id_mhs,
	                		'nim' => $row_mhs->nim,
	                		'nama' => $row_mhs->nama,
	                		'login_status' => TRUE,
	                		'status_mhs' => 'alumni'
		                );
						$this->session->set_userdata($login_data);
						redirect('al', 'refresh');
					} else {
						// mahasiswa
		                $login_data = array(
	                		'id' => $row_mhs->id_user_mhs,
	                		'id_mhs' => $row_mhs->id_mhs,
	                		'nim' => $row_mhs->nim, 
	                		'nama' => $row_mhs->nama,
	                		'login_status' => TRUE,
	                		'status_mhs' => 'mhs'
		                );
						$this->session->set_userdata($login_data);
						redirect('mhs/home/mata_kuliah', 'refresh');
					}
				} else {
					$this->session->set_flashdata('message', 'NIM tidak ada!');
					redirect('login','refresh');
				}
			} else {
				$this->session->set_flashdata('message', 'NIM atau password salah!');
				redirect('login','refresh');
			}
		} else {
			$this->index();
		}
	}

	private function _rules()
	{
		$this->form_validation->set_rules('nim', "NIM", 'trim|required');
		$this->form_validation->set_rules('password', "Password", 'trim|required');
		$this->form_validation->set_error_delimiters('<p>', '</p>');
	}

}

/* End of file Auth_login.php */
/* Location: ./application/controllers/Auth_login.php */