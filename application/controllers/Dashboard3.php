<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard3 extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Dashboard',
 
        );
 
        $this->load->view('dashboard3', $data);
    }
 
 
}