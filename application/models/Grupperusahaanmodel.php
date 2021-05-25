<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Grupperusahaanmodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $sql = "SELECT * FROM grupperusahaan";
		$query = $this->db->query($sql);
        return $query->row();
    }
 

    public function update($data, $id)
    {
        $query = $this->db->where("id", $id)
                         ->update("grupperusahaan", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
}