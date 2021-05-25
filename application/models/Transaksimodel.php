<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Transaksimodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        @session_start();
        $sql = "SELECT c.name,t.tanggaljam,t.message FROM `transaksi` t 
                JOIN customer c ON t.idcustomer=c.id
                WHERE t.idaplikasi = ".@$_SESSION["idaplikasi"];
		$query = $this->db->query($sql);
        return $query->result();
    }
 

    public function simpan($data)
    {
        $query = $this->db->insert("Transaksi", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function edit($id)
    {
 
        $query = $this->db->where("id", $id)
                ->get("Transaksi");
 
        if($query){
            return $query->row();
        }else{
            return false;
        }
 
    }
 
    public function update($data, $id)
    {
 
        $query = $this->db->where("id", $id)
						->update("Transaksi", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function hapus($id)
    {
 
        $this->db->where('id', $id);
        $hasil = $this->db->delete('Transaksi');
        if($hasil){
            return true;
        }else{
            return false;
        }
      
    }
}