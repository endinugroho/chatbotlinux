<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Absensi extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Absensimodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Absensi',
            'dataabsensi' => $this->Absensimodel->get_all(),
 
        );
 
        $this->load->view('absensi', $data);
    }
 
 
}