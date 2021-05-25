<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mpostingdocdoor extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Mpostingsopirmodel');
        $this->load->model('usersmodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Sopir',
            'dataritase' => $this->Mpostingsopirmodel->get_alldoor(),
 
        );
 
        $this->load->view('mpostingdocdoor', $data);
    }
    
    
    public function statusdocdoor() 
    {
        $status = $this->uri->segment(3);
        $idrate = $this->uri->segment(4);
        $this->Mpostingsopirmodel->statusdocdoor($status,$idrate);

        $data = array(
 
            'title'     => 'Data SPV',
            'dataritase' => $this->Mpostingsopirmodel->get_alldoor(),
 
        );
        $this->load->view('mpostingdocdoor', $data);
    }
 
}