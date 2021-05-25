<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mpostingsopirrepo extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Mpostingsopirmodel');
        $this->load->model('Informasimodel');
        $this->load->model('Usersmodel');
 
    }
 
    public function index()
    {

        $data = array(
 
            'title'     => 'Data Sopir',
            'dataritase' => $this->Mpostingsopirmodel->get_allrepo(),
 
        );
 
        $this->load->view('mpostingsopirrepo', $data);        
    }
 
 
     public function tambah()
    {
 
        $pekerjaan = $this->input->post("pekerjaan");
        $ukuran = $this->input->post("ukuran");
        $typecontainer= $this->input->post("typecontainer");
        if ($typecontainer=="MTY") $typecontainer="EMP"; 
        
        $varritase = strtolower($pekerjaan.$ukuran.$typecontainer."retase");
        $retase=$this->Informasimodel->getdata($varritase);

        
        $data = array(
 
            'tanggal'               => $this->input->post("tanggal"),
            'nocontainer'           => $this->input->post("nocontainer"),
            'notrucking'            => $this->input->post("notrucking"),
             'pekerjaan'            => $pekerjaan,
            'ukuran'                => $ukuran,
            'typecontainer'         => $typecontainer,
            'retase'                => $retase->nilaivar,
           'Sopir_idSopir'          => $_SESSION['id'],

        );
 
        $hasil=$this->Mpostingsopirmodel->simpanrepo($data);
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data sopir berhasil ditambah di database.
            </div>');

        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data sopir ritase tidak berhasil ditambah di database.
            </div>');

        }
 
        //redirect
        redirect('Mpostingsopirrepo/');
         
    }
}