<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Aplikasimodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $sql = "SELECT * FROM Aplikasi";
		$query = $this->db->query($sql);
        return $query->result();
    }
 

    public function simpan($data)
    {
        $query = $this->db->insert("Aplikasi", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function edit($id)
    {
 
        $query = $this->db->where("id", $id)
                ->get("Aplikasi");
 
        if($query){
            return $query->row();
        }else{
            return false;
        }
 
    }
 
    public function update($data, $id)
    {
 
        $query = $this->db->where("id", $id)
						->update("Aplikasi", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function hapus($id)
    {
 
        $this->db->where('id', $id);
        $hasil = $this->db->delete('aplikasi');
        if($hasil){
            return true;
        }else{
            return false;
        }
      
    }
}