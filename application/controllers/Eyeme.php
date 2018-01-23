<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyeme extends CI_Controller {

	public function __construct(){
        parent::__construct();
        	#sw::begin 
		    $this->load->model('Eyemarket_model');
		    $this->load->model('Eyeme_model','emod');
			date_default_timezone_set('Asia/Jakarta');
			$this->load->helper(array('form','url','my_helper','html'));
			$this->load->model('Master_model','mod');
			$this->load->helper('path');
			$this->getSetting = $this->mod->getAll('setting');
			$this->id_member  = @$this->session->userdata('id_member');#id_member login 
			$this->username   = @$this->session->userdata('username');
			/*
				variabel userdata
			*/
			$this->data['id_member']   = $this->id_member;
			$this->data['myusername']  = $this->username;


			if(count($this->getSetting) > 0 ){
				$this->data['title'] = $this->getSetting[0]->title;
				$this->data['desc']  = $this->getSetting[0]->description;
			}
			else{
				$this->data['title'] = "";
				$this->data['desc']  = "";

			}
			
    }

	public function index(){
	#echo $this->id_member;	
		$this->mod->checkLogin();// check if user comming from home
		#exit;
		$id_member       = $this->id_member;
		$getImgFollowing = $this->emod->getImgFollowing($id_member);
		
		$i   = 0;
		$arr = array(); #data gambar yang di follow oleh user yang login 
		if($getImgFollowing > 0 ){

			foreach($getImgFollowing as $k => $v){
				$where = array('id_gallery'=> $v->profile_pic);
				$select = array('pic');
				$getPic = $this->mod->getAll('tbl_gallery',$where,$select);

				$arr[$i]['id_img'] 		= $v->id_img;
				$arr[$i]['img_caption'] = $v->img_caption;
				$arr[$i]['comment']     = $this->emod->getComment($v->id_img); #mengambil komentar berdasarkan id_img
				$arr[$i]['like']        = $this->emod->getLike($v->id_img); #mengambil like Berdasarikan id_img
				$arr[$i]['has_like']    = $this->emod->hasLike($this->id_member,$v->id_img);#check kondisi like
				$arr[$i]['id_member']   = $v->id_member;
				$arr[$i]['img_name']    = $v->img_name;
				$arr[$i]['img_thumb']   = $v->img_thumb;
				$arr[$i]['img_alt']     = $v->img_alt;
				$arr[$i]['dp']          = (count($getPic) > 0 ? $getPic[0]->pic : '');
				$arr[$i]['username']    = $v->username;	
				$arr[$i]['last_update'] = $v->last_update;
				$arr[$i]['date_create'] = $v->date_create;
				$arr[$i]['now']         = NOW;
				$arr[$i]['distance']    = getDistance(NOW,$arr[$i]['last_update']);#jarak waktu 
				$getTime[$i]            = getTime($arr[$i]['distance']); #mengambil waktu last_update
				$arr[$i]['day']         = $getTime[$i]['day'];
				$arr[$i]['hours']       = $getTime[$i]['hours'];
				$arr[$i]['minute']      = $getTime[$i]['minute'];
				$arr[$i]['secon']       = $getTime[$i]['secon'];
				$arr[$i]['timeString']  = $getTime[$i]['timeString'];
				$i++;	
			}
		}	
		
		$this->data['id_member']       = $id_member;
		$this->data['myusername']      = $this->username;
		$this->data['imgFollowing']    = $arr;
		$this->data['usr']	           = $this->get_all_user($id_member);
		$this->load->view('eyeme/home',$this->data);	
		
	}
	/**
		*fungsi profile::
		*@param id_or_username 

	*/
	public function profile($id_or_username = ''){
		
		$getUser  = $this->emod->getProfile($id_or_username);
		
		if(count($getUser) > 0 ){
			$usr  = $getUser[0];
			//get Image 
			$whereImg = array('id_member'=> $usr->id_member,'active'=> '1');
			$getImg  		= $this->mod->getAll('me_img',$whereImg,'',array('last_update'=>'DESC'));
			//get following 
			$whereFollowing = array('id_member'=> $usr->id_member,'block'=> '0');
			$getFollowing   = $this->mod->getAll('me_follow',$whereFollowing);
			//get follower
			$whereFollower  = array('id_following'=>$usr->id_member,'block'=> '0');
			$getFollower    = $this->mod->getAll('me_follow',$whereFollower);
		
			$check          = $this->checkFollowed($this->id_member,$usr->id_member);
			//mengambil jumlah comment dan jumlah like setiap gambar 

			for($i = 0; $i < count($getImg); $i++){
				$like  = $this->mod->getAll('me_like',
							array('id_img' => $getImg[$i]->id_img),
							array('id_img'));
				$comment = $this->mod->getAll('me_comment',
							array('id_img' => $getImg[$i]->id_img),
							array('id_img'));
				$getImg[$i]->countLike = count($like);
				$getImg[$i]->countComment = count($comment);

			}
			#p($usr);
			$this->data['checkFollowed'] = $check;
			$this->data['follower'] 	 = $getFollower;
			$this->data['following']	 = $getFollowing;
			$this->data['getImg']   	 = $getImg;
			$this->data['id_member']     = $usr->id_member;
			$this->data['username']      = $usr->username;
			$this->data['bio'] 		     = $usr->bio;
			$this->data['display_pic']   = $usr->display_picture;
			$this->data['self']			 = ($usr->id_member == @$_SESSION['id_member'] ? TRUE : FALSE);
			#jika yang mengunjungi profile diri sendiri

		} 
		else{
			$this->data['getImg'] = array();
			$this->data['err'] = "username not found";
			redirect(MEURL,'refresh');
		}
		//$this->data['foll'] = $this->get_follow();
		$this->data['uri_segment'] = $this->uri->segment(2);	
		$this->load->view('eyeme/profile',$this->data);
	}
	public function create_profile($id_or_username){
		echo $id_or_username;
		$this->load->view('eyeme/header',$this->data);
		$this->load->view('eyeme/footer',$this->data);


	}
	/**
		*fungsi post komentar ke database
	*/
	public function post_comment(){
		$id_img    = inputSecure($this->input->post('img'));
		$id_member = $this->id_member;
		$comment   = inputSecure($this->input->post('comment'));
		$now       = NOW;
		$data      = array('id_member'=> $id_member,
							'id_img'  => $id_img,
							'comment' => $comment,
							'date_create' => $now,
							'last_update' => $now);
		$exe       = $this->emod->postComment($data);
		echo $exe; 
		
	}
	/**
		*fungsi follow::
	*/
	public function follow(){

		$id_friend  = inputSecure($this->input->post('id_friend'));
		$exe        = $this->emod->follow($this->id_member,$id_friend);
		$response   = array('msg' => 'success',
							'follower' => $exe['follower'],
							'following'=> $exe['following']);
		$json = json_encode($response);
		echo $json;
		
	}
	/**
		*fungsi unfollow::
	*/
	public function unfollow(){

		$id_friend = inputSecure($this->input->post('id_friend'));
		$exe       = $this->emod->unFollow($this->id_member,$id_friend);
		$response  = array('msg' => 'success',
							'follower' => $exe['follower'],
							'following'=> $exe['following']);
		$json = json_encode($response);
		echo $json;
		
	}
	/**
		*fungsi get_follow::
			
	*/
	public function get_follow($id = ''){
		$get = $this->input->get('data');
		$id  = ($id == '' ? $this->input->get('id'): $this->id_member);
		$res = $this->emod->getFollow($id,$get);
		for($i = 0; $i <count($res);$i++){
			#echo '<script>alert(\''.$res[$i]->id_member_fol.'\')</script>';
			
			$checkFol  = $res[$i]->checkFollowed;
			$attr[$i]  = 
				array('onclick'=> 'folclick(this.id,\''.($checkFol == TRUE ? 'followed':'notfollowed').'\')',
					'id'=>'c12i'.$res[$i]->id_member_fol);
			$checkSelf = $this->checkSelf($this->id_member,$res[$i]->id_member_fol);
			$res[$i]->btnFol = btnFol($this->id_member,$checkFol,$attr[$i],'btn-fol',$checkSelf);
		}
		$response = json_encode($res);
		echo  $response;
	}
	/**
		*fungsi checkFollowed::
		*@param id_member = id_member has login
		*@param id_follow = id user yang akan di check mengikuti atau tidak 
		*@return bool 

	*/
	public function checkFollowed($id_member,$id_follow){
		$check = $this->emod->checkFollowed($id_member,$id_follow);
		return $check;
	}
	public function checkSelf($id_member,$id_follow){
		if($id_member === $id_follow){
			return true;
		}
		else return false;

	}

	/**

		*fungsi get_img::
		*untuk mengambil gambar 
		*@response Json

	*/
	public function get_img(){
		$id_img  = $this->input->post('id');
		if(!$id_img){
			redirect(MEURL,'refresh');
			exit;
		}
		$img = $this->emod->getAllImg($id_img);
		
		$json = json_encode($img);
		
		echo $json;

	}
	/**
		*fungsi get_notif::
	*/
	public function get_notif(){
		$this->mod->checkLogin();// check if user comming from home
		$id_member   = $this->id_member;
		$dataNotif = $this->emod->getNotif($id_member);
		
		if(count($dataNotif) > 0 ){ #check result dataNotif
			$j=0;
			foreach($dataNotif as $k => $v){
				$where      = array('id_gallery'=> $v->profile_pic);
				$profile    = $this->mod->getAll('tbl_gallery',$where,array('pic'));
				$sub[$j][0] = substr($v->notif_type,0,3);
				$sub[$j][1] = substr($v->notif_type,3);
				$distance    = getDistance(NOW,$v->last_update);
				$getTime     = getTime($distance);
				$dataNotif[$j]->timeString = $getTime['timeString'];
				$dataNotif[$j]->display_picture = (count($profile) > 0 ? $profile[0]->pic : '');
				
				$j++;

			}

		}
		
		$json = json_encode($dataNotif);
		echo $json;
		
	}
	/**

		fungsi upload_img::
		upload image dari base64 

	*/
	public function upload_img(){
		if(count($this->input->post()) > 0 ){ 
			$imageData  = $this->input->post('imageData');
			$imageData  = str_replace('data:image/png;base64,', '', $imageData);
			$imageData  = str_replace(' ', '+', $imageData);
			$image      = base64_decode($imageData);
			$fileName   = date('dmYhis').'.'.'jpeg';
			$path       = set_realpath('img/eyeme');
			file_put_contents($path.$fileName, $image);
			$caption    = inputsecure($this->input->post('caption'));
			$this->mod->resizeImg($path.$fileName,300,300);
			$insert     = $this->emod->insertImg($fileName,$caption,$this->id_member);
			if(!$insert){
				echo 'error';
			}
			else{
				echo 'Berhasil Upload Foto';
			}
		}
		else{
			echo 'ACCESS DENIED';
		}

		

	}
	public function get_all_user($id_member){
		$select = array('id_member','name','username','fullname','email','profile_pic');
		$order  = array('last_online','DESC');
		$allUsr = $this->mod->getAll('tbl_member','',$select,$order,'5','',array('id_member',array($id_member)));
	
		for($i= 0; $i <count($allUsr); $i++){
			$where = array('id_gallery'=> $allUsr[$i]->profile_pic);
			$getPP = $this->mod->getAll('tbl_gallery',$where,array('pic','thumb1'));
			$allUsr[$i]->profile_pic = (count($getPP) > 0 ? $getPP[0]->pic:'');
			$allUsr[$i]->followed  = ($this->emod->checkFollowed($this->id_member,$allUsr[$i]->id_member) == true ? '1':'0');
			$allUsr[$i]->btnFol = btnFol($allUsr[$i]->id_member,$allUsr[$i]->followed);

		}

		return $allUsr;


	}
	public function upload_profile(){


	}
	/**
	*fungsi img::
	*@param @id_img select id_img

	*/
	public function img($id_img){
		$getImg               = $this->emod->getAllImg($id_img);
		$this->data['img']    = $getImg;
		#p($hasLike);
		$this->load->view('eyeme/image',$this->data);	
	}
	/**
		*fungsi explore::
	*/
	public function explore(){
		$this->data['ex'] = $this->emod->getExplore();
		
		$this->load->view('eyeme/explore',$this->data);

	}
	
	
	/**
	*insert like::
	*@param $id_img = id image yang di sukai
		
	*/
	public function like(){
		$id_img = $this->input->post('id');
		$this->emod->addLike($this->id_member,$id_img);
		$getLike = $this->mod->getAll('me_like',array('id_img'=> $id_img));
		echo count($getLike);

	}
	/*
	*fungsi unlike::
	*/
	public function unlike(){
		$id_img = $this->input->post('id');
		$this->db->where('id_member',$this->id_member);
		$this->db->where('id_img',$id_img);
		$this->db->delete('me_like');
		$getLike = $this->mod->getAll('me_like',array('id_img'=> $id_img));
		echo count($getLike);

	}
	public function get_like($id_img){
		$data  = $this->emod->getAll('me_like',array('id_img'=> $id_img));
		$this->load->view('eyeme/like',$data);

	}
	public function test_notif(){
		$this->load->view('eyeme/test');
	}

	public function discard_post($id_img){
		$where = array('id_img'=> $id_img);
		$img = $this->mod->getAll('me_img',$where,array('id_img','img_name','img_thumb'));
		if(count($img) > 0 ){
			$imgName = $img[0]->img_name;
			$imgThumb = $img[0]->img_thumb;
			$id_img   = $img[0]->id_img;
			@unlink(IMGPATH.$imgName) OR die ('gagal delete image');
			@unlink(IMGPATH.$imgThumb) OR die ('gagal delete thumb');
			$this->emod->rm('me_img',array('id_img'=> $id_img));
			$arr = array('msg'=> 'success');
			$response  = json_encode($arr);
			echo $response;

		}
		else{
			$arr = array('msg'=> 'failed','error'=> 'gambar tidak ditemukan');
			$response = json_encode($arr);
			echo $response;
		}

	}
	/**
	sw::end
	*/
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
	      p($getUser);
	      $user_id 		= $getUser[0]->id_member;
	      $getProf      = $this->mod->getAll('me_profile',array('id_member'=> $user_id));

	      $email 		= $getUser[0]->email;
	     echo $username.$password;
	     #redirect(MEURL,'refresh');

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

	/*public function explore(){
		$data['konten'] 	= $this->emod->get_all_konten();

		$this->load->view('/eyeme/konten',$data);
	}*/

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
	
	public function test(){
		$res = $this->emod->getComment(4);
		p($res);
		#$res = $this->emod->getImgFollowing('189');
		#p($res);
	}
	
	public function sess(){
		p($this->session->userdata());
	}
	public function destroy_sess(){
		session_destroy();
		echo 'success';
	}
	
	
}
