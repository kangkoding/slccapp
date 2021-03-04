<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News_section_model extends CI_Model
{

    public $table = 'news_section';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,title,id_kategori');
        $this->datatables->from('news_section');
        //add this line for join
        //$this->datatables->join('table2', 'news_section.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('admin/news-section/read/$1'),'<span class="btn btn-primary">Read</span>')." ".anchor(site_url('admin/news-section/update/$1'),'<span class="btn btn-warning">Edit</span>')." ".anchor(site_url('admin/news-section/delete/$1'),'<span class="btn btn-danger">Delete</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('title', $q);
	$this->db->or_like('id_kategori', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('title', $q);
	$this->db->or_like('id_kategori', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file News_section_model.php */
/* Location: ./application/models/News_section_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-11 05:27:47 */
/* http://harviacode.com */