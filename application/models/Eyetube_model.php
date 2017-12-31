<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyetube_model extends CI_Model
{
	public function get_eyetube_satu()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										2
								")->result_array();
		return $query;
	}	
	
	public function get_eyetube_right_detail()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1										
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										5
								")->result_array();
		return $query;
	}	
	
	public function get_eyetube_rekomendasi()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										4
								")->result_array();
		return $query;
	}
	
	public function get_eyetube_rekomendasi_2()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										4,4
								")->result_array();
		return $query;
	}	
	
	public function get_eyetube_rekomendasi2()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										9
								")->result_array();
		return $query;
	}

	public function get_eyetube_science()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view,
										a.category_name
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									AND 
										a.category_name like '%science%'
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										4
								")->result_array();
		return $query;
	}
	
	public function get_eyetube_science_2()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view,
										a.category_name
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									AND 
										a.category_name like '%science%'
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										4,4
								")->result_array();
		return $query;
	}	

	public function get_eyetube_stars()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view,
										a.category_name
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									AND 
										a.category_name like '%star%'
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										4
								")->result_array();
		return $query;
	}

	public function get_eyetube_kamu()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view,
										a.category_name
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									AND 
										a.category_name like '%kamu%'
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										4
								")->result_array();
		return $query;
	}
	
	public function get_eyetube_kamu_2()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view,
										a.category_name
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									AND 
										a.category_name like '%kamu%'
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										4,4
								")->result_array();
		return $query;
	}
	
	public function get_eyetube_populer()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view,
										a.category_name
									FROM
										tbl_eyetube a
									WHERE
										a.tube_view
									ORDER BY
										a.tube_view DESC
									LIMIT
										4
								")->result_array();
		return $query;
	}	
	
	public function get_eyetube_ssb()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view,
										a.category_name
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									AND 
										a.category_name like '%ssb%'
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										4
								")->result_array();
		return $query;
	}	
	public function get_eyetube_ssb_2()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view,
										a.category_name
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									AND 
										a.category_name like '%ssb%'
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										4,4
								")->result_array();
		return $query;
	}
	
	public function get_eyetube_detail()
	{
		$query = $this->db->query("select a.*,b.fullname from tbl_eyetube a INNER JOIN tbl_admin b ON b.admin_id=a.admin_id where eyetube_id='$eyetube_id' LIMIT 1")->row();
		return $query;
	}
	
}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */

