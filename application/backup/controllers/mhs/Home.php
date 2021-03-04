<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->db2 = $this->load->database("esimakad", true);
		if ($this->session->userdata('status_mhs')!="mhs") {
			show_404();
		}
	}

	public function index()
	{
		$data = array();
		$this->load->view('mhs/header');
		$this->load->view('mhs/home', $data, FALSE);
		$this->load->view('mhs/footer');
	}

	public function mata_kuliah()
	{
		$row_th_akdm = $this->db2->order_by('id_th_akdm', 'desc')->get('tb_th_akdm')->row();
		$nim = $this->session->userdata('nim');
		$data = array(
			'data_krs' => $this->db2->select('krs.*, mk.*, jadwal.KELOMPOK, kary.nama AS nama_dosen')
								   ->from('tb_krs krs')
								   ->join('tb_mk mk', 'krs.KD_MK=mk.kd_mk')
								   ->join('tb_jadwal jadwal', 'krs.TH_AKDM=jadwal.TH_AKDM AND krs.ID_JADWAL=jadwal.ID_JADWAL AND krs.KD_MK=jadwal.KD_MK', 'left')
								   ->join('tb_kary kary', 'jadwal.NIK=kary.NIK')
								   ->where('krs.NIM', $nim)
								   ->where('krs.TH_AKDM', $row_th_akdm->th_akdm)
								   ->order_by('krs.id_umpan_balik', 'desc')
								   ->order_by('mk.nm_mk', 'asc')
								   ->group_by("krs.id")
								   ->get()->result()
		);
		$this->load->view('mhs/header');
		$this->load->view('mhs/mata_kuliah', $data, FALSE);
		$this->load->view('mhs/footer');
	}

	public function kuesioner()
	{
		if (!empty($this->input->post('id_krs'))) {
			$row_th_akdm = $this->db2->order_by('id_th_akdm', 'desc')->get('tb_th_akdm')->row();
			$data_krs = $this->db2->select('krs.*, mk.*, jadwal.KELOMPOK, kary.nama AS nama_dosen')
								   ->from('tb_krs krs')
								   ->join('tb_mk mk', 'krs.KD_MK=mk.kd_mk')
								   ->join('tb_jadwal jadwal', 'krs.TH_AKDM=jadwal.TH_AKDM AND krs.ID_JADWAL=jadwal.ID_JADWAL AND krs.KD_MK=jadwal.KD_MK', 'left')
								   ->join('tb_kary kary', 'jadwal.NIK=kary.NIK')
								   ->where('krs.TH_AKDM', $row_th_akdm->th_akdm)
								   ->where('krs.ID', $this->input->post('id_krs', true))
								   ->get()->row();
			$data = array(
				'data_krs' => $data_krs,
				'tb_umpan_balik_ques_group' => $this->db2->get('tb_umpan_balik_ques_group')->result(),
				'tb_umpan_balik_jawaban' => $this->db2->get('tb_umpan_balik_jawaban')->result(),
			);
			$this->load->view('mhs/header');
			$this->load->view('mhs/isi_kuesioner', $data, FALSE);
			$this->load->view('mhs/footer');
		} else {
			redirect('mhs/home/mata_kuliah','refresh');
		}
	}

	public function simpan_kuesioner()
	{
		$id_krs = $this->input->post('id_krs', true);
		$kues = $this->input->post('kues', true);
		foreach ($kues as $id_kues => $id_jawaban) {
			if (!empty($id_jawaban)) {
                $row_umpan_balik = $this->db2->select('*')
                                             ->from('tb_umpan_balik')
                                             ->where('id_krs', $id_krs)
                                             ->where('id_umpan_balik_ques', $id_kues)
                                             ->get()->row();
                if ($row_umpan_balik) {
					$data_update = array(
						'jawaban' => $id_jawaban,
						'tanggal' => date('Y-m-d H:i:s'),
					);
					$this->db2->where('id', $row_umpan_balik->id);
					$this->db2->update('tb_umpan_balik', $data_update);
                } else {
					$data_insert = array(
						'id_krs' => $id_krs,
						'id_umpan_balik_ques' => $id_kues,
						'jawaban' => $id_jawaban,
						'tanggal' => date('Y-m-d H:i:s'),
					);
					$this->db2->insert('tb_umpan_balik', $data_insert);	
                }
			}
		}
		redirect('mhs/home/mata_kuliah', 'refresh');
	}

	public function edit()
	{
		$id_mhs = $this->session->userdata('id_mhs');
		$data = array(
			'action' => site_url('mhs/home/edit_action'),
			'data' => $this->db2->where('id_mhs', $id_mhs)->get('tb_mahasiswa')->row()
		);
		$this->load->view('mhs/header');
		$this->load->view('mhs/data_pribadi', $data, FALSE);
		$this->load->view('mhs/footer');
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
		redirect('mhs/home/edit', 'refresh');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */