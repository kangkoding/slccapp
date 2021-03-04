<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feature_section extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Feature_section_model');
        $this->load->model('Upload_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->slice->view('admin/feature_section/feature_section_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Feature_section_model->json();
    }

    public function read($id) 
    {
        $row = $this->Feature_section_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'title' => $row->title,
		'icon' => $row->icon,
		'link' => $row->link,
	    );
            $this->slice->view('admin/feature_section/feature_section_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/feature_section'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/feature_section/create_action'),
    	    'id' => set_value('id'),
    	    'title' => set_value('title'),
    	    'icon' => set_value('icon'),
    	    'link' => set_value('link'),
	);
        $this->slice->view('admin/feature_section/feature_section_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $file = '';
            if(isset($_FILES['icon'])){
             $file = $this->Upload_model->upload_files('assets/images/','',$_FILES['icon']);
            }
            $data = array(
    		'title' => $this->input->post('title',TRUE),
    		'icon' => $file,
    		'link' => $this->input->post('link',TRUE),
	        );
            $this->Feature_section_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/feature_section'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Feature_section_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/feature_section/update_action'),
        		'id' => set_value('id', $row->id),
        		'title' => set_value('title', $row->title),
        		'icon' => set_value('icon', $row->icon),
        		'link' => set_value('link', $row->link),
	    );
            $this->slice->view('admin/feature_section/feature_section_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/feature_section'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $old_images = $this->input->post('old_image');
            $file = '';
            if(!empty($_FILES['icon']['name'])){
             @unlink('assets/images/'.$old_images);
             $file = $this->Upload_model->upload_files('assets/images/','',$_FILES['icon']);
            }else{
             $file = $this->input->post('old_image');
            }
            $data = array(
        		'title' => $this->input->post('title',TRUE),
        		'icon' => $file,
        		'link' => $this->input->post('link',TRUE),
	        );
            echo $file;
            $this->Feature_section_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/feature_section'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Feature_section_model->get_by_id($id);

        if ($row) {
            $this->Feature_section_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/feature_section'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/feature_section'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim');
	$this->form_validation->set_rules('icon', 'icon', 'trim');
	$this->form_validation->set_rules('link', 'link', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Feature_section.php */
/* Location: ./application/controllers/Feature_section.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-10 10:55:51 */
/* http://harviacode.com */