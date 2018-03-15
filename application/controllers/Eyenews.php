<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyenews extends CI_Controller {

	public function __construct(){
        parent::__construct();
			// direct_m();
		   // $this->load->model('Eyemarket_model');
			date_default_timezone_set('Asia/Jakarta');
			$this->load->model('Eyenews_model');
			$this->load->model('Master_model');
			$this->load->helper(array('form','url','text','date','my'));
			$this->load->helper('my');
    }
	
	public function index()
	{
		$data["meta"]["title"] 			="";
		$data["meta"]["image"] 			=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"] 		="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"] 				="eyenews";		
		
		$data['all_news'] 			= $this->Eyenews_model->get_all_news();
		$data['soccer_seri'] 			= $this->Eyenews_model->get_soccer_seri();
		$data['eyenews_main'] 			= $this->Eyenews_model->get_eyenews_main();
		$data['eyenews_rekomendasi']		= $this->Eyenews_model->get_eyenews_rekomendasi();
		$news_type 				= $data['eyenews_main']->news_type;
		$data['eyenews_similar'] 		= $this->Eyenews_model->get_eyenews_similar($news_type);		
		$data['headline'] 			= $this->Eyenews_model->get_headline();		
		$data['eyenews_populer']		= $this->Eyenews_model->get_eyenews_populer();	
		$data['video_eyetube'] 			= $this->Eyenews_model->get_eyetube_satu();
		$data['jadwal_today'] 			= $this->Eyenews_model->get_jadwal_today();
		$data['jadwal_yesterday'] 		= $this->Eyenews_model->get_jadwal_yesterday();
		$data['jadwal_tomorrow'] 		= $this->Eyenews_model->get_jadwal_tomorrow();	
		$data['trending_eyenews'] 		= $this->Eyenews_model->get_trending_eyenews();

		$where    = array();
		$selectID = 'eyenews_id';
		$tbl      = 'tbl_eyenews';
		$limit    = 4;
		$offset   = 5;
		$uri_segment = 3;
		$url      = 'eyenews/page';
		$like = array('prod_name'=> '','merk'=> '');
		$data['pagging']   = $this->Master_model->pagging($selectID, $tbl, $limit, $offset, $url, $uri_segment, '', $where, $selectFieldRow = '');
		
		$data['kanal'] 					= "eyenews";
		$data["body"]=$this->load->view('eyenews/index', $data,true);

		$this->load->view('template/static',$data);		
	}
	
	public function page()
	{
		$data["meta"]["title"] 			="";
		$data["meta"]["image"] 			=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"] 		="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"] 				="eyenews";		
		
		$data['all_news'] 			= $this->Eyenews_model->get_all_news();
		$data['soccer_seri'] 			= $this->Eyenews_model->get_soccer_seri();
		$data['eyenews_main'] 			= $this->Eyenews_model->get_eyenews_main();
		$data['eyenews_rekomendasi']		= $this->Eyenews_model->get_eyenews_rekomendasi();
		$news_type 				= $data['eyenews_main']->news_type;
		$data['eyenews_similar'] 		= $this->Eyenews_model->get_eyenews_similar($news_type);		
		$data['headline'] 			= $this->Eyenews_model->get_headline();		
		$data['eyenews_populer']		= $this->Eyenews_model->get_eyenews_populer();	
		$data['video_eyetube'] 			= $this->Eyenews_model->get_eyetube_satu();
		$data['jadwal_today'] 			= $this->Eyenews_model->get_jadwal_today();
		$data['jadwal_yesterday'] 		= $this->Eyenews_model->get_jadwal_yesterday();
		$data['jadwal_tomorrow'] 		= $this->Eyenews_model->get_jadwal_tomorrow();	
		$data['trending_eyenews'] 		= $this->Eyenews_model->get_trending_eyenews();
		$where    = array();
		$selectID = 'eyenews_id';
		$tbl      = 'tbl_eyenews';
		$limit    = 4;
		$offset   = $this->uri->segment(3) + 5;
		$uri_segment = 3;
		$url      = 'eyenews/page';
		$like = array('prod_name'=> '','merk'=> '');
		$data['pagging']   = $this->Master_model->pagging($selectID, $tbl, $limit, $offset, $url, $uri_segment, '', $where, $selectFieldRow = '');
		
		$data['kanal'] 					= "eyenews";
		$data["body"]=$this->load->view('eyenews/index', $data,true);

		$this->load->view('template/static',$data);		
	}

	public function detail($eyenews_id='',$action=null)
	{
		
		$eyenews_id2 = $eyenews_id; //update rizki
		$query=$this->db->query("SELECT * FROM tbl_eyenews WHERE url='".$eyenews_id."' LIMIT 1");
		$row=$query->row_array();
		$data['news_type'] 				= $this->Master_model->getAll('tbl_news_types', $where = array(), $select = array('news_type'), $order = array(), $limit = '', $offset = '', $whereNotin = array('news_type',array('tulisan kamu')), $like = array());
		$data['kategori']	= $this->Master_model->getAll('tbl_eyenews', $where = array('url'=>$eyenews_id), $select = array('news_type'), $order = array(), $limit = '', $offset = '', $whereNotin = array(), $like = array());
		if($query->num_rows()>0){

			$eyenews_id=$row["eyenews_id"];
			$linksite=$row["url"];
			
			// echo "disini";exit();
		}else{
			$row=$this->db->query("SELECT * FROM tbl_eyenews WHERE eyenews_id = '$eyenews_id2' LIMIT 1");
			if($row->num_rows()>0){
				$row = $row->row_array(); //update rizki
				$linksite=$row["url"]; //update rizki
				$eyenews_id=$row["eyenews_id"]; //update rizki
				// redirect("eyenews/detail/".$linksite);
				redirect("eyenews/detail/".$linksite);
				exit();
			}
		}
		$data['kanal']	= "eyenews";
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		$data["meta"]["share"]='
		<!-- Begin of SEO Meta Tags -->
		<title>'.$row['title'].' - EyeNews | EyeSoccer</title>
		<meta name="title" content="'.$row['title'].' - EyeNews | EyeSoccer" />
		<meta name="description" content="'.preg_replace('/\s+?(\S+)?$/', '', substr(strip_tags($row['description']), 0, 100)).'" />
		<meta name="googlebot-news" content="index,follow" />
		<meta name="googlebot" content="index,follow" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="EyeSoccer.id" />
		<meta name="language" content="id" />
		<meta name="geo.country" content="id" name="geo.country" />
		<meta http-equiv="content-language" content="In-Id" />
		<meta name="geo.placename"content="Indonesia" />
		<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
		<link rel="canonical" href="https://eyesoccer.id/eyenews/detail/'.$linksite.'" />
		<!-- End of SEO Meta Tags-->

		<!-- Begin of Facebook Open graph data-->
		<meta property="fb:app_id" content="140611863350583" />
		<meta property="og:site_name" content="EyeSoccer" />
		<meta property="og:url" content="https://eyesoccer.id/eyenews/detail/'.$linksite.'" />
		<meta property="og:type" content="Website" />
		<meta property="og:title" content="'.$row['title'].' - EyeNews | EyeSoccer" />
		<meta property="og:image" content="http://eyesoccer.id/systems/eyenews_storage/'.$row['pic'].'" />
		<meta property="og:description" content="'.preg_replace('/\s+?(\S+)?$/', '', substr(strip_tags($row['description']), 0, 100)).'" />
		<meta property="og:locale" content="id_ID" />
		<!--End of Facebook open graph data-->
		   
		<!--begin of twitter card data-->
		<meta name="twitter:card" content="summary" />    
		<meta name="twitter:site" content="@eyesoccer_id" />
		<meta name="twitter:creator" content="@eyesoccer_id" />
		<meta name="twitter:domain" content="EyeSoccer"/>
		<meta name="twitter:title" content="'.$row['title'].'" />
		<meta name="twitter:description" content="'.preg_replace('/\s+?(\S+)?$/', '', substr(strip_tags($row['description']), 0, 100)).'" />
		<meta name="twitter:image" content="https://www.eyesoccer.id/systems/eyenews_storage/'.$row['pic'].'" />
		<!--end of twitter card data-->
		';
		/* $cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
		$i=0;
		foreach($cmd_ads as $ads){
		$e=0;
		foreach($ads as $key => $val)
		{
		$array[$i][$e] =  $val;
		$e++;
		}		
		$i++;
		} */
		// $data["array"]=$array;
		$data["eyenews_id"]=$eyenews_id;
		$data["action"]=$action;
		$data["page"]="home";
		// $data["popup"]=$array[14][3];
		
		$data['model'] 			= $this->Eyenews_model->get_detail($eyenews_id);
		$data['terkini'] 		= $this->Eyenews_model->get_terkini();
		$data['terpopuler'] 	= $this->Eyenews_model->get_terpopuler();
		$data['ads_right'] 		= $this->Eyenews_model->get_ads_right();
		$data['new_eyetube'] 	= $this->Eyenews_model->get_new_eyetube();
		$data['trending_eyenews'] 	= $this->Eyenews_model->get_trending_eyenews();
		$data['eyetube_populer'] = $this->Eyenews_model->get_eyetube_populer();		
		
		//$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		//$data["body"]=$this->load->view('home/index', '', true);
		$this->load->view('config-session',$data);
		
		$date1=date("Y-m-d H:i:s",strtotime("-15 minutes",time()));
		$date2=date("Y-m-d H:i:s");

		$cekview=$this->Eyenews_model->select_view($date1,$date2,$eyenews_id,$_SESSION["ip"]);
		if($cekview<1)
		{
		$this->db->trans_start();
		$this->db->query("UPDATE tbl_eyenews SET news_view=news_view+1 WHERE eyenews_id='".$eyenews_id."'");
		$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','view','eyenews','".$eyenews_id."','".$_SESSION["ip"]."')");
		$this->db->trans_complete();
		}
		
		// $data["body"]=$this->load->view('eyenews/new_detail', $data, true);
		$data["body"]=$this->load->view('eyenews/detail', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template/static',$data);
	}

	public function getUserIP()
	{
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];
	    
		if(filter_var($client, FILTER_VALIDATE_IP))
		{
		    $ip = $client;
		}
		elseif(filter_var($forward, FILTER_VALIDATE_IP))
		{
		    $ip = $forward;
		}
		else
		{
		    $ip = $remote;
		}
	    
		return $ip;
	}
	
	public function new_emot($id=null)
	{			
		$date 	= date("Y-m-d H:i:s");
		$ip 	= $this->getUserIP();
		$tipe 	= $_POST["type"];

		
		$cek_emot 	= $this->Eyenews_model->cek_view_smile($id,$ip,$tipe);
		
		if ($cek_emot < 1 )
		{
			$update 	= $this->Eyenews_model->set_news_emot($id,$tipe);

			$object 	= array(
							'visit_date' 	=> $date,
							'type_visit' 	=> $tipe,
							'place_visit' 	=> 'eyenews',
							'place_id' 		=> $id,
							'session_ip' 	=> $ip,
			);

			$insert 	= $this->Eyenews_model->set_tbl_view($object);

			$jumlah 	= $this->Eyenews_model->get_jumlah_emot($id,$tipe);
			
			if ($tipe == "smile")
			{
				$html["html"] 	= $jumlah->news_smile;
			}
			else
			if ($tipe == "shock")
			{
				$html["html"] 	= $jumlah->news_shock;
			}
			else
			if ($tipe == "inspired")
			{
				$html["html"] 	= $jumlah->news_inspired;
			}
			else
			if ($tipe == "happy")
			{
				$html["html"] 	= $jumlah->news_happy;
			}
			else
			if ($tipe == "sad")
			{
				$html["html"] 	= $jumlah->news_sad;
			}
			else
			if ($tipe == "fear")
			{
				$html["html"] 	= $jumlah->news_fear;
			}
			else
			if ($tipe == "angry")
			{
				$html["html"] 	= $jumlah->news_angry;
			}
			else
			if ($tipe == "fun")
			{
				$html["html"] 	= $jumlah->news_fun;
			}

			echo json_encode($html);
			
		}
	}
	
	public function kategori($cat, $subcat = '')
	{
		$data["meta"]["title"] 			="";
		$data["meta"]["image"] 			=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"] 		="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"] 				="eyenews";		
		
		$data['select_cat']			= urldecode($cat);
		$data['select_subcat']			= urldecode($subcat);
		$data['all_news'] 			= $this->Eyenews_model->get_all_news();
		$data['soccer_seri'] 			= $this->Eyenews_model->get_soccer_seri();
		$data['eyenews_main'] 			= $this->Eyenews_model->get_eyenews_main();
		$data['eyenews_rekomendasi']		= $this->Eyenews_model->get_eyenews_rekomendasi();
		$news_type 				= $data['eyenews_main']->news_type;
		$data['eyenews_similar'] 		= $this->Eyenews_model->get_eyenews_similar($news_type);		
		$data['headline'] 			= $this->Eyenews_model->get_headline();		
		$data['eyenews_populer']		= $this->Eyenews_model->get_eyenews_populer();	
		$data['video_eyetube'] 			= $this->Eyenews_model->get_eyetube_satu();
		$data['jadwal_today'] 			= $this->Eyenews_model->get_jadwal_today();
		$data['jadwal_yesterday'] 		= $this->Eyenews_model->get_jadwal_yesterday();
		$data['jadwal_tomorrow'] 		= $this->Eyenews_model->get_jadwal_tomorrow();	
		$data['trending_eyenews'] 		= $this->Eyenews_model->get_trending_eyenews();
		
		$where = array('news_type'=> urldecode($cat));
		if(!is_numeric($subcat) AND $subcat != '') $where = array_merge($where, array('sub_category_name' => urldecode($subcat)));
		
		$selectID = 'eyenews_id';
		$tbl      = 'tbl_eyenews';
		$limit    = 12;
		$offset   = $this->uri->segment((!is_numeric($subcat) AND $subcat != '') ? 5 : 4);
		$uri_segment = (!is_numeric($subcat) AND $subcat != '') ? 5 : 4;
		
		$url = 'eyenews/kategori/'.$cat;
		if(!is_numeric($subcat) AND $subcat != '') $url.= '/'.$subcat;
		
		$like = array();
		$data['pagging']   = $this->Master_model->pagging($selectID, $tbl, $limit, $offset, $url, $uri_segment, '', $where, $selectFieldRow = '');
		
		$data['kanal'] 					= "eyenews";
		$data["body"]=$this->load->view('eyenews/category', $data,true);

		$this->load->view('template/static',$data);		
	}
	
	public function terkini()
	{
		$where    = array();
		$selectID = 'publish_on';
		$tbl      = 'tbl_eyenews';
		$limit    = 12;
		$offset   = $this->uri->segment(3);
		$uri_segment = 3;
		$url      = 'eyenews/terkini';
		$like = array();
		$data['pagging']   = $this->Master_model->pagging($selectID, $tbl, $limit, $offset, $url, $uri_segment, '', $where, $selectFieldRow = '');
		
		$data['eyenews_main'] 			= $this->Eyenews_model->get_eyenews_main();
		$data['eyenews_rekomendasi']		= $this->Eyenews_model->get_eyenews_rekomendasi();
		$news_type 				= $data['eyenews_main']->news_type;
		$data['eyenews_similar'] 		= $this->Eyenews_model->get_eyenews_similar($news_type);		
		$data['headline'] 			= $this->Eyenews_model->get_headline();		
		$data['eyenews_populer']		= $this->Eyenews_model->get_eyenews_populer();	
		$data['video_eyetube'] 			= $this->Eyenews_model->get_eyetube_satu();
		$data['soccer_seri'] 			= $this->Eyenews_model->get_soccer_seri();
		$data['jadwal_today'] 			= $this->Eyenews_model->get_jadwal_today();
		$data['jadwal_yesterday'] 		= $this->Eyenews_model->get_jadwal_yesterday();
		$data['jadwal_tomorrow'] 		= $this->Eyenews_model->get_jadwal_tomorrow();	
		$data['trending_eyenews'] 		= $this->Eyenews_model->get_trending_eyenews();
		
		$data["page"] 				="eyenews";
		$data['kanal'] 					= "eyenews";
		$data["body"]=$this->load->view('eyenews/terkini', $data,true);

		$this->load->view('template/static',$data);		
	}
	
	public function populer()
	{
		$where    = array();
		// $where = array('news_type'=> urldecode($cat));
		$selectID = 'news_view';
		$tbl      = 'tbl_eyenews';
		$limit    = 12;
		$offset   = $this->uri->segment(3);
		$uri_segment = 3;
		$url      = 'eyenews/populer';
		$like = array();
		$data['pagging']   = $this->Master_model->pagging($selectID, $tbl, $limit, $offset, $url, $uri_segment, '', $where, $selectFieldRow = '');
		
		$data['eyenews_main'] 			= $this->Eyenews_model->get_eyenews_main();
		$data['eyenews_rekomendasi']		= $this->Eyenews_model->get_eyenews_rekomendasi();
		$news_type 				= $data['eyenews_main']->news_type;
		$data['eyenews_similar'] 		= $this->Eyenews_model->get_eyenews_similar($news_type);		
		$data['headline'] 			= $this->Eyenews_model->get_headline();		
		$data['eyenews_populer']		= $this->Eyenews_model->get_eyenews_populer();	
		$data['video_eyetube'] 			= $this->Eyenews_model->get_eyetube_satu();
		$data['soccer_seri'] 			= $this->Eyenews_model->get_soccer_seri();
		$data['jadwal_today'] 			= $this->Eyenews_model->get_jadwal_today();
		$data['jadwal_yesterday'] 		= $this->Eyenews_model->get_jadwal_yesterday();
		$data['jadwal_tomorrow'] 		= $this->Eyenews_model->get_jadwal_tomorrow();	
		$data['trending_eyenews'] 		= $this->Eyenews_model->get_trending_eyenews();
		
		$data["page"] 				="eyenews";
		$data['kanal'] 					= "eyenews";
		$data["body"]=$this->load->view('eyenews/populer', $data,true);

		$this->load->view('template/static',$data);		
	}
}
