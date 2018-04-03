<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Eyenews_sitemap extends CI_Controller {
    function index()
    {
    	$query = $this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on DESC");  
    	//print_r($query->result_array()); 	
    	$data1=array();
		$query = $query->result_array();
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("eyenews_sitemap",array('query' => $query));
    }
}