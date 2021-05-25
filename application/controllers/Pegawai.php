<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pegawai extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Pegawaimodel');
        $this->load->model('Perusahaanmodel');
        $this->load->model('Shiftmodel');
 
    }
 
    public function index()
    {
		if (isset($_POST['perusahaan'])) 
		{
			$idperush=$_POST['perusahaan'];
        } else
		{
			$idperush=0;
		}
		$data = array(
 
            'title'     => 'Data Pegawai',
            'datapegawai' => $this->Pegawaimodel->get_all($idperush),
            'dataperush' => $this->Perusahaanmodel->get_all(),
			'idperush' => $idperush
 
        );
        $this->load->view('pegawai', $data);
    }
 
      public function tambah()
    {
        $id = $this->uri->segment(3);
        $data = array(
 
            'title'     => 'Tambah Data Pegawai',
            'dataperush' => $this->Pegawaimodel->get_all($id),
            'datashift' => $this->Shiftmodel->get_all(),
			'method' => 'Tambah',
			'idperush' => $id
        );
 
        $this->load->view('detailpegawai', $data);
    }
 
    public function simpan()
    {
        $data = array( 
            'nama'         => $this->input->post("nama"),
            'alamat'         => $this->input->post("alamat"),
            'telepon'         => $this->input->post("telepon"),
            'jabatan'         => $this->input->post("jabatan"),
            'username'         => $this->input->post("username"),
            'password'         => $this->input->post("password"),
            'roleapp'         => $this->input->post("roleapp"),
			'foto'			=> $this->input->post("roleapp"),
            'perusahaan_id'  => $this->input->post("perusahaan_id"),
            'shift_id'  => $this->input->post("shift_id"),
 
        );
 
        $hasil=$this->Pegawaimodel->simpan($data);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data perusahaan berhasil ditambah di database.
                                                </div>');            
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data perusahaan tidak ditambah di database.
                                                </div>');            
        }

 
        //redirect
        redirect('Pegawai');
 
    }
 
    public function edit()
    {
        $id = $this->uri->segment(3);
 
        $data = array(
 
            'title'     => 'Edit Data Pegawai',
            'dataperush' => $this->Pegawaimodel->edit($id),
            'datashift' => $this->Shiftmodel->get_all(),
			'method' => 'Edit',
        );
 
        $this->load->view('detailpegawai', $data);
    }
 
    public function update()
    {
        $id = $this->input->post("id");
        $data = array(
            'nama'         => $this->input->post("nama"),
            'alamat'         => $this->input->post("alamat"),
            'telepon'         => $this->input->post("telepon"),
            'jabatan'         => $this->input->post("jabatan"),
            'username'         => $this->input->post("username"),
            'password'         => $this->input->post("password"),
            'roleapp'         => $this->input->post("roleapp"),
			'foto'			=> $this->input->post("roleapp"),
            'perusahaan_id'  => $this->input->post("perusahaan_id"),
            'shift_id'  => $this->input->post("shift_id"),
        );
 
        $hasil=$this->Pegawaimodel->update($data, $id);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data perusahaan berhasil diupdate didatabase.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data perusahaan tidak diupdate di database.
                                                </div>');            
        }
 
        //redirect
        redirect('Pegawai');
 
    }
 
    public function hapus($id)
    {
        $hasil=$this->Pegawaimodel->hapus($id);
        //redirect
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data Perusahaan berhasil dihapus di database.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data Perusahaanmodel tidak dihapus di database.
                                                </div>');            
        }
        redirect('Pegawai');
 
    }

}