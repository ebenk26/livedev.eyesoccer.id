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
			$this->load->library("PHPMailer_Library");
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
		if(isset($_SESSION["id_member"])){
			
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

		$profile=$this->db->query("SELECT * FROM tbl_member a LEFT JOIN tbl_gallery b ON b.id_gallery=a.profile_pic WHERE id_member='".$_SESSION["id_member"]."' LIMIT 1")->row_array();
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
		unset($_SESSION["id_member"],$_SESSION["user_id"]);
				session_destroy();
				redirect("home/index");
	}
	public function request_player(){
		$this->db->query("INSERT INTO tbl_member_player SET id_player='".$_POST["player_id"]."',id_member='".$_SESSION["id_member"]."', add_date='".date("Y-m-d H:i:s")."'");
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
		if(isset($_SESSION['id_member']) && $this->session->id_member){
			header("location:".base_url()."home/index");
		}else{
			$data['kanal'] 				= "registration";
			$data["body"]=$this->load->view('home/registration', $data);
		}
	}
	
	public function login_session()
	{
		if($this->input->post('username')){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$page     = $this->input->post('page');
			$cmd      = $this->db->query("select * from tbl_member where email='".$username."' and password='".md5($password)."' and verification=1");
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
					  		$this->session->img_profile   = load_top_avatar();

					  	}
					 //end
				  $_SESSION['member_id']=$user_id;
				  $_SESSION['id_member']=$user_id;
				  $_SESSION['img_profile']=load_top_avatar();;
				  // header("location:".base_url().$page);  
				  echo $page;
				  }  
			}else{
				// header('Refresh:0; url= '. base_url().'home/login'); 
				// echo "<script>alert('Email atau Password salah')</script>";
				echo "false";
			}
		}
	}
	
	public function registration()
	{
		$data['kanal'] 				= "registration";
		$data["body"]=$this->load->view('home/registration', $data);
	}
	
	public function regis_session()
	{
		$objMail = $this->phpmailer_library->load();
		if($this->input->post('username')){
			$query=$this->db->query("select * FROM tbl_member WHERE username='".$this->input->post("username")."' LIMIT 1");
			$cek = $query->num_rows();
			if($cek>0)
			{
				echo "exist username";
			}else{
				if($this->input->post('name')){
					$this->db->select('*');
					$this->db->where("email='".$this->input->post("email")."'");
					$query2 = $this->db->get('tbl_member');
					$num = $query2->num_rows();
					
					// $ceks = $query2->num_rows();
					if($num>0)
					{
						// echo "select * FROM tbl_member WHERE email='".$this->input->post("email")."' LIMIT 1"; 
						echo "exist"; 
					}
					else{
						$randurl = substr(md5(microtime()),rand(0,26),5);
						$this->db->query("INSERT INTO tbl_member (name,username,email,join_date,member_type,unique_code,password,verification) values ('".$this->input->post("name")."','".strtolower($this->input->post("username"))."','".$this->input->post("email")."','".date("Y-m-d H:i:s")."','Regular','".$randurl."','".md5($this->input->post("password"))."','0')");
						$insert_id = $this->db->insert_id();
						$id=$insert_id;
						
						try {
							//Server settings
							$objMail->SMTPDebug = 2;                                 // Enable verbose debug output
							$objMail->isSMTP();                                      // Set objMailer to use SMTP
							$objMail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
							$objMail->SMTPAuth = true;                               // Enable SMTP authentication
							$objMail->Username = 'eyesoccerindonesia@gmail.com';                 // SMTP username
							$objMail->Password = 'BolaSepak777#';                           // SMTP password
							$objMail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
							$objMail->Port = 465;                                    // TCP port to connect to

							//Recipients
							$objMail->setFrom('info@eyesoccer.id', 'Info Eyesoccer');
							$objMail->addAddress("".$this->input->post("email")."");               // Name is optional
							$objMail->addReplyTo('info@eyesoccer.id', 'Info Eyesoccer');
							$objMail->addBCC('ebenk.rzq@gmail.com');

							//Content
							$objMail->isHTML(true);                                  // Set eobjMail format to HTML
							$objMail->Subject = 'Registrasi Member Eyesoccer';
							$objMail->Body    = 'Kepada '.$this->input->post("name").',<br>Registrasi anda telah berhasil.<br>Silahkan klik link berikut https://www.eyesoccer.id/verifikasi?ver='.$randurl.' untuk verifikasi. Untuk informasi lebih lanjut silahkan hubungi kami di email info@eyesoccer.id
							<br><br>
							Salam Eyesoccer';

							$objMail->send();
							// echo 'Message has been sent';
							echo "true"; 
						} catch (Exception $e) {
							// echo 'Message could not be sent.';
							// echo 'objMailer Error: ' . $objMail->ErrorInfo;
							$this->db->query("delete from tbl_member where id_member=".$id."");
							echo "false";
						}
					}
				}
			}
		}else{
			echo "false";
		}
	}
	
	public function forgot_password()
	{
		if(isset($_SESSION['id_member']) && $this->session->id_member){
			header("location:".base_url()."home/index");
		}else{
			$data['kanal'] 				= "forgot_password";
			$data["body"]=$this->load->view('home/forgot_password', $data);
		}
	}
	public function forgot_pwd_session()
	{
		$objMail = $this->phpmailer_library->load();
		$email = $this->input->post("email");
		
		$randurl = substr(md5(microtime()),rand(0,26),5);
		$data = array(
               'unique_code' => $randurl
            );

		$this->db->where('email', $email);
		$this->db->update('tbl_member', $data); 
		
		try {
			//Server settings
			$objMail->SMTPDebug = 2;                                 // Enable verbose debug output
			$objMail->isSMTP();                                      // Set objMailer to use SMTP
			$objMail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$objMail->SMTPAuth = true;                               // Enable SMTP authentication
			$objMail->Username = 'eyesoccerindonesia@gmail.com';                 // SMTP username
			$objMail->Password = 'BolaSepak777#';                           // SMTP password
			$objMail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$objMail->Port = 465;                                    // TCP port to connect to

			//Recipients
			$objMail->setFrom('info@eyesoccer.id', 'Info Eyesoccer');
			$objMail->addAddress("".$this->input->post("email")."");               // Name is optional
			$objMail->addReplyTo('info@eyesoccer.id', 'Info Eyesoccer');
			$objMail->addBCC('ebenk.rzq@gmail.com');

			//Content
			$objMail->isHTML(true);                                  // Set eobjMail format to HTML
			$objMail->Subject = 'Forgot Password Eyesoccer';
			$objMail->Body    = 'Silahkan klik link berikut https://www.eyesoccer.id/forgot_ver?ver='.$randurl.' untuk memperbarui password anda. Untuk informasi lebih lanjut silahkan hubungi kami di email info@eyesoccer.id
			<br><br>
			Salam Eyesoccer';

			$objMail->send();
			// echo 'Message has been sent';
			echo "true"; 
		} catch (Exception $e) {
			echo "false";
		}
	}
}
