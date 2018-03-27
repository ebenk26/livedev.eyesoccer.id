<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Eyevent_sitemap extends CI_Controller {
    function index()
    {
    	$query = $this->db->query("select * from tbl_event order by id_event DESC");  
    	//print_r($query->result_array()); 	
    	$data1=array();
		$query = $query->result_array();
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("eyevent_sitemap",array('query' => $query));
    }
}