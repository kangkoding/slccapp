<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perusahaan_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->model('Kategori_perusahaan');
        $this->load->model('Cek_login');
        $data_login = $this->Cek_login->is_admin();

    }

    public function index()
    {
        $data_login = $this->Cek_login->is_admin();
        $this->slice->view('admin.perusahaan.perusahaan_list');
        //$this->load->view('admin/perusahaan/perusahaan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Perusahaan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Perusahaan_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'perusahaan' => $row->perusahaan,
    		'jenis_perusahaan' => $row->jenis_perusahaan,
    		'bergabung_sejak' => $row->bergabung_sejak,
    		'logo' => $row->logo,
	    );
            $this->slice->view('admin.perusahaan.perusahaan_read',$data);
           //$this->load->view('perusahaan/perusahaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perusahaan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/perusahaan/create_action'),
    	    'id' => set_value('id'),
    	    'perusahaan' => set_value('perusahaan'),
    	    'jenis_perusahaan' => set_value('jenis_perusahaan'),
    	    'bergabung_sejak' => set_value('bergabung_sejak'),
    	    'logo' => set_value('logo'),
            'kat_perusahaan' => $this->Kategori_perusahaan->get_all(), 
	   );
        $this->slice->view('admin.perusahaan.perusahaan_form', $data);
        //$this->load->view('perusahaan/perusahaan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'perusahaan' => $this->input->post('perusahaan',TRUE),
        		'jenis_perusahaan' => $this->input->post('jenis_perusahaan',TRUE),
        		'bergabung_sejak' => date('Y-m-d'),
        		'logo' => $this->input->post('logo',TRUE),
    	    );

            $this->Perusahaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/perusahaan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Perusahaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/perusahaan/update_action'),
        		'id' => set_value('id', $row->id),
        		'perusahaan' => set_value('perusahaan', $row->perusahaan),
        		'jenis_perusahaan' => set_value('jenis_perusahaan', $row->jenis_perusahaan),
        		'bergabung_sejak' => set_value('bergabung_sejak', $row->bergabung_sejak),
        		'logo' => set_value('logo', $row->logo),
                'kat_perusahaan' => $this->Kategori_perusahaan->get_all(), 

	    );
            $this->slice->view('admin.perusahaan.perusahaan_form', $data);
            //$this->load->view('perusahaan/perusahaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perusahaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
    		'perusahaan' => $this->input->post('perusahaan',TRUE),
    		'jenis_perusahaan' => $this->input->post('jenis_perusahaan',TRUE),
    		'bergabung_sejak' => $this->input->post('bergabung_sejak',TRUE),
    		'logo' => $this->input->post('logo',TRUE),
	    );

            $this->Perusahaan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('adminn/perusahaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Perusahaan_model->get_by_id($id);

        if ($row) {
            $this->Perusahaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/perusahaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/perusahaan'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('perusahaan', 'perusahaan', 'trim|required');
    	$this->form_validation->set_rules('jenis_perusahaan', 'jenis perusahaan', 'trim|required');
    	$this->form_validation->set_rules('bergabung_sejak', 'bergabung sejak', 'trim');
    	$this->form_validation->set_rules('logo', 'logo', 'trim');

    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "perusahaan.xls";
        $judul = "perusahaan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Bergabung Sejak");
	xlsWriteLabel($tablehead, $kolomhead++, "Logo");

	foreach ($this->Perusahaan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->perusahaan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jenis_perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bergabung_sejak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->logo);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=perusahaan.doc");

        $data = array(
            'perusahaan_data' => $this->Perusahaan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('perusahaan/perusahaan_doc',$data);
    }

}

/* End of file Perusahaan.php */
/* Location: ./application/controllers/Perusahaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-19 08:33:37 */
/* http://harviacode.com */