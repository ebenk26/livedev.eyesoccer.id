<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sitemap extends CI_Controller {
    function index()
    {
    	$sitemap = "";
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap_view",array('sitemap' => $sitemap));
    }
}