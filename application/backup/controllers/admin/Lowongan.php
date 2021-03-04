<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lowongan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Lowongan_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->model('Cek_login');
        $this->Cek_login->is_admin();

    }

    public function index()
    {
       $this->Cek_login->is_admin();
       $this->slice->view('admin/lowongan/lowongan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Lowongan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Lowongan_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'id_perusahaan' => $row->id_perusahaan,
    		'lowongan' => $row->lowongan,
    		'min_pendidikan' => $row->min_pendidikan,
    		'penempatan' => $row->penempatan,
    		'batas_waktu' => $row->batas_waktu,
    		'detail_lowongan' => $row->detail_lowongan,
    		'butuh_orang' => $row->butuh_orang,
	    );
           $this->slice->view('admin/lowongan/lowongan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/lowongan'));
        }
    }

    public function create() 
    {
        //loading model
        $this->load->model('Perusahaan_model');
        $this->load->model('Kat_pendidikan_model');
        //end loading

        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/lowongan/create_action'),
    	    'id' => set_value('id'),
    	    'id_perusahaan' => set_value('id_perusahaan'),
    	    'lowongan' => set_value('lowongan'),
    	    'min_pendidikan' => set_value('min_pendidikan'),
    	    'penempatan' => set_value('penempatan'),
    	    'batas_waktu' => set_value('batas_waktu'),
    	    'detail_lowongan' => set_value('detail_lowongan'),
    	    'butuh_orang' => set_value('butuh_orang'),
            'perusahaan' => $this->Perusahaan_model->get_all(),
            'kpendidikan'=>$this->Kat_pendidikan_model->get_all(),
	);
       $this->slice->view('admin/lowongan/lowongan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'id_perusahaan' => $this->input->post('id_perusahaan',TRUE),
    		'lowongan' => $this->input->post('lowongan',TRUE),
    		'min_pendidikan' => $this->input->post('min_pendidikan',TRUE),
    		'penempatan' => $this->input->post('penempatan',TRUE),
    		'batas_waktu' => $this->input->post('batas_waktu',TRUE),
    		'detail_lowongan' => $this->input->post('detail_lowongan',TRUE),
    		'butuh_orang' => $this->input->post('butuh_orang',TRUE),

	    );

            $this->Lowongan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/lowongan'));
        }
    }
    
    public function update($id) 
    {
        //loading model
        $this->load->model('Perusahaan_model');
        $this->load->model('Kat_perusahaan');
        //end loading

        $row = $this->Lowongan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/lowongan/update_action'),
        		'id' => set_value('id', $row->id),
        		'id_perusahaan' => set_value('id_perusahaan', $row->id_perusahaan),
        		'lowongan' => set_value('lowongan', $row->lowongan),
        		'min_pendidikan' => set_value('min_pendidikan', $row->min_pendidikan),
        		'penempatan' => set_value('penempatan', $row->penempatan),
        		'batas_waktu' => set_value('batas_waktu', $row->batas_waktu),
        		'detail_lowongan' => set_value('detail_lowongan', $row->detail_lowongan),
        		'butuh_orang' => set_value('butuh_orang', $row->butuh_orang),
                'perusahaan' => $this->Perusahaan_model->get_all(),
                'kpendidikan'=> $this->Kat_pendidikan_model->get_all(),

	    );
           $this->slice->view('admin/lowongan/lowongan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/lowongan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
    		'id_perusahaan' => $this->input->post('id_perusahaan',TRUE),
    		'lowongan' => $this->input->post('lowongan',TRUE),
    		'min_pendidikan' => $this->input->post('min_pendidikan',TRUE),
    		'penempatan' => $this->input->post('penempatan',TRUE),
    		'batas_waktu' => $this->input->post('batas_waktu',TRUE),
    		'detail_lowongan' => $this->input->post('detail_lowongan',TRUE),
    		'butuh_orang' => $this->input->post('butuh_orang',TRUE),
	    );

            $this->Lowongan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/lowongan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Lowongan_model->get_by_id($id);

        if ($row) {
            $this->Lowongan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/lowongan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/lowongan'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('id_perusahaan', 'id perusahaan', 'trim|required');
    	$this->form_validation->set_rules('lowongan', 'lowongan', 'trim|required');
    	$this->form_validation->set_rules('min_pendidikan', 'min pendidikan', 'trim|required');
    	$this->form_validation->set_rules('penempatan', 'penempatan', 'trim|required');
    	$this->form_validation->set_rules('batas_waktu', 'batas waktu', 'trim|required');
    	$this->form_validation->set_rules('detail_lowongan', 'detail lowongan', 'trim|required');
    	$this->form_validation->set_rules('butuh_orang', 'butuh orang', 'trim|required');

    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "lowongan.xls";
        $judul = "lowongan";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Perusahaan");
    	xlsWriteLabel($tablehead, $kolomhead++, "Lowongan");
    	xlsWriteLabel($tablehead, $kolomhead++, "Min Pendidikan");
    	xlsWriteLabel($tablehead, $kolomhead++, "Penempatan");
    	xlsWriteLabel($tablehead, $kolomhead++, "Batas Waktu");
    	xlsWriteLabel($tablehead, $kolomhead++, "Detail Lowongan");
    	xlsWriteLabel($tablehead, $kolomhead++, "Butuh Orang");

	foreach ($this->Lowongan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_perusahaan);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->lowongan);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->min_pendidikan);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->penempatan);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->batas_waktu);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->detail_lowongan);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->butuh_orang);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=lowongan.doc");

        $data = array(
            'lowongan_data' => $this->Lowongan_model->get_all(),
            'start' => 0
        );
        
       $this->load->view('admin/lowongan/lowongan_doc',$data);
    }

}

/* End of file Lowongan.php */
/* Location: ./application/controllers/Lowongan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-19 09:38:30 */
/* http://harviacode.com */