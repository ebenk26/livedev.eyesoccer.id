<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eyeprofile_model extends CI_Model
{
//membaca tabel database
        public function listing(){
            $this->db->select('tbl_category_product.*,category_product_name');
            $this->db->from('tbl_category_product');
            //relasi
            $this->db->join('tbl_category_product','tbl_category_product.id_category_product = tbl_product.id_product','left');
            $this->db->join('admin','admin.admin_id = tbl_product.id_product','left');
            //end relasi
            $this->db->order_by('id_product','DESC limit 4');
            $query=$this->db->get();
            return $query->result ();
        }
		public function karir_klub($player_id){
            $this->db->select('*');
            $this->db->from('tbl_karir_player');
			$this->db->where('player_id',$player_id);
			$this->db->where('timnas',0);
            
            return $this->db->get();
        }
		public function karir_timnas($player_id){
            $this->db->select('*');
            $this->db->from('tbl_karir_player');
			$this->db->where('player_id',$player_id);
			$this->db->where('timnas',1);
            
            return $this->db->get();
        }
		public function prestasi_player($player_id){
            $this->db->select('*');
            $this->db->from('tbl_prestasi_player');
			$this->db->where('player_id',$player_id);
            
            return $this->db->get();
        }
		
	public function get_club_header()
	{
		$query = $this->db->query("SELECT a.club_id,count(a.name) as nama_club,a.logo as logo_club,
										establish_date,website,competition,stadium,c.birth_date,a.address,
										b.name as nama_manager,a.stadium as stadion,count(c.name) as squad
										FROM tbl_club a INNER JOIN tbl_official_team b on a.club_id = b.club_now LEFT JOIN tbl_player c on a.club_id = c.club_id
										WHERE b.position  = 'Manager' AND a.id_liga = '0' GROUP BY a.club_id ASC")->row();
		return $query;
	}	
	
	public function get_club_main()
	{
		$query = $this->db->query("SELECT a.club_id,a.name as nama_club,a.logo as logo_club,competition,b.name as nama_manager,count(c.name) as squad
									FROM tbl_club a INNER JOIN tbl_official_team b on a.club_id = b.club_now LEFT JOIN tbl_player c on a.club_id = c.club_id
									WHERE b.position  = 'Manager' AND a.id_liga = '0' 
									GROUP BY a.club_id ASC LIMIT 18")->result_array();
		return $query;
	}
	 
	public function get_club_liga($liga,$limit=null,$cat_liga=null)
	{
		if($this->uri->segment(4) && !is_numeric($this->uri->segment(4))){
			$compt = "and d.nama_liga='".urldecode($this->uri->segment(4))."'";
		}else{
			$compt = "and a.competition='".$liga."'";
		}
		if($limit != null){
			$limit = "LIMIT ".$limit."";
		}else{
			$limit ="";
		}
		
		if($cat_liga != null){
			$compt .= " and d.nama_liga='".$cat_liga."'";
		}
		
		if($liga == 'non liga'){
			$compt = "and a.competition in('SSB / Akademi Sepakbola')";
		}
		$query = $this->db->query("SELECT a.club_id,a.name as nama_club,a.logo as logo_club,competition,count(c.player_id) as squad,a.url
									FROM tbl_club a
									LEFT JOIN tbl_player c on a.club_id = c.club_id
									LEFT JOIN tbl_liga d on a.id_liga = d.id_liga
									WHERE a.name not in ('ebenktestlagijgndidelete') and a.active = 1 ".$compt."
									GROUP BY a.name ASC ".$limit."")->result_array();
									
		return $query;
	}
	
	public function get_club_liga_avggyear($liga,$limit=null,$cat_liga=null)
	{
		$compt = "and a.competition='".$liga."'";
		if($limit != null){
			$limit = "LIMIT ".$limit."";
		}else{
			$limit ="";
		}
		
		if($cat_liga != null){
			$compt .= " and d.nama_liga='".$cat_liga."'";
		}
		
		if($liga == 'non liga'){
			$compt = "and a.competition in('SSB / Akademi Sepakbola')";
		}
		
		if($liga != 'Liga Usia Muda'){
			$query = $this->db->query("SELECT (YEAR(CURDATE())   - RIGHT(c.birth_date,4)) as usia,a.club_id,a.name as nama_club,a.logo as logo_club,competition,count(c.player_id) as squad,a.url
									FROM tbl_club a
									LEFT JOIN tbl_player c on a.club_id = c.club_id
									LEFT JOIN tbl_liga d on a.id_liga = d.id_liga
									WHERE a.name not in ('ebenktestlagijgndidelete') and a.active = 1 ".$compt."
									")->result_array();
		}else{
			$query = '';
		}
									
		return $query;
	}
	
	public function get_player_liga($liga,$nationality,$cat_liga=null)
	{
		$table_liga = "";
		if($this->uri->segment(4)){
			$compt = " c.nama_liga='".urldecode($this->uri->segment(4))."'";
			$table_liga = "left join tbl_liga c on b.id_liga = c.id_liga ";
		}else{
			if($liga == 'non liga'){
				$compt = "b.competition in ('SSB / Akademi Sepakbola')";
			}else{
				$compt = "b.competition = '".$liga."'";
			}
		}
		
		if($cat_liga != null){
			$compt .= " and c.nama_liga='".$cat_liga."'";
			$table_liga = "left join tbl_liga c on b.id_liga = c.id_liga ";
		}
		$query = $this->db->query("select a.name,b.name as clubname from tbl_player a
									join tbl_club b on a.club_id=b.club_id 
									".$table_liga."
									where ".$compt." and b.active = 1")->result_array();
		return $query;
	}
	
	public function get_pic_liga($liga)
	{
		$query = $this->db->query("select * from tbl_event where title like '%".$liga."%'")->row();
		return $query;
	}
	
	public function get_player_liga_strange($liga,$nationality='indonesia',$cat_liga=null)
	{
		$table_liga = "";
		if($this->uri->segment(4)){
			$compt = " c.nama_liga='".urldecode($this->uri->segment(4))."'";
			$table_liga = "left join tbl_liga c on b.id_liga = c.id_liga ";
		}else{
			if($liga == 'non liga'){
				$compt = "b.competition in ('SSB / Akademi Sepakbola')";
			}else{
				$compt = "b.competition = '".$liga."'";
			}
		}
		
		if($cat_liga != null){
			$compt .= " and c.nama_liga='".$cat_liga."'";
			$table_liga = "left join tbl_liga c on b.id_liga = c.id_liga ";
		}
		
		$query = $this->db->query("select a.name,b.name as clubname from tbl_player a
									join tbl_club b on a.club_id=b.club_id 
									".$table_liga." 
									where ".$compt." and nationality not in ('".$nationality."','".ucwords($nationality)."','".strtoupper($nationality)."','".strtolower($nationality)."','wni','WNI','') and b.active = 1")->result_array();
		return $query;
	}
	
	public function get_profile_club()
	{
		$query = $this->db->query("SELECT 
									a.*,c.club_id as club_id_a,
									d.club_id as club_id_b,
									c.logo as logo_a,
									d.logo as logo_b,
									c.name as club_a,
									d.name as club_b,
									c.url as link_klub
									FROM tbl_jadwal_event a 
									LEFT JOIN tbl_event b ON b.id_event=a.id_event 
									INNER JOIN tbl_club c ON c.club_id=a.tim_a 
									INNER JOIN tbl_club d ON d.club_id=a.tim_b 
									where b.title like '%Liga 1%' 
									AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' 
									order by 
									jadwal_pertandingan DESC LIMIT 6")->result_array();
		return $query;
	}

	
	public function get_jadwal_hasil($nama_liga_event)
	{
		$query = $this->db->query("SELECT 
									a.*,c.club_id as club_id_a,
									d.club_id as club_id_b,
									c.logo as logo_a,
									d.logo as logo_b,
									c.name as club_a,
									d.name as club_b,
									c.url as link_klub
									FROM
									tbl_jadwal_event a
									LEFT JOIN
										tbl_event b ON b.id_event=a.id_event
									INNER JOIN
										tbl_club c ON c.club_id=a.tim_a
									INNER JOIN
										tbl_club d ON d.club_id=a.tim_b
								WHERE b.title like '%".$nama_liga_event."%' AND
									a.jadwal_pertandingan <= '".date('Y-m-d H:i:s')."'
								order by
									jadwal_pertandingan DESC LIMIT 6")->result_array();
		return $query;
	}

	public function get_jadwal_hasil1($nama_liga_event)
	{
		$query = $this->db->query("SELECT 
									a.*,c.club_id as club_id_a,
									d.club_id as club_id_b,
									c.logo as logo_a,
									d.logo as logo_b,
									c.name as club_a,
									d.name as club_b,
									c.url as link_klub
									FROM
									tbl_jadwal_event a
									LEFT JOIN
										tbl_event b ON b.id_event=a.id_event
									INNER JOIN
										tbl_club c ON c.club_id=a.tim_a
									INNER JOIN
										tbl_club d ON d.club_id=a.tim_b
								WHERE b.title like '%".$nama_liga_event."%' AND
									a.jadwal_pertandingan <= '".date('Y-m-d H:i:s')."'
								order by
									jadwal_pertandingan DESC LIMIT 6,6")->result_array();
		return $query;
	}
	
	public function get_jadwal_hasil2($nama_liga_event)
	{	
		$query = $this->db->query("SELECT 
									a.*,c.club_id as club_id_a,
									d.club_id as club_id_b,
									c.logo as logo_a,
									d.logo as logo_b,
									c.name as club_a,
									d.name as club_b,
									c.url as link_klub
									FROM
									tbl_jadwal_event a
									LEFT JOIN
										tbl_event b ON b.id_event=a.id_event
									INNER JOIN
										tbl_club c ON c.club_id=a.tim_a
									INNER JOIN
										tbl_club d ON d.club_id=a.tim_b
								WHERE b.title like '%".$nama_liga_event."%' AND
									a.jadwal_pertandingan <= '".date('Y-m-d H:i:s')."' 
								order by
									jadwal_pertandingan DESC LIMIT 12,6")->result_array();
		return $query;
	}

	public function get_jadwal_tomorrow_1($datetime,$nama_liga)
	{
		$query = $this->db->query("SELECT 
									a.*,c.club_id as club_id_a,
									d.club_id as club_id_b,
									c.logo as logo_a,
									d.logo as logo_b,
									c.name as club_a,
									d.name as club_b,
									c.url as link_klub
									FROM tbl_jadwal_event a 
									LEFT JOIN tbl_event b ON b.id_event=a.id_event 
									INNER JOIN tbl_club c ON c.club_id=a.tim_a 
									INNER JOIN tbl_club d ON d.club_id=a.tim_b 
									where b.title like '%".$nama_liga."%' 
									AND a.jadwal_pertandingan>='".$datetime."' 
									order by 
									jadwal_pertandingan DESC LIMIT 6")->result_array();
		return $query;
	}
	
	public function get_jadwal_tomorrow_2($datetime,$nama_liga)
	{
		$query = $this->db->query("SELECT 
									a.*,c.club_id as club_id_a,
									d.club_id as club_id_b,
									c.logo as logo_a,
									d.logo as logo_b,
									c.name as club_a,
									d.name as club_b,
									c.url as link_klub
									FROM tbl_jadwal_event a 
									LEFT JOIN tbl_event b ON b.id_event=a.id_event 
									INNER JOIN tbl_club c ON c.club_id=a.tim_a 
									INNER JOIN tbl_club d ON d.club_id=a.tim_b 
									where b.title like '%".$nama_liga."%' 
									AND a.jadwal_pertandingan>='".$datetime."' 
									order by 
									jadwal_pertandingan DESC LIMIT 6,6")->result_array();
		return $query;
	}
	
	public function get_jadwal_tomorrow_3($datetime,$nama_liga)
	{
		$query = $this->db->query("SELECT 
									a.*,c.club_id as club_id_a,
									d.club_id as club_id_b,
									c.logo as logo_a,
									d.logo as logo_b,
									c.name as club_a,
									d.name as club_b,
									c.url as link_klub
									FROM tbl_jadwal_event a 
									LEFT JOIN tbl_event b ON b.id_event=a.id_event 
									INNER JOIN tbl_club c ON c.club_id=a.tim_a 
									INNER JOIN tbl_club d ON d.club_id=a.tim_b 
									where b.title like '%".$nama_liga."%' 
									AND a.jadwal_pertandingan>='".date('Y-m-d H:i:s')."' - INTERVAL 1 DAY 
									order by 
									jadwal_pertandingan DESC LIMIT 12,6")->result_array();
		return $query;
	}
	
	public function get_jumlah_klub()
	{
		$query = $this->db->query("select name from tbl_club where competition='liga indonesia 1'")->row();
		return $query;
	}
	
	public function get_jumlah_pemain()
	{
		$query = $this->db->query("select name from tbl_player where status!='amatir' AND status!=''")->row();
		return $query;
	}
	public function get_pemain_asing()
	{
		$query = $this->db->query("select nationality from tbl_player where nationality !='indonesia' AND nationality !=''")->row();
		return $query;
	}
	public function get_klasemen()
	{
		$query = $this->db->query("select club_id, name, logo, competition from tbl_club where competition='liga indonesia 1' AND name !='ebenktestlagijgndidelete' order by name ASC limit 10")->result_array();
		return $query;
	}
	public function get_transfer_pemain($nama_liga)
	{
		$query = $this->db->query("SELECT
										a.player_id,
										a.club_id,
										a.birth_date as tgl_lahir,
										SUBSTRING(a.birth_date,1,2) as tanggal,
										SUBSTRING(a.birth_date,4,2) as bulan,
										SUBSTRING(a.birth_date,7,4) as tahun,
										a.name as nama,
										a.pic as foto,
										a.position as posisi,
										a.nationality as timnas,
										b.name as klub
									FROM
										tbl_player a
									LEFT JOIN
										tbl_club b on a.club_id = b.club_id
									WHERE
										a.birth_date like '%/%'
										AND
										b.competition like '%".$nama_liga."%'
									ORDER BY a.name ASC
									LIMIT 5")->result_array();
		return $query;
	}
	
	public function get_pencetak_gol($nama_liga)
	{
		$query = $this->db->query("select a.player_id, a.name, a.position from tbl_player a
									LEFT JOIN
										tbl_club b on a.club_id = b.club_id
									WHERE
										b.competition like '%".$nama_liga."%'
									AND
										a.position not in ('Kiper','Bek Kanan','Bek Kiri','Bek Tengah')
									order by 
										player_id ASC Limit 5")->result_array();
		return $query;
	}
	public function get_kompetisi()
	{
		$query = $this->db->query("select * from tbl_competitions")->result_array();
		return $query;
	}
	public function get_kompetisi_pro()
	{
		$query = $this->db->query("select * from tbl_competitions where competition not in ('Liga Usia Muda','SSB / Akademi Sepakbola','Liga Eyesoccer','Liga Indonesia 3','Liga Desa 2017')")->result_array();
		return $query;
	}	
	public function get_provinsi()
	{
		$query = $this->db->query("select * from provinsi")->result_array();
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
										4
								")->result_array();
		return $query;
	}	
	
	public function get_klub_pemain()
	{
		$query = $this->db->query("SELECT a.club_id,a.name as nama_club,a.logo as logo_club,
									establish_date,website,competition,stadium,c.birth_date,a.address,
									b.name as nama_manager,a.stadium as stadion,count(c.name) as squad
									FROM tbl_club a INNER JOIN tbl_official_team b on a.club_id = b.club_now LEFT JOIN tbl_player c on a.club_id = c.club_id
									WHERE b.position  = 'Manager' AND a.id_liga = '0'
									GROUP BY a.club_id ASC")->result_array();
		return $query;
	}	
	
	public function get_klub_supporter()
	{
		$query = $this->db->query("SELECT a.club_id,a.name as nama_club,a.logo as logo_club,
									establish_date,website,competition,stadium,c.birth_date,a.address,
									b.name as nama_manager,a.stadium as stadion,count(c.name) as squad
									FROM tbl_club a INNER JOIN tbl_official_team b on a.club_id = b.club_now LEFT JOIN tbl_player c on a.club_id = c.club_id
									WHERE b.position  = 'Manager' AND a.id_liga = '0'
									GROUP BY a.club_id ASC LIMIT 8")->result_array();
		return $query;
	}	
	
	public function get_pemain_klub()
	{
		$query = $this->db->query("SELECT
										a.player_id,
										a.club_id,
										a.birth_date as tgl_lahir,
										SUBSTRING(a.birth_date,1,2) as tanggal,
										SUBSTRING(a.birth_date,4,2) as bulan,
										SUBSTRING(a.birth_date,7,4) as tahun,
										a.name as nama,
										a.pic as foto,
										a.position as posisi,
										a.nationality as timnas,
										a.url,
										b.name as klub
									FROM
										tbl_player a
									LEFT JOIN
										tbl_club b on a.club_id = b.club_id
									WHERE
										a.status like '%pro%'
										AND
										a.birth_date like '%/%'
									ORDER BY a.name ASC
									LIMIT 6")->result_array();
		return $query;
	}	
	
	public function get_jadwal_pertandingan()
	{
		$query = $this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Liga 1%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' 
									order by jadwal_pertandingan ASC LIMIT 4")->result_array();
		return $query;
	}	
	
	public function get_official_main()
	{
		$query = $this->db->query("SELECT a.official_id,b.club_id,a.name as nama_manager,a.position,a.contract,a.nationality,
										a.birth_date as tgl_lahir,
										SUBSTRING(a.birth_date,1,2) as tanggal,
										SUBSTRING(a.birth_date,4,2) as bulan,
										SUBSTRING(a.birth_date,7,4) as tahun,
										a.official_photo,
										b.name as nama_club,b.logo as logo_club
										FROM tbl_official_team a LEFT JOIN tbl_club b on b.club_id
										WHERE  a.nationality != '' AND
										a.birth_date like '%/%' AND a.birth_date !='' AND a.name !='tes' AND contract !='' GROUP BY a.name ASC Limit 10")->result_array();
		return $query;
	}	
	
	public function get_klub_official()
	{
		$query = $this->db->query("SELECT a.club_id,a.name as nama_club,a.logo as logo_club,
									establish_date,website,competition,stadium,c.birth_date,a.address,
									b.name as nama_manager,a.stadium as stadion,count(c.name) as squad
									FROM tbl_club a INNER JOIN tbl_official_team b on a.club_id = b.club_now LEFT JOIN tbl_player c on a.club_id = c.club_id
									WHERE b.position  = 'Manager' AND a.id_liga = '0' GROUP BY a.name ASC")->result_array();
		return $query;
	}	
	
	public function get_official_klub()
	{
		$query = $this->db->query("SELECT a.official_id,a.official_photo,b.club_id,a.name as nama_manager,a.position,a.contract,a.nationality,
										a.birth_date as tgl_lahir,
										SUBSTRING(a.birth_date,1,2) as tanggal,
										SUBSTRING(a.birth_date,4,2) as bulan,
										SUBSTRING(a.birth_date,7,4) as tahun,			
										b.name as nama_club,b.logo as logo_club
										FROM tbl_official_team a LEFT JOIN tbl_club b on b.club_id
										WHERE a.nationality != '' AND
										a.birth_date like '%/%' AND a.birth_date !='' AND a.name !='tes' AND contract !='' GROUP BY a.name ASC Limit 6")->result_array();
		return $query;
	}

	public function get_karir_klub()
	{
		$query = $this->db->query("SELECT * FROM tbl_karir_klub WHERE karir_klub_id")->result_array();
		return $query;
	}

	public function get_karir_player()
	{
		$query = $this->db->query("SELECT * FROM tbl_karir_player 
								WHERE 								
								pelatih!='0' AND negara!='' AND karir_id Limit 5")->result_array();
		return $query;
	}
	
	public function get_list_pemain($requestData,$liga)
	{
		$subliga = "";
		// print_r($requestData['search']['regex']);exit();
		$columns = array( 
		// datatable column index  => database column name
			0 =>'player_id', 
			1 => 'nama',
			2=> 'tanggal',
			3=> 'posisi',
			4=> 'klub',
			5=> 'timnas'
		);
		
		if( !empty($requestData['search']['value']) ) {  
		$sql=" AND ( a.name LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR b.name LIKE '%".$requestData['search']['value']."%' ";

			$sql.=" OR a.position LIKE '%".$requestData['search']['value']."%' ";
			$sql.=" OR a.nationality LIKE '%".$requestData['search']['value']."%' )";
		}
		else{
			$sql="";
		}
		if($liga == 'non liga'){
			$liga = 'SSB / Akademi Sepakbola';
		}
		if($this->uri->segment(4)){
			$subliga = " and c.nama_liga = '".urldecode($this->uri->segment(4))."'";
		}
		$query = $this->db->query("SELECT
										a.player_id,
										a.club_id,
										a.birth_date as tgl_lahir,
										SUBSTRING(a.birth_date,1,2) as tanggal,
										SUBSTRING(a.birth_date,4,2) as bulan,
										SUBSTRING(a.birth_date,7,4) as tahun,
										a.name as nama,
										a.pic as foto,
										a.position as posisi,
										a.nationality as timnas,
										a.url,
										b.name as klub
									FROM
										tbl_player a
									LEFT JOIN
										tbl_club b on a.club_id = b.club_id
									LEFT JOIN
										tbl_liga c on b.id_liga = c.id_liga
									WHERE
										b.competition = '".$liga."' and b.active = 1 ".$subliga."
										".$sql."
										");
		$totalData = count($query->result_array());
		$totalFiltered = $totalData;
		
		$result_with_limit=$this->db->query("SELECT
										a.player_id,
										a.club_id,
										a.birth_date as tgl_lahir,
										SUBSTRING(a.birth_date,1,2) as tanggal,
										SUBSTRING(a.birth_date,4,2) as bulan,
										SUBSTRING(a.birth_date,7,4) as tahun,
										a.name as nama,
										a.pic as foto,
										a.position as posisi,
										a.nationality as timnas,
										a.url,
										b.name as klub
									FROM
										tbl_player a
									LEFT JOIN
										tbl_club b on a.club_id = b.club_id
									LEFT JOIN
										tbl_liga c on b.id_liga = c.id_liga
									WHERE
										b.competition = '".$liga."' and b.active = 1 ".$subliga."
									".$sql." order by ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."");
		
		$totalFiltered=$query->num_rows();
		if($requestData['start']==0){
			$i=1;
		}else{
			$i=$requestData['start']+1;
		}
		$data2 = array();
		foreach ($result_with_limit->result() as $data)
		{
			$expl = explode('.',$data->foto);
			if(end($expl) == 'jpg' || end($expl) == 'png' || end($expl) == 'jpeg'|| end($expl) == 'PNG' || end($expl) == 'JPG' || end($expl) == 'JPEG'){
				$img = imgUrl()."systems/player_storage/".$data->foto;
			}else{
				$img = "https://www.eyesoccer.id/systems/player_storage/LOGO PERISAI132.png";
			}
			$nestedData=array(); 
			$nestedData[] = $i;
			$nestedData[] = "<a target='_blank' href='".base_url()."eyeprofile/pemain_detail/".$data->url."'><div style='width: 40px;height:40px; overflow:hidden; border-radius:50%;float:left;cursor:pointer;position:relative;'>
						<img src='".$img."' alt='".$data->nama."'>
					</div><div style='float:right;width: 75%;cursor:pointer;'>".$data->nama."</div></a>";
			$nestedData[] = $data->tanggal."-".$data->bulan."-".$data->tahun;
			$nestedData[] = $data->posisi;
			$nestedData[] = $data->klub;
			$nestedData[] = $data->timnas;
			
			$data2[] = $nestedData;
			$i++;
		}


		$json_data = array(
					"draw"            => intval( $requestData['draw'] ), 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ),
					"data"            => $data2   // total data array
					);

		echo json_encode($json_data); 
	}
	
	public function get_list_official($requestData,$liga)
	{
		// print_r($requestData['search']['regex']);exit();
		$columns = array( 
		// datatable column index  => database column name
			0 =>'official_id', 
			1 => 'nama_manager',
			2=> 'klub',
			3=> 'tgl_lahir',
			4=> 'position',
			5=> 'nationality',
			6=> 'license',
			7=> 'contract',
		);
		
		if( !empty($requestData['search']['value']) ) {  
		$sql=" AND ( a.name LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR b.name LIKE '%".$requestData['search']['value']."%' ";

			$sql.=" OR a.position LIKE '%".$requestData['search']['value']."%' ";
			$sql.=" OR a.nationality LIKE '%".$requestData['search']['value']."%' )";
		}
		else{
			$sql="";
		}
		if($liga == 'non liga'){
			$liga = 'SSB / Akademi Sepakbola';
		}
		$query = $this->db->query("select a.official_id,b.club_id,a.name as nama_manager,
									a.position,a.contract,a.nationality,
									a.birth_date as tgl_lahir,
									a.official_photo,a.license,a.url,
									b.name as nama_club,b.logo as logo_club 
									from tbl_official_team a
									join tbl_club b on a.club_now=b.club_id
									where b.competition ='".$liga."' and b.active = 1
										".$sql."
										");
		$totalData = count($query->result_array());
		$totalFiltered = $totalData;
		
		$result_with_limit=$this->db->query("select a.official_id,b.club_id,a.name as nama_manager,
									a.position,a.contract,a.nationality,
									a.birth_date as tgl_lahir,
									a.official_photo,a.license,a.url,
									b.name as nama_club,b.logo as logo_club 
									from tbl_official_team a
									join tbl_club b on a.club_now=b.club_id
									where b.competition ='".$liga."'
									".$sql." order by ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."");
		$totalFiltered=$query->num_rows();
		if($requestData['start']==0){
			$i=1;
		}else{
			$i=$requestData['start']+1;
		}
		$data2 = array();
		foreach ($result_with_limit->result() as $data)
		{
			$nestedData=array(); 
			$nestedData[] = $i;
			$nestedData[] = "<a target='_blank' href='".base_url()."eyeprofile/official_detail/$data->url'><div style='width: 40px;height:40px; overflow:hidden; border-radius:50%;float:left;cursor:pointer;position:relative;'>
						<img src='".imgUrl()."systems/player_storage/".$data->official_photo."' alt='".$data->nama_manager."'>
					</div><div style='float:right;width: 75%;cursor:pointer;'>".$data->nama_manager."</div></a>";
			$nestedData[] = $data->nama_club;
			$nestedData[] = $data->tgl_lahir;
			$nestedData[] = $data->position;
			$nestedData[] = $data->nationality;
			$nestedData[] = $data->license;
			$nestedData[] = $data->contract;
			
			$data2[] = $nestedData;
			$i++;
		}


		$json_data = array(
					"draw"            => intval( $requestData['draw'] ), 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ),
					"data"            => $data2   // total data array
					);

		echo json_encode($json_data); 
	}
	
	public function get_klub_detail($url){
		$query = $this->db->query("select * from tbl_club where url='".$url."'")->result_array();
		return $query;
	}
	
	public function get_klub_detail_row_array($url){
		$query = $this->db->query("select * from tbl_club where url='".$url."'")->row_array();
		return $query;
	}
	
	public function get_official_list($club_id){
		$query = $this->db->query("select * from tbl_official_team where club_now='".$club_id."'")->result_array();
		return $query;
	}
	
	public function get_player_list($club_id){
		$query = $this->db->query("select * from tbl_player where club_id='".$club_id."'")->result_array();
		return $query;
	}
	
	public function get_hasil_klub($club_name)
	{
		$query = $this->db->query("SELECT 
									a.*,c.club_id as club_id_a,
									d.club_id as club_id_b,
									c.logo as logo_a,
									d.logo as logo_b,
									c.name as club_a,
									d.name as club_b,
									c.url as link_klub,
									c.competition
									FROM tbl_jadwal_event a 
									LEFT JOIN tbl_event b ON b.id_event=a.id_event 
									INNER JOIN tbl_club c ON c.club_id=a.tim_a 
									INNER JOIN tbl_club d ON d.club_id=a.tim_b 
									where a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' 
									and c.name like '%".$club_name."%' or d.name like '%".$club_name."%'
									order by 
									a.id_jadwal_event DESC LIMIT 1")->result_array();
		return $query;
	}
	
	public function get_manager($club_id){
		$query = $this->db->query("select * from tbl_official_team where club_now = '".$club_id."' and  position in ('manager','manajer','menejer') limit 1");
		if($query->num_rows()>0){
			$query = $query->row()->name;
		}else{
			$query = null;
		}
		return $query;
	}
	
	public function get_pelatih($club_id){
		$query = $this->db->query("select * from tbl_official_team where club_now = '".$club_id."' and  position in ('Pelatih Kepala','pelatih','PELATIH','Pelatih','pelatih utama','pelatih(coach)','PELATIH/KEPALA','Pelatih / Manager','MANAJER/ PELATIH','Head Coach','COACH','KEPALA PELATIH') limit 1;");
		if($query->num_rows()>0){
			$query = $query->row()->name;
		}else{
			$query = null;
		}
		return $query;
	}
	
	public function get_all_kompetisi()
	{
		$query = $this->db->query("select competition from tbl_competitions where competition not in ('SSB / Akademi Sepakbola')")->result_array();
		return $query;
	}
	
	public function get_all_liga()
	{
		$query = $this->db->query("select nama_liga from tbl_liga")->result_array();
		return $query;
	}
	
	public function get_official_detail($url){
		$query = $this->db->query("select a.*,b.name as club_name,b.url as club_url from tbl_official_team a left join tbl_club b on a.club_now=b.club_id where a.url='".$url."'")->result_array();
		return $query;
	}
	
	public function get_list_karir_klub($requestData,$club_id)
	{
		$columns = array( 
		// datatable column index  => database column name
			0 =>'karir_klub_id', 
			1 => 'bulan',
			2=> 'tahun',
			3=> 'turnamen',
			4=> 'peringkat',
			5=> 'pelatih'
		);
		
		if( !empty($requestData['search']['value']) ) {  
		$sql=" AND ( bulan LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR turnamen LIKE '%".$requestData['search']['value']."%' ";

			$sql.=" OR peringkat LIKE '%".$requestData['search']['value']."%' ";
			$sql.=" OR pelatih LIKE '%".$requestData['search']['value']."%' )";
		}
		else{
			$sql="";
		}
		$query = $this->db->query("select * from tbl_karir_klub where klub_id = ".$club_id." ".$sql."");
		$totalData = count($query->result_array());
		$totalFiltered = $totalData;
		
		$result_with_limit=$this->db->query("select * from tbl_karir_klub where klub_id = ".$club_id." ".$sql." order by ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."");
		$totalFiltered=$query->num_rows();
		if($requestData['start']==0){
			$i=1;
		}else{
			$i=$requestData['start']+1;
		}
		$data2 = array();
		foreach ($result_with_limit->result() as $data)
		{
			$nestedData=array(); 
			$nestedData[] = $i;
			$nestedData[] = $data->bulan;
			$nestedData[] = $data->tahun;
			$nestedData[] = $data->turnamen;
			$nestedData[] = $data->peringkat;
			$nestedData[] = $data->pelatih;
			
			$data2[] = $nestedData;
			$i++;
		}


		$json_data = array(
					"draw"            => intval( $requestData['draw'] ), 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ),
					"data"            => $data2   // total data array
					);

		echo json_encode($json_data); 
	}
	
	public function get_gallery_club($club_id){
		$query = $this->db->query("select * from tbl_gallery where klub_id='".$club_id."'")->result_array();
		return $query;
	}
}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */
/* Please DO NOT modify this information : */