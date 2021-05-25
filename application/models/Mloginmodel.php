<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mloginmodel extends CI_model{

    
   public function dologin($user,$password,$bagian)
    {
        $sql = "select * from pegawai where username='".$user."' and password='".$password."' and roleapp='".$bagian."'";
		$query = $this->db->query($sql);
        // echo "<script type='text/javascript'>alert('".$bagian."');</script>";  
        //alert($sql);
        // exit;
        if ($query->num_rows()>0)
        {
            $max=$query->row();
            $_SESSION['id']=$max->id;
            $_SESSION['nama']=$max->nama;
            $_SESSION['jabatan']=$max->jabatan;
            $_SESSION['bagian']=$max->roleapp;
            return true;
            
        } else {
            return false;
        }
 
    }
 
 
 
}