<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyeprofile extends CI_Controller {

	public function __construct(){
        parent::__construct();
		   // $this->load->model('Eyemarket_model');
			date_default_timezone_set('Asia/Jakarta');
			$this->load->model('Eyeprofile_model');
			$this->load->helper(array('form','url','text','date'));
    }
	
	public function index()
	{
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"]="eyeprofile";		
		
		$data['club_header'] = $this->Eyeprofile_model->get_club_header();
		$data['club_main'] = $this->Eyeprofile_model->get_club_main();
		$data['profile_club'] = $this->Eyeprofile_model->get_profile_club();
		$data['jumlah_klub'] = $this->Eyeprofile_model->get_jumlah_klub();
		$data['jumlah_pemain'] = $this->Eyeprofile_model->get_jumlah_pemain();
		$data['pemain_asing'] = $this->Eyeprofile_model->get_pemain_asing();
		$data['klasemen'] = $this->Eyeprofile_model->get_klasemen();
		$data['transfer_pemain'] = $this->Eyeprofile_model->get_transfer_pemain();
		$data['pencetak_gol'] = $this->Eyeprofile_model->get_pencetak_gol();
		$data['kompetisi'] = $this->Eyeprofile_model->get_kompetisi();

		
		$data["body"]=$this->load->view('eyeprofile/index', $data,true);
		$this->load->view('template-baru',$data);		
		//$this->load->view('eyeprofile/index');
	}	
	
	public function klub()
	{
		//$this->load->view('eyeprofile/klub');
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"]="eyeprofile";		
		
		$data['club_header'] = $this->Eyeprofile_model->get_club_header();
		$data['club_main'] = $this->Eyeprofile_model->get_club_main();
		$data['profile_club'] = $this->Eyeprofile_model->get_profile_club();
		$data['jumlah_klub'] = $this->Eyeprofile_model->get_jumlah_klub();
		$data['jumlah_pemain'] = $this->Eyeprofile_model->get_jumlah_pemain();
		$data['pemain_asing'] = $this->Eyeprofile_model->get_pemain_asing();
		$data['klasemen'] = $this->Eyeprofile_model->get_klasemen();
		$data['transfer_pemain'] = $this->Eyeprofile_model->get_transfer_pemain();
		$data['pencetak_gol'] = $this->Eyeprofile_model->get_pencetak_gol();
		$data['kompetisi'] = $this->Eyeprofile_model->get_kompetisi();		
		
		$data["body"]=$this->load->view('eyeprofile/klub', $data, true);
		$this->load->view('template-baru',$data);		
	}

	public function klub_pemain()
	{
		//$this->load->view('eyeprofile/klub_pemain');
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"]="eyeprofile";		
		
		$data['club_header'] = $this->Eyeprofile_model->get_club_header();
		$data['club_main'] = $this->Eyeprofile_model->get_club_main();
		$data['profile_club'] = $this->Eyeprofile_model->get_profile_club();
		$data['jumlah_klub'] = $this->Eyeprofile_model->get_jumlah_klub();
		$data['jumlah_pemain'] = $this->Eyeprofile_model->get_jumlah_pemain();
		$data['pemain_asing'] = $this->Eyeprofile_model->get_pemain_asing();
		$data['klasemen'] = $this->Eyeprofile_model->get_klasemen();
		$data['transfer_pemain'] = $this->Eyeprofile_model->get_transfer_pemain();
		$data['pencetak_gol'] = $this->Eyeprofile_model->get_pencetak_gol();
		$data['kompetisi'] = $this->Eyeprofile_model->get_kompetisi();
		
		$data['klub_pemain'] = $this->Eyeprofile_model->get_klub_pemain();
		$data['pemain_klub'] = $this->Eyeprofile_model->get_pemain_klub();
		$data['jadwal_pertandingan'] = $this->Eyeprofile_model->get_jadwal_pertandingan();
		$data['eyemarket_main'] = $this->Eyeprofile_model->get_eyemarket_main();		
		
		$data["body"]=$this->load->view('eyeprofile/klub_pemain', $data, true);
		$this->load->view('template-baru',$data);		
	}	
	
	public function klub_offisial()
	{
		//$this->load->view('eyeprofile/klub_offisial');
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"]="eyeprofile";		

		$data['club_header'] = $this->Eyeprofile_model->get_club_header();
		$data['club_main'] = $this->Eyeprofile_model->get_club_main();
		$data['profile_club'] = $this->Eyeprofile_model->get_profile_club();
		$data['jumlah_klub'] = $this->Eyeprofile_model->get_jumlah_klub();
		$data['jumlah_pemain'] = $this->Eyeprofile_model->get_jumlah_pemain();
		$data['pemain_asing'] = $this->Eyeprofile_model->get_pemain_asing();
		$data['klasemen'] = $this->Eyeprofile_model->get_klasemen();
		$data['transfer_pemain'] = $this->Eyeprofile_model->get_transfer_pemain();
		$data['pencetak_gol'] = $this->Eyeprofile_model->get_pencetak_gol();
		$data['kompetisi'] = $this->Eyeprofile_model->get_kompetisi();
		$data['klub_official'] = $this->Eyeprofile_model->get_klub_official();
		$data['official_klub'] = $this->Eyeprofile_model->get_official_klub();
		
		$data["body"]=$this->load->view('eyeprofile/klub_offisial', $data, true);
		$this->load->view('template-baru',$data);		
	}	
	
	public function klub_detail($id=''){
		if($id=="")
		{
			redirect("eyeprofile/klub");
			
		}
		$query=($this->db->query("SELECT * FROM tbl_club WHERE url='".$id."' LIMIT 1"));
		$dataquery = $query->row_array();
		
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";

		$data["page"]="eyeprofile";
		$data["cid"]=$dataquery['club_id'];
		$data["url"]=$dataquery['url'];
		
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyeprofile/klub_detail', $data, true);
		$this->load->view('template-baru',$data);
	}	
	
	public function pemain()
	{
		//$this->load->view('eyeprofile/pemain');
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"]="eyeprofile";		
		
		$data['club_header'] = $this->Eyeprofile_model->get_club_header();
		$data['club_main'] = $this->Eyeprofile_model->get_club_main();
		$data['profile_club'] = $this->Eyeprofile_model->get_profile_club();
		$data['jumlah_klub'] = $this->Eyeprofile_model->get_jumlah_klub();
		$data['jumlah_pemain'] = $this->Eyeprofile_model->get_jumlah_pemain();
		$data['pemain_asing'] = $this->Eyeprofile_model->get_pemain_asing();
		$data['klasemen'] = $this->Eyeprofile_model->get_klasemen();
		$data['transfer_pemain'] = $this->Eyeprofile_model->get_transfer_pemain();
		$data['pencetak_gol'] = $this->Eyeprofile_model->get_pencetak_gol();
		$data['kompetisi'] = $this->Eyeprofile_model->get_kompetisi();
		$data['klub_official'] = $this->Eyeprofile_model->get_klub_official();
		$data['official_klub'] = $this->Eyeprofile_model->get_official_klub();
		$data['pemain_klub'] = $this->Eyeprofile_model->get_pemain_klub();		
		
		$data["body"]=$this->load->view('eyeprofile/pemain', $data, true);
		$this->load->view('template-baru',$data);		
	}
	
	public function pemain_detail($id=''){
		if($id=="")
		{
			redirect("eyeprofile/pemain");			
		}
		//$pemain=$this->db->query("SELECT a.*,b.name as club_name,b.competition,b.logo FROM tbl_player a INNER JOIN tbl_club b ON b.club_id=a.club_id WHERE a.url='".$id."' LIMIT 1")->row_array();
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		
		$data["page"]="eyeprofile";
		$data["pid"]=$id;

		$data['club_header'] = $this->Eyeprofile_model->get_club_header();
		$data['club_main'] = $this->Eyeprofile_model->get_club_main();
		$data['profile_club'] = $this->Eyeprofile_model->get_profile_club();
		$data['jumlah_klub'] = $this->Eyeprofile_model->get_jumlah_klub();
		$data['jumlah_pemain'] = $this->Eyeprofile_model->get_jumlah_pemain();
		$data['pemain_asing'] = $this->Eyeprofile_model->get_pemain_asing();
		$data['klasemen'] = $this->Eyeprofile_model->get_klasemen();
		$data['transfer_pemain'] = $this->Eyeprofile_model->get_transfer_pemain();
		$data['pencetak_gol'] = $this->Eyeprofile_model->get_pencetak_gol();
		$data['kompetisi'] = $this->Eyeprofile_model->get_kompetisi();				
		
		
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyeprofile/pemain_detail', $data, true);
		$this->load->view('template-baru',$data);		
	}

	public function official()
	{
		//$this->load->view('eyeprofile/official');
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"]="eyeprofile";		
		
		$data['official_main'] = $this->Eyeprofile_model->get_official_main();
		$data['club_header'] = $this->Eyeprofile_model->get_club_header();
		$data['club_main'] = $this->Eyeprofile_model->get_club_main();
		$data['profile_club'] = $this->Eyeprofile_model->get_profile_club();
		$data['jumlah_klub'] = $this->Eyeprofile_model->get_jumlah_klub();
		$data['jumlah_pemain'] = $this->Eyeprofile_model->get_jumlah_pemain();
		$data['pemain_asing'] = $this->Eyeprofile_model->get_pemain_asing();
		$data['klasemen'] = $this->Eyeprofile_model->get_klasemen();
		$data['transfer_pemain'] = $this->Eyeprofile_model->get_transfer_pemain();
		$data['pencetak_gol'] = $this->Eyeprofile_model->get_pencetak_gol();
		$data['kompetisi'] = $this->Eyeprofile_model->get_kompetisi();
		
		$data["body"]=$this->load->view('eyeprofile/official', $data, true);
		$this->load->view('template-baru',$data);		
	}	

	public function official_detail($id=null,$action=null){
		if($id=="")
		{
			redirect("eyeprofile/official_detail");
			
		}			
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";

		$data["page"]="eyeprofile";
		$data["id"]=$id;
		$data["action"]=$action;
		
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyeprofile/official_detail', $data, true);
		$this->load->view('template-baru',$data);
	}
	
	public function supporter()
	{
		//$this->load->view('eyeprofile/supporter');
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"]="eyeprofile";		
		
		$data['club_header'] = $this->Eyeprofile_model->get_club_header();
		$data['club_main'] = $this->Eyeprofile_model->get_club_main();
		$data['profile_club'] = $this->Eyeprofile_model->get_profile_club();
		$data['jumlah_klub'] = $this->Eyeprofile_model->get_jumlah_klub();
		$data['jumlah_pemain'] = $this->Eyeprofile_model->get_jumlah_pemain();
		$data['pemain_asing'] = $this->Eyeprofile_model->get_pemain_asing();
		$data['klasemen'] = $this->Eyeprofile_model->get_klasemen();
		$data['transfer_pemain'] = $this->Eyeprofile_model->get_transfer_pemain();
		$data['pencetak_gol'] = $this->Eyeprofile_model->get_pencetak_gol();
		$data['kompetisi'] = $this->Eyeprofile_model->get_kompetisi();
		
		$data['klub_pemain'] = $this->Eyeprofile_model->get_klub_pemain();
		$data['pemain_klub'] = $this->Eyeprofile_model->get_pemain_klub();
		$data['jadwal_pertandingan'] = $this->Eyeprofile_model->get_jadwal_pertandingan();
		$data['eyemarket_main'] = $this->Eyeprofile_model->get_eyemarket_main();
		$data['supporter'] = $this->Eyeprofile_model->get_klub_supporter();
		
		$data["body"]=$this->load->view('eyeprofile/supporter', $data, true);
		$this->load->view('template-baru',$data);		
	}	
	
	public function referee()
	{
		//.$this->load->view('eyeprofile/referee');
		
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"]="eyeprofile";		
		
		$data['official_main'] = $this->Eyeprofile_model->get_official_main();		
		$data['club_header'] = $this->Eyeprofile_model->get_club_header();
		$data['club_main'] = $this->Eyeprofile_model->get_club_main();
		$data['profile_club'] = $this->Eyeprofile_model->get_profile_club();
		$data['jumlah_klub'] = $this->Eyeprofile_model->get_jumlah_klub();
		$data['jumlah_pemain'] = $this->Eyeprofile_model->get_jumlah_pemain();
		$data['pemain_asing'] = $this->Eyeprofile_model->get_pemain_asing();
		$data['klasemen'] = $this->Eyeprofile_model->get_klasemen();
		$data['transfer_pemain'] = $this->Eyeprofile_model->get_transfer_pemain();
		$data['pencetak_gol'] = $this->Eyeprofile_model->get_pencetak_gol();
		$data['kompetisi'] = $this->Eyeprofile_model->get_kompetisi();
		
		$data['klub_pemain'] = $this->Eyeprofile_model->get_klub_pemain();
		$data['pemain_klub'] = $this->Eyeprofile_model->get_pemain_klub();
		$data['jadwal_pertandingan'] = $this->Eyeprofile_model->get_jadwal_pertandingan();
		$data['eyemarket_main'] = $this->Eyeprofile_model->get_eyemarket_main();
		$data['supporter'] = $this->Eyeprofile_model->get_klub_supporter();		
		
		$data["body"]=$this->load->view('eyeprofile/referee', $data, true);
		$this->load->view('template-baru',$data);		
	}
}
