<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_mhs_model extends CI_Model {

	public $table = 'tb_user_mhs';

	function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
        $this->load->library('encrypt');
		$this->db2 = $this->load->database("esimakad", true);
	}

	function get_by_nim($nim)
	{
		$row = $this->db2->select('um.*, m.*')
						->from('tb_user_mhs um')
						->join('tb_mahasiswa m', 'um.nim=m.NIM', "left")
						->where("um.nim", $nim)
						->get()->row();
		return $row;
	}
	
    // cek login atau tidak?
    public function cek_akun()
    {		
		error_reporting(E_ALL^E_DEPRECATED);
        $nim 	  = $this->input->post('nim');
        $password = $this->input->post('password');
		$query    = $this->db2->where('nim', $nim)
							->limit(1)
							->get('tb_user_mhs')->row();
		if ($query)
		{
			if($this->encrypt->decode($query->password)==$password)
			{
				$mhs = $this->db2->where('NIM',$nim)->get('tb_mahasiswa')->row();
				$data = array(
					'nim' 		    => $nim,
					'nama' 		    => $mhs->nama,
					'login' 		=> TRUE,
					'alamat'	    => $mhs->alamat,
					'tpt_lahir'	    => $mhs->tpt_lahir,
					'tgl_lahir'	    => $mhs->tgl_lahir,
					'kd_jkel'	    => $mhs->kd_jkel,
					'kd_agama'	    => $mhs->kd_agama,
					'nm_bpk'	    => $mhs->nm_bpk,
					'nm_ibu'	    => $mhs->nm_ibu,
					'no_telp'	    => $mhs->no_telp,
					'no_hp'	    	=> !empty($mhs->no_hp) ? $mhs->no_hp : "",
					'email'	    	=> $mhs->email,
					'nik_dosen'	    => !empty($mhs->nik) ? $mhs->nik : "",
					'id_foto'	    => $mhs->id_foto,
					'thn_masuk'		=> !empty($mhs->thn_akdm) ? $mhs->thn_akdm : "",
					'thn_akdm'		=> $this->get_tb_setting('th_akdm')->row('pengaturan'),
					'kd_thakdm'		=> $this->get_tb_setting('th_akdm')->row('pengaturan'),
					'kd_progdi'		=> $mhs->kd_progdi,
					'password' 		=> $query->password,
					'th_akdm_ujian'	=> $this->get_tb_setting('th_akdm')->row('pengaturan'),
					'ujian'			=> $this->get_tb_setting('ujian')->row('pengaturan')
				);
				// buat data session jika login benar
				$this->session->set_userdata($data);
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}   
    }

	function get_tb_setting($nama_setting) {
		return $this->db2->where('nama_pengaturan',$nama_setting)
						->get('tb_setting');
	}

}

/* End of file User_mhs_model.php */
/* Location: ./application/models/User_mhs_model.php */