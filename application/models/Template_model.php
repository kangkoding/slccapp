<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template_model extends CI_Model
{

	function sidebar()
	{
		$sidebar = $this->db->select('s.*,s.id as arrange')
			->from('sidebar as s')
			->join('sidebar_arrange as sa', 's.id = sa.id_sidebar')
			->order_by('sa.id', 'asc')->get()->result();
		foreach ($sidebar as $sd) {
			if ($sd->jenis == 1) {
				$this->db->select('p.id,p.judul,p.created,p.slug');
				$this->db->from('post as p');
				$this->db->join('post_detail as pd', 'pd.id_post = p.id', 'left');
				$this->db->where('pd.id_kategori', $sd->id_kategori);
				$this->db->order_by('id', 'desc');
				$this->db->limit($sd->limit);
				$this->db->group_by('id');
				$result =  $this->db->get()->result();
				$content = '<div class="panel panel-sidebar">
						            <div class="panel-heading">
						                <h3 class="panel-title">' . $sd->title . '</h3>
						            </div>
						            <div class="panel-body">';
				foreach ($result as $dt) {

					$permalink = date('Y/m', strtotime($dt->created));
					$content .= '
		        				 <a href="' . site_url() . permalink($permalink) . $dt->slug . '" class="linka">
		        				 <i class="fa fa-caret-right"></i>' . $dt->judul . '</a>
			                     <br/><i>' . date('D, F, Y', strtotime($dt->created)) . '</i><br />
			                     <hr class="hr-xs">	
								';
				}
				$content .= '</div></div>';
				$data[] = $content;
			} else if ($sd->jenis == 2) {
				$content = '';
				$result = $this->db->get('post_kategori')->result();
				$content = '<div class="panel panel-sidebar " >
						            <div class="panel-heading" style="border-bottom:solid 1px red">
						                <h3 class="panel-title" style="background-color:#F44336">' . $sd->title . '</h3>
						            </div>
						            <div class="panel-body">';
				foreach ($result as $dt) {
					$content .= '<a href="' . site_url() . 'post/kategori/' . strtolower($dt->slug) . '" class="linka">
	    							<i class="fa fa-caret-right"></i> ' . $dt->kategori . ' 
	    						 </a>
		                    	 <hr class="hr-xs">';
				}
				$content .= '</div></div>';
				$data[] = $content;
			} else if ($sd->jenis == 3) {
				$content = '<div class="panel panel-sidebar " >
						            <div class="panel-heading" style="border-bottom:solid 1px orange">
						                <h3 class="panel-title" style="background-color:orange">' . $sd->title . '</h3>
						            </div>
						            <div class="panel-body">' . $sd->isi . '</div></div>';
				$data[] =  $content;
			}
		}
		return $data;
	}
	function site($field)
	{
		$row = $this->db->get('settings')->row();
		return $row->$field;
	}
	function news_section()
	{
		$query = $this->db->get('news_section');
		$total = $query->num_rows();
		$limit = 0;
		if ($total >= 1) {
			$limit = $total - 1;
		}
		//
		$r1 = $this->db->select('np.*,kp.slug')->from('news_section np')->join('post_kategori kp', 'kp.id = np.id_kategori')->limit($limit)->order_by('arrange', 'asc')->get()->result();
		$array1 = array();
		foreach ($r1 as $row) {
			$this->db->select('p.id,p.judul,p.created,p.slug,p.featured_image');
			$this->db->from('post as p');
			$this->db->join('post_detail as pd', 'pd.id_post = p.id', 'left');
			$this->db->where('pd.id_kategori', $row->id_kategori);
			$this->db->limit(3);
			$this->db->group_by('id');
			$this->db->order_by('id', 'desc');
			$result = $this->db->get()->result();

			$dt = array();
			foreach ($result as $r) {
				$dt[] = array(
					'id' => $r->id,
					'judul' => $r->judul,
					'created' => $r->created,
					'slug' => $r->slug,
					'featured_image' => ($r->featured_image) ? $r->featured_image : '',
					'permalink' => date('Y/m', strtotime($r->created)),
				);
			}

			$array1[] = array('title' => $row->title, 'slug' => $row->slug, 'data' => $dt);
		}
		$r2 = $this->db->select('np.*,kp.slug')->from('news_section np')->join('post_kategori kp', 'kp.id = np.id_kategori')->order_by('arrange', 'desc')->get()->row();
		$this->db->select('p.id,p.judul,p.created,p.slug,p.featured_image');
		$this->db->from('post as p');
		$this->db->join('post_detail as pd', 'pd.id_post = p.id', 'left');
		$this->db->where('pd.id_kategori', $r2->id_kategori);
		$this->db->limit(5);
		$this->db->group_by('id');
		$this->db->order_by('id', 'desc');
		$result = $this->db->get()->result();

		$dt = array();
		foreach ($result as $r) {
			$dt[] = array(
				'id' => $r->id,
				'judul' => $r->judul,
				'created' => $r->created,
				'slug' => $r->slug,
				'featured_image' => $r->featured_image,
				'permalink' => date('Y/m', strtotime($r->created)),
			);
		}

		$array2 = array(
			"left" => array('title' => $r2->title, 'slug' => $r2->slug, 'data' => $dt[0]),
			"right" => array('title' => 'Other News', 'data' => $dt, 'slug' => $r2->slug,)
		);
		//
		$array = array(
			'top' => $array1,
			'bottom' => $array2,
		);
		return  $array;
	}
	function external_link()
	{
		return $this->db->get('external_link')->result();
	}
}

/* End of file Template_model.php */
/* Location: ./application/models/Template_model.php */