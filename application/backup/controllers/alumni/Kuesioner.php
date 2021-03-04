<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kuesioner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kuesioner_model');
		$this->db2 = $this->load->database("esimakad", true);
		if ($this->session->userdata('status_mhs')!="alumni") {
			show_404();
		}
	}

	public function index()
	{
		$data = array(
			'data_soal' => $this->Kuesioner_model->get_paket_soal(),
		);
		$this->load->view('alumni/header');
		$this->load->view('alumni/kuesioner', $data, FALSE);
		$this->load->view('alumni/footer');
	}

	public function input(){
		$data = $this->input->post('data');
		$id_mhs = $this->session->userdata('id_mhs');
		foreach ($data as $dt) {
			$id_soal = $dt['name'];
			$id_jawaban = $dt['value'];
			if (!empty($id_jawaban)) {
				$row_kuesioner = $this->db2->select('*')
										  ->from('tb_alumni_kuesioner')
										  ->where('id_mhs', $id_mhs)
										  ->where('id_alumni_kues_soal', $id_soal)
										  ->get()->row();
				if ($row_kuesioner) {
					$data_update = array(
						'id_alumni_kues_jawaban' => $id_jawaban,
						'date_created' => date('Y-m-d H:i:s')
					);
					$this->db2->where('id', $row_kuesioner->id);
					$this->db2->update('tb_alumni_kuesioner', $data_update);
				} else {
					$data_insert = array(
						'id_mhs' => $id_mhs,
						'id_alumni_kues_soal' => $id_soal,
						'id_alumni_kues_jawaban' => $id_jawaban,
						'date_created' => date('Y-m-d H:i:s')
					);
					$this->db2->insert('tb_alumni_kuesioner', $data_insert);
				}
			}
		}
		echo json_encode($data);
	}

	public function data()
	{
		$data = array(
			'data_soal' => $this->Kuesioner_model->get_soal(),
			'th' => $this->Kuesioner_model->set_header_table(),
			'data_kues' => $this->Kuesioner_model->get_data_kues($this->session->userdata('id_mhs'))
		);
		$this->load->view('alumni/header');
		$this->load->view('alumni/kuesioner_list', $data, FALSE);
		$this->load->view('alumni/footer');
	}

}

/* End of file Kuesioner.php */
/* Location: ./application/controllers/Kuesioner.php */