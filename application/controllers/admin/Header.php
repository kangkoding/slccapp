<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Header extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Header_model');
        $this->load->model('upload_files');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
        $this->load->model('Cek_login');
        $this->Cek_login->is_admin();
    }

    public function index()
    {
        $this->slice->view('admin/header/header_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Header_model->json();
    }

    public function read($id) 
    {
        $row = $this->Header_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id' => $row->id,
            'gambar' => $row->gambar,
        );
            $this->slice->view('admin/header/header_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/header'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/header/create_action'),
            'id' => set_value('id'),
            'gambar' => set_value('gambar'),
    );
        $this->slice->view('admin/header/header_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $data = array(
            'gambar' => $this->input->post('gambar',TRUE),
        );

            $this->Header_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/header'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Header_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/header/update_action'),
                'id' => 1,
                'gambar' => $row->gambar,
        );
            $this->slice->view('admin/header/header_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/header'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $old_images = $this->input->post('old_image');
            @unlink('assets/images/'.$old_images);
            $files = '';
            if(isset($_FILES['gambar'])){
             $file = $this->Upload_model->upload_files('assets/images/','HDR'.rand('10','100').date('Y').date('s'),$_FILES['gambar']);
                $files = $file;
            }
            $data = array(
            'gambar' => $files,
        );

            $this->Header_model->update(1, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/header'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Header_model->get_by_id($id);

        if ($row) {
            $this->Header_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/header'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/header'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('gambar', 'gambar', 'trim');

    $this->form_validation->set_rules('id', 'id', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Header.php */
/* Location: ./application/controllers/Header.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-30 03:13:02 */
/* http://harviacode.com */