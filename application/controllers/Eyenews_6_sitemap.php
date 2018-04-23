<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Eyenews_6_sitemap extends CI_Controller {
    function index()
    {
    	$query = $this->db->query("select * from tbl_eyenews where publish_on >='2018-10-01 00:00:00'AND publish_on <='2019-01-01 00:00:00' order by publish_on DESC");  
    	//print_r($query->result_array()); 	
    	$data1=array();
		$query = $query->result_array();
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("eyenews_6_sitemap",array('query' => $query));
    }
}