<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mpostingspvrepo extends CI_Controller {
 
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
            'dataritase' => $this->Mpostingsopirmodel->get_allspvrepo(),
 
        );
 
        $this->load->view('mpostingspvrepo', $data);
    }
    
    public function statusspvrepo()
    {
        $status = $this->uri->segment(3);
        $idrate = $this->uri->segment(4);
        $this->Mpostingsopirmodel->statusspvrepo($status,$idrate);

        $data = array(
 
            'title'     => 'Data SPV',
            'dataritase' => $this->Mpostingsopirmodel->get_allspvrepo(),
 
        );
        $this->load->view('mpostingspvrepo', $data);
    }
 
}