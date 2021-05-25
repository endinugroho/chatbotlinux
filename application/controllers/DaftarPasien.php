<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class DaftarPasien extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('DaftarPasienmodel');
 
    }
 
    public function index()
    {
		if (isset($_POST['tanggal'])) 

		{

			$tanggal=$_POST['tanggal'];

        } else

		{

			$tanggal="";

		}

        $data = array(
 
            'title'     => 'Data Absensi',
            'datapasien1' => $this->DaftarPasienmodel->get_all_pagi($tanggal),
            'datapasien2' => $this->DaftarPasienmodel->get_all_sore($tanggal),
 
        );
 
        $this->load->view('daftarpasien', $data);
    }
 
     public function tambah()
    {
        $data = array(
 
            'title'     => 'Tambah Data Sekolah',
			'method' => 'Tambah',
 
        );
 
        $this->load->view('detaildaftarpasien', $data);
    }
 
    public function simpan()
    {
        $data = array(
 
            'tanggal'         => $this->input->post("tanggal"),
            'sesi'         => $this->input->post("sesi"),
            'nama'         => $this->input->post("nama"),
            'nohp'         => $this->input->post("nohp"),
 
        );
 
        $hasil=$this->DaftarPasienmodel->simpan($data);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data pasien berhasil ditambah di database.
                                                </div>');            
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data pasien tidak ditambah di database.
                                                </div>');            
        }

 
        //redirect
        redirect('DaftarPasien');
 
    }
 
    public function edit($id)
    {
        $id_siswa = $this->uri->segment(3);
 
        $data = array(
 
            'title'     => 'Edit Data Sekolah',
            'dataperush' => $this->DaftarPasienmodel->edit($id),
			'method' => 'Edit',
        );
 
        $this->load->view('detaildaftarpasien', $data);
    }
 
    public function update()
    {
        $id = $this->input->post("id");
        $data = array(
            'tanggal'         => $this->input->post("tanggal"),
            'sesi'         => $this->input->post("sesi"),
            'nama'         => $this->input->post("nama"),
            'nohp'         => $this->input->post("nohp"),
        );
 
        $hasil=$this->DaftarPasienmodel->update($data, $id);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data pasien berhasil diupdate didatabase.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data pasien tidak diupdate di database.
                                                </div>');            
        }
 
        //redirect
        redirect('Sekolah');
 
    }
 
    public function hapus($id)
    {
        $hasil=$this->DaftarPasienmodel->hapus($id);
        //redirect
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data Sekolah berhasil dihapus di database.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data Sekolahmodel tidak dihapus di database.
                                                </div>');            
        }
        redirect('DaftarPasien');
 
    }

 
}