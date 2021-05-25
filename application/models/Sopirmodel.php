<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Sopirmodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $sql = "SELECT *,(SELECT namausers FROM users WHERE idUsers=sopir.SPVmanpower) manpower,(SELECT namausers FROM users WHERE idUsers=sopir.SPVrepo) repo,(SELECT namausers FROM users WHERE idUsers=sopir.SPVDoor) door FROM sopir";
		$query = $this->db->query($sql);
        return $query->result();
    }
 

    public function simpan($data)
    {
		$sql = "select max(idSopir) maxid from sopir";
		$query = $this->db->query($sql);
		$max=$query->row();
        if (isset($max))
        {
            $hasilrow=$max->maxid;
            $data['idSopir']=$hasilrow+1;            
        } else {
            $data['idSopir']=0;            
        }

        $query = $this->db->insert("sopir", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function edit($idSopir)
    {
 
        $query = $this->db->where("id", $idSopir)
                ->get("sopir");
 
        if($query){
            return $query->row();
        }else{
            return false;
        }
 
    }
 
    public function update($data, $idSopir)
    {
 
        $query = $this->db->update("sopir", $data, $idSopir);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function hapus($idSopir)
    {
 
        $this->db->where('idSopir', $idSopir);
        $hasil = $this->db->delete('sopir');
        if($hasil){
            return true;
        }else{
            return false;
        }
      
    }
 
}