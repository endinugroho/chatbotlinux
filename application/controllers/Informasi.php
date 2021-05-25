<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Informasi extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Informasimodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Sopir',
            'datainformasi' => $this->Informasimodel->get_all(),
             'manpowerbmc' => $this->Informasimodel->getdata("manpowerbmc"),
            'retaselebih' => $this->Informasimodel->getdata("manpowerretaselebih"),
            'retasesopir' => $this->Informasimodel->getdata("manpowerretasesopir"),
            'plp20fullharga' => $this->Informasimodel->getdata("plp20fullharga"),
            'plp20fullretase' => $this->Informasimodel->getdata("plp20fullretase"),
            'plp40fullharga' => $this->Informasimodel->getdata("plp40fullharga"),
            'plp40fullretase' => $this->Informasimodel->getdata("plp40fullretase"),
            'c420fullharga' => $this->Informasimodel->getdata("c420fullharga"),
            'c420fullretase' => $this->Informasimodel->getdata("c420fullretase"),
            'c440fullharga' => $this->Informasimodel->getdata("c440fullharga"),
            'c440fullretase' => $this->Informasimodel->getdata("c440fullretase"),
            'ctp20empharga' => $this->Informasimodel->getdata("ctp20empharga"),
            'ctp20empretase' => $this->Informasimodel->getdata("ctp20empretase"),
            'ctp20fullharga' => $this->Informasimodel->getdata("ctp20fullharga"),
            'ctp20fullretase' => $this->Informasimodel->getdata("ctp20fullretase"),
            'ctp40empharga' => $this->Informasimodel->getdata("ctp40empharga"),
            'ctp40empretase' => $this->Informasimodel->getdata("ctp40empretase"),
            'ctp40fullharga' => $this->Informasimodel->getdata("ctp40fullharga"),
            'ctp40fullretase' => $this->Informasimodel->getdata("ctp40fullretase"),
            'ttl20fullharga' => $this->Informasimodel->getdata("ttl20fullharga"),
            'ttl20fullretase' => $this->Informasimodel->getdata("ttl20fullretase"),
            'ttl40fullharga' => $this->Informasimodel->getdata("ttl40fullharga"),
            'ttl40fullretase' => $this->Informasimodel->getdata("ttl40fullretase"),

        );
 
        $this->load->view('datainformasi', $data);
    }
 
 
      public function simpaninformasi()
     {


         $this->Informasimodel->savedata("manpowerbmc",$this->input->post("manpowerbmc"));
         $this->Informasimodel->savedata("manpowerretaselebih",$this->input->post("manpowerretaselebih"));
         $this->Informasimodel->savedata("manpowerretasesopir",$this->input->post("manpowerretasesopir"));
         $this->Informasimodel->savedata("plp20fullharga",$this->input->post("plp20fullharga"));
         $this->Informasimodel->savedata("plp20fullretase",$this->input->post("plp20fullretase"));
         $this->Informasimodel->savedata("plp40fullharga",$this->input->post("plp40fullharga"));
         $this->Informasimodel->savedata("plp40fullretase",$this->input->post("plp40fullretase"));
         $this->Informasimodel->savedata("c420fullharga",$this->input->post("c420fullharga"));
         $this->Informasimodel->savedata("c420fullretase",$this->input->post("c420fullretase"));
         $this->Informasimodel->savedata("c440fullharga",$this->input->post("c440fullharga"));
         $this->Informasimodel->savedata("c440fullretase",$this->input->post("c440fullretase"));
         $this->Informasimodel->savedata("ctp20empharga",$this->input->post("ctp20empharga"));
         $this->Informasimodel->savedata("ctp20empretase",$this->input->post("ctp20empretase"));
         $this->Informasimodel->savedata("ctp20fullharga",$this->input->post("ctp20fullharga"));
         $this->Informasimodel->savedata("ctp20fullretase",$this->input->post("ctp20fullretase"));
         $this->Informasimodel->savedata("ctp40empharga",$this->input->post("ctp40empharga"));
         $this->Informasimodel->savedata("ctp40empretase",$this->input->post("ctp40empretase"));
         $this->Informasimodel->savedata("ctp40fullharga",$this->input->post("ctp40fullharga"));
         $this->Informasimodel->savedata("ctp40fullretase",$this->input->post("ctp40fullretase"));
         $this->Informasimodel->savedata("ttl20fullharga",$this->input->post("ttl20fullharga"));
         $this->Informasimodel->savedata("ttl20fullretase",$this->input->post("ttl20fullretase"));
         $this->Informasimodel->savedata("ttl40fullharga",$this->input->post("ttl40fullharga"));
         $this->Informasimodel->savedata("ttl40fullretase",$this->input->post("ttl40fullretase"));

         $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> success! data berhasil disimpan didatabase.
                                                 </div>');

         //redirect
         redirect('informasi/');

     }

    public function tambah()
    {
        $data = array(
 
            'title'     => 'Tambah Data Siswa'
 
        );
 
//        $this->load->view('tambahsopir', $data);
    }
 
    public function simpan()
    {
        $data = array(
 
            'BiayaBPJS'         => $this->input->post("BiayaBPJS"),
            'SewaPerOrangPelindo'    => $this->input->post("SewaPerOrangPelindo"),
            'ProsenSewaPerOrang'         => $this->input->post("ProsenSewaPerOrang"),
            'RateKelebihanPelindo'         => $this->input->post("RateKelebihanPelindo"),
            'RateKelebihanSopir'         => $this->input->post("RateKelebihanSopir"),
            'RateC4PLP'         => $this->input->post("RateC4PLP"),
            'RateTTL'         => $this->input->post("RateTTL"),
            'rate20feetc4'         => $this->input->post("rate20feetc4"),
            'rate40feetc4'    => $this->input->post("rate40feetc4"),
            'rate20feetplp'         => $this->input->post("rate20feetplp"),
            'rate40feetplp'         => $this->input->post("rate40feetplp"),
            'rate20feetttl'         => $this->input->post("rate20feetttl"),
            'rate40feetttl'         => $this->input->post("rate40feetttl"),
            'rate40feetttl'         => $this->input->post("rate40feetttl")
 
 
        );
 
        $this->sopirmodel->simpan($data);
 
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data informasi berhasil disimpan didatabase.
                                                </div>');
 
        //redirect
        redirect('informasi/');
 
    }
 
    public function edit($BiayaBPJS)
    {
        //$id_siswa = $this->uri->segment(3);
 
        $data = array(
 
            'title'     => 'Edit Data Informasi',
            'datainformasi' => $this->Informasimodel->edit($BiayaBPJS)
 
        );
 
        $this->load->view('editinformasi', $data);
    }
 
    public function update()
    {
  //      $id['idSopir'] = $this->input->post("idSopir");
        $data = array(
 
            'BiayaBPJS'         => $this->input->post("BiayaBPJS"),
            'SewaPerOrangPelindo'    => $this->input->post("SewaPerOrangPelindo"),
            'ProsenSewaPerOrang'         => $this->input->post("ProsenSewaPerOrang"),
            'RateKelebihanPelindo'         => $this->input->post("RateKelebihanPelindo"),
            'RateKelebihanSopir'         => $this->input->post("RateKelebihanSopir"),
            'RateC4PLP'         => $this->input->post("RateC4PLP"),
            'RateTTL'         => $this->input->post("RateTTL"),
            'rate20feetc4'         => $this->input->post("rate20feetc4"),
            'rate40feetc4'    => $this->input->post("rate40feetc4"),
            'rate20feetplp'         => $this->input->post("rate20feetplp"),
            'rate40feetplp'         => $this->input->post("rate40feetplp"),
            'rate20feetttl'         => $this->input->post("rate20feetttl"),
            'rate40feetttl'         => $this->input->post("rate40feetttl"),
            'rate40feetttl'         => $this->input->post("rate40feetttl"),
            'gajiperbulan'         => $this->input->post("gajiperbulan")

        );
 
        $this->Informasimodel->update($data, $id);
 
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');
 
        //redirect
        redirect('informasi');
 
    }
 

 
}