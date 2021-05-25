<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Msopirrepo extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Mpostingsopirmodel');
//        $this->load->model('usersmodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Sopir',
            'dataritase' => $this->Mpostingsopirmodel->get_allrepo(),
 
        );
 
        $this->load->view('msopirrepo', $data);   
    }
 
}