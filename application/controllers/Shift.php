<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Shift extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Shiftmodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Absensi',
            'datashift' => $this->Shiftmodel->get_all(),
 
        );
 
        $this->load->view('shift', $data);
    }
 
      public function tambah()
    {
        $data = array(
 
            'title'     => 'Tambah Data Perusahaan',
			'method' => 'Tambah',
 
        );
 
        $this->load->view('detailshift', $data);
    }
 
    public function simpan()
    {
        $data = array(
 
            'namashift'         => $this->input->post("namashift"),
            'masuk'    => $this->input->post("masuk"),
            'pulang'         => $this->input->post("pulang"),
            'waktubreak'         => $this->input->post("waktubreak"),
            'afterbreak'  => $this->input->post("afterbreak"),
 
        );
 
        $hasil=$this->Shiftmodel->simpan($data);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data shift berhasil ditambah di database.
                                                </div>');            
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data shift tidak ditambah di database.
                                                </div>');            
        }

 
        //redirect
        redirect('Shift');
 
    }
 
    public function edit($id)
    {
        $id_siswa = $this->uri->segment(3);
 
        $data = array(
 
            'title'     => 'Edit Data Siswa',
            'dataperush' => $this->Shiftmodel->edit($id),
			'method' => 'Edit',
        );
 
        $this->load->view('detailshift', $data);
    }
 
    public function update()
    {
        $id = $this->input->post("id");
        $data = array(
            'namashift'         => $this->input->post("namashift"),
            'masuk'    => $this->input->post("masuk"),
            'pulang'         => $this->input->post("pulang"),
            'waktubreak'         => $this->input->post("waktubreak"),
            'afterbreak'  => $this->input->post("afterbreak"),
        );
 
        $hasil=$this->Shiftmodel->update($data, $id);
 
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
        redirect('Shift');
 
    }
 
    public function hapus($id)
    {
        $hasil=$this->Shiftmodel->hapus($id);
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
        redirect('Shift');
 
    }

}