<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Ketidakhadiran extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Ketidakhadiranmodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Absensi',
            'datasopir' => $this->Ketidakhadiranmodel->get_all(),
 
        );
 
        $this->load->view('ketidakhadiran', $data);
    }
 
 
}