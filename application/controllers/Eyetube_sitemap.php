<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Eyetube_sitemap extends CI_Controller {
    function index()
    {
    	$query = $this->db->query("select * from tbl_eyetube order by eyetube_id DESC");  
    	$query = $query->result_array(); 	
    	$data1=array();
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("eyetube_sitemap",array('query' => $query));
    }
}