<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Cek_login');
        $data_login = $this->Cek_login->is_admin();
	}
	public function index()
	{
		$this->load->model('Page_model');
		$data['message'] =  $this->session->flashdata('message');
		$data['page'] = $this->Page_model->get_all();
		$this->slice->view('admin.menu.menu',$data);		
	}
	public function create()
	{
	    $is_url = $this->input->post('is_url');
	    if($is_url == true){
	        $is_url = 1;
	    }else{
	        $is_url = 0;
	    }
		$data = array(
			'menu'=>$this->input->post('menu'),
			'slug'=>$this->input->post('slug'),
			'is_url'=>$is_url,
			'parameter'=>$this->input->post('parameter'),
		);
		$insert = $this->db->insert('menu', $data);
		if($insert){
			$this->session->set_flashdata('message', 'Create Record Successfully');
		}else{
			$this->session->set_flashdata('message', 'Create Record Failed');
		}
		redirect(site_url('admin/menu'),'refresh');
	}
	function edit_menu(){
	    $is_url = $this->input->post('is_url');
	    if($is_url == true){
	        $is_url = 1;
	    }else{
	        $is_url = 0;
	    }
		$data = array(
			'id'=>$this->input->post('id'),
			'menu'=>$this->input->post('menu'),
			'slug'=>$this->input->post('slug'),
			'is_url'=>$is_url,
			'parameter'=>$this->input->post('parameter'),
		);
		$this->db->where('id', $this->input->post('id'));
		$update = $this->db->update('menu', $data);
		if($update){
			echo 'Update berhasil';
		}else{
			echo 'Update gagal';
		}
	}
	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('menu');
		if($delete){
			$this->db->where('id_menu', $id);
			$this->db->delete('submenu');
		}
		redirect(site_url('admin/menu'),'refresh');
	}
	public function create_submenu()
	{
	    $is_url = $this->input->post('is_url');
	    if($is_url == true){
	        $is_url = 1;
	    }else{
	        $is_url = 0;
	    }
		$data = array(
			'submenu'=>$this->input->post('submenu'),
			'slug'=>$this->input->post('slug'),
			'id_menu'=>$this->input->post('id_menu'),
			'is_url'=>$this->input->post('is_url'),
			'parameter'=>$this->input->post('parameter'),
		);
		$insert = $this->db->insert('submenu', $data);
		if($insert){
			$this->session->set_flashdata('message', 'Create Record Successfully');
		}else{
			$this->session->set_flashdata('message', 'Create Record Failed');
		}
		redirect(site_url('admin/menu'),'refresh');
	}
	function edit_submenu(){
	    $is_url = $this->input->post('is_url');
	    if($is_url == true){
	        $is_url = 1;
	    }else{
	        $is_url = 0;
	    }
		$data = array(
			'id'=>$this->input->post('id'),
			'submenu'=>$this->input->post('submenu'),
			'slug'=>$this->input->post('slug'),
			'is_url'=>$is_url,
			'parameter'=>$this->input->post('parameter'),
		);
		$this->db->where('id', $this->input->post('id'));
		$update = $this->db->update('submenu', $data);
		if($update){
			echo 'Update berhasil';
		}else{
			echo 'Update gagal';
		}
	}
	public function delete_submenu($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('submenu');
		if($delete){
			$this->session->set_flashdata('message', 'Delete Record Successfully');
		}else{
			$this->session->set_flashdata('message', 'Delete Record Failed');
		}
		redirect(site_url('admin/menu'),'refresh');
	}
	public function ajax()
	{
		$this->load->model('Page_model');
		$this->load->model('Post_model');
		$this->load->model('Program_studi_model');
		$id = $this->input->post('id');
		$data = array();
		if($id == 1){
			$result = $this->Page_model->get_all();
			$i = 0;
			foreach ($result as $row) {
				$data[$i] = new \stdClass();
				$data[$i]->slug = 'page/'.$row->slug;
				$data[$i]->judul = $row->judul;
				$i++;
			}
		}else if($id == 2){
			$result = $this->Post_model->get_all();
			$i = 0;
			foreach ($result as $row) {
				$data[$i] = new \stdClass();
				$data[$i]->slug = 'post/'.$row->slug;
				$data[$i]->judul = $row->judul;
				$i++;
			}

		}else if($id == 3){
			$result = $this->Program_studi_model->get_all();
			$i = 0;
			foreach ($result as $row) {
				$data[$i] = new \stdClass();
				$data[$i]->slug = 'program-studi/'.$row->id.'-'.$row->nama_program;
				$data[$i]->judul = $row->nama_program;
				$i++;
			}

		}
		echo "<select id='jenisSub' class='form-control jenis'>";
		echo "<option value=''>Pilih</option>";
		foreach ($data as $row) {
			echo "<option value='".strtolower(str_replace(' ','-',$row->slug))."'>".$row->judul."</option>";
		}
		echo "</select>";
		echo "
		<script>
			$('#jenisSub').change(function(){
				var slug = $(this).val();
	            if(slug != ''){
	                $('#subSlug').val(slug).attr('readonly','readonly');
	            }else{
	                $('#subSlug').val('').removeAttr('readonly');
	            }
			});	
		</script>";
	}
	public function getJson(){
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$row = array();
		if($type == 1){
			$row = $this->db->where('id',$id)->get('menu')->row();
		}else{
			$row = $this->db->where('id',$id)->get('submenu')->row();
		}
		echo json_encode($row);
	}
}

/* End of file Menu.php */
/* Location: ./application/controllers/admin/Menu.php */