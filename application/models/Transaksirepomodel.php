<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Transaksirepomodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $sql = "SELECT r.*,s.Nama FROM `raterepo` r INNER JOIN sopir s ON r.`Sopir_idSopir`=s.idSopir WHERE 1";
		$query = $this->db->query($sql);
        return $query->result();
    }
 


    public function hapus($idRateRepo)
    {
 
        $this->db->where('idRateRepo', $idRateRepo);
        $hasil = $this->db->delete('raterepo');
        if($hasil){
            return true;
        }else{
            return false;
        }
      
    }
 
}