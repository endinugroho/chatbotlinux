<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Menumodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        @session_start();
        $sql = "SELECT m.*,a.nama aplikasi FROM Menu m 
                JOIN aplikasi a ON m.idaplikasi=a.id
                WHERE m.idaplikasi = ". @$_SESSION["idaplikasi"];
		$query = $this->db->query($sql);
        return $query->result();
    }
 

    public function simpan($data)
    {
        // $sql = "INSERT INTO `menu` (`pertanyaan`, `jawaban`, `command`, `idaplikasi`, `idparent`) VALUES ('nama sekolah', 'bhayangkari', 'NS', '1', '0'); ";
        $query = $this->db->insert("menu", $data);
//		$query = $this->db->query($sql);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function edit($id)
    {
 
        $query = $this->db->where("id", $id)
                ->get("Menu");
 
        if($query){
            return $query->row();
        }else{
            return false;
        }
 
    }
 
    public function update($data, $id)
    {
 
        $query = $this->db->where("id", $id)
						->update("Menu", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function hapus($id)
    {
 
        $this->db->where('id', $id);
        $hasil = $this->db->delete('Menu');
        if($hasil){
            return true;
        }else{
            return false;
        }
      
    }
}