<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->library('datatables');
		$this->load->model('Cek_login');
    	$data_login = $this->Cek_login->is_admin();

    }

    public function index()
    {
    	$data_login = $this->Cek_login->is_admin();
    	$this->slice->view('admin.users.users_list');
        //$this->load->view('admin/users/users_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Users_model->json();
    }
    
    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'ip_address' => $row->ip_address,
				'username' => $row->username,
				'password' => $row->password,
				'salt' => $row->salt,
				'email' => $row->email,
				'activation_code' => $row->activation_code,
				'forgotten_password_code' => $row->forgotten_password_code,
				'forgotten_password_time' => $row->forgotten_password_time,
				'remember_code' => $row->remember_code,
				'created_on' => $row->created_on,
				'last_login' => $row->last_login,
				'active' => $row->active,
				'company' => $row->company,
				'first_name' => $row->first_name,
				'last_name' => $row->last_name,
				'phone' => $row->phone,
		    );
			$this->slice->view('admin.users.users_read',$data);
            //$this->load->view('users/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/users/create_action'),
		    'id' => set_value('id'),
		    'username' => set_value('username'),
		    'password' => set_value('password'),
		    'email' => set_value('email'),
		    'first_name' => set_value('first_name'),
		    'last_name' => set_value('last_name'),
		    'phone' => set_value('phone'),
		);
    	$this->slice->view('admin.users.users_form', $data);
        //$this->load->view('users/users_form', $data);
    }
    
    public function create_action() 
    {
		$identity_column = $this->config->item('identity', 'ion_auth');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
			$identity = ($identity_column === 'email') ? $this->input->post('email', true) : $this->input->post('username', true);
			$additional_data = array(
				'first_name' => $this->input->post('first_name', true),
				'last_name' => $this->input->post('last_name', true),
				'phone' => $this->input->post('phone', true),
				'company' => 'ADMIN',
				'active' => 1,
			);
		    if ($this->ion_auth->register($identity, $this->input->post('password', true), $this->input->post('email', true), $additional_data, array(1))) {
	            $this->session->set_flashdata('message', 'Create Record Success');
	            redirect(site_url('admin/users'));
		    } else {
	            $this->session->set_flashdata('message', 'Create Record Failed');
	            redirect(site_url('admin/users'));
		    }
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
	            'action' => site_url('admin/users/update_action'),
			    'id' => set_value('id', $row->id),
			    'username' => set_value('username', $row->username),
			    'password' => set_value('password'),
			    'email' => set_value('email', $row->email),
			    'first_name' => set_value('first_name', $row->first_name),
			    'last_name' => set_value('last_name', $row->last_name),
			    'phone' => set_value('phone', $row->phone),
	    	);
	    	$this->slice->view('admin.users.users_form', $data);
            //$this->load->view('users/users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'username' => $this->input->post('username', true),
				'password' => $this->input->post('password', true),
				'email' => $this->input->post('email', true),
				'first_name' => $this->input->post('first_name', true),
				'last_name' => $this->input->post('last_name', true),
				'phone' => $this->input->post('phone', true),
		    );
		    if ($this->ion_auth->update($this->input->post('id', true), $data)) {
	            $this->session->set_flashdata('message', 'Update Record Success');
	            redirect(site_url('admin/users'));
		    } else {
	            $this->session->set_flashdata('message', 'Update Record Failed');
	            redirect(site_url('admin/users'));
		    }
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'last_name', 'trim');
		$this->form_validation->set_rules('phone', 'phone', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "users.xls";
        $judul = "users";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Ip Address");
		xlsWriteLabel($tablehead, $kolomhead++, "Username");
		xlsWriteLabel($tablehead, $kolomhead++, "Password");
		xlsWriteLabel($tablehead, $kolomhead++, "Salt");
		xlsWriteLabel($tablehead, $kolomhead++, "Email");
		xlsWriteLabel($tablehead, $kolomhead++, "Activation Code");
		xlsWriteLabel($tablehead, $kolomhead++, "Forgotten Password Code");
		xlsWriteLabel($tablehead, $kolomhead++, "Forgotten Password Time");
		xlsWriteLabel($tablehead, $kolomhead++, "Remember Code");
		xlsWriteLabel($tablehead, $kolomhead++, "Created On");
		xlsWriteLabel($tablehead, $kolomhead++, "Last Login");
		xlsWriteLabel($tablehead, $kolomhead++, "Active");
		xlsWriteLabel($tablehead, $kolomhead++, "Full Name");
		xlsWriteLabel($tablehead, $kolomhead++, "Company");
		xlsWriteLabel($tablehead, $kolomhead++, "Phone");
		xlsWriteLabel($tablehead, $kolomhead++, "Origin");
		xlsWriteLabel($tablehead, $kolomhead++, "Birth Date");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Number");
		xlsWriteLabel($tablehead, $kolomhead++, "Gender");
		xlsWriteLabel($tablehead, $kolomhead++, "Address");
		xlsWriteLabel($tablehead, $kolomhead++, "City Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Postal Code");
		xlsWriteLabel($tablehead, $kolomhead++, "Mobile Number");
		xlsWriteLabel($tablehead, $kolomhead++, "Country");
		xlsWriteLabel($tablehead, $kolomhead++, "Marriage Status");
		xlsWriteLabel($tablehead, $kolomhead++, "Religion");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Kat Pendidikan");
		xlsWriteLabel($tablehead, $kolomhead++, "Nim");
		xlsWriteLabel($tablehead, $kolomhead++, "Ipk");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Bidang");
		xlsWriteLabel($tablehead, $kolomhead++, "Ket Disabilitas");
		xlsWriteLabel($tablehead, $kolomhead++, "Birth Place");

	foreach ($this->Users_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ip_address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->salt);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->activation_code);
	    xlsWriteLabel($tablebody, $kolombody++, $data->forgotten_password_code);
	    xlsWriteNumber($tablebody, $kolombody++, $data->forgotten_password_time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->remember_code);
	    xlsWriteNumber($tablebody, $kolombody++, $data->created_on);
	    xlsWriteNumber($tablebody, $kolombody++, $data->last_login);
	    xlsWriteLabel($tablebody, $kolombody++, $data->active);
	    xlsWriteLabel($tablebody, $kolombody++, $data->full_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->company);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->origin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->birth_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_number);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gender);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteNumber($tablebody, $kolombody++, $data->city_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->postal_code);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mobile_number);
	    xlsWriteLabel($tablebody, $kolombody++, $data->country);
	    xlsWriteNumber($tablebody, $kolombody++, $data->marriage_status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->religion);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kat_pendidikan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ipk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_bidang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket_disabilitas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->birth_place);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=users.doc");

        $data = array(
            'users_data' => $this->Users_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('users/users_doc',$data);
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-19 08:19:51 */
/* http://harviacode.com */