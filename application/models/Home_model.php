<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
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
									a.jadwal_pertandingan <= '".date('Y-m-d H:i:s')."' - INTERVAL 1 DAY
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
									a.jadwal_pertandingan <= '".date('Y-m-d H:i:s')."' - INTERVAL 1 DAY
								order by
									jadwal_pertandingan DESC
								LIMIT
									6,6")->result_array();
		return $query;
	}

	public function get_trending_eyetube()
	{
		$query = $this->db->query("	SELECT
										a.title,
										a.url,
										a.tube_view
									FROM
										tbl_eyetube a
									WHERE
										a.url !=''
									ORDER BY
										a.tube_view ASC
									LIMIT
										2
									")->result_array();
		return $query;
	}

	public function get_trending_eyenews()
	{
		$query = $this->db->query("	SELECT
										a.title,
										a.url,
										a.news_view
									FROM
										tbl_eyenews a
									WHERE
										a.url !=''
									ORDER BY
										a.news_view ASC
									LIMIT
										3
									")->result_array();
		return $query;
	}

	public function get_profile_club()
	{
		$query = $this->db->query("	SELECT
										a.club_id,
										a.name as nama_club,
										a.competition,
										a.logo,
										b.name as nama_manager,
										a.url as link_klub,
										count(c.name) as squad
									FROM
										tbl_club a
									INNER JOIN
										tbl_official_team b on a.club_id = b.club_now
									LEFT JOIN
										tbl_player c on a.club_id = c.club_id
									WHERE
										b.position  = 'Manager'
										AND
										a.id_liga = '0'
									GROUP BY
										a.club_id
									LIMIT
										4
									")->result_array();
		return $query;
	}
	
	public function get_profile_club_2()
	{
		$query = $this->db->query("	SELECT
										a.club_id,
										a.name as nama_club,
										a.competition,
										a.logo,
										b.name as nama_manager,
										a.url as link_klub,
										count(c.name) as squad
									FROM
										tbl_club a
									INNER JOIN
										tbl_official_team b on a.club_id = b.club_now
									LEFT JOIN
										tbl_player c on a.club_id = c.club_id
									WHERE
										b.position  = 'Manager'
										AND
										a.id_liga = '0'
									GROUP BY
										a.club_id
									LIMIT
										4,4
									")->result_array();
		return $query;
	}
	
	public function get_profile_club_3()
	{
		$query = $this->db->query("	SELECT
										a.club_id,
										a.name as nama_club,
										a.competition,
										a.logo,
										b.name as nama_manager,
										a.url as link_klub,
										count(c.name) as squad
									FROM
										tbl_club a
									INNER JOIN
										tbl_official_team b on a.club_id = b.club_now
									LEFT JOIN
										tbl_player c on a.club_id = c.club_id
									WHERE
										b.position  = 'Manager'
										AND
										a.id_liga = '0'
									GROUP BY
										a.club_id
									LIMIT
										8,4
									")->result_array();
		return $query;
	}

	public function get_squad($club_id)
	{
		$query = $this->db->query("	SELECT
										count(name) as squad
									FROM
										tbl_player
									WHERE
										club_id  = ".$club_id."
									")->result_array();
		return $query;
	}

	public function get_player_random()
	{
		$query = $this->db->query("	SELECT
										a.player_id,
										a.club_id,
										a.birth_date as tgl_lahir,
										SUBSTRING(a.birth_date,1,2) as tanggal,
										SUBSTRING(a.birth_date,4,2) as bulan,
										SUBSTRING(a.birth_date,7,4) as tahun,
										a.name as nama,
										a.pic as foto,
										a.position as posisi,
										b.name as klub,
										a.url as link_player
									FROM
										tbl_player a
									LEFT JOIN
										tbl_club b on a.club_id = b.club_id
									WHERE
										a.status like '%pro%'
										AND
										a.birth_date like '%/%'
									ORDER BY RAND() ASC
									LIMIT 3
								")->result_array();
		return $query;
	}
	
	public function get_player_random_2()
	{
		$query = $this->db->query("	SELECT
										a.player_id,
										a.club_id,
										a.birth_date as tgl_lahir,
										SUBSTRING(a.birth_date,1,2) as tanggal,
										SUBSTRING(a.birth_date,4,2) as bulan,
										SUBSTRING(a.birth_date,7,4) as tahun,
										a.name as nama,
										a.pic as foto,
										a.position as posisi,
										b.name as klub,
										a.url as link_player
									FROM
										tbl_player a
									LEFT JOIN
										tbl_club b on a.club_id = b.club_id
									WHERE
										a.status like '%pro%'
										AND
										a.birth_date like '%/%'
									ORDER BY RAND() ASC
									LIMIT 3
								")->result_array();
		return $query;
	}
	
	public function get_player_random_3()
	{
		$query = $this->db->query("	SELECT
										a.player_id,
										a.club_id,
										a.birth_date as tgl_lahir,
										SUBSTRING(a.birth_date,1,2) as tanggal,
										SUBSTRING(a.birth_date,4,2) as bulan,
										SUBSTRING(a.birth_date,7,4) as tahun,
										a.name as nama,
										a.pic as foto,
										a.position as posisi,
										b.name as klub,
										a.url as link_player
									FROM
										tbl_player a
									LEFT JOIN
										tbl_club b on a.club_id = b.club_id
									WHERE
										a.status like '%pro%'
										AND
										a.birth_date like '%/%'
									ORDER BY RAND() ASC
									LIMIT 3
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
										3
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
										1
								")->row();
		return $query;
	}

	public function get_eyenews_similar($news_type)
	{
		$query = $this->db->query("	SELECT
										a.eyenews_id,
										a.title,
										a.news_type,
										a.news_view,
										a.url
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
										a.publish_on,
										a.url
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
										a.publish_on,
										a.url
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

	public function get_eyenews_muda()
	{
		$query = $this->db->query("	SELECT
										a.eyenews_id,
										a.title,
										a.thumb1,
										a.description,
										a.createon,
										a.news_type,
										a.news_view,
										a.url
									FROM
										tbl_eyenews a
									WHERE
										a.news_type like '%usia muda%'
									ORDER BY
										a.eyenews_id DESC
									LIMIT
										3
								")->result_array();
		return $query;
	}

	public function get_jadwal_today()
	{
		$query = $this->db->query("	SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title !='' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC LIMIT 8
								")->result_array();
		return $query;
	}
	public function get_jadwal_tomorrow1()
	{
		$query = $this->db->query("	SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title !='' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' + INTERVAL 1 DAY order by jadwal_pertandingan ASC LIMIT 8
								")->result_array();
		return $query;
	}
	public function get_jadwal_tomorrow2()
	{
		$query = $this->db->query("	SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title !='' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' + INTERVAL 2 DAY order by jadwal_pertandingan ASC LIMIT 8
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
	
	public function get_eyemarket_main()
	{
		$query = $this->db->query("	SELECT
										id_product,
										admin_id,
										product_name,
										category_product_name,
										price,
										discount,
										stock,
										pic,
										description
									FROM
										tbl_product
									ORDER BY 
									product_name
									LIMIT
										3
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
										id_event DESC
									LIMIT
										3
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
										id_event DESC
									LIMIT
										3,3
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
										id_event DESC
									LIMIT
										6,3
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
	
	public function get_gallery_member()
	{
		$query = $this->db->query("SELECT * FROM tbl_member a LEFT JOIN tbl_gallery b ON b.id_gallery=a.profile_pic WHERE id_member='".$_SESSION["id_member"]."' LIMIT 1")->row_array();
		return $query;
	}
	
	public function get_player_member($id_player)
	{
		$query = $this->db->query("SELECT * FROM tbl_player WHERE player_id='".$id_player."' LIMIT 1")->row_array();
		return $query;
	}
	
	public function get_check_member()
	{
		$query = $this->db->query("SELECT * FROM tbl_member_player WHERE id_member='".$_SESSION["id_member"]."' LIMIT 1");
		return $query;
	}
	
	public function get_profile_member()
	{
		$query = $this->db->query("SELECT a.*,b.name,b.fullname,b.address,b.about FROM tbl_member_player a left join tbl_member b on b.id_member = a.id_member WHERE a.id_member='".$_SESSION["id_member"]."' LIMIT 1")->row_array();
		return $query;
	}
	
	public function get_pic_member()
	{
		$query = $this->db->query("SELECT a.*,b.pic as profile_pics FROM tbl_member a LEFT JOIN tbl_gallery b ON b.id_gallery=a.profile_pic WHERE id_member='".$_SESSION["id_member"]."' LIMIT 1")->row_array();
		return $query;
	}
	
	public function get_galleri_member()
	{
		$query = $this->db->query("SELECT * FROM tbl_gallery WHERE upload_user='".$_SESSION["member_id"]."' AND publish_by='member' AND active='1'")->result_array();
		return $query;
	}
	
	public function uploadVideo($vid,$lat,$lon)
	{
		$member_id = $_SESSION["member_id"];

		$data = array(
			'video'   		=>  $vid.'.mp4',
			'lat'     		=>  $lat,
			'lon'       	=>  $lon,
			'upload_date'  	=>  date("Y-m-d H:i:s"),
			'publish_by'   	=>  'member',
			'publish_type'	=>  'private',
			'upload_user'	=>  $member_id
		);

		$this->db->insert('tbl_gallery', $data);
		$status = $this->db->affected_rows();
		return $status;
	}
	
	public function getAllLeftJoin($table, $where = array(), $select = array(), $order = array(), $limit = '', $offset = '', $whereNotin = '', $like = array(), $leftjoin = array()){
		if($limit != ''){
			if($offset == '')
			{
				if(is_numeric($limit)){
					$this->db->limit($limit);
				}
			}else{
				if(is_numeric($offset)){
					$this->db->limit($limit, $offset);
				}else{
					$this->db->limit($limit);
				}
			}
		}
		
		if(count($like) > 0 && $like != ''){
			foreach($like as $k=>$v){
				$this->db->like($k,$v);
			}
		}
		
		#p($whereNotin);
		if(is_array($whereNotin)){
			if(count($whereNotin) > 0){
				$field = $whereNotin[0];
				
				$ItemWhere = $whereNotin[1] != ''  > 0 ? $whereNotin[1] : array();  #ditambahin ini kemaren
				
				#echo count($whereNotin[1]);
				#p($whereNotin[1]);				
				foreach($ItemWhere as $k=>$v){
					$this->db->where_not_in($field,$v);
				}
			}
		}
		
		if(is_array($where)){
			if(count($where) > 0){
				foreach($where as $k=>$v){
					$this->db->where($k,$v);
				}			
			}
		}
		
		if(is_array($leftjoin)){
			if(count($leftjoin) > 0){
				foreach($leftjoin as $k=>$v){
					$this->db->join($k,$v, 'left');
				}			
			}
		}
		
		if(is_array($order)){
			if(count($order) > 0){
				foreach($order as $ko=>$vo){				
					$this->db->order_by($ko, $vo); 
				}
			}
		}
		
		$s = '';
		if(is_array($select)){
			if(count($select) > 0){
				foreach($select as $vs){				
					$s .= ','.$vs;
				}
				$s = substr($s,1);
				$this->db->select($s);
			}
		}
		
		$q = $this->db->get($table);
		
		if($q->num_rows() > 0){
			$r = $q->result();
		}else{
			$r = array();
		}
		
		return $r;		
	}
	
	public function get_all_product()
    {
        $query = $this->db->query(" SELECT
                                        A.id_product,
                                        A.id_kategori,
                                        A.id_toko,
                                        A.nama,
                                        A.title_slug,
                                        A.harga_sebelum,
                                        A.harga,
                                        A.diskon,
                                        A.status_publish,
                                        A.created_date,
                                        B. nama as toko,
                                        C. nama as kategori,
                                        E.id as id_image,
                                        E.image1,
                                        F.nama as nama_region
                                    FROM
                                        eyemarket_product A
                                    LEFT JOIN 
                                        eyemarket_toko B on A.id_toko = B.id
                                    INNER JOIN
                                        eyemarket_category C on A.id_kategori = C.id
                                    LEFT JOIN
                                        eyemarket_images E on A.id_product =  E.id_product
                                    INNER JOIN
                                        eyemarket_parent_cat F on A.id_kategori = F.id
                                    WHERE
                                        status_publish = 1
                                    ORDER BY 
                                        A.id_product DESC
									LIMIT 3
                                        ")->result_array();
            return $query; 
    }
	public function aduhai($value='')
	{
		echo 'hahahahha';
	}
{
	
}
}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */

