<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Absensimodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $sql = "SELECT p.nama, a.tanggal,a.sesi,a.waktu,concat(a.gpslong,' ',a.gpslat) gps,a.foto FROM absensi a INNER JOIN pegawai p on a.pegawai_id=p.id WHERE p.perusahaan_id=1";
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