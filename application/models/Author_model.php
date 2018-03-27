<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author_model extends CI_Model
{
	public function get_author_detail($username)
	{
		$query = $this->db->query(" SELECT * FROM tbl_admin A WHERE A.fullname = '$username'")->result_array();
		return $query; 
	}
	
	public function get_author_lastnews($username)
	{
		$query = $this->db->query(" SELECT A.*,B.* FROM tbl_eyenews A 
									INNER JOIN tbl_admin B 	on B.admin_id = A.admin_id	
									WHERE B.fullname = '$username' ORDER BY	A.publish_on DESC LIMIT 8
										")->result_array();
		return $query; 
	}
 
	public function get_author_popnews($username)
	{
		$query = $this->db->query(" SELECT A.*,B.* FROM tbl_eyenews A 
									INNER JOIN tbl_admin B 	on B.admin_id = A.admin_id	
									WHERE B.fullname = '$username' 
									ORDER BY A.news_view DESC LIMIT 4
										")->result_array($username);
		return $query; 
	}

	public function get_total_post($username)
	{
		$query = $this->db->query(" SELECT count(A.eyenews_id) as total,SUM(IF(B.admin_id = A.admin_id,A.news_view, 0)) AS totalviews FROM tbl_eyenews A 
									INNER JOIN tbl_admin B 	on B.admin_id = A.admin_id	
									WHERE B.fullname = '$username' 
										")->result_array($username);
		return $query; 
	}
	public function get_total_view1000($username)
	{
		$query = $this->db->query(" SELECT count(A.eyenews_id) as total FROM tbl_eyenews A 
									INNER JOIN tbl_admin B 	on B.admin_id = A.admin_id	
									WHERE B.fullname = '$username' AND A.news_view>1000
										")->result_array($username);
		return $query; 
	}
	public function get_total_view500($username)
	{
		$query = $this->db->query(" SELECT count(A.eyenews_id) as total FROM tbl_eyenews A 
									INNER JOIN tbl_admin B 	on B.admin_id = A.admin_id	
									WHERE B.fullname = '$username' AND (A.news_view > 500 AND A.news_view <= 1000)
										")->result_array($username);
		return $query; 
	}






}



/* End of file author_model.php */
/* Location: ./application/models/author_model.php */