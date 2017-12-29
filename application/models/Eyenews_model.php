<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyenews_model extends CI_Model
{

	public function get_headline()
	{
		$query = $this->db->query(" SELECT
                                        A.*
                                    FROM
                                        tbl_eyenews A
                                    ORDER BY 
                                        A.eyenews_id DESC
                                    Limit 12
                                        ")->row();
            return $query; 
	}	
	
	public function get_all_news()
	{
		$query = $this->db->query(" SELECT
                                        A.*
                                    FROM
                                        tbl_eyenews A
                                    ORDER BY 
                                        A.eyenews_id ASC
                                    Limit 3
                                        ")->result_array();
            return $query; 
	}

	public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);

		$query = $this->db->query(" SELECT
                                        A.*
                                    FROM
                                        tbl_eyenews A
                                    ORDER BY 
                                        A.eyenews_id DESC
                                    Limit 12
                                        ");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }

	public function get_total() 
    {
        return $this->db->count_all("tbl_eyenews");
    }

    public function get_detail($eyenews_id)
    {
		$query = $this->db->query(" SELECT
                                        A.*,
                                        B.fullname
                                    FROM
                                        tbl_eyenews A
                                    INNER JOIN 
                                    	tbl_admin B 	on B.admin_id = A.admin_id
                                    WHERE
                                    	A.eyenews_id = '$eyenews_id'
                                        ")->result_array();
        return $query; 
    }

    public function get_baca_juga($tipe,$id,$limit)
    {
		$query = $this->db->query(" SELECT
										A.eyenews_id,
                                        A.title,
                                        A.thumb1,
                                        A.publish_on
                                    FROM
                                        tbl_eyenews A
                                    WHERE
                                    	A.news_type LIKE '%$tipe%'
                                    	AND 
                                    	A.eyenews_id != '$id'
                                    ORDER BY 
                                    	A.eyenews_id DESC
                                    LIMIT $limit
                                        ")->result_array();
        return $query; 
    }

    public function get_eyetube_title()
    {
		$query = $this->db->query(" SELECT
                                        A.title,
                                        A.eyetube_id
                                    FROM
                                        tbl_eyetube A
                                    ORDER BY 
                                    	A.eyetube_id DESC
                                    LIMIT 1
                                        ")->row();
        return $query; 
    }

    public function get_terkini()
    {
    	$query = $this->db->query(" SELECT
                                        A.title,
                                        A.eyenews_id,
                                        A.thumb1,
                                        A.publish_on
                                    FROM
                                        tbl_eyenews A
                                    ORDER BY 
                                    	A.eyenews_id DESC
                                    LIMIT 5
                                        ")->result_array();
        return $query;
    }

    public function get_terpopuler()
    {
    	$query = $this->db->query(" SELECT
                                        A.title,
                                        A.eyenews_id,
                                        A.thumb1,
                                        A.publish_on,
										A.createon,.
										A.news_view
                                    FROM
                                        tbl_eyenews A
                                    ORDER BY 
                                    	A.news_view DESC
                                    LIMIT 5
                                        ")->result_array();
        return $query;
    }

    public function get_ads_right()
    {
        $query = $this->db->query(" SELECT
                                        A.pic
                                    FROM
                                        tbl_ads A
                                    WHERE   
                                        A.ads_id = '20'
                                        ")->row();
        return $query;
    }

    public function get_new_eyetube()
    {
        $query = $this->db->query(" SELECT
                                        A.eyetube_id,
                                        A.title,
                                        A.thumb,
                                        A.createon
                                    FROM
                                        tbl_eyetube A
                                    ORDER BY 
                                        A.eyetube_id DESC
                                    LIMIT
                                        5
                                        ")->result_array();
        return $query;
    }

    public function cek_view_smile($id,$ip,$tipe)
    {
        $query = $this->db->query(" SELECT
                                        A.*
                                    FROM
                                        tbl_view A
                                    WHERE
                                        type_visit  = '$tipe'
                                        AND
                                        place_visit = 'eyenews'
                                        AND
                                        place_id    = '$id'
                                        AND
                                        session_ip  = '$ip'
                                    LIMIT
                                        1
                                        ")->num_rows();
        return $query;
    }

    public function set_news_emot($id,$tipe)
    {
        $query = $this->db->query(" UPDATE
                                        tbl_eyenews
                                    SET
                                        news_$tipe = news_$tipe + 1
                                    WHERE
                                    eyenews_id = '$id'
                                        ");
        return $query;
    }

    public function set_tbl_view($object)
    {
        $this->db->insert('tbl_view', $object);

        return $this->db->insert_id();
    }

    public function get_jumlah_emot($id,$tipe)
    {
        $query = $this->db->query(" SELECT
                                                A.news_$tipe
                                            FROM
                                                tbl_eyenews A
                                            WHERE
                                                A.eyenews_id  = $id
                                                ")->row();
        return $query;
    }
	public function get_eyenews_main()
	{
		$query = $this->db->query("	SELECT
										a.eyenews_id,
										a.title as judul,
										a.thumb1,
										a.news_type,
										a.news_view,
										a.createon
									FROM
										tbl_eyenews a
									ORDER BY
										a.eyenews_id DESC
									LIMIT
										1
								")->row();
		return $query;
	}
	public function get_eyenews_similar($news_type)
	{
		$query = $this->db->query("	SELECT
										a.eyenews_id,
										a.title,
										a.thumb1,
										a.news_type,
										a.createon,
										a.news_view
									FROM
										tbl_eyenews a
									WHERE
										a.news_type = '$news_type'
									ORDER BY
										a.eyenews_id DESC
									LIMIT
										4
								")->result_array();
		return $query;
	}

	public function get_eyenews_rekomendasi()
	{
		$query = $this->db->query("	SELECT
										a.eyenews_id,
										a.title,
										a.description,
										a.createon										,
										a.thumb1,
										a.news_type,
										a.news_view,
										a.publish_on
									FROM
										tbl_eyenews a
									WHERE
										a.publish_on<='".date("Y-m-d H:i:s")."'
									ORDER BY
										a.eyenews_id DESC
									LIMIT
										3
								")->result_array();
		return $query;
	}

	public function get_eyenews_populer()
	{
		$query = $this->db->query("	SELECT
										a.eyenews_id,
										a.title,
										a.description,
										a.createon										,
										a.thumb1,
										a.news_type,
										a.news_view,
										a.publish_on
									FROM
										tbl_eyenews a
									WHERE
										a.publish_on
									ORDER BY
										a.news_view DESC
									LIMIT
										3
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

public function get_jadwal_today()
	{
		$query = $this->db->query("	SELECT a.*,
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
										a.live_pertandingan!=''
										AND
										jadwal_pertandingan>='".date("Y-m-d")."' 
									ORDER BY
										jadwal_pertandingan ASC LIMIT 5
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

	public function select_view($date1,$date2,$eyenews_id,$ip)
    {
        $query = $this->db->query("SELECT view_id FROM tbl_view WHERE visit_date>='".$date1."' AND visit_date<='".$date2."' AND type_visit='view' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
        return $query;
    }

public function get_trending_eyenews()
	{
		$query = $this->db->query("	SELECT
										a.title,
										a.url,
										a.news_view,
										a.createon,
										a.thumb1
									FROM
										tbl_eyenews a
									WHERE
										a.url !=''
									ORDER BY
										a.news_view ASC
									LIMIT
										4
									")->result_array();
		return $query;
	}	
	
}

/* End of file Eyenews_model.php */
/* Location: ./application/models/Eyenews_model.php */