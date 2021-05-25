<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Aplikasi extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Aplikasimodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Absensi',
            'dataperush' => $this->Aplikasimodel->get_all(),
 
        );
        $this->load->view('templates/header',$data);
        $this->load->view('aplikasi', $data);
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

    // function execInBackground($cmd) { 
    //     if (substr(php_uname(), 0, 7) == "Windows"){ 
    //         pclose(popen("start /B ". $cmd, "r"));  
    //     } 
    //     else { 
    //         exec($cmd . " > /dev/null &");   
    //     } 
    // } 

    public function play()
    {
        // execInBackground('start cmd.exe @cmd /k "python hallo.py 1" > NUL');
        $id_app = $this->uri->segment(3);
        if (substr(php_uname(), 0, 7) == "Windows"){ 
            pclose(popen('start /B start cmd.exe @cmd /k "python hallo.py '.$id_app.'" > NUL', "r"));  
        } 
        else { 
            exec('start cmd.exe @cmd /k "python hallo.py '.$id_app.'" > NUL' . ' > /dev/null &');   
        } 
        //sleep for 3 seconds
        sleep(12);
        
        
        $this->load->view('templates/header');
        $this->load->view('detailaplikasiplay');
        $this->load->view('templates/footer');
    }
 
    public function simpan()
    {
        $data = array(
 
            'nama'         => $this->input->post("nama"),
            'alamat'         => $this->input->post("alamat"),
            'nowaserver'         => $this->input->post("nowaserver"),
            'deskripsi'         => $this->input->post("deskripsi"),
            'ipaplikasi'    => $this->input->post("ip")
 
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
        redirect('Aplikasi');
 
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
            'ipaplikasi'    => $this->input->post("ip")
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