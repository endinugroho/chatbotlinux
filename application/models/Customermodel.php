<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Customermodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        @session_start();
        $sql = "SELECT * FROM Customer WHERE idaplikasi = ". @$_SESSION["idaplikasi"];
		$query = $this->db->query($sql);
        return $query->result();
    }
 

    public function simpan($data)
    {
        $query = $this->db->insert("Customer", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function edit($id)
    {
 
        $query = $this->db->where("id", $id)
                ->get("customer");
 
        if($query){
            return $query->row();
        }else{
            return false;
        }
 
    }
 
    public function update($data, $id)
    {
 
        $query = $this->db->where("id", $id)
						->update("customer", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function hapus($id)
    {
 
        $this->db->where('id', $id);
        $hasil = $this->db->delete('customer');
        if($hasil){
            return true;
        }else{
            return false;
        }
      
    }
}