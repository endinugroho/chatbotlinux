<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class CalonSiswa extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('CalonSiswamodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Absensi',
            'dataperush' => $this->CalonSiswamodel->get_all(),
 
        );
 
        $this->load->view('CalonSiswa', $data);
    }
 
     public function tambah()
    {
        $data = array(
 
            'title'     => 'Tambah Data CalonSiswa',
			'method' => 'Tambah',
 
        );
 
        $this->load->view('detailCalonSiswa', $data);
    }
 
    public function simpan()
    {
        $data = array(
 
            'nama'         => $this->input->post("nama"),
            'alamat'         => $this->input->post("alamat"),
            'asalsd'         => $this->input->post("asalsd"),
            'nilairapor'     => $this->input->post("nilairapor"),
            'nem'         => $this->input->post("nem"),
            'nohp'         => $this->input->post("nohp"),
            'nohppenginput'         => $this->input->post("nohppenginput"),
 
        );
 
        $hasil=$this->CalonSiswamodel->simpan($data);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data CalonSiswa berhasil ditambah di database.
                                                </div>');            
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data CalonSiswa tidak ditambah di database.
                                                </div>');            
        }
 
        //redirect
        redirect('CalonSiswa');
 
    }
 
    public function edit($id)
    {
        $id_siswa = $this->uri->segment(3);
 
        $data = array(
 
            'title'     => 'Edit Data User',
            'dataperush' => $this->CalonSiswamodel->edit($id),
			'method' => 'Edit',
        );
 
        $this->load->view('detailCalonSiswa', $data);
    }
 
    public function update()
    {
        $id = $this->input->post("id");
        $data = array(
            'nama'         => $this->input->post("nama"),
            'alamat'         => $this->input->post("alamat"),
            'asalsd'         => $this->input->post("asalsd"),
            'nilairapor'     => $this->input->post("nilairapor"),
            'nem'         => $this->input->post("nem"),
            'nohp'         => $this->input->post("nohp"),
            'nohppenginput'         => $this->input->post("nohppenginput"),
        );
 
        $hasil=$this->CalonSiswamodel->update($data, $id);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data CalonSiswa berhasil diupdate didatabase.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data CalonSiswa tidak diupdate di database.
                                                </div>');            
        }
 
        //redirect
        redirect('CalonSiswa');
 
    }
 
    public function hapus($id)
    {
        $hasil=$this->CalonSiswamodel->hapus($id);
        //redirect
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data CalonSiswa berhasil dihapus di database.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data CalonSiswamodel tidak dihapus di database.
                                                </div>');            
        }
        redirect('CalonSiswa');
 
    }

 
}