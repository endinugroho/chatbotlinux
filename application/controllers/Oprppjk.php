<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Oprppjk extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        //$this->load->model('sopirmodel');
 
    }
 
    public function index()
    {
 
        $this->load->view('oprppjk');
    }
 
 
}