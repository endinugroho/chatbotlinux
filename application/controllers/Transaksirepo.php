<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Transaksirepo extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Transaksirepomodel');

    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Transaksi manpower',
            'datarepo' => $this->Transaksirepomodel->get_all(),
 
        );
 
        $this->load->view('transaksirepo', $data);
    }
 

 

    public function hapus($idtransaksi)
    {
        $hasil=$this->Transaksirepomodel->hapus($idtransaksi);
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
        redirect('transaksirepo');
 
    }
 
}