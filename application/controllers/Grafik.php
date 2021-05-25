<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Grafik extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Grafikmodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Gafik',
            'trafikuser' => $this->Grafikmodel->get_trafikuser(),
            'trafikkeyword' => $this->Grafikmodel->get_trafikkeyword(),
            'trafiktanggal' => $this->Grafikmodel->get_trafiktanggal(),
 
        );
        $this->load->view('templates/header',$data);
        $this->load->view('Grafik', $data);
        $this->load->view('templates/footer',$data);
    }

    public function getajak(){
        echo json_encode($this->Grafikmodel->get_all());
    }
 

 
}