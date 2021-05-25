<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class PegawaiShiftmodel extends CI_model{
 
    public function get_all($id)
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $sql = "SELECT p.nama,s.namashift FROM pegawai p INNER JOIN (pegawaishift ps INNER JOIN shift s on ps.shift_id=s.id) on p.id=ps.pegawai_id WHERE p.perusahaan_id=".$id;
		$query = $this->db->query($sql);
        return $query->result();
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