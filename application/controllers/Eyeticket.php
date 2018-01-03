<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyeticket extends CI_Controller {

	public function __construct(){
        parent::__construct();
		   // $this->load->model('Eyemarket_model');
			date_default_timezone_set('Asia/Jakarta');
			$this->load->model('Eyeticket_model');
			$this->load->helper(array('form','url','text','date'));
			$this->load->helper('my');
    }
	
	public function index()
	{
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"]="eyetiket";		
		

		$data['kanal'] 				= "home";
		$data["body"]=$this->load->view('eyetiket/index', $data,true);
		$this->load->view('template/static',$data);
	}		
}
