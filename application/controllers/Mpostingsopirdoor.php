<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mpostingsopirdoor extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Mpostingsopirmodel');
        $this->load->model('Informasimodel');
        $this->load->model('Customermodel');
 
    }
 
    public function index()
    {

        $data = array(
 
            'title'     => 'Data Sopir',
            'datacustomer' => $this->Customermodel->get_all(),
//            'dataharga' => $this->Informasimodel->getharga_all(),
            
 
        );
 
        $this->load->view('mpostingsopirdoor', $data);        
    }
 
     public function getComboDatahargaJSON()
    {
        $id=$this->input->post("id");
        $varku=$this->Informasimodel->getcomboharga_all($id);
    $callback = array(        
        'draw'=>"1", // Ini dari datatablenya        
        'recordsTotal'=>60,        
        'recordsFiltered'=>0,        
        'data'=>$varku    
    );
header('Content-type: application/json');
echo json_encode(  $varku );
    }

     public function tambah()
    {
        $data = array(
            'Vendor_idVendor'=> $this->input->post("customer"),
            'tujuan'        =>$this->input->post("tujuan1"),
            'tanggal'         => $this->input->post("tanggal"),
            'nocontainer'    => $this->input->post("nocontainer"),
            'notrucking'         => $this->input->post("notrucking"),
             'muat'         => $this->input->post("muat"),
            'ukuran'    => $this->input->post("ukuran"),
            'retase'         => $this->input->post("sangusopir"),
           'Sopir_idSopir'         => $_SESSION['id'],

        );
 
        $hasil=$this->Mpostingsopirmodel->simpandoor($data);
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
        redirect('Mpostingsopirdoor/');
         
    }
}