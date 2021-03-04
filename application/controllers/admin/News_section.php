<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News_section extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_section_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['news_section'] = $this->db->order_by('arrange', 'asc')->get('news_section')->result();
        $this->slice->view('admin/news_section/news_section_list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->News_section_model->json();
    }

    public function read($id)
    {
        $row = $this->News_section_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'title' => $row->title,
                'id_kategori' => $row->id_kategori,
            );
            $this->slice->view('admin/news_section/news_section_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/news_section'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/news_section/create_action'),
            'id' => set_value('id'),
            'title' => set_value('title'),
            'id_kategori' => set_value('id_kategori'),
            'kategori' => $this->db->get('post_kategori')->result(),
        );
        $this->slice->view('admin/news_section/news_section_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'title' => $this->input->post('title', TRUE),
                'id_kategori' => $this->input->post('id_kategori', TRUE)
            );

            $this->News_section_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/news_section'));
        }
    }

    public function update($id)
    {
        $row = $this->News_section_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/news_section/update_action'),
                'id' => set_value('id', $row->id),
                'title' => set_value('title', $row->title),
                'id_kategori' => set_value('id_kategori', $row->id_kategori),
                'kategori' => $this->db->get('post_kategori')->result(),
            );
            $this->slice->view('admin/news_section/news_section_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/news_section'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'title' => $this->input->post('title', TRUE),
                'id_kategori' => $this->input->post('id_kategori', TRUE),
            );

            $this->News_section_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/news_section'));
        }
    }
    public function change_arrange()
    {
        $sort = array_flip($this->input->post('item'));
        if (!empty($sort)) {
            $i = 0;
            $result = $this->db->get('news_section')->result();
            foreach ($result as $row) {
                $id = $row->id;
                $this->db->where('id', $id);
                $data = array('arrange' => $sort[$row->arrange] + 1);
                $this->db->update('news_section', $data);
                $i++;
            }
        }
    }

    public function delete($id)
    {
        $row = $this->News_section_model->get_by_id($id);

        if ($row) {
            $this->News_section_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/news_section'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/news_section'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file News_section.php */
/* Location: ./application/controllers/News_section.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-11 05:27:47 */
/* http://harviacode.com */