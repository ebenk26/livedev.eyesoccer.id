<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
		   // $this->load->model('Eyemarket_model');
			date_default_timezone_set('Asia/Jakarta');
			$this->load->model('Home_model');
			$this->load->model('Master_model','mod');
			$this->load->helper(array('form','url','text','date'));
			$this->load->helper('my');
    }
	public function index()
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
		
		$data['jadwal'] 			= $this->Home_model->get_all_jadwal();		
		$data['jadwal_2'] 			= $this->Home_model->get_all_jadwal_2();		
		$data['trend_eyetube'] 		= $this->Home_model->get_trending_eyetube();
		$data['trend_eyenews'] 		= $this->Home_model->get_trending_eyenews();
		$data['profile_club'] 		= $this->Home_model->get_profile_club();
		$data['profile_club_2'] 	= $this->Home_model->get_profile_club_2();
		$data['profile_club_3'] 	= $this->Home_model->get_profile_club_3();
		$data['profile_player']	 	= $this->Home_model->get_player_random();
		$data['profile_player_2']	 = $this->Home_model->get_player_random_2();
		$data['profile_player_3']	 = $this->Home_model->get_player_random_3();
		$data['video_eyetube'] 		= $this->Home_model->get_eyetube_satu();
		$data['eyetube_science'] 	= $this->Home_model->get_eyetube_science();
		$data['eyetube_stars'] 		= $this->Home_model->get_eyetube_stars();
		$data['eyetube_kamu'] 		= $this->Home_model->get_eyetube_kamu();
		$data['eyetube_populer'] 	= $this->Home_model->get_eyetube_populer();
		$data['eyenews_main'] 		= $this->Home_model->get_eyenews_main();

		$news_type 					= $data['eyenews_main']->news_type;
		$data['eyenews_similar'] 	= $this->Home_model->get_eyenews_similar($news_type);
		$data['eyenews_muda'] 		= $this->Home_model->get_eyenews_muda();
		$data['eyenews_populer'] 	= $this->Home_model->get_eyenews_populer();
		$data['eyenews_rekomendasi']= $this->Home_model->get_eyenews_rekomendasi();
		$data['eyevent_main']		= $this->Home_model->get_eyevent_main();
		$data['eyevent_main_2']		= $this->Home_model->get_eyevent_main_2();
		$data['eyevent_main_3']		= $this->Home_model->get_eyevent_main_3();
		$data['jadwal_today'] 		= $this->Home_model->get_jadwal_today();
		$data['jadwal_yesterday'] 	= $this->Home_model->get_jadwal_yesterday();
		$data['jadwal_tomorrow'] 	= $this->Home_model->get_jadwal_tomorrow();
		$data['eyemarket_main'] 	= $this->Home_model->get_eyemarket_main();
		$data['klasemen'] 			= $this->Home_model->get_klasemen();
		$data['kanal'] 				= "home";
		
		$data["body"]=$this->load->view('home/index', $data, TRUE);
		$this->load->view('template/static',$data);		
		
		//$data["body"]=$this->load->view('home/index2', $data, true);
		//$this->load->view('template-front-end',$data);

	}
	
	public function tentang_kami()
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
		$data["body"]=$this->load->view('home/tentang', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	public function member_area(){
		// var_dump('dfjdkffk');exit();
		if(isset($_SESSION["member_id"])){
			
		}else{
		
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
		$data["page"]="home";

		$data["popup"]=$array[14][3];

		$profile=$this->db->query("SELECT * FROM tbl_member a LEFT JOIN tbl_gallery b ON b.id_gallery=a.profile_pic WHERE id_member='".$_SESSION["member_id"]."' LIMIT 1")->row_array();
		// var_dump($profile);exit();
				if(isset($profile["profile_pic"]) && $profile["profile_pic"]!="")
		{
			$data["pic"]=$profile["pic"];
		}
		else{
			$data["pic"]="no-person.jpg";
		}
		$data["kanal"]="home";
		$data["profile"]=$profile;
		$data["extrascript"]=$this->load->view('home/script_member_area', $data, true);
		$data["body"]=$this->load->view('home/member-area', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template/static',$data);
		
	}
	
	public function logout(){
		unset($_SESSION["member_id"],$_SESSION["user_id"]);
				session_destroy();
				redirect("home/index");
	}
	public function request_player(){
		$this->db->query("INSERT INTO tbl_member_player SET id_player='".$_POST["player_id"]."',id_member='".$_SESSION["member_id"]."', add_date='".date("Y-m-d H:i:s")."'");
		redirect("home/member_area");
		
	}

	/**public function homeBaru()
	{
		$data['jadwal'] 			= $this->Home_model->get_all_jadwal();
		$data['trend_eyetube'] 		= $this->Home_model->get_trending_eyetube();
		$data['trend_eyenews'] 		= $this->Home_model->get_trending_eyenews();
		$data['profile_club'] 		= $this->Home_model->get_profile_club();
		$data['profile_player']	 	= $this->Home_model->get_player_random();
		$data['video_eyetube'] 		= $this->Home_model->get_eyetube_satu();
		$data['eyetube_science'] 	= $this->Home_model->get_eyetube_science();
		$data['eyetube_stars'] 		= $this->Home_model->get_eyetube_stars();
		$data['eyetube_kamu'] 		= $this->Home_model->get_eyetube_kamu();
		$data['eyetube_kamu'] 		= $this->Home_model->get_eyetube_kamu();
		$data['eyenews_main'] 		= $this->Home_model->get_eyenews_main();

		$news_type 					= $data['eyenews_main']->news_type;
		$data['eyenews_similar'] 	= $this->Home_model->get_eyenews_similar($news_type);
		$data['eyenews_muda'] 		= $this->Home_model->get_eyenews_muda();
		$data['eyevent_today'] 		= $this->Home_model->get_jadwal_today();
		$data['eyevent_yesterday'] 	= $this->Home_model->get_jadwal_yesterday();
		$data['eyevent_tomorrow'] 	= $this->Home_model->get_jadwal_tomorrow();

		$this->load->view('home1',$data);
	}**/

	public function login()
	{
		$data['kanal'] 				= "home";
		$data["body"]=$this->load->view('login', $data, TRUE);
		$this->load->view('template/static',$data);
	}
	
	public function login_session()
	{
		if(isset($_POST['username'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$page     = $_POST['page'];
			$cmd      = 
			$this->db->query("select * from tbl_member where email='".$username."' and password='".md5($password)."' and verification=1");
			$row      =$cmd->row_array();
			$user_id  =$row['id_member'];
			$cek      = $cmd->num_rows();
			if($cek > 0)
			{
				if($row['id_member']=="" && $row['password']==""){
				  
				  header("refresh:0");  
				  }
				  else{
				  	//get eyeme username 
				  	$where   = array('id_member' => $user_id);
				  	$profile  = $this->mod->getAll('me_profile',$where,array('username','id_member','display_picture'));

					  	if(count($profile) > 0 ){

					  		$this->session->id_member  = $profile[0]->id_member;
					  		$this->session->username   = $profile[0]->username;

					  	}
					 //end
				  $_SESSION['member_id']=$user_id;
				  header("location:".base_url().$page);  
				  }  
			}else{
				echo "<script>alert('Email atau Password salah')</script>";
				header("location:".base_url()."home/login");  
			}
		}
	}
}
