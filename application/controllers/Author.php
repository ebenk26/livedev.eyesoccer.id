<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

	public function __construct(){
        parent::__construct();
			// direct_m();
		   // $this->load->model('Eyemarket_model');
			date_default_timezone_set('Asia/Jakarta');
			$this->load->model('Author_model');
			$this->load->model('Master_model');
			$this->load->helper(array('form','url','text','date','my'));
			$this->load->helper('my');
    }
	public function index()
	{	
		$username=$_GET['profil'];
		$data["meta"]["title"] 				="";
		$data["meta"]["image"]	 			=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"] 		="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"] 						="author/page";		
		
		$data['lastnews']			 		= $this->Author_model->get_author_lastnews($username);
		$data['popnews']					= $this->Author_model->get_author_popnews($username);
		$data['admin']			 			= $this->Author_model->get_author_detail($username);
		$data['totalpost']			 		= $this->Author_model->get_total_post($username);
		$data['total1000']			 		= $this->Author_model->get_total_view1000($username);
		$data['total500']			 		= $this->Author_model->get_total_view500($username);
		
		foreach($data['admin']  as $k => $v){
			if (!isset($v['fullname']))
				{
					header('location: '.base_url().'');
					exit();
				}
			}
	
		$where    = array();
		$selectID = 'eyenews_id';
		$tbl      = 'tbl_eyenews';
		$limit    = 1;
		$offset   = $this->uri->segment(3) + 5;
		$uri_segment = 1;
		$url      = 'eyenews/page';
		$like = array('prod_name'=> '','merk'=> '');
		$data['pagging']   = $this->Master_model->pagging($selectID, $tbl, $limit, $offset, $url, $uri_segment, '', $where, $selectFieldRow = '');

		
		
		$data['kanal'] 					="author";
		$data["body"]					=$this->load->view('author/index', $data,true);

		$this->load->view('template/static',$data);		
	}


}
