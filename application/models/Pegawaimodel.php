<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pegawaimodel extends CI_model{
 
    public function get_all($id)
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $sql = "SELECT * FROM pegawai where perusahaan_id=".$id;
		$query = $this->db->query($sql);
        return $query->result();
    }
 


    public function edit($id)
    {
 
        $query = $this->db->where("id", $id)
                ->get("pegawai");
 
        if($query){
            return $query->row();
        }else{
            return false;
        }
 
    }
	
   public function simpan($data)
    {
        $query = $this->db->insert("pegawai", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 	
 
    public function update($data, $id)
    {
 
        $query = $this->db->where("id", $id)
						->update("pegawai", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function hapus($id)
    {
 
        $this->db->where('id', $id);
        $hasil = $this->db->delete('pegawai');
        if($hasil){
            return true;
        }else{
            return false;
        }
      
    }	
}