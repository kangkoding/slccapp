<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gallery_model');
        $this->load->model('Upload_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
        is_admin();
    }

    public function index()
    {
        $this->slice->view('admin/gallery/gallery_list');
    }
    public function gambar()
    {
        $this->slice->view('admin/gallery/gambar_list');
    }
    public function add()
    {
        $data['album'] = $this->db->get('gallery')->result();
        $this->slice->view('admin/gallery/add_gambar',$data);
    }
    public function add_action()
    {
        $id  = $this->input->post('album');
        $row = $this->db->where('id',$id)->get('gallery')->row();
        $album_title = $row->title;
        if(!empty($_FILES['images']['name'])){
            if (!file_exists('assets/images/gallery/'.$album_title)) {
                $dir = mkdir('assets/images/gallery/'.$album_title, 0777, true);
            }
            $file = $this->Upload_model->mupload_files('assets/images/gallery/'.$album_title,'',$_FILES['images']);
             if(!empty($file)){
                $array = array(
                    '.jpeg'=>'',
                    '.jpg'=>'',
                    '.png'=>'',
                    '.gif'=>''
                );
                 foreach ($file as $f => $v) {
                    $title = $this->clean(strtr($v,$array));
                    $data = array('images'=>$v,'id_gallery'=>$id,'title'=>$title);
                    $this->db->insert('images_gallery', $data);
                 }
            }
        }
        redirect(site_url('admin/gallery/gambar'),'refresh');
    }
    public function json() {
        header('Content-Type: application/json');
        echo $this->Gallery_model->json();
    }
    public function jsongambar()
    {
        header('Content-Type: application/json');
        echo $this->Gallery_model->jsongambar();
    }

    public function read($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'title' => $row->title,
			'description' => $row->description,
	    );
            $this->slice->view('admin/gallery/gallery_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/gallery'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/gallery/create_action'),
		    'id' => set_value('id'),
		    'title' => set_value('title'),
		    'description' => set_value('description'),
		);
        $this->slice->view('admin/gallery/gallery_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'title' => $this->input->post('title',TRUE),
			'description' => $this->input->post('description',TRUE),
	    	);

            $album_title = $this->input->post('title',TRUE);
            $id = $this->Gallery_model->insert($data);
            //print_r($_FILES['images']);
			if(!empty($_FILES['images']['name'])){
                if (!file_exists('assets/images/gallery/'.$album_title)) {
                    $dir = mkdir('assets/images/gallery/'.$album_title, 0777, true);
                }
    			$file = $this->Upload_model->mupload_files('assets/images/gallery/'.$album_title,'',$_FILES['images']);
    			 if(!empty($file)){
                $array = array(
                    '.jpeg'=>'',
                    '.jpg'=>'',
                    '.png'=>'',
                    '.gif'=>''
                );
                 foreach ($file as $f => $v) {
                    $title = $this->clean(strtr($v,$array));
    					$data = array('images'=>$v,'id_gallery'=>$title);
    					$this->db->insert('images_gallery', $data);
    				 }
    			}
			}
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/gallery'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/gallery/update_action'),
				'id' => set_value('id', $row->id),
				'title' => set_value('title', $row->title),
				'description' => set_value('description', $row->description),
	    );
            $this->slice->view('admin/gallery/gallery_form_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/gallery'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $old = $this->db->where('id',$this->input->post('id'))->get('gallery')->row();
            $data = array(
			'title' => $this->input->post('title',TRUE),
			'description' => $this->input->post('description',TRUE),
	        );

            $this->Gallery_model->update($this->input->post('id', TRUE), $data);
            rename('assets/images/gallery/'.$old->title, 'assets/images/gallery/'.$this->input->post('title'));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/gallery'));
        }
    }
        function update_title()
        {
            $id = $this->input->post('id');
            echo  $this->input->post('title');
            
            $data = array(
                    'title'=>$this->input->post('title'),
                );
            $this->db->where('id', $id);
            $this->db->update('images_gallery', $data);
            
        }
    
    public function delete($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);

        if ($row) {
            $this->Gallery_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/gallery'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/gallery'));
        }
    }
    public function delete_gambar($id)
    {
        $this->db->where('id', $id);
        if($this->db->delete('images_gallery')){
            redirect(site_url('admin/gallery/gambar'),'refresh');
        };
    }


    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    private function clean($string) {
       $string = str_replace('-', ' ', ucwords($string)); // Replaces all spaces with hyphens.
       $r = preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
       return str_replace('  ',' ',$r);

    }

}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-18 11:08:49 */
/* http://harviacode.com */