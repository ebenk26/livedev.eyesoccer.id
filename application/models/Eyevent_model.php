<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyevent_model extends CI_Model
{

	public function get_all_jadwal()
	{
		$query = $this->db->query("SELECT
									a.*,
									c.club_id as club_id_a,
									d.club_id as club_id_b,
									c.logo as logo_a,
									d.logo as logo_b,
									c.name as club_a,
									d.name as club_b
								FROM
									tbl_jadwal_event a
									LEFT JOIN
										tbl_event b ON b.id_event=a.id_event
									INNER JOIN
										tbl_club c ON c.club_id=a.tim_a
									INNER JOIN
										tbl_club d ON d.club_id=a.tim_b
								WHERE
									a.jadwal_pertandingan <= '".date('Y-m-d H:i:s')."'
								order by
									jadwal_pertandingan DESC
								LIMIT
									6")->result_array();
		return $query;
	}	
	
	public function get_all_jadwal_2()
	{
		$query = $this->db->query("SELECT
									a.*,
									c.club_id as club_id_a,
									d.club_id as club_id_b,
									c.logo as logo_a,
									d.logo as logo_b,
									c.name as club_a,
									d.name as club_b
								FROM
									tbl_jadwal_event a
									LEFT JOIN
										tbl_event b ON b.id_event=a.id_event
									INNER JOIN
										tbl_club c ON c.club_id=a.tim_a
									INNER JOIN
										tbl_club d ON d.club_id=a.tim_b
								WHERE
									a.jadwal_pertandingan <= '".date('Y-m-d H:i:s')."'
								order by
									jadwal_pertandingan DESC
								LIMIT
									6,6")->result_array();
		return $query;
	}

	public function get_jadwal_today()
	{
		$query = $this->db->query("	SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title !='' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC LIMIT 5
								")->result_array();
		return $query;
	}

	public function get_jadwal_yesterday()
	{
		$kemarin 	= date('Y-m-d',strtotime("-1 days"));

		$query = $this->db->query("	SELECT
										a.id_jadwal_event,
										a.id_event,
										a.jadwal_pertandingan,
										a.tim_a,
										a.tim_b,
										a.live_pertandingan,
										b.name,
										b.logo,
										c.name,
										c.logo
									FROM
										tbl_jadwal_event a
									LEFT JOIN
										tbl_club b ON b.club_id = a.tim_a
									LEFT JOIN
										tbl_club c ON c.club_id = a.tim_b
									WHERE
										a.jadwal_pertandingan like '%".$kemarin."%'
									LIMIT
										5
								")->result_array();
		return $query;
	}

	public function get_jadwal_tomorrow()
	{
		$besok	 = date('Y-m-d',strtotime("+1 days"));

		$query = $this->db->query("	SELECT
										a.id_jadwal_event,
										a.id_event,
										a.jadwal_pertandingan,
										a.tim_a,
										a.tim_b,
										a.live_pertandingan,
										b.name,
										b.logo,
										c.name,
										c.logo
									FROM
										tbl_jadwal_event a
									LEFT JOIN
										tbl_club b ON b.club_id = a.tim_a
									LEFT JOIN
										tbl_club c ON c.club_id = a.tim_b
									WHERE
										a.jadwal_pertandingan like '%".$besok."%'
									LIMIT
										5
								")->result_array();
		return $query;
	}
		
	public function get_eyevent_main()
	{
		$query = $this->db->query("	SELECT
										id_event,
									title,
									description,
									pic,
									publish_on,
									updateon,
									thumb1
									FROM
										tbl_event
									ORDER BY 
									id_event
									LIMIT
										1
								")->result_array();
		return $query;
	}
	
	public function get_eyevent_main_2()
	{
		$query = $this->db->query("	SELECT
										id_event,
									title,
									description,
									pic,
									publish_on,
									updateon,
									thumb1
									FROM
										tbl_event
									ORDER BY 
									id_event
									LIMIT
										1,1
								")->result_array();
		return $query;
	}
	
	public function get_eyevent_main_3()
	{
		$query = $this->db->query("	SELECT
										id_event,
									title,
									description,
									pic,
									publish_on,
									updateon,
									thumb1
									FROM
										tbl_event
									ORDER BY 
									id_event
									LIMIT
										6,3
								")->result_array();
		return $query;
	}

	
	public function get_hasil_today()
	{
		$query = $this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%english%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC LIMIT 5
								")->result_array();
		return $query;
	}	
	
	public function get_hasil_today2()
	{
		$query = $this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%english%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC LIMIT 5,5
								")->result_array();
		return $query;
	}
	
	
	public function get_kompetisi()
	{
		$query = $this->db->query("select * from tbl_competitions")->result_array();
		return $query;
	}

	public function get_klasemen()
	{
		$query = $this->db->query("select club_id, name, logo, competition from tbl_club where competition='liga indonesia 1' AND name !='ebenktestlagijgndidelete' order by name ASC limit 10")->result_array();
		return $query;
	}
	
	public function get_eyenews_main()
	{
		$query = $this->db->query("	SELECT
										a.eyenews_id,
										a.title,
										a.thumb1,
										a.news_type,
										a.news_view,
										a.createon,
										a.url
									FROM
										tbl_eyenews a
									ORDER BY
										a.eyenews_id DESC
									LIMIT
										4
								")->result_array();
		return $query;
	}

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
										4
								")->result_array();
		return $query;
	}	
	
}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */

