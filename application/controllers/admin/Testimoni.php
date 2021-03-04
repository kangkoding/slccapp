<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimoni extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Testimoni_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->model('Cek_login');
        $data_login = $this->Cek_login->is_admin();

    }

    public function index()
    {
        $this->slice->view('admin/testimoni/testimoni_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Testimoni_model->json();
    }

    public function read($id) 
    {
        $row = $this->Testimoni_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'id_user' => $row->id_user,
    		'isi' => $row->isi,
    		'tanggal' => $row->tanggal,
            'name' => $row->name,
	    );
            $this->slice->view('admin/testimoni/testimoni_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('testimoni'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('testimoni/create_action'),
    	    'id' => set_value('id'),
    	    'id_user' => set_value('id_user'),
    	    'isi' => set_value('isi'),
    	    'tanggal' => set_value('tanggal'),
	);
        $this->slice->view('admin/testimoni/testimoni_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'id_user' => $this->input->post('id_user',TRUE),
    		'isi' => $this->input->post('isi',TRUE),
    		'tanggal' => $this->input->post('tanggal',TRUE),
	    );

            $this->Testimoni_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('testimoni'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Testimoni_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('testimoni/update_action'),
		'id' => set_value('id', $row->id),
		'id_user' => set_value('id_user', $row->id_user),
		'isi' => set_value('isi', $row->isi),
		'tanggal' => set_value('tanggal', $row->tanggal),
	    );
            $this->slice->view('admin/testimoni/testimoni_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('testimoni'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'isi' => $this->input->post('isi',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
	    );

            $this->Testimoni_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('testimoni'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Testimoni_model->get_by_id($id);

        if ($row) {
            $this->Testimoni_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('testimoni'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('testimoni'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('isi', 'isi', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "testimoni.xls";
        $judul = "testimoni";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id User");
	xlsWriteLabel($tablehead, $kolomhead++, "Isi");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

	foreach ($this->Testimoni_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=testimoni.doc");

        $data = array(
            'testimoni_data' => $this->Testimoni_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('admin/testimoni/testimoni_doc',$data);
    }

}

/* End of file Testimoni.php */
/* Location: ./application/controllers/Testimoni.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-19 10:13:55 */
/* http://harviacode.com */