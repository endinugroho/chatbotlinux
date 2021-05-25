<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Loginmodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $sql = "SELECT *,(SELECT namausers FROM users WHERE idUsers=sopir.SPVmanpower) manpower,(SELECT namausers FROM users WHERE idUsers=sopir.SPVrepo) repo,(SELECT namausers FROM users WHERE idUsers=sopir.SPVDoor) door FROM sopir";
		$query = $this->db->query($sql);
        return $query->result();
    }
 

    
    public function dologin($user,$password)
    {
 
		$sql = "select * from superadmin where login='".$user."' and password='".$password."'";
		$query = $this->db->query($sql);
        //echo "<script type='text/javascript'>alert('".$sql."');</script>";  
        if ($query->num_rows()>0)
        {
            $max=$query->row();
            $_SESSION['id']=$max->id;
            setcookie("nama", $max->nama, time() + (86400 * 30 * 365), "/"); // 86400 = 1 day
            setcookie("username", $max->login, time() + (86400 * 30 * 365), "/"); // 86400 = 1 day
            setcookie("peranapp", $max->peranapp, time() + (86400 * 30 * 365), "/"); // 86400 = 1 day
            
            return $max->peranapp;
            
        } else {
            return false;
        }
 
    }

    
}