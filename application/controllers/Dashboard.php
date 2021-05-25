<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
 
    }
 
    public function index()
    {
        $data = array(

            'title'     => 'Dashboard',

        );
        $this->load->view('templates/header1',$data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function leanmeore($id){
        @session_start();
        

        if($_SESSION["idaplikasi"]== ""){
            $_SESSION["idaplikasi"] = $id;
        } else {
            unset($_SESSION["idaplikasi"]);
            $_SESSION["idaplikasi"] = $id;
        }
        redirect('Menu');
    }
 
 
}