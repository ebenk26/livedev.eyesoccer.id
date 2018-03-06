<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		// direct_m();
        // $this->load->model('Eyemarket_model');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Home_model');
        $this->load->model('Master_model', 'mod');
        $this->load->model('Eyeme_model', 'emod');
        $this->load->helper(array('form', 'url', 'text', 'date'));
        $this->load->helper('my');
        $this->load->library("PHPMailer_Library");
    }

    public function index()
    {
        $data["meta"]["title"] = "";
        $data["meta"]["image"] = base_url() . "/assets/img/tab_icon.png";
        $data["meta"]["description"] = "Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";

        // $cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
        // $i=0;
        // foreach($cmd_ads as $ads){
        // $e=0;
        // foreach($ads as $key => $val)
        // {
        // $array[$i][$e] =  $val;
        // $e++;
        // }
        // $i++;
        // }
        // $data["array"]=$array;
        // $data["page"]="home";
        // $data["popup"]=$array[14][3];

        $data['jadwal'] = $this->Home_model->get_all_jadwal();
        $data['jadwal_2'] = $this->Home_model->get_all_jadwal_2();
        $data['trend_eyetube'] = $this->Home_model->get_trending_eyetube();
        $data['trend_eyenews'] = $this->Home_model->get_trending_eyenews();
        $data['profile_club'] = $this->Home_model->get_profile_club();
        $data['profile_club_2'] = $this->Home_model->get_profile_club_2();
        $data['profile_club_3'] = $this->Home_model->get_profile_club_3();
        $data['profile_player'] = $this->Home_model->get_player_random();
        $data['profile_player_2'] = $this->Home_model->get_player_random_2();
        $data['profile_player_3'] = $this->Home_model->get_player_random_3();
        $data['video_eyetube'] = $this->Home_model->get_eyetube_satu();
        $data['eyetube_science'] = $this->Home_model->get_eyetube_science();
        $data['eyetube_stars'] = $this->Home_model->get_eyetube_stars();
        $data['eyetube_kamu'] = $this->Home_model->get_eyetube_kamu();
        $data['eyetube_populer'] = $this->Home_model->get_eyetube_populer();
        $data['eyenews_main'] = $this->Home_model->get_eyenews_main();

        $news_type = $data['eyenews_main']->news_type;
        $data['eyenews_similar'] = $this->Home_model->get_eyenews_similar($news_type);
        $data['eyenews_muda'] = $this->Home_model->get_eyenews_muda();
        $data['eyenews_populer'] = $this->Home_model->get_eyenews_populer();
        $data['eyenews_rekomendasi'] = $this->Home_model->get_eyenews_rekomendasi();

        // ===== eyevent
        $data['eyevent_main'] = $this->Home_model->get_eyevent_main();
        $data['eyevent_main_2'] = $this->Home_model->get_eyevent_main_2();
        $data['eyevent_main_3'] = $this->Home_model->get_eyevent_main_3();

        $data['jadwal_today'] = $this->Home_model->get_jadwal_today();
        $data['jadwal_tomorrow1'] = $this->Home_model->get_jadwal_tomorrow1();
        $data['jadwal_tomorrow2'] = $this->Home_model->get_jadwal_tomorrow2();
        $data['jadwal_yesterday'] = $this->Home_model->get_jadwal_yesterday();
        $data['jadwal_tomorrow'] = $this->Home_model->get_jadwal_tomorrow();
        $data['eyemarket_main'] = $this->Home_model->get_eyemarket_main();
        $data['klasemen'] = $this->Home_model->get_klasemen();
        $data['products'] = $this->Home_model->get_all_product();
        $data['kompetisi'] = array(array('competition' => 'Liga Inggris', 'value' => 'liga_inggris'), array('competition' => 'Liga Italia', 'value' => 'liga_italia'), array('competition' => 'Liga Spanyol', 'value' => 'liga_spanyol'), array('competition' => 'Liga Indonesia 1', 'value' => 'liga_indonesia'));
        $data['kanal'] = "home";
        $data['imgEyeme'] = $this->emod->getImgUser();

        $data["body"] = $this->load->view('home/index', $data, TRUE);
        $this->load->view('template/static', $data);

        //$data["body"]=$this->load->view('home/index2', $data, true);
        //$this->load->view('template-front-end',$data);

    }

    /* public function tentang_kami()
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
    } */
    public function member_area()
    {
        if (isset($_SESSION["id_member"])) {
            $data["meta"]["title"] = "";
            $data["meta"]["image"] = base_url() . "/assets/img/tab_icon.png";
            $data["meta"]["description"] = "Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";

            $cmd_ads = $this->db->query("select * from tbl_ads")->result_array();
            $i = 0;
            foreach ($cmd_ads as $ads) {
                $e = 0;
                foreach ($ads as $key => $val) {
                    $array[$i][$e] = $val;
                    $e++;
                }
                $i++;
            }

            $data["array"] = $array;
            $data["page"] = "home";

            $data["popup"] = $array[13][3];
            $check = $this->Home_model->get_check_member();
            $profile = $this->Home_model->get_profile_member();

            if ($check->num_rows() > 0) {
                $pm = $check->row_array();
                $get_player = $this->Home_model->get_player_member($pm["id_player"]);
            } else {
                $pm['active'] = 0;
                $get_player = '';
            }
            // var_dump($profile);exit();
            $profile_pic = $this->Home_model->get_pic_member();
            $gallery = $this->Home_model->get_galleri_member();

            if (isset($profile_pic["profile_pics"]) && $profile_pic["profile_pics"] != "") {
                $data["pic"] = $profile_pic["profile_pics"];
            } else {
                $data["pic"] = "no-person.jpg";
            }
            $data["check"] = $check;
            $data["pm"] = $pm;
            $data["get_player"] = $get_player;
            $data["profile"] = $profile;
            $data["gallery"] = $gallery;
            $data["kanal"] = "home";
            // $data["extrascript"]=$this->load->view('home/script_member_area', $data, true);
            $data["body"] = $this->load->view('home/member-area', $data, true);
            //$this->load->view('template-front-end',$data);
            $this->load->view('template/static', $data);
        } else {
            redirect("home/index");
        }
    }

    public function logout()
    {
        $id_member = $_SESSION['id_member'];
        $this->db->query("update tbl_member set last_online='" . NOW . "' where id_member='" . $id_member . "'");
        unset($_SESSION["id_member"], $_SESSION["user_id"]);
        session_destroy();
        redirect("home/index");
    }

    public function request_player()
    {
        $file_ktp = null;
        $file_akte = null;
        $file_passport = null;
        $file_ijazah = null;
        $file_bukurek = null;
        $file_srtrekssb = null;
        $path = ($_SERVER['SERVER_NAME'] == 'localhost') ? pathUrl() . "img/img_storage/" : IMGSTORAGE . '/';
        if (isset($_FILES['file_ktp']['name']) && !empty($_FILES['file_ktp']['name'])) {
            $file_name = file_name('file_ktp');
            $file_ktp = "player_member-" . $file_name;
            move_uploaded_file($_FILES['file_ktp']['tmp_name'], $path . 'ori_' . $file_ktp);
        }

        if (isset($_FILES['file_akte']['name']) && !empty($_FILES['file_akte']['name'])) {
            $file_name = file_name('file_akte');
            $file_akte = "player_member-" . $file_name;
            move_uploaded_file($_FILES['file_akte']['tmp_name'], $path . 'ori_' . $file_akte);
        }

        if (isset($_FILES['file_kk']['name']) && !empty($_FILES['file_kk']['name'])) {
            $file_name = file_name('file_kk');
            $file_kk = "player_member-" . $file_name;
            move_uploaded_file($_FILES['file_kk']['tmp_name'], $path . 'ori_' . $file_kk);
        }

        if (isset($_FILES['file_passport']['name']) && !empty($_FILES['file_passport']['name'])) {
            $file_name = file_name('file_passport');
            $file_passport = "player_member-" . $file_name;
            move_uploaded_file($_FILES['file_passport']['tmp_name'], $path . 'ori_' . $file_passport);
        }

        if (isset($_FILES['file_ijazah']['name']) && !empty($_FILES['file_ijazah']['name'])) {
            $file_name = file_name('file_ijazah');
            $file_ijazah = "player_member-" . $file_name;
            move_uploaded_file($_FILES['file_ijazah']['tmp_name'], $path . 'ori_' . $file_ijazah);
        }

        if (isset($_FILES['file_bukurek']['name']) && !empty($_FILES['file_bukurek']['name'])) {
            $file_name = file_name('file_bukurek');
            $file_bukurek = "player_member-" . $file_name;
            move_uploaded_file($_FILES['file_bukurek']['tmp_name'], $path . 'ori_' . $file_bukurek);
        }

        if (isset($_FILES['file_srtrekssb']['name']) && !empty($_FILES['file_srtrekssb']['name'])) {
            $file_name = file_name('file_srtrekssb');
            $file_srtrekssb = "player_member-" . $file_name;
            move_uploaded_file($_FILES['file_srtrekssb']['tmp_name'], $path . 'ori_' . $file_srtrekssb);
        }

        $player_id = (explode(" - ", $_POST["player_id"]));
        if (isset($player_id[2])) {
            $this->db->query("INSERT INTO tbl_member_player SET id_player='" . $player_id[2] . "',id_member='" . $_SESSION["member_id"] . "', add_date='" . date("Y-m-d H:i:s") . "', file_ktp='" . $file_ktp . "', file_akte='" . $file_akte . "', file_kk='" . $file_kk . "', file_passport='" . $file_passport . "', file_ijazah='" . $file_ijazah . "', file_bukurek='" . $file_bukurek . "', file_srtrekssb='" . $file_srtrekssb . "', file_ibukandung='" . $_POST["file_ibukandung"] . "'");
            redirect("home/member_area");
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Nama tidak terdaftar.");';
            echo 'window.location.href = "member_area";';
            echo '</script>';
        }

    }

    /**public function homeBaru()
     * {
     * $data['jadwal']            = $this->Home_model->get_all_jadwal();
     * $data['trend_eyetube']        = $this->Home_model->get_trending_eyetube();
     * $data['trend_eyenews']        = $this->Home_model->get_trending_eyenews();
     * $data['profile_club']        = $this->Home_model->get_profile_club();
     * $data['profile_player']        = $this->Home_model->get_player_random();
     * $data['video_eyetube']        = $this->Home_model->get_eyetube_satu();
     * $data['eyetube_science']    = $this->Home_model->get_eyetube_science();
     * $data['eyetube_stars']        = $this->Home_model->get_eyetube_stars();
     * $data['eyetube_kamu']        = $this->Home_model->get_eyetube_kamu();
     * $data['eyetube_kamu']        = $this->Home_model->get_eyetube_kamu();
     * $data['eyenews_main']        = $this->Home_model->get_eyenews_main();
     *
     * $news_type                    = $data['eyenews_main']->news_type;
     * $data['eyenews_similar']    = $this->Home_model->get_eyenews_similar($news_type);
     * $data['eyenews_muda']        = $this->Home_model->get_eyenews_muda();
     * $data['eyevent_today']        = $this->Home_model->get_jadwal_today();
     * $data['eyevent_yesterday']    = $this->Home_model->get_jadwal_yesterday();
     * $data['eyevent_tomorrow']    = $this->Home_model->get_jadwal_tomorrow();
     *
     * $this->load->view('home1',$data);
     * }**/

    public function login()
    {
        if (isset($_SESSION['id_member']) && $this->session->id_member) {
            header("location:" . base_url() . "home/index");
        } else {
            $data['kanal'] = "registration";
            $data["body"] = $this->load->view('home/registration', $data);
        }
    }

    public function login_session()
    {
        if ($this->input->post('username')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $page = $this->input->post('page');
            $cmd = $this->db->query("select * from tbl_member where email='" . $username . "' and password='" . md5($password) . "' and verification=1");
            $row = $cmd->row_array();
            $user_id = $row['id_member'];
            $cek = $cmd->num_rows();
            if ($cek > 0) {
                if ($row['id_member'] == "" && $row['password'] == "") {

                    header("refresh:0");
                } else {
                    //get eyeme username
                   
                    $this->session->username = $row['username'];

                    //end
                    $_SESSION['member_id'] = $user_id;
                    $_SESSION['id_member'] = $user_id;
                    $_SESSION['img_profile'] = load_top_avatar();;
                    // header("location:".base_url().$page);
                    echo $page;
                }
            } else {
                // header('Refresh:0; url= '. base_url().'home/login');
                // echo "<script>alert('Email atau Password salah')</script>";
                echo "false";
            }
        }
    }

    public function registration()
    {
        $data['kanal'] = "registration";
        $data["body"] = $this->load->view('home/registration', $data);
    }

    public function regis_session()
    {
        $objMail = $this->phpmailer_library->load();
        if ($this->input->post('username')) {
            $query = $this->db->query("select id_member FROM tbl_member WHERE username='" . $this->input->post("username") . "' LIMIT 1");
            $cek = $query->num_rows();
            if ($cek > 0) {
                echo "exist username";
            } else {
                if ($this->input->post('name')) {
                    $this->db->select('id_member');
                    $this->db->where("email='" . $this->input->post("email") . "'");
                    $query2 = $this->db->get('tbl_member');
                    $num = $query2->num_rows();

                    // $ceks = $query2->num_rows();
                    if ($num > 0) {
                        // echo "select * FROM tbl_member WHERE email='".$this->input->post("email")."' LIMIT 1";
                        echo "exist";
                    } else {
                        $randurl = substr(md5(microtime()), rand(0, 26), 5);
                        $this->db->query("INSERT INTO tbl_member (name,username,email,join_date,member_type,unique_code,password,verification) values ('" . $this->input->post("name") . "','" . strtolower($this->input->post("username")) . "','" . $this->input->post("email") . "','" . date("Y-m-d H:i:s") . "','Regular','" . $randurl . "','" . md5($this->input->post("password")) . "','1')");
                        $insert_id = $this->db->insert_id();
                        $id = $insert_id;

                        // try {
                        ////Server settings
                        //$objMail->SMTPOptions = array(
                        //	'ssl' => array(
                        //	'verify_peer' => false,
                        //	'verify_peer_name' => false,
                        //	'allow_self_signed' => true
                        //	)
                        //);
                        //// $objMail->SMTPDebug = 2;                                 // Enable verbose debug output
                        //$objMail->isSMTP();                                      // Set objMailer to use SMTP
                        //$objMail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                        //$objMail->SMTPAuth = true;                               // Enable SMTP authentication
                        //$objMail->Username = 'eyesoccerindonesia@gmail.com';                 // SMTP username
                        //$objMail->Password = 'BolaSepak777#';                           // SMTP password
                        //$objMail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                        //$objMail->Port = 465;                                    // TCP port to connect to
                        //
                        ////Recipients
                        //$objMail->setFrom('info@eyesoccer.id', 'Info Eyesoccer');
                        //$objMail->addAddress("".$this->input->post("email")."");               // Name is optional
                        //$objMail->addReplyTo('info@eyesoccer.id', 'Info Eyesoccer');
                        //$objMail->addBCC('ebenk.rzq@gmail.com');
                        //
                        ////Content
                        //$objMail->isHTML(true);                                  // Set eobjMail format to HTML
                        //$objMail->Subject = 'Registrasi Member Eyesoccer';
                        //$objMail->Body    = 'Kepada '.$this->input->post("name").',<br>Registrasi anda telah berhasil.<br>Silahkan klik link berikut '.base_url().'/verifikasi?ver='.$randurl.' untuk verifikasi. Untuk informasi lebih lanjut silahkan hubungi kami di email info@eyesoccer.id
                        //<br><br>
                        //Salam Eyesoccer';

                        $message = 'Kepada ' . $this->input->post("name") . ',<br>Registrasi anda telah berhasil.<br>Silahkan klik link berikut ' . base_url() . '/verifikasi?ver=' . $randurl . '
							//	    untuk verifikasi. Untuk informasi lebih lanjut silahkan hubungi kami di email info@eyesoccer.id <br><br> Salam Eyesoccer';
                        //
                        //$send = array('to' => $this->input->post("email"), 'subject' => 'Registrasi Member Eyesoccer', 'message' => $message);
                        //send_email($send);

                        /* $objMail->send();
                        // echo 'Message has been sent';
                        echo "true";  */
                        /* } catch (Exception $e) {
                            // echo 'Message could not be sent.';
                            // echo 'objMailer Error: ' . $objMail->ErrorInfo;
                            $this->db->query("delete from tbl_member where id_member=".$id."");
                            echo "false";
                        } */
                        /* if ($objMail->send())
                        { */
                        // echo "true";
                        /* }
                        else
                        {
                            $this->db->query("delete from tbl_member where id_member=".$id."");
                            // echo "false";
                            echo "Mailer Error: " . $objMail->ErrorInfo;
                        } */
                        $to = $this->input->post("email");
                        $subject = "Registrasi Member Eyesoccer";
                        $send_mail = send_mail($to, $subject, $message);
                        if ($send_mail) {
                            echo "true";
                        } else {
                            $this->db->query("delete from tbl_member where id_member=" . $id . "");
                            // echo "false";
                            echo "Mailer Error: " . $objMail->ErrorInfo;
                        }
                    }
                }
            }
        } else {
            echo "false";
        }
    }

    function test_email()
    {
        $randurl = substr(md5(microtime()), rand(0, 26), 5);
        $message = 'Kepada kharizuno@yahoo.com,<br>Registrasi anda telah berhasil.<br>Silahkan klik link berikut ' . base_url() . '/verifikasi?ver=' . $randurl . '
			untuk verifikasi. Untuk informasi lebih lanjut silahkan hubungi kami di email info@eyesoccer.id <br><br> Salam Eyesoccer';

        $send = array('to' => 'kharizuno@yahoo.com', 'subject' => 'Registrasi Member Eyesoccer', 'message' => $message);
        send_email($send);
    }

    public function forgot_password()
    {
        if (isset($_SESSION['id_member']) && $this->session->id_member) {
            header("location:" . base_url() . "home/index");
        } else {
            $data['kanal'] = "forgot_password";
            $data["body"] = $this->load->view('home/forgot_password', $data);
        }
    }

    public function forgot_pwd_session()
    {
        $objMail = $this->phpmailer_library->load();
        $email = $this->input->post("email");

        $randurl = substr(md5(microtime()), rand(0, 26), 5);
        $data = array(
            'unique_code' => $randurl
        );

        $this->db->where('email', $email);
        $this->db->update('tbl_member', $data);

        /* try {
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
        } */
        $to = $this->input->post("email");
        $subject = "Forgot Password Eyesoccer";
        $message = 'Silahkan klik link berikut ' . base_url() . 'forgot_ver?ver=' . $randurl . ' untuk memperbarui password anda. Untuk informasi lebih lanjut silahkan hubungi kami di email info@eyesoccer.id
			<br><br>
			Salam Eyesoccer';
        $send_mail = send_mail($to, $subject, $message);
        if ($send_mail) {
            echo "true";
        } else {
            // $this->db->query("delete from tbl_member where id_member=".$id."");
            echo "false";
            // echo "Mailer Error: " . $objMail->ErrorInfo;
        }
    }

    public function profile_upload()
    {
        if ($_FILES['pic']['size'] > 10485760) {
            $return = 'File too large. Maximum file size is 1MB.';
        } else {
            $allowed = array('gif', 'png', 'jpg', 'jpeg');
            $filename = file_name('pic');
			$return = 'Success.';
			$caption = "Profile Picture";
			$lat = $_POST['lat'];
			$lon = $_POST['lon'];
			$date = date("Y-m-d H:i:s");
			$pic = "foto-" . $filename;
			$path = ($_SERVER['SERVER_NAME'] == 'localhost') ? pathUrl() . "img/img_storage/" : IMGSTORAGE . '/';
			move_uploaded_file($_FILES['pic']['tmp_name'], $path . 'ori_' . $pic);
			// var_dump(pathUrl());exit();
			$last_id = $_SESSION["member_id"];
			$post_data = array(
				'title' => $caption,
				'tags' => 'profil',
				'pic' => $pic,
				'thumb1' => $pic,
				'lat' => $lat,
				'lon' => $lon,
				'upload_date' => date("Y-m-d H:i:s"),
				'publish_by' => 'member',
				'publish_type' => 'public',
				'upload_user' => $last_id
			);
			$cmd = $this->db->insert("tbl_gallery", $post_data);
			$this->db->trans_complete();
			$pic_id = $this->db->insert_id();

			$this->db->query("UPDATE tbl_member SET profile_pic='" . $pic_id . "' WHERE id_member='" . $_SESSION["member_id"] . "'");
			if ($this->db->affected_rows() > 0) {
				redirect("home/member_area");
			} else {
				// redirect("home/member_area");
				echo "<script>alert('Data gagal di update');</script>";
			}
        }
    }

    public function foto_upload()
    {
        if ($_FILES['add_foto']['size'] > 10485760) {
            $return = 'File too large. Maximum file size is 1MB.';
        } else {
            $allowed = array('gif', 'png', 'jpg', 'jpeg');
            $filename = file_name('add_foto');
			$ext = substr($filename, strrpos($filename, '.') + 1);
            if (!in_array($ext, $allowed)) {
                echo '<script>alert("Upload Gagal")</script>';
				redirect("home/member_area");
                exit();
            } else {
                $return = 'Success.';
                $caption = "";
                $lat = $_POST['lat'];
                $lon = $_POST['lon'];
                $date = date("Y-m-d H:i:s");
                $pic = "foto-" . $filename;
                $path = ($_SERVER['SERVER_NAME'] == 'localhost') ? pathUrl() . "img/img_storage/" : IMGSTORAGE . '/';
                move_uploaded_file($_FILES['add_foto']['tmp_name'], $path . 'ori_' . $pic);
                $last_id = $_SESSION["member_id"];
                $post_data = array(
                    'title' => $caption,
                    'tags' => '',
                    'pic' => $pic,
                    'thumb1' => $pic,
                    'lat' => $lat,
                    'lon' => $lon,
                    'upload_date' => date("Y-m-d H:i:s"),
                    'publish_by' => 'member',
                    'publish_type' => 'private',
                    'upload_user' => $last_id
                );
                $this->db->insert("tbl_gallery", $post_data);
                if ($this->db->affected_rows() > 0) {
                    redirect("home/member_area");
                } else {
                    // redirect("home/member_area");
                    echo "<script>alert('Data gagal di update');</script>";
                }
			}
        }
    }

    public function video_upload()
    {
        $configVideo['upload_path'] = pathUrl() . "assets/video_storage"; # check path is correct
        $configVideo['max_size'] = '102400';
        $configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
        $configVideo['overwrite'] = FALSE;
        $configVideo['remove_spaces'] = TRUE;
        $video_name = rand("1000", "9999");
        $configVideo['file_name'] = 'video-' . $video_name;
        $lat = $this->input->post('lat');
        $lon = $this->input->post('lon');

        $this->load->library('upload', $configVideo);
        $this->upload->initialize($configVideo);
        if (!$this->upload->do_upload('add_video')) # form input field attribute
        {
            # Upload Failed
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect("home/member_area");
            echo "<script>alert('Video gagal di upload.');</script>";
        } else {
            # Upload Successfull
            // $url = 'assets/gallery/images'.$video_name;
            $vid = $configVideo['file_name'];
            $set1 = $this->Home_model->uploadVideo($vid, $lat, $lon);
            if ($set1 > 0) {
                $this->session->set_flashdata('success', 'Video berhasil di upload.');
                redirect("home/member_area");
                echo "<script>alert('Video berhasil di upload.');</script>";
            } else {
                redirect("home/member_area");
                echo "<script>alert('Video gagal di update');</script>";
            }
        }
    }

    public function profile_upload_data()
    {
        $post_data = array(
            'name' => $_POST['name'],
            'fullname' => $_POST['fullname'],
            'address' => $_POST['address'],
            'about' => $_POST['about']
        );
        $this->db->where('id_member', $_SESSION["member_id"]);
        $this->db->update('tbl_member', $post_data);

        if ($this->db->affected_rows() > 0) {
            redirect("home/member_area");
        } else {
            echo "<script>alert('Data gagal di update');</script>";
        }
    }

    public function search_player()
    {
        if (isset($_GET['term'])) {
            $return_arr = array();
            $player = $this->db->query("SELECT a.player_id,a.name,b.name as club_name FROM tbl_player a LEFT JOIN tbl_club b ON b.club_id=a.club_id WHERE a.member_id='0' and a.name like '%" . $_GET['term'] . "%'  ORDER BY a.name ASC ");
            foreach ($player->result() as $row) {
                $return_arr[] = $row->name . " - " . $row->club_name . " - " . $row->player_id;
                // array_push($return_arr[],$row->player_id,$row->name." - ".$row->club_name);
            }


            // /* Toss back results as json encoded array. */
            echo json_encode($return_arr);
            // echo "SELECT a.*,b.name as club_name FROM tbl_player a LEFT JOIN tbl_club b ON b.club_id=a.club_id WHERE a.member_id='0' and a.name like '%".$_GET['term']."%'  ORDER BY a.name ASC";
        }
    }

    public function search()
    {
        $data['kanal'] = "home";
        $search = $this->input->get('q');

        $data['eyenews'] = $this->mod->getAll('tbl_eyenews', $where = array(), $select = array('title', 'description', 'url', 'thumb1'), $order = array('eyenews_id' => 'desc'), $limit = '', $offset = '', $whereNotin = array(), $like = array('title' => $search));

        $data['eyetube'] = $this->mod->getAll('tbl_eyetube', $where = array(), $select = array('title', 'description', 'url', 'thumb1'), $order = array('eyetube_id' => 'desc'), $limit = '', $offset = '', $whereNotin = array(), $like = array('title' => $search));

        $data['player'] = $this->Home_model->getAllLeftJoin('tbl_player', $where = array(), $select = array('tbl_player.name as name', 'tbl_player.position as position', 'tbl_player.number as number', 'tbl_player.url as url', 'tbl_player.pic as pic', 'tbl_club.name as club'), $order = array('tbl_player.player_id' => 'desc'), $limit = '', $offset = '', $whereNotin = array(), $like = array('tbl_player.name' => $search), $leftjoin = array('tbl_club' => 'tbl_club.club_id = tbl_player.club_id'));

        $data['club'] = $this->Home_model->getAllLeftJoin('tbl_club', $where = array(), $select = array('name', 'address', 'stadium', 'url', 'logo'), $order = array('club_id' => 'desc'), $limit = '', $offset = '', $whereNotin = array(), $like = array('name' => $search), $leftjoin = array());

        $data["body"] = $this->load->view('home/search', $data, TRUE);
        $this->load->view('template/static', $data);
    }

    public function tentang_kami()
    {
        $data['kanal'] = "home";
        $data["body"] = $this->load->view('home/tentang_kami', $data, TRUE);
        $this->load->view('template/static', $data);
    }

    public function set_emot($id = null)
    {
        $date = date("Y-m-d H:i:s");
        $ip = $this->input->ip_address();
        $tipe = $_POST["type"];
        $tbl = $_POST["tbl"];
        $kanal = $_POST["kanal"];
        $sub_field = $_POST["sub_field"];
        $field = "$sub_field$tipe";

        $cek_emot = $this->mod->cek_ip_view($kanal, $id, $ip, $tipe);

        if ($cek_emot < 1) {
            $update_emot = $this->mod->set_news_emot($tbl, $kanal, $id, $field);

            $object = array(
                'visit_date' => $date,
                'type_visit' => $tipe,
                'place_visit' => $kanal,
                'place_id' => $id,
                'session_ip' => $ip,
            );

            $set_tbl_view = $this->mod->set_tbl_view($object);

            $get_jumlah_emot = $this->mod->get_jumlah_emot($tbl, $id, $field, $kanal);

            if ($tipe == "proud") {
                $html["html"] = $get_jumlah_emot->$field;
            } else
                if ($tipe == "smile") {
                    $html["html"] = $get_jumlah_emot->$field;
                } else
                    if ($tipe == "shock") {
                        $html["html"] = $get_jumlah_emot->$field;
                    } else
                        if ($tipe == "inspired") {
                            $html["html"] = $get_jumlah_emot->$field;
                        } else
                            if ($tipe == "happy") {
                                $html["html"] = $get_jumlah_emot->$field;
                            } else
                                if ($tipe == "sad") {
                                    $html["html"] = $get_jumlah_emot->$field;
                                } else
                                    if ($tipe == "fear") {
                                        $html["html"] = $get_jumlah_emot->$field;
                                    } else
                                        if ($tipe == "angry") {
                                            $html["html"] = $get_jumlah_emot->$field;
                                        } else
                                            if ($tipe == "fun") {
                                                $html["html"] = $get_jumlah_emot->$field;
                                            }

            $html["status"] = 1;

            echo json_encode($html);

        }
    }

    public function tim_eyesoccer()
    {
        $data['kanal'] = "home";
        $data["body"] = $this->load->view('home/tim_eyesoccer', $data, TRUE);
        $this->load->view('template/static', $data);
    }

    public function pedoman_media_siber()
    {
        $data['kanal'] = "home";
        $data["body"] = $this->load->view('home/pedoman_media_siber', $data, TRUE);
        $this->load->view('template/static', $data);
    }

    public function kebijakan_privasi()
    {
        $data['kanal'] = "home";
        $data["body"] = $this->load->view('home/kebijakan_privasi', $data, TRUE);
        $this->load->view('template/static', $data);
    }

    public function panduan_komunitas()
    {
        $data['kanal'] = "home";
        $data["body"] = $this->load->view('home/panduan_komunitas', $data, TRUE);
        $this->load->view('template/static', $data);
    }

    public function kontak_kami()
    {
        $data['kanal'] = "home";
        $data["body"] = $this->load->view('home/kontak_kami', $data, TRUE);
        $this->load->view('template/static', $data);
    }

    public function kirim_email_beta()
    {
        $objMail = $this->phpmailer_library->load();

        //Server settings
        $objMail->SMTPDebug = 2;                                 // Enable verbose debug output
        $objMail->isSMTP();                                      // Set objMailer to use SMTP
        $objMail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $objMail->SMTPAuth = true;                               // Enable SMTP authentication
        $objMail->Username = 'eyesoccerindonesia2@gmail.com';                 // SMTP username
        $objMail->Password = 'zbpqbixejvrbazwy';                           // SMTP password
        $objMail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $objMail->Port = 465;                                    // TCP port to connect to

        // $objMail->Port 			= 465;                                    // TCP port to connect to
        $objMail->isHTML(true);                                  // Set eobjMail format to HTML

        $objMail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Recipients
        $objMail->setFrom('info@eyesoccer.id', 'Info Eyesoccer');
        $objMail->addAddress('ebenk.rzq@gmail.com');               // Name is optional
        $objMail->addReplyTo('info@eyesoccer.id', 'Info Eyesoccer');

        //Content
        $objMail->Subject = 'Menunggu Pembayaran untuk Pemesanan ';
        $objMail->Body = 'Test';

        if ($objMail->send()) {
            echo "bisa";
            // $this->session->set_flashdata('sukses','<strong>Order anda berhasil</strong>, silahkan cek email anda untuk langkah selanjutnya');

            // redirect('/eyemarket/pesanan/'.$id_member);
        } else {
            echo "Mailer Error: " . $objMail->ErrorInfo;
        }
    }
}
