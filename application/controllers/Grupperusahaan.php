<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Grupperusahaan extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Grupperusahaanmodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Grup Perusahaan',
            'datagrupper' => $this->Grupperusahaanmodel->get_all(),
 
        );
 
        $this->load->view('grupperusahaan', $data);
    }
 
    public function update()
    {
        $id = $this->input->post("id");    
        $data = array(
 
            'nama'         => $this->input->post("nama"),
            'deskripsi'    => $this->input->post("deskripsi"),
            'pemilik'      => $this->input->post("pemilik"),

        );
        $hasil=$this->Grupperusahaanmodel->update($data, $id);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! group perusahaan berhasil diupdate didatabase.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! group perusahaan tidak diupdate di database.
                                                </div>');            
        }
 
        //redirect
        redirect('Grupperusahaan');
    }
         
}