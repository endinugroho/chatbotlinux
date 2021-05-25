<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Cetakretaserekapan extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 

    }
 
    public function index()
    {

        $this->load->view('cetakretaserekapan');
    }
 
 
    public function simpan()
    {
        $data = array(
 
            'Nama'         => $this->input->post("Nama"),
            'Alamat'    => $this->input->post("Alamat"),
            'Kota'         => $this->input->post("Kota"),
            'NoHP'         => $this->input->post("NoHP"),
            'username'         => $this->input->post("username"),
            'password'         => $this->input->post("password"),
            'SPVmanpower'         => $this->input->post("SPVmanpower"),
            'SPVrepo'         => $this->input->post("SPVrepo"),
            'SPVDoor'         => $this->input->post("SPVDoor")
 
 
        );
 
        $hasil=$this->Sopirmodel->simpan($data);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data sopir berhasil ditambah di database.
                                                </div>');            
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data sopir tidak ditambah di database.
                                                </div>');            
        }

 
        //redirect
        redirect('Sopir/');
 
    }
 
    public function edit($idSopir)
    {
        $id_siswa = $this->uri->segment(3);
 
        $data = array(
 
            'title'     => 'Edit Data Siswa',
            'datasopir' => $this->Sopirmodel->edit($idSopir),
            'datausers' => $this->Usersmodel->get_all()

        );
 
        $this->load->view('editsopir', $data);
    }
 
    public function update()
    {
        $id['idSopir'] = $this->input->post("idSopir");
        $data = array(
 
            'idSopir'       => $this->input->post("idSopir"),
            'Nama'         => $this->input->post("Nama"),
            'Alamat'    => $this->input->post("Alamat"),
            'Kota'         => $this->input->post("Kota"),
            'NoHP'         => $this->input->post("NoHP"),
            'username'         => $this->input->post("username"),
            'password'         => $this->input->post("password"),
            'SPVmanpower'         => $this->input->post("SPVmanpower"),
            'SPVrepo'         => $this->input->post("SPVrepo"),
            'SPVDoor'         => $this->input->post("SPVDoor")

        );
 
        $hasil=$this->Sopirmodel->update($data, $id);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data sopir berhasil diupdate didatabase.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data sopir tidak diupdate di database.
                                                </div>');            
        }
 
        //redirect
        redirect('sopir');
 
    }
 
    public function hapus($idSopir)
    {
        $hasil=$this->Sopirmodel->hapus($idSopir);
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
        redirect('sopir');
 
    }
 
}