<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Transaksidepomodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $sql = "SELECT r.*,s.Nama FROM `ratedoor` r INNER JOIN sopir s ON r.`Sopir_idSopir`=s.idSopir WHERE 1";
		$query = $this->db->query($sql);
        return $query->result();
    }
 


    public function hapus($idRateDoor)
    {
 
        $this->db->where('idRateDoor', $idRateDoor);
        $hasil = $this->db->delete('ratedoor');
        if($hasil){
            return true;
        }else{
            return false;
        }
      
    }
 
}