<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class ongkostruk extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('ongkostrukmodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Ongkos Truk',
            'dataongkostruk' => $this->ongkostrukmodel->get_all(),
 
        );
 
        $this->load->view('dataongkostruk', $data);
    }
 
    public function tambah()
    {
        $data = array(
 
            'title'     => 'Tambah Ongkos Truk'
 
        );
 
        $this->load->view('tambahongkostruk', $data);
    }
 
    public function simpan()
    {
        $data = array(
 
            'tujuan'         => $this->input->post("Nama"),
            'ongkostps'    => $this->input->post("Alamat"),
            'ongkosteluklamong'         => $this->input->post("Kota")
 
 
        );
 
        $this->ongkostrukmodel->simpan($data);
 
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data siswa berhasil disimpan didatabase.
                                                </div>');
 
        //redirect
        redirect('ongkostruk');
 
    }
 
    public function edit($idOngkostruk)
    {
        $idOngkostruk = $this->uri->segment(3);
 
        $data = array(
 
            'title'     => 'Edit Data Siswa',
            'dataongkostruk' => $this->ongkostrukmodel->edit($idOngkostruk)
 
        );
 
        $this->load->view('editongkostruk', $data);
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
            'token'         => $this->input->post("token")
 
        );
 
        $this->sopirmodel->update($data, $id);
 
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');
 
        //redirect
        redirect('sopir');
 
    }
 
    public function hapus($idSopir)
    {
        $this->sopirmodel->hapus($idSopir);
        //redirect
        redirect('sopir');
 
    }
 
}