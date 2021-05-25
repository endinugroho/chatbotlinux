<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Transaksi extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Transaksimodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Absensi',
            'dataperush' => $this->Transaksimodel->get_all(),
 
        );
        $this->load->view('templates/header',$data);
        $this->load->view('transaksi', $data);
        $this->load->view('templates/footer',$data);
    }
 
     public function tambah()
    {
        $data = array(
 
            'title'     => 'Tambah Data Aplikasi',
			'method' => 'Tambah',
 
        );
        $this->load->view('templates/header',$data);
        $this->load->view('detailaplikasi', $data);
        $this->load->view('templates/footer',$data);
    }
 
    public function simpan()
    {
        $data = array(
 
            'nama'         => $this->input->post("nama"),
            'alamat'         => $this->input->post("alamat"),
            'nowaserver'         => $this->input->post("nowaserver"),
            'deskripsi'         => $this->input->post("deskripsi"),
 
        );
 
        $hasil=$this->Aplikasimodel->simpan($data);
 
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
        redirect('SAplikasi');
 
    }
 
    public function edit($id)
    {
        $id_siswa = $this->uri->segment(3);
 
        $data = array(
 
            'title'     => 'Edit Data Aplikasi',
            'dataperush' => $this->Aplikasimodel->edit($id),
			'method' => 'Edit',
        );
        $this->load->view('templates/header',$data);
        $this->load->view('detailAplikasi', $data);
        $this->load->view('templates/footer',$data);
    }
 
    public function update()
    {
        $id = $this->input->post("id");
        $data = array(
            'nama'         => $this->input->post("nama"),
            'alamat'         => $this->input->post("alamat"),
            'nowaserver'         => $this->input->post("nowaserver"),
            'deskripsi'         => $this->input->post("deskripsi"),
        );
 
        $hasil=$this->Aplikasimodel->update($data, $id);
 
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
        redirect('Aplikasi');
 
    }
 
    public function hapus($id)
    {
        $hasil=$this->Aplikasimodel->hapus($id);
        //redirect
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data Aplikasi berhasil dihapus di database.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data Aplikasimodel tidak dihapus di database.
                                                </div>');            
        }
        redirect('Aplikasi');
 
    }

 
}