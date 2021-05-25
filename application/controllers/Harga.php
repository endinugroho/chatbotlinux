<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Harga extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Informasimodel');
        $this->load->model('Customermodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Sopir',
//            'dataharga' => $this->Informasimodel->getharga_all(),
            'datacustomer' => $this->Customermodel->get_all(),
            

        );
 
        $this->load->view('dataharga', $data);
    }
 
    public function getDatahargaJSON()
    {
        $id=$this->input->post("id");
        $varku=$this->Informasimodel->getharga_all($id);
    $callback = array(        
        'draw'=>"1", // Ini dari datatablenya        
        'recordsTotal'=>60,        
        'recordsFiltered'=>0,        
        'data'=>$varku    
    );
header('Content-type: application/json');
echo json_encode(  $varku );
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
 
            'title'     => 'Tambah Tujuan',
            'idVendor'  =>$this->input->post("customer")
 
        );
 
        $this->load->view('tambahharga', $data);
    }
 
    public function simpan()
    {
        $idvendor=$this->input->post("idvendor");
        $data = array(
 
            'tujuan'         => $this->input->post("tujuan"),
            'harga'    => $this->input->post("harga"),
            'hargasopir'         => $this->input->post("hargasopir"),
            'idvendor'         => $this->input->post("idvendor"),
        );
 
        $this->Informasimodel->simpanharga($data);
 
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data informasi berhasil disimpan didatabase.
                                                </div>');
 
        //redirect
        redirect('harga/?id='.$idvendor);
 
    }
 
    public function edit()
    {
        $idharga = $this->uri->segment(3);
 
        $data = array(
 
            'title'     => 'Edit Data Harga',
            'dataharga' => $this->Informasimodel->editharga($idharga)
 
        );
 
        $this->load->view('editharga', $data);
    }
 
    public function update()
    {
  //      $id['idSopir'] = $this->input->post("idSopir");
        $idvendor=$this->input->post("idvendor");
        $idHarga = $this->input->post("idharga");
        $data = array(
        
            'idHarga' => $this->input->post("idharga"),
            'tujuan'    => $this->input->post("tujuan"),
            'harga'         => $this->input->post("harga"),
            'hargasopir'         => $this->input->post("hargasopir"),
            'idVendor'         => $this->input->post("idvendor")

        );
//        print_r($data) ;
        $this->Informasimodel->updateharga($data, $idHarga);
 
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');
 
        //redirect
        redirect('harga/?id='.$idvendor);
 
    }
 
 
  public function hapus()
    {
        $idharga = $this->uri->segment(3);
         $hasil=$this->Informasimodel->hapusharga($idharga);
        //redirect
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data sopir berhasil dihapus di database.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data sopir tidak dihapus di database.
                                                </div>');            
        }
        redirect('harga');
 
    }

 
}