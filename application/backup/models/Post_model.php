<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_model extends CI_Model
{

    public $table = 'post';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('p.*,p.id as id');
        $this->datatables->from('post as p');
        //add this line for join
        //$this->datatables->join('post_kategori as k', 'k.id = p.kategori');
        $this->datatables->add_column('action', anchor(site_url('admin/post/read/$1'),'<span class="btn btn-primary">Read</span>')." ".anchor(site_url('admin/post/update/$1'),'<span class="btn btn-warning">Edit</span>')." ".anchor(site_url('admin/post/delete/$1'),'<span class="btn btn-danger">Delete</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
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
    function get_by_slug($slug)
    {
        $this->db->where('slug', $slug);
        return $this->db->get($this->table)->row();
    }
    function get_last_3($kat){
        $this->db->select('p.*');
        $this->db->from('post as p');
        $this->db->join('post_detail as pd', 'pd.id_post = p.id', 'left');
        $this->db->where('pd.id_kategori', $kat);
        $this->db->limit(3);
        return $this->db->order_by('id','desc')->get()->result();
    }
    //get last 5
    public function get_last_5($kat){
        $this->db->select('p.*');
        $this->db->from('post as p');
        $this->db->join('post_detail as pd', 'pd.id_post = p.id', 'left');
        $this->db->where('pd.id_kategori', $kat);
        $this->db->limit(5);
        return $this->db->order_by('id','desc')->get()->result();
    }
    //
    public function get_kat_by_slug($slug)
    {
        if(!empty($slug)){
            $row = $this->db->where('slug',$slug)->get('post_kategori')->row();
            return $row->id;
        }else{
            return $this->db->get('post_kategori')->row()->id;
        }
    }
    public function get_current_page_records($limit, $start,$kat) 
    {
        $this->db->select('p.*');
        $this->db->from('post as p');
        $this->db->join('post_detail as pd', 'pd.id_post = p.id', 'left');
        $this->db->where('pd.id_kategori', $kat);
        $this->db->group_by('id');
        $this->db->limit($limit, $start);
        $this->db->order_by('id','desc');
        //$this->db->where('kategori', $kat);
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $row->permalink  = new stdClass;
                $row->permalink = date('Y/m',strtotime($row->created));
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total($kat) 
    {
        $this->db->select('p.*');
        $this->db->from('post as p');
        $this->db->join('post_detail as pd', 'pd.id_post = p.id', 'left');
        $this->db->where('pd.id_kategori', $kat);
        $this->db->group_by('id');
        $this->db->order_by('id','desc');
        return $this->db->get()->num_rows();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        //$this->db->like('id', $q);
    	$this->db->like('judul', $q);
    	/*
    	$this->db->or_like('isi', $q);
    	$this->db->or_like('created', $q);
    	$this->db->or_like('updated', $q);
    	$this->db->or_like('slug', $q);
    	$this->db->or_like('featured_image', $q);
    	*/
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        //$this->db->like('id', $q);
    	$this->db->like('judul', $q);
    	/*
    	$this->db->or_like('isi', $q);
    	$this->db->or_like('created', $q);
    	$this->db->or_like('updated', $q);
    	$this->db->or_like('slug', $q);
    	$this->db->or_like('featured_image', $q);
    	*/
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
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

/* End of file Post_model.php */
/* Location: ./application/models/Post_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-03 10:31:22 */
/* http://harviacode.com */