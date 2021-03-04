<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Program_studi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Program_studi_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->model('Cek_login');
        $data_login = $this->Cek_login->is_admin();
    }

    public function index()
    {
        $this->slice->view('admin/program_studi/program_studi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Program_studi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Program_studi_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'nama_program' => $row->nama_program,
            'program_name' => $this->input->post('program_name'),
            'description' => $this->input->post('description'),
    		'deskripsi' => $row->deskripsi,
	    );
            $this->slice->view('admin/program_studi/program_studi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/program_studi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/program_studi/create_action'),
    	    'id' => set_value('id'),
    	    'nama_program' => set_value('nama_program'),
            'program_name' => set_value('program_name'),
            'description' => set_value('description'),
    	    'deskripsi' => set_value('deskripsi'),
	);
        $this->slice->view('admin/program_studi/program_studi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'nama_program' => $this->input->post('nama_program',TRUE),
            'program_name' => $this->input->post('program_name'),
            'description' => $this->input->post('description'),
    		'deskripsi' => $this->input->post('deskripsi',TRUE),
	    );

            $this->Program_studi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/program_studi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Program_studi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/program_studi/update_action'),
        		'id' => set_value('id', $row->id),
        		'nama_program' => set_value('nama_program', $row->nama_program),
                'program_name' => set_value('program_name',$row->program_name),
                'description' => set_value('description',$row->description),
        		'deskripsi' => set_value('deskripsi', $row->deskripsi),
	    );
            $this->slice->view('admin/program_studi/program_studi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/program_studi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
    		'nama_program' => $this->input->post('nama_program',TRUE),
            'program_name' => $this->input->post('program_name'),
            'description' => $this->input->post('description'),
    		'deskripsi' => $this->input->post('deskripsi',TRUE),
	    );

            $this->Program_studi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/program_studi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Program_studi_model->get_by_id($id);

        if ($row) {
            $this->Program_studi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/program_studi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/program_studi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_program', 'nama program', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Program_studi.php */
/* Location: ./application/controllers/Program_studi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-03 09:44:51 */
/* http://harviacode.com */