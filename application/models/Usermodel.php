<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Usermodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $sql = "SELECT * FROM superadmin";
		$query = $this->db->query($sql);
        return $query->result();
    }
 

    public function simpan($data)
    {
        $query = $this->db->insert("superadmin", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function edit($id)
    {
 
        $query = $this->db->where("id", $id)
                ->get("superadmin");
 
        if($query){
            return $query->row();
        }else{
            return false;
        }
 
    }
 
    public function update($data, $id)
    {
 
        $query = $this->db->where("id", $id)
						->update("superadmin", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function hapus($id)
    {
 
        $this->db->where('id', $id);
        $hasil = $this->db->delete('superadmin');
        if($hasil){
            return true;
        }else{
            return false;
        }
      
    }
}