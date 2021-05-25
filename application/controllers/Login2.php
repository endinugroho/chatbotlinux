<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login2 extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Loginmodel');
        
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Sopir',
 
        );
 
        $this->load->view('login2', $data);
    }
 
    public function dologin()
    {
        $login=$this->input->post("username");
        $password=$this->input->post("password");
        
        $hasil=$this->Loginmodel->dologin($login,$password);
        echo $hasil;
        if ($hasil=="ADMIN")
        {
            redirect('dashboard');
        } elseif ($hasil=="ANGGOTA")
        {
            redirect('dashboard2');
        } elseif ($hasil=="PRAKTEK")
        {
            redirect('dashboard3');
        } else
        {
            echo "login gagal 2";
        }
        
    }
}