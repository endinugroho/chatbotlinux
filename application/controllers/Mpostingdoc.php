<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mpostingdoc extends CI_Controller {
 
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
            'dataritase' => $this->Mpostingsopirmodel->get_all(),
 
        );
 
        $this->load->view('mpostingdoc', $data);
    }
    
    
    public function statusspv()
    {
        $status = $this->uri->segment(3);
        $idrate = $this->uri->segment(4);
        $this->Mpostingsopirmodel->statusspv($status,$idrate);

        $data = array(
 
            'title'     => 'Data SPV',
            'dataritase' => $this->Mpostingsopirmodel->get_allspv(),
 
        );
        $this->load->view('mpostingspv', $data);
    }
 
}