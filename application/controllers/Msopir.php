<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Msopir extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Mpostingsopirmodel');
        $this->load->model('Informasimodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Sopir',
            'dataritase' => $this->Mpostingsopirmodel->get_all(),
            'ritasesopir' => $this->Informasimodel->getdata("manpowerretasesopir")
 
        );
 
        $this->load->view('msopir', $data);
    }
 
}