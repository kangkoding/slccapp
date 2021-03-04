<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sidebar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sidebar_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->model('Cek_login');
        $data_login = $this->Cek_login->is_admin();
    }

    public function index()
    {
        $data['sidebar'] = $this->db->select('s.*,s.id as arrange')
                                    ->from('sidebar as s')
                                    ->join('sidebar_arrange as sa','s.id = sa.id_sidebar')
                                    ->order_by('sa.id','asc')->get()->result();
        $this->slice->view('admin/sidebar/sidebar_list',$data);
    }
        function change_arrange()
        {
            $sort = $this->input->post('item');
            if(!empty($sort)){
                $this->db->truncate('sidebar_arrange');
                foreach ($sort as $s) {
                   $data = array('id_sidebar'=>$s);
                   $this->db->insert('sidebar_arrange', $data);
                }
            }
        }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Sidebar_model->json();
    }

    public function read($id) 
    {
        $row = $this->Sidebar_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'title' => $row->title,
    		'jenis' => $row->jenis,
    		'id_kategori' => $row->id_kategori,
    		'table' => $row->table,
    		'isi' => $row->isi,
    		'arrange' => $row->arrange,
    		'limit' => $row->limit,
	    );
            $this->slice->view('admin/sidebar/sidebar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/sidebar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/sidebar/create_action'),
    	    'id' => set_value('id'),
    	    'title' => set_value('title'),
    	    'jenis' => set_value('jenis'),
    	    'id_kategori' => set_value('id_kategori'),
    	    'table' => set_value('table'),
    	    'isi' => set_value('isi'),
    	    'limit' => set_value('limit'),
            'data_jenis' => $this->db->get('sidebar_opsi')->result(),
            'data_kategori' => $this->db->get('post_kategori')->result(),
	);
        $this->slice->view('admin/sidebar/sidebar_form_edit', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'title' => $this->input->post('title',TRUE),
    		'jenis' => $this->input->post('jenis',TRUE),
    		'id_kategori' => $this->input->post('id_kategori',TRUE),
    		'table' => $this->input->post('table',TRUE),
    		'isi' => $this->input->post('isi',TRUE),
    		'limit' => $this->input->post('limit',TRUE),
	    );

            $this->Sidebar_model->insert($data);
            $id = $this->db->insert_id();
            $data = array('id_sidebar'=>$id);
            $this->db->insert('sidebar_arrange', $data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/sidebar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sidebar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/sidebar/update_action'),
        		'id' => set_value('id', $row->id),
        		'title' => set_value('title', $row->title),
        		'jenis' => set_value('jenis', $row->jenis),
        		'id_kategori' => set_value('id_kategori', $row->id_kategori),
        		'table' => set_value('table', $row->table),
        		'isi' => set_value('isi', $row->isi),
        		'limit' => set_value('limit', $row->limit),
                'data_jenis' => $this->db->get('sidebar_opsi')->result(),
                'data_kategori' => $this->db->get('post_kategori')->result(),
	       );
            $this->slice->view('admin/sidebar/sidebar_form_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/sidebar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
    		'title' => $this->input->post('title',TRUE),
    		'jenis' => $this->input->post('jenis',TRUE),
    		'id_kategori' => $this->input->post('id_kategori',TRUE),
    		'table' => $this->input->post('table',TRUE),
    		'isi' => $this->input->post('isi',TRUE),
    		'limit' => $this->input->post('limit',TRUE),
	    );

            $this->Sidebar_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/sidebar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sidebar_model->get_by_id($id);

        if ($row) {
            $this->Sidebar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/sidebar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/sidebar'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('title', 'title', 'trim|required');
    	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
    	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim');
    	$this->form_validation->set_rules('table', 'table', 'trim');
    	$this->form_validation->set_rules('isi', 'isi', 'trim');
    	$this->form_validation->set_rules('arrange', 'arrange', 'trim');
    	$this->form_validation->set_rules('limit', 'limit', 'trim');

    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Sidebar.php */
/* Location: ./application/controllers/Sidebar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-09 08:09:35 */
/* http://harviacode.com */