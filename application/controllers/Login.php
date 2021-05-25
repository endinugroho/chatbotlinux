<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
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
 
        $this->load->view('login', $data);
    }
 
    public function dologin()
    {
        $login=$this->input->post("username");
        $password=$this->input->post("password");
        
        $hasil=$this->Loginmodel->dologin($login,$password);
        if ($hasil=="ADMIN")
        {
            redirect('dashboard');
        } elseif ($hasil=="ANGGOTA")
        {
            $a = $this->db->query("select * from superadmin where login='".$login."' and password='".$password."'")->row_array();
            @session_start();
            
            $_SESSION['idapp'] = $a['idaplikasi'];
            redirect('dashboard');
        } else
        {
            echo '<script>if (confirm("Login Gagal")) {
                    window.location.href="'. base_url() .'"
                } else {
                    window.location.href="'. base_url() .'"
                }</script>';
            // redirect(base_url());
        }
    
    }
}