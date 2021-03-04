<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public $table = 'users';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,ip_address,username,password,salt,email,activation_code,forgotten_password_code,forgotten_password_time,remember_code,created_on,last_login,active,full_name,company,phone,origin,birth_date,id_number,gender,address,city_id,postal_code,mobile_number,country,marriage_status,religion,id_kat_pendidikan,nim,ipk,id_bidang,ket_disabilitas,birth_place');
        $this->datatables->from('users');
        //add this line for join
        //$this->datatables->join('table2', 'users.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('users/read/$1'),'<span class="btn btn-success"><i class="fa fa-eye"></i></span>')."  ".anchor(site_url('users/update/$1'),'<span class="btn btn-primary"><i class="fa fa-pencil"></i></span>')."  ".anchor(site_url('users/delete/$1'),'<span class="btn btn-danger"><i class="fa fa-trash"></i></span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
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
	$this->db->or_like('ip_address', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('salt', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('activation_code', $q);
	$this->db->or_like('forgotten_password_code', $q);
	$this->db->or_like('forgotten_password_time', $q);
	$this->db->or_like('remember_code', $q);
	$this->db->or_like('created_on', $q);
	$this->db->or_like('last_login', $q);
	$this->db->or_like('active', $q);
	$this->db->or_like('full_name', $q);
	$this->db->or_like('company', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('origin', $q);
	$this->db->or_like('birth_date', $q);
	$this->db->or_like('id_number', $q);
	$this->db->or_like('gender', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('city_id', $q);
	$this->db->or_like('postal_code', $q);
	$this->db->or_like('mobile_number', $q);
	$this->db->or_like('country', $q);
	$this->db->or_like('marriage_status', $q);
	$this->db->or_like('religion', $q);
	$this->db->or_like('id_kat_pendidikan', $q);
	$this->db->or_like('nim', $q);
	$this->db->or_like('ipk', $q);
	$this->db->or_like('id_bidang', $q);
	$this->db->or_like('ket_disabilitas', $q);
	$this->db->or_like('birth_place', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('ip_address', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('salt', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('activation_code', $q);
	$this->db->or_like('forgotten_password_code', $q);
	$this->db->or_like('forgotten_password_time', $q);
	$this->db->or_like('remember_code', $q);
	$this->db->or_like('created_on', $q);
	$this->db->or_like('last_login', $q);
	$this->db->or_like('active', $q);
	$this->db->or_like('full_name', $q);
	$this->db->or_like('company', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('origin', $q);
	$this->db->or_like('birth_date', $q);
	$this->db->or_like('id_number', $q);
	$this->db->or_like('gender', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('city_id', $q);
	$this->db->or_like('postal_code', $q);
	$this->db->or_like('mobile_number', $q);
	$this->db->or_like('country', $q);
	$this->db->or_like('marriage_status', $q);
	$this->db->or_like('religion', $q);
	$this->db->or_like('id_kat_pendidikan', $q);
	$this->db->or_like('nim', $q);
	$this->db->or_like('ipk', $q);
	$this->db->or_like('id_bidang', $q);
	$this->db->or_like('ket_disabilitas', $q);
	$this->db->or_like('birth_place', $q);
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

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-19 05:49:42 */
/* http://harviacode.com */