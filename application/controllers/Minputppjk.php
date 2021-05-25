<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Minputppjk extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Mpostingsopirmodel');
        $this->load->model('Informasimodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Input PPJK',
            'dataritase' => $this->Mpostingsopirmodel->get_all(),
        );
 
        $this->load->view('minputppjk', $data);
    }


 
}