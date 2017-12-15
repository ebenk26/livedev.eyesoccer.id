<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyeme extends CI_Controller {

	public function __construct(){
        parent::__construct();

		    $this->load->model('Eyemarket_model');
		    $this->load->model('Eyeme_model','emod');
			date_default_timezone_set('Asia/Jakarta');
			$this->load->helper(array('form','url','my_helper','html'));
			$this->load->model('Master_model','mod');
			$this->getSetting = $this->mod->getAll('setting');// check if user comming from home
			
			$this->id_member  = @$this->session->userdata('id_member');#id_member login 

			$this->now        = date('Y-m-d G:i:s');

			if(count($this->getSetting) > 0 ){
				$this->data['title'] = $this->getSetting[0]->title;
				$this->data['desc']  = $this->getSetting[0]->description;
			}
			else{
				$this->data['title'] = "";
				$this->data['desc']  = "";

			}
			
    }

	public function index()

	{	
		$this->mod->checkLogin();
		$id_member       = $this->id_member;
		$getImgFollowing = $this->emod->getImgFollowing($id_member);
		#p($getImgFollowing);
		#$arr = array();
		$i = 0;
		if($getImgFollowing > 0 ){
			foreach($getImgFollowing as $k => $v){


			$arr[$i]['id_img'] 		= $v->id_img;
			$arr[$i]['img_caption'] = $v->img_caption;
			$arr[$i]['comment']    = $this->emod->getComment($v->id_img);
			$arr[$i]['id_member']   = $v->id_member;
			$arr[$i]['img_name']    = $v->img_name;
			$arr[$i]['img_thumb']   = $v->img_thumb;
			$arr[$i]['img_alt']     = $v->img_alt;
			$arr[$i]['dp']          = $v->display_picture;
			$arr[$i]['username']    = $v->username;	
			$arr[$i]['last_update'] = $v->last_update;

			$arr[$i]['date_create'] = $v->date_create;
			$arr[$i]['now']        = $this->now;
			$arr[$i]['distance']   = strtotime($this->now) - strtotime($arr[$i]['last_update']);
			$getTime[$i]           = getTime($arr[$i]['distance']);
			$arr[$i]['day']        = $getTime[$i]['day'];
			$arr[$i]['hours']      = $getTime[$i]['hours'];
			$arr[$i]['minute']     = $getTime[$i]['minute'];
			$arr[$i]['secon']      = $getTime[$i]['secon'];
			$arr[$i]['timeString']  = $getTime[$i]['timeString'];

			$i++;	

			}

		}
		else{
			$arr = array();
		}
		
		#p($arr);

		$this->data['id_member']       = $id_member;
		$this->data['imgFollowing']    = $arr;
		
		$this->load->view('eyeme/header',$this->data);
		$this->load->view('eyeme/home',$this->data);
		#$this->load->view('eyeme/')

		/*$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		
		$cmd_ads 	= $this->db->query("select * from tbl_ads")->result_array();
		$i 			= 0;
		foreach($cmd_ads as $ads)
		{
			$e=0;
			foreach($ads as $key => $val)
			{
				$array[$i][$e] =  $val;
				$e++;
			}		
				$i++;
		}

		$data["array"]		= $array;
		$data["page"] 		= "home";
		$data["popup"] 		= $array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		$data["body"] 		= $this->load->view('eyeme/index', $data, true);
		$data["extrascript"]= $this->load->view('eyeme/eyeme_script', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
		*/
	}
	public function profile($id_or_username){
		#p($_SESSION);

		$getUser  = $this->emod->getProfile($id_or_username);
		
		if(count($getUser) > 0 ){

			$whereImg = array('id_member'=> $getUser[0]->id_member,'active'=> '1');
			
			$getImg  		 = $this->mod->getAll('me_img',$whereImg);
			
			$whereFollowing = array('id_member'=> $getUser[0]->id_member,'block'=> 0);
			$getFollowing   = $this->mod->getAll('me_follow',$whereFollowing);

			$whereFollower  = array('id_following'=>$getUser[0]->id_member,'block'=> 0);
			$getFollower    = $this->mod->getAll('me_follow',$whereFollower);
			

			$check          = $this->emod->checkFollowed($this->id_member,$getUser[0]->id_member);
			
			$this->data['checkFollowed'] = $check;
			$this->data['follower'] = $getFollower;
			$this->data['following']= $getFollowing;
			$this->data['getImg']   = $getImg;
			
			$this->data['id_member']     = $getUser[0]->id_member;
			$this->data['username']      = $getUser[0]->username;
			$this->data['bio'] 		     = $getUser[0]->bio;
			$this->data['display_pic']   = $getUser[0]->display_picture;
			$this->data['self']			 = ($getUser[0]->id_member == @$_SESSION['id_member'] ? TRUE : FALSE);

		} 
		else{
			$this->data['getImg'] = array();
			$this->data['err'] = "username not found";
		}
		$this->load->view('eyeme/header',$this->data);
		$this->load->view('eyeme/profile',$this->data);



	}
	
	public function home()
	{
		$data["meta"]["title"] 			= "";
		$data["meta"]["image"] 			= base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"] 	= "Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan database seluruh stakeholders sepakbola Indonesia";
		
		$cmd_ads 	= $this->db->query("select * from tbl_ads")->result_array();

		$i = 0;
		foreach($cmd_ads as $ads)
		{
			$e=0;

			foreach($ads as $key => $val)
			{
				$array[$i][$e] =  $val;
				$e++;
			}

			$i++;
		}

		$data["array"] 			= $array;
		$data["page"] 			= "home";
		$data["popup"] 			= $array[14][3];
		//$data["body"] 		= $this->load->view('home/index', '', true);
		$data["body"]  			= $this->load->view('eyeme/list', $data, true);
		$data["extrascript"] 	= $this->load->view('eyeme/eyeme_script', $data, true);

		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function upload_browse()
	{
		if($_FILES['browsecapture']['size'] > 10485760)
		{
			$return = 'File too large. Maximum file size is 1MB.';		
		}
		else
		{
			$return 	= 'Success.';
			$caption 	= $_POST['caption_browse'];
			$lat 		= $_POST['lat_browse'];
			$lon 		= $_POST['lon_browse'];
			// $name = $_POST['nama'];
			$date 		= date("Y-m-d H:i:s");
			$last_id 	= $_SESSION["member_id"];
			$pic 		= "eyeme-".rand("1000","9999")."-".$_FILES['browsecapture']['name'];
			$pic 		= preg_replace('/\s+/', '', $pic);

			move_uploaded_file($_FILES['browsecapture']['tmp_name'], "systems/img_storage/".$pic);
					
			// if(!mysqli_query($con,"INSERT INTO tbl_member (name,ip_address,join_date,active) values ('".$name."','".$_SERVER['REMOTE_ADDR']."','".$date."','1')")){
				// $return .= 'Failed upload member.';
			// }
			// if (mysqli_insert_id($con) != 0) {
				// $last_id = mysqli_insert_id($con);
			if(!$this->db->query("	INSERT INTO
										tbl_gallery(title, tags, pic, thumb1, lat, lon, upload_date, publish_by, publish_type, upload_user)
									values
										('".$caption."','eyeme','".$pic."','".$pic."','".$lat."','".$lon."','".$date."','member','public','".$last_id."')"
								))
			{
				$return = 'Failed upload gallery.';
			}
			// } else {
				// $return .= "Error: "  . $con->error;
			// }
		}

		echo $return;	
		
	}
	
	public function upload()
	{
		if($_FILES['cameracapture']['size'] > 10485760)
		{
			$return = 'File too large. Maximum file size is 1MB.';		
		}
		else
		{
			$return 	= 'Success.';
			$caption 	= $_POST['caption'];
			$lat 		= $_POST['lat'];
			$lon 		= $_POST['lon'];
			// $name = $_POST['nama'];
			$date 		= date("Y-m-d H:i:s");
			$last_id 	= $_SESSION["member_id"];
			$pic 		= "eyeme-".rand("1000","9999")."-".$_FILES['cameracapture']['name'];
			$pic 		= preg_replace('/\s+/', '', $pic);

			move_uploaded_file($_FILES['cameracapture']['tmp_name'], "systems/img_storage/".$pic);
					
			// if(!mysqli_query($con,"INSERT INTO tbl_member (name,ip_address,join_date,active) values ('".$name."','".$_SERVER['REMOTE_ADDR']."','".$date."','1')")){
				// $return .= 'Failed upload member.';
			// }
			// if (mysqli_insert_id($con) != 0) {
				// $last_id = mysqli_insert_id($con);
			if(!$this->db->query("	INSERT INTO
										tbl_gallery (title, tags, pic, thumb1, lat, lon, upload_date, publish_by, publish_type, upload_user)
									values ('".$caption."','eyeme','".$pic."','".$pic."','".$lat."','".$lon."','".$date."','member','public','".$last_id."')"
								))
			{
				$return = 'Failed upload gallery.';
			}
			// } else {
				// $return .= "Error: "  . $con->error;
			// }
		}
		echo $return;
	}

	public function login()
	{
		if($this->input->post('username') != FALSE)
		{
	      $username 	= $this->input->post('username');
	      $password 	= $this->input->post('pass');
	      $password     = cryptPass($password);

	      $getUser      = $this->mod->getAll('tbl_member',array('name'=> $username,'password'=> $password));
	      #p($getUser);
	      $user_id 		= $getUser[0]->id_member;
	      $getProf      = $this->mod->getAll('me_profile',array('id_member'=> $user_id));

	      $email 		= $getUser[0]->email;
	     echo $username.$password;

	      if($getUser[0]->id_member=="" && $getUser[0]->password=="" AND count($getProf) <=  0 )
	      {
			 // print_r($_POST);
			//  exit;
			echo 'error';
	      	#redirect('eyeme/konten');  
	      }
	      else
	      {
	      	$this->session->set_userdata('id_member',$user_id);
	      	$this->session->set_userdata('email',$email);
	      	$this->session->set_userdata('username',$getProf[0]->username);
	      	$this->session->set_userdata('dp',$getProf[0]->display_picture);
	      	// $_SESSION['member_id'] 	= 	$user_id;
	      	echo 'success';
	      	#redirect('eyeme/explore');
	      }  
      	}	
	}

	public function logout()
	{
		session_destroy();
		redirect('eyeme/explore');
	}

	public function explore()
	{
		$data['konten'] 	= $this->Eyeme_model->get_all_konten();

		$this->load->view('/eyeme/konten',$data);
	}

	public function addKomentar()
	{
		$member 	= $_POST['id_user'];
		$id_eyeme 	= $_POST['id_eyeme'];
		$isi 	 	= $_POST['isi'];

		$data = array(
				'id_member' => $member,
				'id_eyeme' => $id_eyeme,
				'isi' => $isi,
				'created_date' => date("Y-m-d H:i:s"),
			);
		$insert = $this->Eyeme_model->add_komentar($data);

		if ($insert)
		{
			$nama = $this->db->query("	SELECT
											name
										FROM 
											tbl_member
										WHERE 
											id_member = ".$member."
									")->row();

			echo json_encode(array('status'=>'1','isi'=>$isi,'name'=>$nama->name));
		}
		else
		{
			echo json_encode(array('status'=>'0'));
		}
	}

	public function upload_foto()
	{ 
		$this->load->library('session');
		$config['upload_path'] = "./gambar/";
		$config['allowed_types'] = '*';
		$config['max_size']  = '10000';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->upload->initialize($config);

// var_dump($_FILES);exit();
		if (!$this->upload->do_upload('berkas')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            redirect('eyeme/explore');
        }
        else
        { 	
        	$this->load->library('session'); 
            $result = $this->upload->data();

        	$object = 	array(
        				'id_member' => $this->session->userdata('member_id'),
        				'gambar' => $result['file_name'],
        				'keterangan' => 'Null',
        				'suka' => '0',
        				'created_date' => date("Y-m-d H:i:s"),
        	);

        	$insert 	= $this->db->insert('tbl_eyeme', $object);
        	$last_id 	= $this->db->insert_id();

            //$this->session->set_flashdata('message','Gambar berhasil di upload'); 
            redirect('eyeme/edit_konten/'.$last_id);
        }

		//$this->load->view('/eyeme/cobafoto');

	}

	public function edit_konten($id_eyeme)
	{
		$data['konten'] = $this->Eyeme_model->get_konten($id_eyeme);

		$this->load->view('eyeme/edit_konten', $data);
	}

	public function action_post($id)
	{
		$img = $this->input->post('base');
		$img = str_replace('data:image/jpeg;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$fileData = base64_decode($img);
		$nama = 'ampun'.$id.'.png';
		$file = "gambar/" . $nama;
		$sukses = file_put_contents($file, $fileData);

		$object = 	array(
					'keterangan' => $this->input->post('keterangan'),
					'base' => $nama,
					);

		$this->db->where('id', $id);
		$this->db->update('tbl_eyeme', $object);

		redirect('eyeme/explore');
	}

	public function discard_post($id)
	{
		$model 		= $this->db->get_where('tbl_eyeme', array('id'=>$id))->row();
		$filenya 	= './gambar/'.$model->gambar;
		$hapus 		= unlink($filenya);

		$this->db->delete('tbl_eyeme', array('id' => $id));
		redirect('eyeme/explore');
	}
	public function follow(){


		$id_member  = $this->session->userdata('id_member');
		$id_friend  = inputSecure($this->input->post('id_friend'));
		$insert     = $this->emod->follow($id_member,$id_friend);
		if($insert == TRUE){
			echo 'success';

		}
		else{
			echo 'false';
		}
	}

	public function add_friend($id_yg_diajak)
	{
		$id_yg_mengajak 	= $this->session->userdata('member_id');

		$data = array(
				'id_pengajak' => $id_yg_mengajak,
				'id_diajak' => $id_yg_diajak,
				'created_date' => date("Y-m-d H:i:s"),
				'status' => 1,
		);

		$this->db->insert('tbl_friend', $data);

		redirect('eyeme/explore');
	}

	public function unfriend($id_yg_diajak)
	{
		$id_yg_mengajak 	= $this->session->userdata('member_id');

		$data = array(
				'unfriend_by' => $id_yg_mengajak,
				'unfriend_date' => date("Y-m-d H:i:s"),
				'status' => 0,
		);

		$this->db->where('id_pengajak', $id_yg_mengajak);
		$this->db->where('id_diajak', $id_yg_diajak);
		$this->db->update('tbl_friend', $data);

		redirect('eyeme/explore');
	}

	public function addLike()
	{
		$id_user 	= $_POST['id_user'];
		$id_eyeme 	= $_POST['id_eyeme'];

		$data = array(
				'id_member' => $id_user,
				'id_eyeme' => $id_eyeme,
				'created_date' => date("Y-m-d H:i:s"),
		);

		$insert 		= $this->Eyeme_model->add_suka($data);
		$count_like 	= $this->Eyeme_model->count_suka($id_eyeme);
		$update_eyeme 	= $this->Eyeme_model->update_eyeme($id_eyeme,$count_like);

		if ($insert)
		{

			echo json_encode(array('status'=>'1','banyak_suka'=>$count_like));
		}
		else
		{
			echo json_encode(array('status'=>'0'));
		}
	}

	public function tesEmail()
	{
		$config = Array(  
		    'protocol' => 'smtp',  
		    'smtp_host' => 'ssl://smtp.googlemail.com',  
		    'smtp_port' => 465,  
		    'smtp_user' => 'eyesoccerindonesia@gmail.com',   
		    'smtp_pass' => 'BolaSepak777#',   
		    'mailtype' => 'html',   
		    'charset' => 'iso-8859-1'  
		   );  
			$this->email->initialize($config);
		   $this->load->library('email');  
		   $this->email->set_newline("\r\n");  
		   $this->email->from('info@eyesoccer.id', 'Info EyeSoccer');   
		   $this->email->to('robidummy665@gmail.com');   
		   $this->email->subject('Percobaan email');   
		   $this->email->message('cobaaaaaaaa');  
		   if (!$this->email->send()) {  
		    show_error($this->email->print_debugger());   
		   }else{  
		   	// var_dump($this->email);exit();
		    echo 'Success to send email';   
		   }    
		
	}
	public function testLogin(){
		$this->load->view('eyeme/formlogin');
	}
	public function testupload(){
		$this->load->view('eyeme/cobafoto');
	}
	public function like(){
		$res =  $this->emod->like('1');
		p($res);

	}
	public function test(){
		$res = $this->emod->getComment(4);
		p($res);
		#$res = $this->emod->getImgFollowing('189');
		#p($res);
	}
	public function post_comment(){
		$id_img = inputSecure($this->input->post('img'));
		$id_member = $this->id_member;
		$comment   = inputSecure($this->input->post('comment'));
		$now       = $this->now;
		$data      = array('id_member'=> $id_member,
							'id_img'  => $id_img,
							'comment' => $comment,
							'date_create' => $now,
							'last_update' => $now);
		$exe       = $this->db->insert('me_comment',$data);
		if($exe == TRUE){

			$json = json_encode($data);
			echo $json;

		}

	}
	public function sess(){
		p($_SESSION);
	}
	
	
}
