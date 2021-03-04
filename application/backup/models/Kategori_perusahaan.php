<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_perusahaan extends CI_Model {

	function get_all(){
		return $this->db->get('kat_perusahaan')->result();
	}
	

}

/* End of file Kategori_perusahaan.php */
/* Location: ./application/models/Kategori_perusahaan.php */