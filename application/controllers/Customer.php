<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Customer extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Customermodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Absensi',
            'dataperush' => $this->Customermodel->get_all(),
 
        );
        $this->load->view('templates/header',$data);
        $this->load->view('customer', $data);
        $this->load->view('templates/footer',$data);
    }
 
     public function tambah()
    {
        $data = array(
 
            'title'     => 'Tambah Data Aplikasi',
			'method' => 'Tambah',
 
        );
        $this->load->view('templates/header',$data);
        $this->load->view('detailcustomer', $data);
        $this->load->view('templates/footer',$data);
    }
 
    public function simpan()
    {
        $data = array(
 
            'name'         => $this->input->post("nama"),
            'number'         => $this->input->post("tlp"),
            'ktp'         => $this->input->post("nik"),
            'create_date' => date("m/d/Y H:i:s"),
            'update_date' => date("m/d/Y H:i:s")
 
        );
 
        $hasil=$this->Customermodel->simpan($data);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data Sekolah berhasil ditambah di database.
                                                </div>');            
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data Sekolah tidak ditambah di database.
                                                </div>');            
        }

 
        //redirect
        redirect('Customer');
 
    }
 
    public function edit($id)
    {
        $id_siswa = $this->uri->segment(3);
 
        $data = array(
 
            'title'     => 'Edit Data Aplikasi',
            'dataperush' => $this->Customermodel->edit($id),
			'method' => 'Edit',
            'update_date' => date("m/d/Y H:i:s")
        );
        $this->load->view('templates/header',$data);
        $this->load->view('detailcustomer', $data);
        $this->load->view('templates/footer',$data);
    }
 
    public function update()
    {
        $id = $this->input->post("id");
        $data = array(
            'name'         => $this->input->post("nama"),
            'number'         => $this->input->post("tlp"),
            'ktp'         => $this->input->post("nik"),
        );
 
        $hasil=$this->Customermodel->update($data, $id);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data Aplikasi berhasil diupdate didatabase.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data Aplikasi tidak diupdate di database.
                                                </div>');            
        }
 
        //redirect
        redirect('Customer');
 
    }
 
    public function hapus($id)
    {
        $hasil=$this->Customermodel->hapus($id);
        //redirect
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data Customer berhasil dihapus di database.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data Aplikasimodel tidak dihapus di database.
                                                </div>');            
        }
        redirect('Customer');
 
    }

 
}