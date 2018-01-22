<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyevent extends CI_Controller {

	public function __construct(){
        parent::__construct();
		    $this->load->model('Eyevent_model');
			date_default_timezone_set('Asia/Jakarta');
			$this->load->helper('my');			
    }
	public function index()
	{	
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		$data["meta"]["share"]='
			<!-- Begin of SEO Meta Tags -->
			<title>EyeVent: Temukan Acara Hebat Seputar Sepak Bola Di Sekitarmu | EyeSoccer</title>
			<meta name="title" content="EyeVent: Temukan Acara Hebat Seputar Sepak Bola Di Sekitarmu | EyeSoccer" />
			<meta name="description" content="Info update acara-acara seputar sepak bola: turnamen sepak bola, acara nonton bareng pertandingan sepak bola, acara komunitas supporter, dan acara lainnya." />
			<meta name="googlebot-news" content="index,follow" />
			<meta name="googlebot" content="index,follow" />
			<meta name="robots" content="index,follow" />
			<meta name="author" content="EyeSoccer.id" />
			<meta name="language" content="id" />
			<meta name="geo.country" content="id" name="geo.country" />
			<meta http-equiv="content-language" content="In-Id" />
			<meta name="geo.placename"content="Indonesia" />
			<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
			<link rel="canonical" href="https://www.eyesoccer.id/eyevent" />
			<!-- End of SEO Meta Tags-->

			<!-- Begin of Facebook Open graph data-->
			<meta property="fb:app_id" content="140611863350583" />
			<meta property="og:site_name" content="EyeSoccer" />
			<meta property="og:url" content="https://www.eyesoccer.id/eyevent" />
			<meta property="og:type" content="Website" />
			<meta property="og:title" content="EyeVent: Temukan Acara Hebat Seputar Sepak Bola Di Sekitarmu | EyeSoccer" />
			<meta property="og:description" content="Info update acara-acara seputar sepak bola: turnamen sepak bola, acara nonton bareng pertandingan sepak bola, acara komunitas supporter, dan acara lainnya." />
			<meta property="og:locale" content="id_ID" />
			<meta property="og:image" content="'.base_url().'img/eyevent_nav.png" />
			<!--End of Facebook open graph data-->
			   
			<!--begin of twitter card data-->
			<meta name="twitter:card" content="summary" />    
			<meta name="twitter:site" content="@eyesoccer_id" />
			<meta name="twitter:creator" content="@eyesoccer_id" />
			<meta name="twitter:domain" content="EyeSoccer"/>
			<meta name="twitter:title" content="EyeVent: Temukan Acara Hebat Seputar Sepak Bola Di Sekitarmu | EyeSoccer" />
			<meta name="twitter:description" content="Info update acara-acara seputar sepak bola: turnamen sepak bola, acara nonton bareng pertandingan sepak bola, acara komunitas supporter, dan acara lainnya." />
			<meta name="twitter:image" content="'.base_url().'img/eyevent_nav.png" />
			<!--end of twitter card data-->

		';
		
		$cmd_ads 	= $this->db->query("select * from tbl_ads")->result_array();
		$i = 0;
		foreach($cmd_ads as $ads){
			$e = 0;
			foreach($ads as $key => $val)
			{
				$array[$i][$e] =  $val;
				$e++;
			}		
			$i++;
		}
		$data["array"] 	= $array;
		$data["page"] 	= "home";
		$data["popup"] 	= $array[14][3];

		$tanggal = get_date("-2");

		$data["kemarin_lusa"] 		= get_date("-2");
		$data["kemarin"] 			= get_date("-1");
		$data["hari_ini"] 			= get_date("+0");
		$data["besok"] 				= get_date("+1");
		$data["besok_lusa"] 		= get_date("+2");
		$data["tiga_hari_besok"] 	= get_date("+3");


		$data['eyevent_main']		= $this->Eyevent_model->get_eyevent_main();
		$data['eyevent_main_2']		= $this->Eyevent_model->get_eyevent_main_2();

		$data['jadwal_yesterday'] 		= $this->Eyevent_model->get_all_jadwal($data["kemarin"]["tanggalnya"]);
		$data['jadwal_today'] 			= $this->Eyevent_model->get_all_jadwal($data["hari_ini"]["tanggalnya"]);
		$data['jadwal_tomorrow'] 		= $this->Eyevent_model->get_all_jadwal($data["besok"]["tanggalnya"]);
		$data['jadwal_next_tomorrow'] 	= $this->Eyevent_model->get_all_jadwal($data["besok_lusa"]["tanggalnya"]);
		
		$data['hasil_today'] 		= $this->Eyevent_model->get_hasil_today();
		$data['hasil_today2'] 		= $this->Eyevent_model->get_hasil_today2();
		$data['eyenews_main'] 		= $this->Eyevent_model->get_eyenews_main();
		//$news_type 				= $data['eyenews_main']->news_type;
		$data['video_eyetube']		= $this->Eyevent_model->get_eyetube_satu();		

		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		
		$data['kanal'] 	=  "eyevent";
		$data["body"]=$this->load->view('eyevent/index', $data, true);
		$this->load->view('template/static',$data);
	}
	
	public function detail($eyevent_id=null,$action=null)
	{
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		
		$cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
		$i=0;
		foreach($cmd_ads as $ads){
		$e=0;
		foreach($ads as $key => $val)
		{
		$array[$i][$e] =  $val;
		$e++;
		}		
		$i++;
		}
		$data["array"]=$array;
		$data["eyevent_id"]=$eyevent_id;
		$data["action"]=$action;
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		$data["body"]=$this->load->view('eyevent/detail', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	
	public function search($search='',$pg=null)
	{
		
		$search=str_replace("%20"," ",$search);
		
		if(isset($_POST["search"]))
		{
			$search=$_POST["search"];
		}
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		
		$cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
		$i=0;
		foreach($cmd_ads as $ads){
		$e=0;
		foreach($ads as $key => $val)
		{
		$array[$i][$e] =  $val;
		$e++;
		}		
		$i++;
		}
		$data["array"]=$array;
		$data["search"]=$search;
		$data["pg"]=$pg;
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyevent/list', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function eventlainnya()
	{	
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		
		$cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
		$i=0;
		foreach($cmd_ads as $ads){
		$e=0;
		foreach($ads as $key => $val)
		{
		$array[$i][$e] =  $val;
		$e++;
		}		
		$i++;
		}
		$data["array"]=$array;
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$data["body"]=$this->load->view('eyevent/eventlainnya', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}

	public function get_jadwal($tanggal)
	{
		$jadwalnya 		= $this->Eyevent_model->get_all_jadwal($tanggal);
		$txt = '';
		foreach ($jadwalnya as $value)
		{

			$txt.= "	<tr>
	                        <td>".$value['club_a']."
	                            <img src='".imgUrl()."systems/club_logo/".$value['logo_a']."' alt=''>
	                        </td> \
	                        <td>".date("H:i",strtotime($value["jadwal_pertandingan"]))."
	                            <span></span>
	                        </td>
	                        <td>
	                            <img src='".imgUrl()."systems/club_logo/".$value["logo_b"]."' alt=''>
	                            ".$value["club_b"]."
	                        </td>
	                    </tr>	";

		}

		echo json_encode(array(	'status' 	=> '1',
								'txt' 		=> $txt,
							));
	}
	
}
