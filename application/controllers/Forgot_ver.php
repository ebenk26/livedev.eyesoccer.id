<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_ver extends CI_Controller {

	public function __construct(){
        parent::__construct();
			// direct_m();
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
		$data["kanal"]="registration";
		$this->load->view('home/change_password', $data);
	}
	
	public function change_password()
	{
		$randurl = substr(md5(microtime()),rand(0,26),5);
		$password = $this->input->post("password");
		$unique_code = $this->input->post("unique_code");
		$this->db->query("update tbl_member set password='".md5($password)."',unique_code='".$randurl."'  where unique_code='".$unique_code."'");
		if($this->db->affected_rows()>0){
			echo "true";
		}else{
			echo "false";
		}
	}
}
