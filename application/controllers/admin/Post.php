<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->model('Kategori_model');
        $this->load->model('Upload_model');
        $this->load->model('Cek_login');
        $data_login = $this->Cek_login->is_admin();
    }

    public function index()
    {
        $this->slice->view('admin/post/post_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Post_model->json();
    }

    public function read($id)
    {
        $row = $this->Post_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'judul' => $row->judul,
                'isi' => $row->isi,
                'created' => $row->created,
                'updated' => $row->updated,
                'slug' => $row->slug,
                'featured_image' => $row->featured_image,
            );
            $this->slice->view('admin/post/post_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/post'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/post/create_action'),
            'id' => set_value('id'),
            'judul' => set_value('judul'),
            'isi' => set_value('isi'),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'featured_image' => set_value('featured_image'),
            'old_kat' => set_value('kategori'),
            'kategori' => $this->Kategori_model->get_all(),
        );
        $this->slice->view('admin/post/post_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $files = '';
            if (!empty($_FILES['featured_image']['name'])) {
                $file = $this->Upload_model->upload_files('assets/images/', 'SWU' . rand('10', '100') . date('Y') . date('s'), $_FILES['featured_image']);
                $files = $file;
            }
            $arr = array(
                '<!DOCTYPE html>' => '',
                '<html>' => '',
                '<head>' => '',
                '</head>' => '',
                '<body>' => '',
                '</body>' => '',
                '</html>' => '',
            );

            $isi = strtr($this->input->post('isi'), $arr);
            $data = array(
                'judul' => $this->input->post('judul', TRUE),
                'isi' => $isi,
                'slug' => $this->Upload_model->clean($this->input->post('judul')),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'featured_image' => $files,
            );
            $id_post = $this->Post_model->insert($data);

            $kategori = $this->input->post('kategori', true);
            $exkategori = explode(",", $kategori);
            for ($i = 0; $i < count($exkategori); $i++) {
                $data_kategori = array(
                    'id_post' => $id_post,
                    'id_kategori' => $exkategori[$i],
                );
                $this->db->insert('post_detail', $data_kategori);
            }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/post'));
        }
    }

    public function update($id)
    {
        $row = $this->Post_model->get_by_id($id);

        $data_kategori = $this->db->get('post_kategori')->result();
        $kategori = array();
        foreach ($data_kategori as $key) {
            $row2 = $this->db->select('*')
                ->from('post_detail')
                ->where('id_post', $row->id)
                ->where('id_kategori', $key->id)
                ->get()->row();
            if ($row2) {
                $kategori[] = '<option selected value="' . $key->id . '">' . $key->kategori . '</option>';
            } else {
                $kategori[] = '<option value="' . $key->id . '">' . $key->kategori . '</option>';
            }
        }
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/post/update_action'),
                'id' => set_value('id', $row->id),
                'judul' => set_value('judul', $row->judul),
                'isi' => set_value('isi', $row->isi),
                'title' => set_value('title', $row->title),
                'content' => set_value('content', $row->content),
                'kategori' => $kategori,
                'featured_image' => set_value('featured_image', $row->featured_image),
            );
            $this->slice->view('admin/post/post_form_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/post'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $files = '';
            if (!empty($_FILES['featured_image']['name'])) {
                if (!empty($this->input->post('old_image'))) {
                    $old_images = $this->input->post('old_image');
                    @unlink('assets/images/' . $old_images);
                }
                $file = $this->Upload_model->upload_files('assets/images/', 'HDR' . rand('10', '100') . date('Y') . date('s'), $_FILES['featured_image']);
                $files = $file;
                $arr = array(
                    '<!DOCTYPE html>' => '',
                    '<html>' => '',
                    '<head>' => '',
                    '</head>' => '',
                    '<body>' => '',
                    '</body>' => '',
                    '</html>' => '',
                );

                $isi = strtr($this->input->post('isi'), $arr);
                $data = array(
                    'judul' => $this->input->post('judul', TRUE),
                    'slug'  => $this->Upload_model->clean($this->input->post('judul')),
                    'isi'   => $isi,
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                    'featured_image' => $files,
                );
            } else {
                $slug = $this->Upload_model->clean($this->input->post('judul'));
                $data = array(
                    'judul' => $this->input->post('judul', TRUE),
                    'slug'  => $slug,
                    'isi'   => $this->input->post('isi', TRUE),
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                );
            }
            $id_post = $this->input->post('id');
            $this->Post_model->update($id_post, $data);
            $this->db->where('id', $id_post);
            $this->db->delete('post_detail');
            //$kategori   = $this->input->post('kategori', true);
            $kat = $this->input->post('kat');
            $exkategori = explode(",", $kat);
            echo $kat;
            for ($i = 0; $i < count($exkategori); $i++) {
                $data_kategori = array(
                    'id_post' => $id_post,
                    'id_kategori' => $exkategori[$i],
                );
                $this->db->insert('post_detail', $data_kategori);
            }
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/post'));
        }
    }

    public function delete($id)
    {
        $row = $this->Post_model->get_by_id($id);

        if ($row) {
            $this->Post_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/post'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/post'));
        }
    }

    public function upload_gambar()
    {
        $this->Upload_model->tinymce_upload();
    }

    public function _rules()
    {
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('isi', 'isi', 'trim');
        $this->form_validation->set_rules('created', 'created', 'trim');
        $this->form_validation->set_rules('updated', 'updated', 'trim');
        $this->form_validation->set_rules('slug', 'slug', 'trim');
        $this->form_validation->set_rules('featured_image', 'featured image', 'trim');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function kategori()
    {
        $data['data'] = $this->db->get('post_kategori')->result();
        $this->slice->view('admin.post.kategori', $data);
    }
    public function kategori_create()
    {
        $data = array('kategori' => $this->input->post('kategori'));
        $insert = $this->db->insert('post_kategori', $data);
        $result = $this->db->get('post_kategori')->result();
        $data = array('data' => $result);
        if ($insert) {
            $res = array('response' => 'Kategori Berhasil dibuat');
        } else {
            $res = array('response' => 'Kategori Gagal dibuat');
        }
        $response = array_merge($data, $res);
        json_encode($response);
    }
}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-03 10:31:22 */
/* http://harviacode.com */