<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Transaksidepo extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Transaksidepomodel');

    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Transaksi depo',
            'datadepo' => $this->Transaksidepomodel->get_all(),
 
        );
 
        $this->load->view('transaksidepo', $data);
    }
 

 

    public function hapus($idtransaksi)
    {
        $hasil=$this->Transaksidepomodel->hapus($idtransaksi);
        //redirect
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data transaksi manpower berhasil dihapus di database.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data transaksi manpower tidak dihapus di database.
                                                </div>');            
        }
        redirect('transaksidepo');
 
    }
 
}