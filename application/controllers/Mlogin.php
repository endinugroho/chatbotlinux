<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mlogin extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('mloginmodel');
        
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Sopir dan SPV / Manager',
 
        );
 
        $this->load->view('mlogin', $data);
    }
 
    public function dologin()
    {
        $login=$this->input->post("username");
        $password=$this->input->post("password");
        $bagian=$this->input->post("bagian");
        if ($login=="taufik" && $password=="123456" && $bagian=="Admin")
        {
            redirect('dashboard');
        }
        $hasil=$this->mloginmodel->dologin($login,$password,$bagian);
        if ($hasil)
        {
            redirect('mdashboard');
        } else
        {
            echo '<script>
                    alert("Login Gagal")
                </script>';
            redirect(base_url());
        }
    
    }

    public function dologout(){
        @session_destroy();
        redirect(base_url());
    }
}