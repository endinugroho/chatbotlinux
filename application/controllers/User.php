<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Usermodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Absensi',
            'dataperush' => $this->Usermodel->get_all(),
 
        );
        $this->load->view('templates/header',$data);
        $this->load->view('User', $data);
        $this->load->view('templates/footer',$data);
    }
 
     public function tambah()
    {
        $data = array(
 
            'title'     => 'Tambah Data User',
			'method' => 'Tambah',
 
        );
        $this->load->view('templates/header',$data);
        $this->load->view('detailUser', $data);
        $this->load->view('templates/footer',$data);
    }
 
    public function simpan()
    {
        $data = array(
 
            'nama'         => $this->input->post("nama"),
            'login'         => $this->input->post("login"),
            'password'         => $this->input->post("password"),
            'peranapp'         => $this->input->post("peranapp"),
        );
 
        $hasil=$this->Usermodel->simpan($data);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data User berhasil ditambah di database.
                                                </div>');            
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data User tidak ditambah di database.
                                                </div>');            
        }

 
        //redirect
        redirect('User');
 
    }
 
    public function edit($id)
    {
        $id_siswa = $this->uri->segment(3);
 
        $data = array(
 
            'title'     => 'Edit Data User',
            'dataperush' => $this->Usermodel->edit($id),
			'method' => 'Edit',
        );
        $this->load->view('templates/header',$data);
        $this->load->view('detailUser', $data);
        $this->load->view('templates/footer',$data);
    }
 
    public function update()
    {
        $id = $this->input->post("id");
        $data = array(
            'nama'         => $this->input->post("nama"),
            'login'         => $this->input->post("login"),
            'password'         => $this->input->post("password"),
            'peranapp'         => $this->input->post("peranapp"),
        );
 
        $hasil=$this->Usermodel->update($data, $id);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data User berhasil diupdate didatabase.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data User tidak diupdate di database.
                                                </div>');            
        }
 
        //redirect
        redirect('User');
 
    }
 
    public function hapus($id)
    {
        $hasil=$this->Usermodel->hapus($id);
        //redirect
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data User berhasil dihapus di database.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data Usermodel tidak dihapus di database.
                                                </div>');            
        }
        redirect('User');
 
    }

 
}