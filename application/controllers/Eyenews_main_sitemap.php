<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Eyenews_main_sitemap extends CI_Controller {
    function index()
    {
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("eyenews_main_sitemap");
    }
}