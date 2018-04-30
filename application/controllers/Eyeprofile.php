<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyeprofile extends CI_Controller {

	public function __construct(){
        parent::__construct();
			// direct_m();
		   // $this->load->model('Eyemarket_model');
			date_default_timezone_set('Asia/Jakarta');
			$this->load->model('Master_model','mod');
			$this->load->model('Eyeprofile_model','pmod');
			$this->load->model('Eyeprofile_model');
			$this->load->model('Home_model');
			$this->load->helper(array('form','url','text','date'));
			$this->load->helper('my');
    }
	
	public function index()
	{
		
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepak bola terkeren dan terlengkap dengan data base seluruh stakeholders sepak bola Indonesia";		
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

		$data['kanal'] 				= "home";
		$data["body"]=$this->load->view('eyeprofile/index', $data,true);
		$this->load->view('template/static',$data);
	}	
	
	public function klub($liga=null, $page=1)
	{
		if($liga==null){
			$liga = "Liga%20Indonesia%201";
		}
		$data["meta"]["share"]='
		<!-- Begin of SEO Meta Tags -->
		<title>Database Klub Sepak Bola | EyeProfile - Eyesoccer.ID</title>
		<meta name="title" content="Database Klub Sepak Bola | EyeProfile - Eyesoccer.ID" />
		<meta name="description" content="Lihat profil dan statistik klub sepak bola Indonesia selengkapnya >> />
		<meta name="googlebot-news" content="index,follow" />
		<meta name="googlebot" content="index,follow" />
		<meta name="image" content="" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="EyeSoccer.id" />
		<meta name="language" content="id" />
		<meta name="geo.country" content="id" name="geo.country" />
		<meta http-equiv="content-language" content="In-Id" />
		<meta name="geo.placename"content="Indonesia" />
		<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
		<link rel="canonical" href="https://eyesoccer.id/eyeprofile/klub" />
		<!-- End of SEO Meta Tags-->

		<!-- Begin of Facebook Open graph data-->
		<meta property="fb:app_id" content="140611863350583" />
		<meta property="og:site_name" content="EyeSoccer" />
		<meta property="og:url" content="https://eyesoccer.id/eyeprofile/klub" />
		<meta property="og:type" content="Website" />
		<meta property="og:title" content=" Profil Database klub sepak bola - EyeProfile | EyeSoccer" />
		<meta property="og:image" content="" />
		<meta property="og:description" content="Lihat profil dan detail klub sepak bola indonesia selengkapnya.." />
		<meta property="og:locale" content="id_ID" />
		<!--End of Facebook open graph data-->
		   
		<!--begin of twitter card data-->
		<meta name="twitter:card" content="summary" />    
		<meta name="twitter:site" content="@eyesoccer_id" />
		<meta name="twitter:creator" content="@eyesoccer_id" />
		<meta name="twitter:domain" content="EyeSoccer"/>
		<meta name="twitter:title" content="Database klub sepak bola Indonesia" />
		<meta name="twitter:description" content="Lihat profil dan detail klub sepak bola indonesia selengkapnya.." />
		<meta name="twitter:image" content="" />
		<!--end of twitter card data-->
		';
		$jml_klub = null;
		$nama_liga = urldecode($liga);
		$data["title_liga"] = $nama_liga;
		$nama_liga_event = 'LIGA 1 GOJEK';
		$above_datetime = '2018-12-29 00:00:00';
		$cat_liga = null;
		if($nama_liga == 'Liga Indonesia 1'){
			$jml_klub = 18;	
		}else if($nama_liga == 'Liga Indonesia 2'){
			$jml_klub = 24;
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Liga 2 GOJEK';
		}else if($nama_liga == 'Liga Indonesia 3'){
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Liga Indonesia 3';
		}else if($nama_liga == 'Liga Pelajar U-16 Piala Menpora'){
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Liga Pelajar U-16';
			$cat_liga = $nama_liga;
			$nama_liga = "Liga Usia Muda";
		}else if($nama_liga == 'Liga Santri Nusantara'){
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Liga Santri';
			$cat_liga = $nama_liga;
			$nama_liga = "Liga Usia Muda";
		}else if($nama_liga == 'Liga Indonesia U-19'){
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Liga Indonesia U-19';
			$cat_liga = $nama_liga;
			$nama_liga = "Liga Usia Muda";
		}else if($nama_liga == 'Indonesia Junior League U-9'){
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Indonesia Junior League U-9';
			$cat_liga = $nama_liga;
			$nama_liga = "Liga Usia Muda";
		}else if($nama_liga == 'Indonesia Junior League U-11'){
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Indonesia Junior League U-11';
			$cat_liga = $nama_liga;
			$nama_liga = "Liga Usia Muda"; 
		}
		$data['club_main'] = $this->Eyeprofile_model->get_club_liga($nama_liga,$jml_klub,$cat_liga);
		$data['avg_year'] = $this->Eyeprofile_model->get_club_liga_avggyear($nama_liga,$jml_klub,$cat_liga);
		$data['get_jadwal_hasil'] = $this->Eyeprofile_model->get_jadwal_hasil($nama_liga_event);
		$data['get_jadwal_hasil1'] = $this->Eyeprofile_model->get_jadwal_hasil1($nama_liga_event);
		$data['get_jadwal_hasil2'] = $this->Eyeprofile_model->get_jadwal_hasil2($nama_liga_event);
		$data['transfer_pemain'] = $this->Eyeprofile_model->get_transfer_pemain($nama_liga);
		$data['pencetak_gol'] = $this->Eyeprofile_model->get_pencetak_gol($nama_liga);		
		$data['competition'] = $this->Eyeprofile_model->get_all_kompetisi();
	
		$data['get_all_liga'] = $this->Eyeprofile_model->get_all_liga();		
		$data['get_player_liga'] = $this->Eyeprofile_model->get_player_liga($nama_liga,'indonesia',$cat_liga);		
		$data['get_player_liga_strange'] = $this->Eyeprofile_model->get_player_liga_strange($nama_liga,'indonesia',$cat_liga);		
		
		$data['kanal'] 				= "home";
		$data["body"]=$this->load->view('eyeprofile/klub', $data, true);
		$this->load->view('template/static',$data);		
	}
	public function klub_detail($url = '')
    {
        if ($url == "") {
            redirect("eyeprofile/klub/Liga Indonesia 1");
        }
        $data["meta"]["title"] = "";
        $data["meta"]["image"] = base_url() . "/assets/img/tab_icon.png";
        $data["meta"]["description"] = "Website dan Social Media khusus sepak bola terkeren dan terlengkap dengan data base seluruh stakeholders sepak bola Indonesia";
        $data['get_klub_detail'] = $this->Eyeprofile_model->get_klub_detail($url);
        $data['get_klub_detail_row_array'] = $this->Eyeprofile_model->get_klub_detail_row_array($url);
        // $data['get_official_list'] = $this->Eyeprofile_model->get_official_list($data['get_klub_detail_row_array']['club_id']);
        // $data['get_player_list'] = $this->Eyeprofile_model->get_player_list($data['get_klub_detail_row_array']['club_id']);
		$cidclub=$data['get_klub_detail_row_array']['club_id'];
		$data['get_result_klub'] = $this->Eyeprofile_model->get_result_klub($cidclub);
		if($data['get_result_klub']==NULL){
			$club_id="";
		}else{
			$club_id=$cidclub;
		}
		$data['club_id']=$club_id;
		$data['get_hasil_klub'] = $this->Eyeprofile_model->get_hasil_klub($data['get_klub_detail_row_array']['club_id']);
		if($data['get_hasil_klub']==NULL){
			$club_id_a="";
			$club_id_b="";
		}else{
			$club_id_a=$data['get_hasil_klub'][0]['club_id_a'];
			$club_id_b=$data['get_hasil_klub'][0]['club_id_b'];
		}
		$data['club_id_a']=$club_id_a;
		$data['club_id_b']=$club_id_b;
	
		$data['get_list_mh'] = $this->Eyeprofile_model->get_list_mh($club_id_a);
		$data['get_list_mv'] = $this->Eyeprofile_model->get_list_mv($club_id_b);
		

		// p($data['get_list_mv']);exit();
		// var_dump($data['get_list_mv']);exit();
        // $data['get_manager'] = $this->Eyeprofile_model->get_manager($data['get_klub_detail_row_array']['club_id']);
        // $data['get_pelatih'] = $this->Eyeprofile_model->get_pelatih($data['get_klub_detail_row_array']['club_id']);
        // $data['get_gallery'] = $this->Eyeprofile_model->get_gallery_club($data['get_klub_detail_row_array']['club_id']);
        // $data['products'] = $this->Home_model->get_all_product();
				
		
		$data['kanal'] = "home";
		$data['res'] = $this->pmod->__club_detail($url);
		$r = $data['res']->data;
		$data["meta"]["title"] = "";
        $data["meta"]["image"] = base_url() . "/assets/img/tab_icon.png";
        $data["meta"]["description"] = "Website dan Social Media khusus sepak bola terkeren dan terlengkap dengan data base seluruh stakeholders sepak bola Indonesia";
		$data["meta"]["share"]='
		<!-- Begin of SEO Meta Tags -->
		<title>'.$r->name.' - Profil Database Klub Sepak Bola | EyeProfile - Eyesoccer.ID</title>
		<meta name="title" content=" '.$r->name.' - Profil Database Klub Sepak Bola | EyeProfile - Eyesoccer.ID" />
		<meta name="description" content="('.$r->name.') - Lihat profil dan statistik selengkapnya >> />
		<meta name="googlebot-news" content="index,follow" />
		<meta name="googlebot" content="index,follow" />
		<meta name="image" content="'.$r->url_logo.'" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="EyeSoccer.id" />
		<meta name="language" content="id" />
		<meta name="geo.country" content="id" name="geo.country" />
		<meta http-equiv="content-language" content="In-Id" />
		<meta name="geo.placename"content="Indonesia" />
		<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
		<link rel="canonical" href="https://eyesoccer.id/eyeprofile/klub_detail/'.$r->slug.'" />
		<!-- End of SEO Meta Tags-->

		<!-- Begin of Facebook Open graph data-->
		<meta property="fb:app_id" content="140611863350583" />
		<meta property="og:site_name" content="EyeSoccer" />
		<meta property="og:url" content="https://eyesoccer.id/eyeprofile/klub_detail/'.$r->slug.'" />
		<meta property="og:type" content="Website" />
		<meta property="og:title" content="'.$r->name.' - EyeProfile | EyeSoccer" />
		<meta property="og:image" content="'.$r->url_logo.'" />
		<meta property="og:description" content="('.$r->name.') - Lihat profil dan detail selengkapnya.." />
		<meta property="og:locale" content="id_ID" />
		<!--End of Facebook open graph data-->
		   
		<!--begin of twitter card data-->
		<meta name="twitter:card" content="summary" />    
		<meta name="twitter:site" content="@eyesoccer_id" />
		<meta name="twitter:creator" content="@eyesoccer_id" />
		<meta name="twitter:domain" content="EyeSoccer"/>
		<meta name="twitter:title" content="'.$r->name.'" />
		<meta name="twitter:description" content="('.$r->name.') - Lihat profil dan detail selengkapnya.." />
		<meta name="twitter:image" content="'.$r->url_logo.'" />
		<!--end of twitter card data-->
		';
        #$data['career'] = $this->
        $this->load->view('config-session', $data);
        $data["body"] = $this->load->view('eyeprofile/klub_pemain', $data, true);
        $this->load->view('template/static', $data);
    }
	public function get_career($url){
		$page = $this->input->post('page');
		$limit = $this->input->post('limit');
		$data = ['limit'=> $limit,'page'=> $page];
		$res = $this->pmod->__club_detail($url);
		$html = $this->load->view('eyeprofile/ajax/career',$data,true);
		echo json_encode(['xClass'=> 'rescareer','xHtml'=> $html]);
	}
	public function pemain()
	{
		$data["meta"]["share"]='
		<!-- Begin of SEO Meta Tags -->
		<title>Database Pemain Sepak Bola | EyeProfile - Eyesoccer.ID</title>
		<meta name="title" content="Database Pemain Sepak Bola | EyeProfile - Eyesoccer.ID" />
		<meta name="description" content="Lihat profil dan statistik pemain sepak bola Indonesia selengkapnya >> />
		<meta name="googlebot-news" content="index,follow" />
		<meta name="googlebot" content="index,follow" />
		<meta name="image" content="" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="EyeSoccer.id" />
		<meta name="language" content="id" />
		<meta name="geo.country" content="id" name="geo.country" />
		<meta http-equiv="content-language" content="In-Id" />
		<meta name="geo.placename"content="Indonesia" />
		<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
		<link rel="canonical" href="https://eyesoccer.id/eyeprofile/pemain" />
		<!-- End of SEO Meta Tags-->

		<!-- Begin of Facebook Open graph data-->
		<meta property="fb:app_id" content="140611863350583" />
		<meta property="og:site_name" content="EyeSoccer" />
		<meta property="og:url" content="https://eyesoccer.id/eyeprofile/pemain" />
		<meta property="og:type" content="Website" />
		<meta property="og:title" content=" Profil Database pemain sepak bola - EyeProfile | EyeSoccer" />
		<meta property="og:image" content="" />
		<meta property="og:description" content="Lihat profil dan detail pemain sepak bola indonesia selengkapnya.." />
		<meta property="og:locale" content="id_ID" />
		<!--End of Facebook open graph data-->
		   
		<!--begin of twitter card data-->
		<meta name="twitter:card" content="summary" />    
		<meta name="twitter:site" content="@eyesoccer_id" />
		<meta name="twitter:creator" content="@eyesoccer_id" />
		<meta name="twitter:domain" content="EyeSoccer"/>
		<meta name="twitter:title" content="Database pemain sepak bola Indonesia" />
		<meta name="twitter:description" content="Lihat profil dan detail pemain sepak bola indonesia selengkapnya.." />
		<meta name="twitter:image" content="" />
		<!--end of twitter card data-->
		';
		$data['competition'] = $this->Eyeprofile_model->get_all_kompetisi();
		$data['get_all_liga'] = $this->Eyeprofile_model->get_all_liga();
		$data['kanal'] = "home";
		$data["body"]=$this->load->view('eyeprofile/pemain',$data, true);
		$this->load->view('template/static',$data);		
	}
	public function pemain_detail($id=''){
		if ($id == "") {
            redirect("eyeprofile/pemain");
		}

        $data["pid"] = $id;
        $url = $this->config->item('api_url') . "profile/{$id}";
        $cred = $this->config->item('credential');
        $event_data = array(
            'startdate' => '',
            'enddate' => '',
            'related' => true,
		);
		$obj = $this->excurl->remoteCall($url, $cred, $event_data);
        $response = json_decode($obj);

		$data["meta"]["title"] = "";
        $data["meta"]["image"] = base_url() . "/assets/img/tab_icon.png";
        $data["meta"]["description"] = "Website dan Social Media khusus sepak bola terkeren dan terlengkap dengan data base seluruh stakeholders sepak bola Indonesia";
		$data["meta"]["share"]='
		<!-- Begin of SEO Meta Tags -->
		<title> '.$response->data->name.' - Profil Database Pemain sepak bola | EyeProfile - Eyesoccer.ID</title>
		<meta name="title" content=" '.$response->data->name.' - Profil Database | EyeProfile - Eyesoccer.ID" />
		<meta name="description" content="('.$response->data->name.' - '.$response->data->club.') - Lihat profil dan statistik selengkapnya >> />
		<meta name="googlebot-news" content="index,follow" />
		<meta name="googlebot" content="index,follow" />
		<meta name="image" content="'.$response->data->url_pic.'" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="EyeSoccer.id" />
		<meta name="language" content="id" />
		<meta name="geo.country" content="id" name="geo.country" />
		<meta http-equiv="content-language" content="In-Id" />
		<meta name="geo.placename"content="Indonesia" />
		<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
		<link rel="canonical" href="https://eyesoccer.id/eyeprofile/pemain_detail/'.$response->data->slug.'" />
		<!-- End of SEO Meta Tags-->

		<!-- Begin of Facebook Open graph data-->
		<meta property="fb:app_id" content="140611863350583" />
		<meta property="og:site_name" content="EyeSoccer" />
		<meta property="og:url" content="https://eyesoccer.id/eyeprofile/pemain_detail/'.$response->data->slug.'" />
		<meta property="og:type" content="Website" />
		<meta property="og:title" content="'.$response->data->name.' - EyeProfile | EyeSoccer" />
		<meta property="og:image" content="'.$response->data->url_pic.'" />
		<meta property="og:description" content="Lihat profil dan detail '.$response->data->name.' - '.$response->data->club.' selengkapnya.." />
		<meta property="og:locale" content="id_ID" />
		<!--End of Facebook open graph data-->
		   
		<!--begin of twitter card data-->
		<meta name="twitter:card" content="summary" />    
		<meta name="twitter:site" content="@eyesoccer_id" />
		<meta name="twitter:creator" content="@eyesoccer_id" />
		<meta name="twitter:domain" content="EyeSoccer"/>
		<meta name="twitter:title" content="'.$response->data->name.'" />
		<meta name="twitter:description" content="Lihat profil dan detail '.$response->data->name.' - '.$response->data->club.' selengkapnya.." />
		<meta name="twitter:image" content="'.$response->data->url_pic.'" />
		<!--end of twitter card data-->
		';

		if ($response AND $response->data) {
            $data["kanal"] = 'eyeprofile';
            $data['res'] = $response->data;
            $data['body'] = $this->load->view('eyeprofile/pemain_detail', $data, true);
            $this->load->view('template/static', $data);
        } else {
            redirect('home');
		}
	
	}
	
	public function official()
	{
		$data["meta"]["share"]='
		<!-- Begin of SEO Meta Tags -->
		<title>Database Ofisial Sepak Bola | EyeProfile - Eyesoccer.ID</title>
		<meta name="title" content="Database Ofisial Sepak Bola | EyeProfile - Eyesoccer.ID" />
		<meta name="description" content="Lihat profil dan statistik ofisial sepak bola Indonesia selengkapnya >> />
		<meta name="googlebot-news" content="index,follow" />
		<meta name="googlebot" content="index,follow" />
		<meta name="image" content="" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="EyeSoccer.id" />
		<meta name="language" content="id" />
		<meta name="geo.country" content="id" name="geo.country" />
		<meta http-equiv="content-language" content="In-Id" />
		<meta name="geo.placename"content="Indonesia" />
		<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
		<link rel="canonical" href="https://eyesoccer.id/eyeprofile/official" />
		<!-- End of SEO Meta Tags-->

		<!-- Begin of Facebook Open graph data-->
		<meta property="fb:app_id" content="140611863350583" />
		<meta property="og:site_name" content="EyeSoccer" />
		<meta property="og:url" content="https://eyesoccer.id/eyeprofile/official" />
		<meta property="og:type" content="Website" />
		<meta property="og:title" content=" Profil Database Ofisial sepak bola - EyeProfile | EyeSoccer" />
		<meta property="og:image" content="" />
		<meta property="og:description" content="Lihat profil dan detail ofisial sepak bola indonesia selengkapnya.." />
		<meta property="og:locale" content="id_ID" />
		<!--End of Facebook open graph data-->
		   
		<!--begin of twitter card data-->
		<meta name="twitter:card" content="summary" />    
		<meta name="twitter:site" content="@eyesoccer_id" />
		<meta name="twitter:creator" content="@eyesoccer_id" />
		<meta name="twitter:domain" content="EyeSoccer"/>
		<meta name="twitter:title" content="Database Ofisial sepak bola Indonesia" />
		<meta name="twitter:description" content="Lihat profil dan detail ofisial sepak bola indonesia selengkapnya.." />
		<meta name="twitter:image" content="" />
		<!--end of twitter card data-->
		';
		
		$data['get_all_kompetisi'] = $this->Eyeprofile_model->get_all_kompetisi();		
		$data['kanal'] = "home";
		$data["body"]=$this->load->view('eyeprofile/official', $data, true);
		$this->load->view('template/static',$data);		
	}	

	public function official_detail($slug=null){
		if($slug=="")
		{
			redirect("eyeprofile/official");
		}			
		$data["page"]="eyeprofile";
		$data['res'] = $this->pmod->__official_detail($slug);
		$res = json_decode($data['res']);
        $r = $res->data;
		$data["meta"]["title"] = "";
        $data["meta"]["image"] = base_url() . "/assets/img/tab_icon.png";
        $data["meta"]["description"] = "Website dan Social Media khusus sepak bola terkeren dan terlengkap dengan data base seluruh stakeholders sepak bola Indonesia";
		$data["meta"]["share"]='
		<!-- Begin of SEO Meta Tags -->
		<title>'.$r->name.' - Profil Database Ofisial Sepak Bola | EyeProfile - Eyesoccer.ID</title>
		<meta name="title" content=" '.$r->name.' - Profil Database ofisial Sepak Bola | EyeProfile - Eyesoccer.ID" />
		<meta name="description" content="Lihat profil dan statistik '.$r->name.' selengkapnya >> />
		<meta name="googlebot-news" content="index,follow" />
		<meta name="googlebot" content="index,follow" />
		<meta name="image" content="'.$r->url_pic.'" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="EyeSoccer.id" />
		<meta name="language" content="id" />
		<meta name="geo.country" content="id" name="geo.country" />
		<meta http-equiv="content-language" content="In-Id" />
		<meta name="geo.placename"content="Indonesia" />
		<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
		<link rel="canonical" href="https://eyesoccer.id/eyeprofile/official/'.$r->slug.'" />
		<!-- End of SEO Meta Tags-->

		<!-- Begin of Facebook Open graph data-->
		<meta property="fb:app_id" content="140611863350583" />
		<meta property="og:site_name" content="EyeSoccer" />
		<meta property="og:url" content="https://eyesoccer.id/eyeprofile/official/'.$r->slug.'" />
		<meta property="og:type" content="Website" />
		<meta property="og:title" content="'.$r->name.' - EyeProfile | EyeSoccer" />
		<meta property="og:image" content="'.$r->url_pic.'" />
		<meta property="og:description" content="Lihat profil dan detail '.$r->name.' selengkapnya.." />
		<meta property="og:locale" content="id_ID" />
		<!--End of Facebook open graph data-->
		   
		<!--begin of twitter card data-->
		<meta name="twitter:card" content="summary" />    
		<meta name="twitter:site" content="@eyesoccer_id" />
		<meta name="twitter:creator" content="@eyesoccer_id" />
		<meta name="twitter:domain" content="EyeSoccer"/>
		<meta name="twitter:title" content="'.$r->name.'" />
		<meta name="twitter:description" content="('.$r->name.') - Lihat profil dan detail selengkapnya.." />
		<meta name="twitter:image" content="'.$r->url_pic.'" />
		<!--end of twitter card data-->
		';
		$data['kanal'] = "home";
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyeprofile/official_detail', $data, true);
		$this->load->view('template/static',$data);
	}
	
	public function supporter($liga=null)
	{
		$data["meta"]["share"]='
		<!-- Begin of SEO Meta Tags -->
		<title>Database Suporter Klub Sepak Bola | EyeProfile - Eyesoccer.ID</title>
		<meta name="title" content="Database Suporter Sepak Bola | EyeProfile - Eyesoccer.ID" />
		<meta name="description" content="Lihat profil dan statistik ofisial sepak bola Indonesia selengkapnya >> />
		<meta name="googlebot-news" content="index,follow" />
		<meta name="googlebot" content="index,follow" />
		<meta name="image" content="" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="EyeSoccer.id" />
		<meta name="language" content="id" />
		<meta name="geo.country" content="id" name="geo.country" />
		<meta http-equiv="content-language" content="In-Id" />
		<meta name="geo.placename"content="Indonesia" />
		<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
		<link rel="canonical" href="https://eyesoccer.id/eyeprofile/supporter" />
		<!-- End of SEO Meta Tags-->

		<!-- Begin of Facebook Open graph data-->
		<meta property="fb:app_id" content="140611863350583" />
		<meta property="og:site_name" content="EyeSoccer" />
		<meta property="og:url" content="https://eyesoccer.id/eyeprofile/official" />
		<meta property="og:type" content="Website" />
		<meta property="og:title" content=" Profil Database Suporter sepak bola - EyeProfile | EyeSoccer" />
		<meta property="og:image" content="" />
		<meta property="og:description" content="Lihat profil dan detail Suporter sepak bola indonesia selengkapnya.." />
		<meta property="og:locale" content="id_ID" />
		<!--End of Facebook open graph data-->
		   
		<!--begin of twitter card data-->
		<meta name="twitter:card" content="summary" />    
		<meta name="twitter:site" content="@eyesoccer_id" />
		<meta name="twitter:creator" content="@eyesoccer_id" />
		<meta name="twitter:domain" content="EyeSoccer"/>
		<meta name="twitter:title" content="Database Suporter sepak bola Indonesia" />
		<meta name="twitter:description" content="Lihat profil dan detail Supporter sepak bola indonesia selengkapnya.." />
		<meta name="twitter:image" content="" />
		<!--end of twitter card data-->
		';
		
		if($liga==null){
			$liga = "Liga%20Indonesia%201";
		}
		if(urldecode($liga) == 'Liga Indonesia 1'){
			$nama_liga = 'Liga Indonesia 1';
			$jml_klub = 18;	
			$data["title_liga"] = $nama_liga;
		}else if(urldecode($liga) == 'Liga Indonesia 2'){
			$nama_liga = 'Liga Indonesia 2';
			$jml_klub = 24;
			$data["title_liga"] = $nama_liga;
		}else{
			$nama_liga = 'Liga Indonesia 3';
			$jml_klub = 32;
			$data["title_liga"] = $nama_liga;
		}
		
		// $data['kompetisi_pro'] = $this->Eyeprofile_model->get_kompetisi_pro();
		$data['get_all_kompetisi'] = $this->Eyeprofile_model->get_all_kompetisi();
		$data['pemain_klub'] = $this->Eyeprofile_model->get_pemain_klub();

		$data['club_main'] = $this->Eyeprofile_model->get_club_liga($nama_liga,$jml_klub);
		$data['get_player_liga'] = $this->Eyeprofile_model->get_player_liga($nama_liga,'indonesia');
		$data['get_player_liga_strange'] = $this->Eyeprofile_model->get_player_liga_strange($nama_liga);		
		$data['kanal'] = "home";
		$data["body"]=$this->load->view('eyeprofile/supporter', $data, true);
		$this->load->view('template/static',$data);		
	}	
	
	public function referee($liga=null)
	{
		$data["meta"]["share"]='
		<!-- Begin of SEO Meta Tags -->
		<title>Database perangkat pertandingan Klub Sepak Bola | EyeProfile - Eyesoccer.ID</title>
		<meta name="title" content="Database perangkat pertandingan Sepak Bola | EyeProfile - Eyesoccer.ID" />
		<meta name="description" content="Lihat profil dan statistik perangkat pertandingan sepak bola Indonesia selengkapnya >> />
		<meta name="googlebot-news" content="index,follow" />
		<meta name="googlebot" content="index,follow" />
		<meta name="image" content="" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="EyeSoccer.id" />
		<meta name="language" content="id" />
		<meta name="geo.country" content="id" name="geo.country" />
		<meta http-equiv="content-language" content="In-Id" />
		<meta name="geo.placename"content="Indonesia" />
		<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
		<link rel="canonical" href="https://eyesoccer.id/eyeprofile/referee" />
		<!-- End of SEO Meta Tags-->

		<!-- Begin of Facebook Open graph data-->
		<meta property="fb:app_id" content="140611863350583" />
		<meta property="og:site_name" content="EyeSoccer" />
		<meta property="og:url" content="https://eyesoccer.id/eyeprofile/referee" />
		<meta property="og:type" content="Website" />
		<meta property="og:title" content=" Profil Database perangkat pertandingan sepak bola - EyeProfile | EyeSoccer" />
		<meta property="og:image" content="" />
		<meta property="og:description" content="Lihat profil dan detail perangkat pertandingan sepak bola indonesia selengkapnya.." />
		<meta property="og:locale" content="id_ID" />
		<!--End of Facebook open graph data-->
		   
		<!--begin of twitter card data-->
		<meta name="twitter:card" content="summary" />    
		<meta name="twitter:site" content="@eyesoccer_id" />
		<meta name="twitter:creator" content="@eyesoccer_id" />
		<meta name="twitter:domain" content="EyeSoccer"/>
		<meta name="twitter:title" content="Database perangkat pertandingan sepak bola Indonesia" />
		<meta name="twitter:description" content="Lihat profil dan detail perangkat pertandingan sepak bola indonesia selengkapnya.." />
		<meta name="twitter:image" content="" />
		<!--end of twitter card data-->
		';
		if($liga==null){
			$liga = "Liga%20Indonesia%201";
		}
		if(urldecode($liga) == 'Liga Indonesia 1'){
			$nama_liga = 'Liga Indonesia 1';
			$jml_klub = 18;	
			$data["title_liga"] = $nama_liga;
		}else if(urldecode($liga) == 'Liga Indonesia 2'){
			$nama_liga = 'Liga Indonesia 2';
			$jml_klub = 24;
			$data["title_liga"] = $nama_liga;
		}else{
			$nama_liga = 'Liga Indonesia 3';
			$jml_klub = 32;
			$data["title_liga"] = $nama_liga;
		}
		
		$data['kompetisi_pro'] = $this->Eyeprofile_model->get_kompetisi_pro();
		$data['pemain_klub'] = $this->Eyeprofile_model->get_pemain_klub();

		$data['club_main'] = $this->Eyeprofile_model->get_club_liga($nama_liga,$jml_klub);
		$data['get_player_liga'] = $this->Eyeprofile_model->get_player_liga($nama_liga,'indonesia');
		$data['get_player_liga_strange'] = $this->Eyeprofile_model->get_player_liga_strange($nama_liga);		
		$data['kanal'] = "home";
		$data["body"]=$this->load->view('eyeprofile/referee', $data, true);
		$this->load->view('template/static',$data);		
	}
	
	public function get_list_pemain($liga){

		$requestData= $_POST;
		$res = $this->Eyeprofile_model->get_list_pemain($requestData,urldecode($liga));
		return $res;
	}

	
	public function get_list_official($liga){
		$requestData= $_REQUEST;
		$res = $this->Eyeprofile_model->get_list_official($requestData,urldecode($liga));
		return $res;
	}
	public function get_list_karir_klub($klub_id){
		$requestData= $_REQUEST;
		$res = $this->Eyeprofile_model->get_list_karir_klub($requestData,urldecode($klub_id));
		return $res;
	}
	public function getClub($url,$limit=null){
		$competition = urldecode($url); 
		$val = $this->input->post('val');
		$query = array('page' => $val,'limit' => 12,'competition'=> $competition);
		$res   = $this->pmod->clublist($query);
		$res   = json_decode($res)->data;
		
		echo "<div class='ep2box fl-l pd-t-20'>";		
				foreach($res as $r){
				$url = preg_match("/[^\/]+$/", $r->url_logo, $matches);
				echo '<a href="'.CLUBDETAIL.$r->slug.'" style="text-decoration:unset;color:#424242;">'.'<div class="box-content ep2 fl-l">';
						echo '<img src="'.(count($matches) == 0 ? imgCache('LOGO UNTUK APLIKASI.jpg') : $r->url_logo).'" alt="" >';
						echo '<div class="detail">';
							echo '<h2>'.$r->name.'</h2>';
							echo '<h3>'.$r->competition.'</h3>';
							echo "<table>
								<tr>
									<td>Squad</td>";
									echo "<td>: ".$r->number_of_player."</td>";
								echo "</tr>
								<tr>";
									echo "<td>Manager</td>";
									echo "<td>: ".getManager($r->club_id)."</td>";
								echo "</tr>
							</table>
						</div>
					</div>
				</a>";
				}
        echo "</div>";
	}
	public  function doit(){
		if($_POST){
			$fn   = $_POST['fn'];     
			$data = [];
			if(function_exists($fn))
			{
			    $fn();
			} else {
			    $fn = "__".$fn;
			    $this->pmod->$fn();
			}
		}

	}
	
	
}
