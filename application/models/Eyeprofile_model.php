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
									GROUP BY a.club_id ASC LIMIT 8")->result_array();
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
									d.name as club_b 
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
	public function get_transfer_pemain()
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
										a.status like '%pro%'
										AND
										a.birth_date like '%/%'
									ORDER BY a.name ASC
									LIMIT 4")->result_array();
		return $query;
	}
	
	public function get_pencetak_gol()
	{
		$query = $this->db->query("select player_id, name, position from tbl_player order by player_id ASC Limit 4")->result_array();
		return $query;
	}
	public function get_kompetisi()
	{
		$query = $this->db->query("select * from tbl_competitions")->result_array();
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
	
}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */
/* Please DO NOT modify this information : */