<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyevent_model extends CI_Model
{

	public function get_all_jadwal($tanggalnya,$liganya)
	{
		// $query = $this->db->query("SELECT
		// 							a.jadwal_pertandingan,
		// 							c.club_id as club_id_a,
		// 							d.club_id as club_id_b,
		// 							c.logo as logo_a,
		// 							d.logo as logo_b,
		// 							c.name as club_a,
		// 							d.name as club_b
		// 						FROM
		// 							tbl_jadwal_event a
		// 							LEFT JOIN
		// 								tbl_event b ON b.id_event=a.id_event
		// 							INNER JOIN
		// 								tbl_club c ON c.club_id=a.tim_a
		// 							INNER JOIN
		// 								tbl_club d ON d.club_id=a.tim_b
		// 						WHERE
		// 							a.jadwal_pertandingan BETWEEN '$tanggalnya 00:00:01' AND '$tanggalnya 23:59:59'
		// 							AND
		// 							a.id_event = $liganya
		// 						order by
		// 							jadwal_pertandingan DESC
		// 						LIMIT
		// 							6")->result_array();

		$this->db->select('	a.score_a,
							a.score_b,
							a.jadwal_pertandingan,
							a.lokasi_pertandingan,
							a.live_pertandingan,
							c.club_id as club_id_a,
							d.club_id as club_id_b,
							c.logo as logo_a,
							d.logo as logo_b,
							c.name as club_a,
							d.name as club_b,
							c.url as url_a,
							d.url as url_b,
							b.title as kompetisi
							');

		$this->db->from('tbl_jadwal_event AS a');

		$this->db->join('tbl_event AS b', 'b.id_event=a.id_event', 'LEFT');
		$this->db->join('tbl_club AS c', 'c.club_id=a.tim_a', 'INNER');
		$this->db->join('tbl_club AS d', 'd.club_id=a.tim_b', 'INNER');

		$this->db->where('a.jadwal_pertandingan >=', $tanggalnya.' 00:00:01');
		$this->db->where('a.jadwal_pertandingan <=', $tanggalnya.' 23:59:59');
		
		if ($liganya != null)
		{
			$this->db->where('a.id_event', $liganya);
		}

		$this->db->order_by('a.jadwal_pertandingan', 'desc');

		$query = $this->db->get()->result_array();

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
										thumb1,
										url
									FROM
										tbl_event
									ORDER BY 
										id_event DESC
									LIMIT
										2
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
									thumb1,
									url
									FROM
										tbl_event
									ORDER BY 
									id_event DESC
									LIMIT
										2,2
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

	public function get_all_liga()
	{
		$this->db->select('id_event,title');
		$this->db->from('tbl_event');
		$this->db->where('id_event', '6');
		$this->db->or_where('id_event', '16');
		$this->db->or_where('id_event', '18');
		$this->db->or_where('id_event', '19');
		$this->db->or_where('id_event', '20');
		$this->db->or_where('id_event', '34');
		$this->db->or_where('id_event', '57');
		$this->db->or_where('id_event', '58');
		$this->db->or_where('id_event', '74');
		$this->db->or_where('id_event', '75');
		$this->db->or_where('id_event', '89');
		$this->db->or_where('id_event', '92');

		$query = $this->db->get()->result_array();

		return $query;
	}

	public function get_row_event($id)
	{
		$query 	= $this->db->get_where('tbl_event', array('id_event' => $id))->row();

		return $query;
	}
	
}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */

