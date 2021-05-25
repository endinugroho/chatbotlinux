<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class users extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('usersmodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Users',
            'datausers' => $this->usersmodel->get_all(),
 
        );
 
        $this->load->view('datausers', $data);
    }
 
    public function tambah()
    {
        $data = array(
 
            'title'     => 'Tambah Data Users'
 
        );
 
        $this->load->view('tambahusers', $data);
    }
 
    public function simpan()
    {
        $data = array(
 
            'namausers'         => $this->input->post("namausers"),
            'userlogin'    => $this->input->post("userlogin"),
            'password'         => $this->input->post("password"),
            'email'         => $this->input->post("email"),
            'bagian'         => $this->input->post("bagian")
        );
 
        $this->usersmodel->simpan($data);
 
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data siswa berhasil disimpan didatabase.
                                                </div>');
 
        //redirect
        redirect('Users/');
 
    }
 
    public function edit($idUsers)
    {
        $id_siswa = $this->uri->segment(3);
 
        $data = array(
 
            'title'     => 'Edit Data Users',
            'datausers' => $this->usersmodel->edit($idUsers)
 
        );
 
        $this->load->view('editusers', $data);
    }
 
    public function update()
    {
        $id['idUsers'] = $this->input->post("idUsers");
        $data = array(
 
            'idUsers'       => $this->input->post("idUsers"),
            'namausers'         => $this->input->post("namausers"),
            'userlogin'    => $this->input->post("userlogin"),
            'password'         => $this->input->post("password"),
            'email'         => $this->input->post("email"),
            'bagian'         => $this->input->post("bagian")
 
        );
 
        $this->usersmodel->update($data, $id);
 
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');
 
        //redirect
        redirect('users');
 
    }
 
    public function hapus($idUsers)
    {
        $this->usersmodel->hapus($idUsers);
        //redirect
        redirect('users');
 
    }
 
}