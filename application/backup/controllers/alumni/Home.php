<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->db2 = $this->load->database("esimakad", true);
		if ($this->session->userdata('status_mhs')!="alumni") {
			show_404();
		}
	}

	public function index()
	{
		$data = array();
		$this->load->view('alumni/header');
		$this->load->view('alumni/home', $data, FALSE);
		$this->load->view('alumni/footer');
	}

	public function edit()
	{
		$id_mhs = $this->session->userdata('id_mhs');
		$data = array(
			'action' => site_url('alumni/home/edit_action'),
			'data' => $this->db2->where('id_mhs', $id_mhs)->get('tb_mahasiswa')->row()
		);
		$this->load->view('alumni/header');
		$this->load->view('alumni/data_pribadi', $data, FALSE);
		$this->load->view('alumni/footer');
	}

	public function edit_action()
	{
		$id_mhs = $this->session->userdata('id_mhs');
		if (!empty($id_mhs)) {
			$data_update = array(
				'alamat' => $this->input->post('alamat', true),
				'RT' => $this->input->post('rt', true),
				'RW' => $this->input->post('rw', true),
				'KD_POS' => $this->input->post('kode_pos', true),
				'email' => $this->input->post('email', true),
				'tpt_kerja' => $this->input->post('tpt_kerja', true),
				'alamat_kerja' => $this->input->post('alamat_kerja', true),
				'telp_kerja' => $this->input->post('telp_kerja', true),
				'jabatan' => $this->input->post('jabatan', true),
			);
			$this->db->where('id_mhs', $id_mhs);
			$this->db->update('tb_mahasiswa', $data_update);
			$this->session->set_flashdata('message', '<div class="alert alert-success"><i class="fa fa-check-circle"></i> Data Tersimpan</div>');
		}
		redirect('alumni/home/edit', 'refresh');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */