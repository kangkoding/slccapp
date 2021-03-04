<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Page_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->model('Cek_login');
        $data_login = $this->Cek_login->is_admin();
    }

    public function index()
    {
        $this->slice->view('admin/page/page_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Page_model->json();
    }

    public function read($id) 
    {
        $row = $this->Page_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'judul' => $row->judul,
    		'isi' => $row->isi,
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'template' => $this->input->post('template'),
    		'created' => $row->created,
    		'updated' => $row->updated,
	    );
            $this->slice->view('admin/page/page_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/page'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/page/create_action'),
    	    'id' => set_value('id'),
    	    'judul' => set_value('judul'),
    	    'isi' => set_value('isi'),
            'title' => set_value('title'),
            'content' => set_value('content'),
            //'template' => set_value('template'),
    	    'created' => set_value('created'),
    	    'updated' => set_value('updated'),
            'id_template' => set_value('id_template'),
	       );
        $this->slice->view('admin/page/page_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'judul' => $this->input->post('judul',TRUE),
    		'isi' => $this->input->post('isi',TRUE),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'template' => $this->input->post('template'),
            'slug' => strtolower(str_replace(' ','-',$this->input->post('judul'))),
	    );

            $this->Page_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/page'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Page_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/page/update_action'),
        		'id' => set_value('id', $row->id),
        		'judul' => set_value('judul', $row->judul),
        		'isi' => set_value('isi', $row->isi),
                'title' => set_value('title', $row->title),
                'content' => set_value('content' , $row->content),
        		'created' => set_value('created', $row->created),
        		'updated' => set_value('updated', $row->updated),
                'id_template' => $row->template,
	    );
            $this->slice->view('admin/page/page_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/page'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
    		'judul' => $this->input->post('judul',TRUE),
    		'isi' => $this->input->post('isi',TRUE),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
    		'created' => $this->input->post('created',TRUE),
    		'updated' => $this->input->post('updated',TRUE),
            'template' => $this->input->post('template'),
	    );

            $this->Page_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/page'));
        }
    }
    public function upload_gambar(){
        $this->load->model('Upload_model');
        $this->Upload_model->tinymce_upload();
    }
    
    public function delete($id) 
    {
        $row = $this->Page_model->get_by_id($id);

        if ($row) {
            $this->Page_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/page'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/page'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('isi', 'isi', 'trim|required');
	$this->form_validation->set_rules('created', 'created', 'trim');
	$this->form_validation->set_rules('updated', 'updated', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Page.php */
/* Location: ./application/controllers/Page.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-03 10:04:50 */
/* http://harviacode.com */