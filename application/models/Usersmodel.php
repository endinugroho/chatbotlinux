<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Usersmodel extends CI_model{
 
    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('users')
                 ->order_by('idUsers', 'ASC')
                 ->get();
        return $query->result();
    }
 
    public function get_allppjk()
    {
        $query = $this->db->select("*")
                 ->from('users')
                 ->where('subbagian','ppjk')
                 ->order_by('idUsers', 'ASC')
                 ->get();
        return $query->result();
    }

    public function simpan($data)
    {
		$sql = "select max(idUsers) maxid from users";
		$query = $this->db->query($sql);
		$max=$query->row();
        if (isset($max))
        {
            $hasilrow=$max->maxid;
            $data['idUsers']=$hasilrow+1;            
        } else {
            $data['idUsers']=0;            
        }
        $query = $this->db->insert("users", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function edit($idUsers)
    {
 
        $query = $this->db->where("idUsers", $idUsers)
                ->get("users");
 
        if($query){
            return $query->row();
        }else{
            return false;
        }
 
    }
 
    public function update($data, $idUsers)
    {
        $query = $this->db->update("users", $data, $idUsers);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function hapus($idUsers)
    {
 
      $this->db->where('idUsers', $idUsers);
      $this->db->delete('users');
    }
 
}