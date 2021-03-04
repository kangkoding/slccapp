<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perusahaan_model extends CI_Model
{

    public $table = 'perusahaan';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('p.id as id,p.perusahaan,p.jenis_perusahaan,kp.jenis,bergabung_sejak,logo');
        $this->datatables->from('perusahaan as p');
        $this->datatables->join('kat_perusahaan as kp', 'kp.id = p.jenis_perusahaan');
        $this->datatables->add_column('action', anchor(site_url('admin/perusahaan/read/$1'),'Read')." | ".anchor(site_url('admin/perusahaan/update/$1'),'Update')." | ".anchor(site_url('admin/perusahaan/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('p.id as id,p.perusahaan,p.jenis_perusahaan,kp.jenis,bergabung_sejak,logo');
        $this->db->from('perusahaan as p');
        $this->db->join('kat_perusahaan as kp', 'kp.id = p.jenis_perusahaan');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('p.id as id,p.perusahaan,p.jenis_perusahaan,kp.jenis,bergabung_sejak,logo');
        $this->db->from('perusahaan as p');
        $this->db->join('kat_perusahaan as kp', 'kp.id = p.jenis_perusahaan');
        $this->db->where($this->id, $id);
        return $this->db->get()->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->select('p.id as id,p.perusahaan,p.jenis_perusahaan,kp.jenis,bergabung_sejak,logo');
        $this->db->like('id', $q);
    	$this->db->or_like('perusahaan', $q);
    	$this->db->or_like('jenis_perusahaan', $q);
    	$this->db->or_like('bergabung_sejak', $q);
    	$this->db->or_like('logo', $q);
        $this->db->from('perusahaan as p');
        $this->db->join('kat_perusahaan as kp', 'kp.id = p.jenis_perusahaan');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('p.id as id,p.perusahaan,p.jenis_perusahaan,kp.jenis,bergabung_sejak,logo');
        $this->db->like('id', $q);
        $this->db->or_like('perusahaan', $q);
        $this->db->or_like('jenis_perusahaan', $q);
        $this->db->or_like('bergabung_sejak', $q);
        $this->db->or_like('logo', $q);
        $this->db->from('perusahaan as p');
        $this->db->join('kat_perusahaan as kp', 'kp.id = p.jenis_perusahaan');
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

/* End of file Perusahaan_model.php */
/* Location: ./application/models/Perusahaan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-19 08:33:37 */
/* http://harviacode.com */