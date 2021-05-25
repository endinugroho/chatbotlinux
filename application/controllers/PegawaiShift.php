<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class PegawaiShift extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('PegawaiShiftmodel');
        $this->load->model('Shiftmodel');
        $this->load->model('Pegawaimodel');
        $this->load->model('Perusahaanmodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Pegawai Shift',
            'datapegawaishift' => $this->PegawaiShiftmodel->get_all(1),
 
        );
 
        $this->load->view('pegawaishift', $data);
    }
 
    public function tambah()
    {
        $data = array(
 
            'title'     => 'Data Pegawai Shift',
            'datapegawaishift' => $this->PegawaiShiftmodel->get_all(1),
            'datapegawai' => $this->Pegawaimodel->get_all(1),
            'datashift' => $this->Shiftmodel->get_all(),
            'dataperush' => $this->Perusahaanmodel->get_all(),
 
        );
 
        $this->load->view('detailpegawaishift', $data);
    }
 
}