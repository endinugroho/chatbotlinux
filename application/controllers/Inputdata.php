<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inputdata extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('mpostingsopirmodel');
        $this->load->model('customermodel');
        $this->load->model('usersmodel');
        $this->load->model('Informasimodel');

    }

    public function index()
    {
        $data = array(

            'title'     => 'Input Data',
            'datacustomer' => $this->customermodel->get_all(),
            'datausers' => $this->usersmodel->get_allppjk(),
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

        $this->load->view('inputdata', $data);
    }

    // PUBLIC FUNCTION TAMBAH()
    // {
    //     $DATA = ARRAY(

    //         'TITLE'     => 'TAMBAH DATA SISWA'

    //     );

    //     $THIS->LOAD->VIEW('TAMBAHSOPIR', $DATA);
    // }

     public function simpan()
     {


         $this->Informasimodel->savedata("manpowerbmc",$this->input->post("data1"));
         $this->Informasimodel->savedata("ritaselebih",$this->input->post("data2"));
         $this->Informasimodel->savedata("ritasesopir",$this->input->post("data3"));

         $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> success! data berhasil disimpan didatabase.
                                                 </div>');

         //redirect
         //redirect('inputdata/');

     }

     public function simpanrepo()
     {


         $this->Informasimodel->savedata("plp20fullharga",$this->input->post("data1"));
         $this->Informasimodel->savedata("plp20fullretase",$this->input->post("data2"));
         $this->Informasimodel->savedata("plp40fullharga",$this->input->post("data3"));
         $this->Informasimodel->savedata("plp40fullretase",$this->input->post("data4"));
         $this->Informasimodel->savedata("c420fullharga",$this->input->post("data5"));
         $this->Informasimodel->savedata("c420fullretase",$this->input->post("data6"));
         $this->Informasimodel->savedata("c440fullharga",$this->input->post("data7"));
         $this->Informasimodel->savedata("c440fullretase",$this->input->post("data8"));
         $this->Informasimodel->savedata("ctp20empharga",$this->input->post("data9"));
         $this->Informasimodel->savedata("ctp20empretase",$this->input->post("data10"));
         $this->Informasimodel->savedata("ctp20fullharga",$this->input->post("data11"));
         $this->Informasimodel->savedata("ctp20fullretase",$this->input->post("data12"));
         $this->Informasimodel->savedata("ctp40empharga",$this->input->post("data13"));
         $this->Informasimodel->savedata("ctp40empretase",$this->input->post("data14"));
         $this->Informasimodel->savedata("ctp40fullharga",$this->input->post("data15"));
         $this->Informasimodel->savedata("ctp40fullretase",$this->input->post("data16"));
         $this->Informasimodel->savedata("ttl20fullharga",$this->input->post("data17"));
         $this->Informasimodel->savedata("ttl20fullretase",$this->input->post("data18"));
         $this->Informasimodel->savedata("ttl40fullharga",$this->input->post("data19"));
         $this->Informasimodel->savedata("ttl40fullretase",$this->input->post("data20"));
         
         $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> success! data berhasil disimpan didatabase.
                                                 </div>');

         //redirect
         //redirect('inputdata/');

     }

    public function simpanppjk()
    {

        $data = array(
 
            'Vendor_idVendor'=> $this->input->post("customerppjk"),
            'invoiceno'=> $this->input->post("invoiceno"),
            'nofp'=> $this->input->post("nofp"),
            'tanggal'=> $this->input->post("tanggal"),
            'pibajuno'=> $this->input->post("pibajuno"),
            'pibnopen'=> $this->input->post("pibnopen"),
            'pol'=> $this->input->post("pol"),
            'pod'=> $this->input->post("pod"),
            'vesselname'=> $this->input->post("vesselname"),
            'party'=> $this->input->post("party"),
            'quantity'=> $this->input->post("quantity"),
            'grossweight'=> $this->input->post("grossweight"),
            'commodity'=> $this->input->post("commodity"),
            'blnumber'=> $this->input->post("blnumber"),
            'lainlain1'=> $this->input->post("lainlain1ket")."#".$this->input->post("lainlain1nilai"),
            'lainlain2'=> $this->input->post("lainlain2ket")."#".$this->input->post("lainlain2nilai"),
            'lainlain3'=> $this->input->post("lainlain3ket")."#".$this->input->post("lainlain3nilai"),
            'lainlain4'=> $this->input->post("lainlain4ket")."#".$this->input->post("lainlain4nilai"),
            'lainlain5'=> $this->input->post("lainlain5ket")."#".$this->input->post("lainlain5nilai"),

        );
 
        $hasil=$this->mpostingsopirmodel->simpanppjk($data);
        
        if ($this->input->post("pekerjaan")=="BC20")
        {
            $data1 = array(
     
                'pibpreparation'=> $this->input->post("pibpreparation"),
                'administrationfee'=> $this->input->post("adminfee"),
                'redline'=> $this->input->post("redline"),
                'greenline'=> $this->input->post("greenline"),
                'trucking'=> $this->input->post("trucking"),
                'RatePPJK_idRatePPJK'=> $hasil,

            );            

            $hasil=$this->mpostingsopirmodel->simpanbc20($data1);


        } elseif ($this->input->post("pekerjaan")=="BC23")
        {

            $data2 = array(
     
                'clearancefee'=> $this->input->post("clearancefee"),
                'trucking'=> $this->input->post("trucking"),
                'RatePPJK_idRatePPJK'=> $hasil,

            );            

            $hasil=$this->mpostingsopirmodel->simpanbc23($data2);
            
        }elseif ($this->input->post("pekerjaan")=="BC28")
        {
            $data3 = array(
     
                'ppjkhandlingfee'=> $this->input->post("ppjkhandlingfee"),
                'plbpreparation'=> $this->input->post("plbpreparation"),
                'insurancearrangement'=> $this->input->post("insurancearrangement"),
                'RatePPJK_idRatePPJK'=> $hasil,

            );            

            $hasil=$this->mpostingsopirmodel->simpanbc28($data3);
            
        }
 
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
        redirect('Inputdata/');
 
    }
 



    // public function edit($idSopir)
    // {
    //     $id_siswa = $this->uri->segment(3);

    //     $data = array(

    //         'title'     => 'Edit Data Siswa',
    //         'datasopir' => $this->sopirmodel->edit($idSopir)

    //     );

    //     $this->load->view('editsopir', $data);
    // }

    // public function update()
    // {
    //     $id['idSopir'] = $this->input->post("idSopir");
    //     $data = array(

    //         'idSopir'       => $this->input->post("idSopir"),
    //         'Nama'         => $this->input->post("Nama"),
    //         'Alamat'    => $this->input->post("Alamat"),
    //         'Kota'         => $this->input->post("Kota"),
    //         'NoHP'         => $this->input->post("NoHP"),
    //         'username'         => $this->input->post("username"),
    //         'password'         => $this->input->post("password"),
    //         'token'         => $this->input->post("token")

    //     );

    //     $this->sopirmodel->update($data, $id);

    //     $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
    //                                             </div>');

    //     //redirect
    //     redirect('sopir');

    // }

    // public function hapus($idSopir)
    // {
    //     $this->sopirmodel->hapus($idSopir);
    //     //redirect
    //     redirect('sopir');

    // }

}