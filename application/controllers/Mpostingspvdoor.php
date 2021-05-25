<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mpostingspvdoor extends CI_Controller {
 
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
            'dataritase' => $this->Mpostingsopirmodel->get_allspvdoor(),
 
        );
 
        $this->load->view('mpostingspvdoor', $data);
    }
    
    public function statusspvdoor()
    {
        $status = $this->uri->segment(3);
        $idrate = $this->uri->segment(4);
        $this->Mpostingsopirmodel->statusspvdoor($status,$idrate);

        $data = array(
 
            'title'     => 'Data SPV',
            'dataritase' => $this->Mpostingsopirmodel->get_allspvdoor(),
 
        );
        $this->load->view('mpostingspvdoor', $data);
    }    
 
}