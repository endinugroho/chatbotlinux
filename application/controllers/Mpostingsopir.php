<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class mpostingsopir extends CI_Controller {
 
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
        );
 
        $this->load->view('mpostingsopir', $data);
    }

    public function tambah()
    {
        $nocontainer="";
        if ( $this->input->post("ukuran")=="20")
        {
            $nocontainer=$this->input->post("nocontainer1");
            
        } elseif ( $this->input->post("ukuran")=="20")
        {
            $nocontainer=$this->input->post("nocontainer2");
        } else
        {
            $nocontainer=$this->input->post("nocontainer3")."#".$this->input->post("nocontainer4");
        }
        $retaseku=$this->Informasimodel->getdata("manpowerretasesopir");
        $data = array(
 
            'tanggal'         => $this->input->post("tanggal"),
            'shift' => $this->input->post("shift"),
            'ukuran'    => $this->input->post("ukuran"),
            'nocontainer'    => $nocontainer,
            'nomortrucking'    => $this->input->post("nomortrucking"),
            'Sopir_idSopir'         => $_SESSION['id'],
            'retase' => $retaseku->nilaivar,
        );
 
        $hasil=$this->Mpostingsopirmodel->simpan($data);
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
        redirect('Mpostingsopir/');
         
    }
 
}