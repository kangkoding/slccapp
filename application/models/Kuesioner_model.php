<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->db2 = $this->load->database("esimakad", true);
	}

	function get_soal(){
		$this->db2->select('*');
		$this->db2->from('tb_alumni_kues_soal');
		$this->db2->where('status', 0);
		return $this->db2->get()->result();
	}	
		function _get_soal_by_id($id){
			$this->db2->select('*');
			$this->db2->from('tb_alumni_kues_soal');
			$this->db2->where('id', $id);
			return $this->db2->get()->row();
		}
	function get_jawaban(){
		$this->db2->select('*,kj.id as id');
		$this->db2->from('tb_alumni_kues_jawaban as kj');
		$this->db2->join('kues_soal as ks', 'kj.id_alumni_kues_soal = ks.id', 'left');
		return $this->db2->get()->result();
	}
		function _get_jawaban_by_id($id){
			$this->db2->select('*');
			$this->db2->from('tb_alumni_kues_jawaban');
			$this->db2->where('id_alumni_kues_soal', $id);
			return $this->db2->get()->result();
		}
		function _get_row_jawaban_by_id($id){
			$this->db2->select('*');
			$this->db2->from('tb_alumni_kues_jawaban');
			$this->db2->where('id', $id);
			return $this->db2->get()->row();
		}
	function get_paket_soal(){
		$output = array();
		$data_soal = $this->get_soal();
		foreach ($data_soal as $ds) {
			$data_jawaban = $this->_get_jawaban_by_id($ds->id);
			if(empty($data_jawaban)){
				$data_jawaban = array();
			}
			$output[] = (object)array(
							'id'=>$ds->id,
							'soal'=>$ds->soal,
							'data_jawaban'=>$data_jawaban,
						);
		}
		return $output;
	}
	function set_header_table(){
		$data_soal = $this->get_soal();
		$dat_s = array();
		foreach ($data_soal as $ds) {
			$dat_s[] = $ds->soal;
		}
		$output = array_merge($default,$dat_s);
		return $output;
	}
	function get_data_kuesioner($id = ''){  // data kuesioner frm db
		$this->db2->select('dk.*,dk.id as id, tm.nim, tm.nama, tm.alamat, tm.email, tm.kd_progdi');
		$this->db2->from('tb_alumni_kuesioner as dk');
		if (!empty($id)) {
			$this->db2->where('dk.id_mhs', $id); // id_users == no_mhs
		}
		$this->db2->join('tb_mahasiswa as tm', 'dk.id_mhs = tm.id_mhs', 'left');
		return $this->db2->get()->result();
	}
	function get_data_kues($id = ''){
		$data_kues = $this->get_data_kuesioner($id);
		$output = array();
		foreach ($data_kues as $dk) {
			$data_kuesioner = json_decode($dk->kuesioner);
			$rekap_kues = array();

			$djs = array();
			$data_soal = $this->get_soal();
			foreach ($data_soal as $ds) {
				$jawaban = '';
				foreach ($data_kuesioner as $dks) {
					if($dks->id_alumni_kues_soal == $ds->id){
						$row_jawaban = $this->_get_row_jawaban_by_id($dks->id_jawaban); 
						if(!empty($row_jawaban)) {
							$jawaban = $row_jawaban->jawaban;
						}
					}
				}
				$djs[] = array(
								'soal'=>$ds->soal,
								'jawaban'=>$jawaban,
							);
			}

			$output[] = (object)array(
							'id'=>$dk->id,
							'nim'=>$dk->nim,
							'nama'=>$dk->nama,
							'data_kuesioner'=>$djs,
						);
		}
		return $output;
	}
	function get_stats_each_kues($id = ''){
		$data_kues = $this->get_data_kuesioner($id);
		$data_soal = $this->get_soal();
		$data = array();
		foreach ($data_soal as $ds) {
			$id  = $ds->id;
			$data_jawaban = $this->_get_jawaban_by_id($ds->id);
			$data[$id]['soal'] = $ds->soal;
			$lj = 0;
			foreach ($data_jawaban as $dj) {
				$data[$id][$dj->jawaban] = 0;
				foreach ($data_kues as $dk) {
					$data_kuesioner = json_decode($dk->kuesioner);
					foreach ($data_kuesioner as $dkk) {

						if($dj->id == $dkk->id_jawaban){
							$data[$id][$dj->jawaban] += 1;
						}

					}
				}
			}
		}
		return $data;

	}
	function insert($data){
		$row = $this->db2->where('id_user', $data['id_user'])->get('tb_alumni_kuesioner')->row();
		if(empty($row)){
			$this->db2->insert('tb_alumni_kuesioner', $data);
		}else{
			$this->db2->where('id_user', $data['id_user']);
			$this->db2->update('tb_alumni_kuesioner', $data);
		}
	}

}

/* End of file Kuesioner_model.php */
/* Location: ./application/models/Kuesioner_model.php */