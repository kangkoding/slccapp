<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	function get_menu(){
		$data = array();
		$result = $this->db->get('menu')->result();
		foreach ($result as $row) {
			$data[] = array(
				'id'=>$row->id,
				'menu'=>$row->menu,
				'slug'=>$row->slug,
				'is_url'=>$row->is_url,
				'parameter'=>$row->parameter,
				'sub_menu'=>$this->get_sub_menu($row->id),
			);
		}
		return $data;

	}
	function get_sub_menu($id_menu){
		return $this->db->where('id_menu',$id_menu)->get('submenu')->result();
	}
	function get_top_menu()
	{
		$data = array();
		$result = $this->db->get('top_menu')->result();
		foreach ($result as $r) {
			$data[] = array('title'=>$r->title,'url'=>$r->url);
		}
		return $data;
	}

}

/* End of file Menu_model.php */
/* Location: ./application/models/Menu_model.php */