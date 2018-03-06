<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyevent extends CI_Controller {

	public function __construct(){
        parent::__construct();
			// direct_m();
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
		
		// $cmd_ads 	= $this->db->query("select * from tbl_ads")->result_array();
		// $i = 0;
		// foreach($cmd_ads as $ads){
		// 	$e = 0;
		// 	foreach($ads as $key => $val)
		// 	{
		// 		$array[$i][$e] =  $val;
		// 		$e++;
		// 	}		
		// 	$i++;
		// }
		// $data["array"] 	= $array;
		// $data["page"] 	= "home";
		// $data["popup"] 	= $array[14][3];

		$data["kemarin_lusa"] 		= get_date("-2");
		$data["kemarin"] 			= get_date("-1");
		$data["hari_ini"] 			= get_date("+0");
		$data["besok"] 				= get_date("+1");
		$data["besok_lusa"] 		= get_date("+2");
		$data["tiga_hari_besok"] 	= get_date("+3");


		$data['eyevent_main']		= $this->Eyevent_model->get_eyevent_main();
		$data['eyevent_main_2']		= $this->Eyevent_model->get_eyevent_main_2();

		$data['all_liga']			= $this->Eyevent_model->get_all_liga();

		$data['jadwal_next_yesterday'] 	= $this->Eyevent_model->get_all_jadwal($data["kemarin_lusa"]["tanggalnya"],null);
		$data['jadwal_yesterday'] 		= $this->Eyevent_model->get_all_jadwal($data["kemarin"]["tanggalnya"],null);
		$data['jadwal_today'] 			= $this->Eyevent_model->get_all_jadwal($data["hari_ini"]["tanggalnya"],null);
		$data['jadwal_tomorrow'] 		= $this->Eyevent_model->get_all_jadwal($data["besok"]["tanggalnya"],null);
		$data['jadwal_next_tomorrow'] 	= $this->Eyevent_model->get_all_jadwal($data["besok_lusa"]["tanggalnya"],null);
		$data['jadwal_three_after'] 	= $this->Eyevent_model->get_all_jadwal($data["tiga_hari_besok"]["tanggalnya"],null);
		
		$data['hasil_today'] 		= $this->Eyevent_model->get_hasil_today();
		$data['hasil_today2'] 		= $this->Eyevent_model->get_hasil_today2();
		$data['eyenews_main'] 		= $this->Eyevent_model->get_eyenews_main();
		
		$data['video_eyetube']		= $this->Eyevent_model->get_eyetube_satu();
		$data['kompetisi']			= array(array('competition'=>'Liga Inggris','value'=>'liga_inggris'),array('competition'=>'Liga Italia','value'=>'liga_italia'),array('competition'=>'Liga Spanyol','value'=>'liga_spanyol'));

		
		$data["extrascript"] 	= $this->load->view('eyetube/script_index', '', true);
		
		$data['kanal'] 			= "eyevent";
		$data["kanan_kalender"]	= $this->load->view('eyevent/date_picker', $data, true);
		$data["kanan_topskor"]	= $this->load->view('eyevent/top_skor', $data, true);
		$data["jadwal"]			= $this->load->view('eyevent/jadwal', $data, true);
		// $data["klasemen"]		= $this->load->view('eyevent/klasemen', $data, true);
		$data["body"] 			= $this->load->view('eyevent/index', $data, true);

		$this->load->view('template/static',$data);
	}

	public function api_detail($event_id)
	{
		$url 	= $this->config->item('api_url')."event/$event_id";
		$cred 	= $this->config->item('credential');

		$event_data	= array(
								'startdate' => '',
								'enddate' => '',
								'related' => true,
		);


		$model 			=  $this->excurl->remoteCall($url,$cred,$event_data);

		$data["model"] = json_decode($model);

		// return json_decode($model);
		
		$html = $this->load->view('eyevent/detail',$data, true);

		echo json_encode(array('html' => $html));
	}

	public function detail_kanan()
	{
		$cred 	= $this->config->item('credential');

		//===== eyetube
		$url_eyetube 	= $this->config->item('api_url')."video";
		$tube_data		= array(
								'page' => '1',
								'limit' => '8',
								'sortby' => 'newest',
								'category' => '',
		);
		$eyetube 		=  $this->excurl->remoteCall($url_eyetube,$cred,$tube_data);

		$data["eyetube"] = json_decode($eyetube);

		//===== eyevent lain
		$url_eyevent 	= $this->config->item('api_url')."event";
		$event_data		= array(
								'page' => '1',
								'limit' => '8',
								'sortby' => 'newest',
								'category' => '',
		);
		$eyevent 		=  $this->excurl->remoteCall($url_eyevent,$cred,$event_data);

		//===== eyenews
		$url_eyenews 	= $this->config->item('api_url')."news";
		$event_data		= array(
								'page' => '1',
								'limit' => '4',
								'sortby' => 'newest',
								'category' => '',
								'youngage' => '',
								'recommended' => '',
		);
		$eyenews 		=  $this->excurl->remoteCall($url_eyenews,$cred,$event_data);

		$data["eyetube"] = json_decode($eyetube);
		$data["eyevent"] = json_decode($eyevent);
		$data["eyenews"] = json_decode($eyenews);


		
		$html = $this->load->view('eyevent/detail_kanan',$data, true);

		echo json_encode(array('html' => $html));
	}
	
	public function detail($eyevent_id=null)
	{
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";

		$data["event_id"] 	= $eyevent_id;

		$data["body"] 	= $this->load->view('eyevent/detail_abu', $data, true);
		$data['kanal'] 	= "eyevent";
		
		$this->load->view('template/static',$data);
	}

	public function get_jadwal($tanggal)
	{
		$jadwalnya 		= $this->Eyevent_model->get_all_jadwal($tanggal,null);
		$txt = '';
		foreach ($jadwalnya as $value)
		{
			if (!empty($value['club_a']))
			{
				if ($value["jadwal_pertandingan"] < date('Y-m-d H:i:s'))
				{
					$txt.= "	<tr>
			                        <td>".$value['club_a']."
			                            <img src='".imgUrl()."systems/club_logo/".$value['logo_a']."' alt=''>
			                        </td> \
			                        <td>
			                        	<span>".$value["kompetisi"]."</span>
			                        	".$value['score_a']." - ".$value['score_b']."
			                            <span>".$value["lokasi_pertandingan"]."</span>
			                        </td>
			                        <td>
			                            <img src='".imgUrl()."systems/club_logo/".$value["logo_b"]."' alt=''>
			                            ".$value["club_b"]."
			                        </td>
			                    </tr>	";
				}
				else
				{
					$txt.= "	<tr>
			                        <td>".$value['club_a']."
			                            <img src='".imgUrl()."systems/club_logo/".$value['logo_a']."' alt=''>
			                        </td> \
			                        <td>
			                        	<span>".$value["kompetisi"]."</span>
			                         	".date("H:i",strtotime($value["jadwal_pertandingan"]))."
			                            <span>".$value["lokasi_pertandingan"]."</span>
			                        </td>
			                        <td>
			                            <img src='".imgUrl()."systems/club_logo/".$value["logo_b"]."' alt=''>
			                            ".$value["club_b"]."
			                        </td>
			                    </tr>	";
				}
			}
			else
			{
				$txt.= "	<tr>
	                            <td colspan='3' style='text-align: center;'>
	                                Tidak Ada Jadwal Pada Tanggal Ini
	                            </td>
	                        </tr>    ";
			}
			

		}

		echo json_encode(array(	'status' 	=> '1',
								'txt' 		=> $txt,
							));
	}

	public function semua_event()
	{
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";

		$data["body"] 	= $this->load->view('eyevent/semua_event_abu', $data, true);
		$data['kanal'] 	= "eyevent";
		
		$this->load->view('template/static',$data);
	}

	public function api_semua_event()
	{
		$cred 	= $this->config->item('credential');

		//===== eyevent semua
		$url_eyevent 	= $this->config->item('api_url')."event";
		$event_data		= array(
								'page' => '1',
								'limit' => '40',
								'sortby' => 'newest',
								'category' => '',
		);
		$eyevent 		=  $this->excurl->remoteCall($url_eyevent,$cred,$event_data);

		$data["eyevent"] = json_decode($eyevent);
		$html = $this->load->view('eyevent/semua_event',$data, true);

		echo json_encode(array('html' => $html));
	}

	public function api_semua_event_kanan()
	{
		$cred 	= $this->config->item('credential');
		
		//===== eyenews
		$url_eyenews 	= $this->config->item('api_url')."news";
		$event_data		= array(
								'page' => '1',
								'limit' => '4',
								'sortby' => 'newest',
								'category' => '',
								'youngage' => '',
								'recommended' => '',
		);
		$eyenews 		=  $this->excurl->remoteCall($url_eyenews,$cred,$event_data);

		$data["eyenews"] = json_decode($eyenews);

		//===== eyetube
		$url_eyetube 	= $this->config->item('api_url')."video";
		$tube_data		= array(
								'page' => '1',
								'limit' => '8',
								'sortby' => 'newest',
								'category' => '',
		);
		$eyetube 		=  $this->excurl->remoteCall($url_eyetube,$cred,$tube_data);

		$data["eyetube"] = json_decode($eyetube);

		$html = $this->load->view('eyevent/semua_event_kanan',$data, true);

		echo json_encode(array('html' => $html));
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

	public function liga($id_liga)
	{
		$data["model"] 				= $this->Eyevent_model->get_row_event($id_liga);

		$data["kemarin_lusa"] 		= get_date("-2");
		$data["kemarin"] 			= get_date("-1");
		$data["hari_ini"] 			= get_date("+0");
		$data["besok"] 				= get_date("+1");
		$data["besok_lusa"] 		= get_date("+2");
		$data["tiga_hari_besok"] 	= get_date("+3");


		$data['eyevent_main']		= $this->Eyevent_model->get_eyevent_main();
		$data['eyevent_main_2']		= $this->Eyevent_model->get_eyevent_main_2();
		$data['all_liga']			= $this->Eyevent_model->get_all_liga();

		$data['jadwal_next_yesterday'] 	= $this->Eyevent_model->get_all_jadwal($data["kemarin_lusa"]["tanggalnya"],$id_liga);
		$data['jadwal_yesterday'] 		= $this->Eyevent_model->get_all_jadwal($data["kemarin"]["tanggalnya"],$id_liga);
		$data['jadwal_today'] 			= $this->Eyevent_model->get_all_jadwal($data["hari_ini"]["tanggalnya"],$id_liga);
		$data['jadwal_tomorrow'] 		= $this->Eyevent_model->get_all_jadwal($data["besok"]["tanggalnya"],$id_liga);
		$data['jadwal_next_tomorrow'] 	= $this->Eyevent_model->get_all_jadwal($data["besok_lusa"]["tanggalnya"],$id_liga);
		$data['jadwal_three_after'] 	= $this->Eyevent_model->get_all_jadwal($data["tiga_hari_besok"]["tanggalnya"],$id_liga);
		
		$data['hasil_today'] 		= $this->Eyevent_model->get_hasil_today();
		$data['hasil_today2'] 		= $this->Eyevent_model->get_hasil_today2();
		$data['eyenews_main'] 		= $this->Eyevent_model->get_eyenews_main();
		
		$data['video_eyetube']		= $this->Eyevent_model->get_eyetube_satu();		

		
		$data["extrascript"] 	= $this->load->view('eyetube/script_index', '', true);

		$data['kompetisi']			= array(array('competition'=>'Liga Inggris','value'=>'liga_inggris'),array('competition'=>'Liga Italia','value'=>'liga_italia'),array('competition'=>'Liga Spanyol','value'=>'liga_spanyol'),array('competition'=>'Liga Indonesia 1','value'=>'liga_indonesia'));
		
		$data['kanal'] 			= "eyevent";
		$data["kanan_kalender"]	= $this->load->view('eyevent/date_picker', $data, true);
		$data["kanan_topskor"]	= $this->load->view('eyevent/top_skor', $data, true);
		$data["jadwal"]			= $this->load->view('eyevent/jadwal', $data, true);
		// $data["klasemen"]		= $this->load->view('eyevent/klasemen', $data, true);
		$data["body"] 			= $this->load->view('eyevent/index', $data, true);

		$this->load->view('template/static',$data);
	}
	
}
