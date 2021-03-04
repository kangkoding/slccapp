<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sliders extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Sliders_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->model('Cek_login');
        $data_login = $this->Cek_login->is_admin();
    }

    public function index()
    {
        $data_login = $this->Cek_login->is_admin();
        $this->slice->view('admin.sliders.sliders_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Sliders_model->json();
    }
    public function read($id) 
    {
        $row = $this->Sliders_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'image' => $row->image,
                'level' => $row->level,
            );
            $this->slice->view('admin.sliders.sliders_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sliders'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/sliders/create_action'),
            'id' => set_value('id'),
            'image' => set_value('image'),
            'url'=> set_value('url'),
            'level' => set_value('level'),
            'title' => set_value('title'),
            'content' => set_value('content'),
        );
        $this->slice->view('admin.sliders.sliders_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '10000';
            $config['min_width']  = '0';
            $config['min_height']  = '0';
            $config['max_width']  = '4867';
            $config['max_height']  = '2071';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')){
                $data_upload = $this->upload->data();
                $data = array(
                    'image' => $data_upload['file_name'],
                    'level' => $this->input->post('level',TRUE),
                    'url'   => $this->input->post('url',TRUE),
                    'title' => $this->input->post('title', TRUE),
                    'content'   => $this->input->post('content', TRUE)
                );
                $this->Sliders_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', 'Create Record Failed');
            }
            redirect(site_url('admin/sliders'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sliders_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/sliders/update_action'),
                'id' => set_value('id', $row->id),
                'image' => set_value('image', $row->image),
                'level' => set_value('level', $row->level),
                'url' => set_value('url',$row->url),
                'title' => set_value('title', $row->title),
                'content' => set_value('content',$row->content),
            );
            $this->slice->view('admin.sliders.sliders_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sliders'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $row = $this->Sliders_model->get_by_id($this->input->post('id', TRUE));
            if ($row) {
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']  = '10000';
                $config['min_width']  = '3267';
                $config['min_height']  = '471';
                $config['max_width']  = '4867';
                $config['max_height']  = '2071';
                $this->load->library('upload', $config);
                $data = array();
                $data['url'] = $this->input->post('url');
                $data['title'] = $this->input->post('title');
                $data['content'] = $this->input->post('content');
                $data['level'] = $this->input->post('level',TRUE);
                if ($this->upload->do_upload('image')){
                    $data_upload = $this->upload->data();
                    $data['image'] = $data_upload['file_name'];
                }
                $this->Sliders_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
            } else {
                $this->session->set_flashdata('message', 'Update Record Failed');
            }
            redirect(site_url('admin/sliders'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sliders_model->get_by_id($id);
        if ($row) {
            $this->Sliders_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/sliders'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/sliders'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('level', 'level', 'trim|required');
        $this->form_validation->set_rules('image', 'image', 'trim');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}