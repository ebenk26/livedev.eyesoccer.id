<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyetube extends CI_Controller {

	public function __construct(){
        parent::__construct();
		    //$this->load->model('Eyemarket_model');
		    $this->load->model('Eyetube_model');
			$this->load->helper(array('form','url','text','date'));			
			date_default_timezone_set('Asia/Jakarta');
			$this->load->helper('my');
			
    }
	public function index($pg=null)
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
		if($pg!="")
		{
			$data["pg"]=$pg;
		}
		
		$data["popup"]=$array[14][3];		
		
		$data['video_eyetube'] = $this->Eyetube_model->get_eyetube_satu();
		$data['eyetube_populer'] = $this->Eyetube_model->get_eyetube_populer();
		$data['eyetube_rekomendasi'] = $this->Eyetube_model->get_eyetube_rekomendasi();
		$data['eyetube_rekomendasi_2'] = $this->Eyetube_model->get_eyetube_rekomendasi_2();
		$data['eyetube_science'] = $this->Eyetube_model->get_eyetube_science();
		$data['eyetube_science_2'] = $this->Eyetube_model->get_eyetube_science_2();
		$data['eyetube_kamu'] = $this->Eyetube_model->get_eyetube_kamu();
		$data['eyetube_kamu_2'] = $this->Eyetube_model->get_eyetube_kamu_2();
		$data['eyetube_ssb'] = $this->Eyetube_model->get_eyetube_ssb();
		$data['eyetube_ssb_2'] = $this->Eyetube_model->get_eyetube_ssb_2();
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$this->load->view('config-session',$data);
		
		$data['kanal']="home";
		$data["body"]=$this->load->view('eyetube/index', $data, true);
		$this->load->view('template/static',$data);
	}
	
	public function detail($eyetube_id=null,$action=null)
	{
		$eyetube_id=$eyetube_id;
		$date1=date("Y-m-d H:i:s",strtotime("-15 minutes",time()));
		$date2=date("Y-m-d H:i:s");

		$cekview=$this->db->query("SELECT * FROM tbl_view WHERE visit_date>='".$date1."' AND visit_date<='".$date2."' AND type_visit='view' AND place_visit='eyetube' AND place_id='".$eyetube_id."' AND session_ip='".$_SESSION["ip"]."' LIMIT 1")->row_array();
		if($cekview<1)
		{
		$this->db->query("UPDATE tbl_eyetube SET tube_view=tube_view+1 WHERE eyetube_id='".$eyetube_id."'");
		$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','view','eyetube','".$eyetube_id."','".$_SESSION["ip"]."')");
		}			
		
		$cmd=$this->db->query("select a.*,b.fullname from tbl_eyetube a INNER JOIN tbl_admin b ON b.admin_id=a.admin_id where eyetube_id='$eyetube_id' LIMIT 1");
		$row=$cmd->row_array();	
		
		$query=$this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$eyetube_id."' LIMIT 1");
		if($query->num_rows()>0)
		{
			$row=$query->row_array();
			$link=str_replace(" ","-",$row["title"]);

			redirect("eyetube/detail2/".$link);
		}
		else{
			$linksite=$eyetube_id;
			$tes=str_replace("-"," ",$eyetube_id);
			$tes=str_replace("%22","%",$tes);

			$row=$this->db->query("SELECT * FROM tbl_eyetube WHERE title LIKE '%".$tes."%' LIMIT 1")->row_array();
			
			//echo "SELECT * FROM tbl_eyetube WHERE title LIKE \"%".$tes."%\" LIMIT 1";
			$eyetube_id=$row["eyetube_id"];
		}

		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		$data["meta"]["share"]='<title>Eyesoccer - '.$row['title'].'</title><meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@eyesoccer_id" />
		<meta name="twitter:title" content="'.$row['title'].'" />
		<meta name="twitter:description" content="'.substr(strip_tags($row['description']),0,100).'" />
		<meta name="twitter:image" content="'.base_url().'/systems/eyetube_storage/'.$row['thumb1'].'" />
		<meta property="og:title" content="'.$row['title'].'" />
		<meta property="og:url" content="'.base_url().'/eyetube/detail/'.$linksite.'" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="'.base_url().'/systems/eyetube_storage/'.$row['thumb1'].'" />
		<meta property="og:description" content="'.substr(strip_tags($row['description']),0,100).'" />
		<meta property="fb:app_id" content="966242223397117" />
';
		
		$data['video_eyetube'] = $this->Eyetube_model->get_eyetube_satu2();
		$data['eyetube_right_detail'] = $this->Eyetube_model->get_eyetube_right_detail();
		$data['eyetube_rekomendasi'] = $this->Eyetube_model->get_eyetube_rekomendasi2();
		$data['eyetube_populer'] = $this->Eyetube_model->get_eyetube_populer();
		
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
		$data["eyetube_id"]=$eyetube_id;
		$data["action"]=$action;
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$this->load->view('config-session',$data);
		
		$data['kanal']="home";
		$data["body"]=$this->load->view('eyetube/detail', $data, true);
		$this->load->view('template/static',$data);
	}
	
	public function detail2($eyetube_id=null,$action=null)
	{
		$eyetube_id=$eyetube_id;
		$date1=date("Y-m-d H:i:s",strtotime("-15 minutes",time()));
		$date2=date("Y-m-d H:i:s");

		$cekview=$this->db->query("SELECT * FROM tbl_view WHERE visit_date>='".$date1."' AND visit_date<='".$date2."' AND type_visit='view' AND place_visit='eyetube' AND place_id='".$eyetube_id."' AND session_ip='".$_SESSION["ip"]."' LIMIT 1")->row_array();
		if($cekview<1)
		{
		$this->db->query("UPDATE tbl_eyetube SET tube_view=tube_view+1 WHERE eyetube_id='".$eyetube_id."'");
		$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','view','eyetube','".$eyetube_id."','".$_SESSION["ip"]."')");
		}			
		
		$cmd=$this->db->query("select a.*,b.fullname from tbl_eyetube a INNER JOIN tbl_admin b ON b.admin_id=a.admin_id where eyetube_id='$eyetube_id' LIMIT 1");
		$row=$cmd->row_array();	
		
		$query=$this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$eyetube_id."' LIMIT 1");
		if($query->num_rows()>0)
		{
			$row=$query->row_array();
			$link=str_replace(" ","-",$row["title"]);

			redirect("eyetube/detail2/".$link);
		}
		else{
			$linksite=$eyetube_id;
			$tes=str_replace("-"," ",$eyetube_id);
			$tes=str_replace("%22","%",$tes);

			$row=$this->db->query("SELECT * FROM tbl_eyetube WHERE title LIKE '%".$tes."%' LIMIT 1")->row_array();
			
			echo "SELECT * FROM tbl_eyetube WHERE title LIKE \"%".$tes."%\" LIMIT 1";
			$eyetube_id=$row["eyetube_id"];
		}

		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		$data["meta"]["share"]='<title>Eyesoccer - '.$row['title'].'</title><meta name="twitter:card" content="summary" />
		<meta name="twitter:username" content="@sobatjudjo" />
		<meta name="twitter:site" content="@eyesoccer_id" />
		<meta name="twitter:title" content="'.$row['title'].'" />
		<meta name="twitter:description" content="'.substr(strip_tags($row['description']),0,100).'" />
		<meta name="twitter:image" content="'.base_url().'/systems/eyetube_storage/'.$row['pic'].'" />
		<meta property="og:title" content="'.$row['title'].'" />
		<meta property="og:url" content="'.base_url().'/eyetube/detail/'.$linksite.'" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="'.base_url().'/systems/eyetube_storage/'.$row['pic'].'" />
		<meta property="og:description" content="'.substr(strip_tags($row['description']),0,100).'" />
		<meta property="fb:app_id" content="966242223397117" />';
		
		

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
		$data["eyetube_id"]=$eyetube_id;
		$data["action"]=$action;
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyetube/detail', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}

	public function search($search=null,$pg=null)
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
		$data["search"]=$search;
		$data["pg"]=$pg;
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyetube/list', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	public function emot($id=null){
		
$date2=date("Y-m-d H:i:s");
$ip=$this->getUserIP();
		if(isset($_POST["type"]) && $_POST["type"]=="smile")
		{
		  
		$ceksmile=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='smile' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($ceksmile<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_smile=tube_smile+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','smile','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $ceksmile=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$ceksmile["tube_smile"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="shock")
		{
		  
		$cekshock=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='shock' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekshock<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_shock=tube_shock+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','shock','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $cekshock=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekshock["tube_shock"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="inspired")
		{
		  
		$cekinspired=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='inspired' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekinspired<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_inspired=tube_inspired+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','inspired','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $cekinspired=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekinspired["tube_inspired"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="happy")
		{
		  
		$cekhappy=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='happy' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekhappy<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_happy=tube_happy+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','happy','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $cekhappy=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekhappy["tube_happy"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="sad")
		{
		  
		$ceksad=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='sad' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($ceksad<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_sad=tube_sad+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','sad','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $ceksad=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$ceksad["tube_sad"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="like")
		{
		  
		$ceklike=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='like' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($ceklike<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_like=tube_like+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','like','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $ceklike=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$ceklike["tube_like"];
		  echo json_encode($html);
		}elseif(isset($_POST["type"]) && $_POST["type"]=="fear")
		{
		  
		$cekfear=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='fear' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekfear<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_fear=tube_fear+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','fear','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $cekfear=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekfear["tube_fear"];
		  echo json_encode($html);
		}

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


	public function newtube()
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
		$data["body"]=$this->load->view('eyetube/newtube', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
}
