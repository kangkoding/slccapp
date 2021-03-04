<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kat_pendidikan_model extends CI_Model {
	
	function get_all(){
		return $this->db->get('kategori_pendidikan')->result();
	}
	

}

/* End of file Kat_pendidikan_model.php */
/* Location: ./application/models/Kat_pendidikan_model.php */