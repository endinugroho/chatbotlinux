<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class informasimodel extends CI_model{
 
    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('informasi')
                 ->get();
        return $query->result();
    }
 
    public function getharga_all($id)
    {
        $query = $this->db->select("*")
                 ->from('harga')
                 ->where("idVendor", $id)
                ->get();

        return $query->result();
    }

    public function getcomboharga_all($id)
    {
        $query = $this->db->select("CONCAT(idHarga,'-',hargasopir) id, tujuan text")
                 ->from('harga')
                 ->where("idVendor", $id)
                ->get();

        return $query->result();
    }

    public function edit($BiayaBPJS)
    {
 
        $query = $this->db->where("BiayaBPJS", $BiayaBPJS)
                ->get("informasi");
 
        if($query){
            return $query->row();
        }else{
            return false;
        }
 
    }
 

    public function editharga($idHarga)
    {
 
        $query = $this->db->where("idHarga", $idHarga)
                ->get("harga");
 
        if($query){
            return $query->row();
        }else{
            return false;
        }
 
    }


    public function getdata($data)
    {
        $sql = "select nilaivar from informasi where namavar='".$data."'";
//        if ($data=="c440fullharga")
//        {
//            echo $sql;exit;
//        }

		$query = $this->db->query($sql);
		$hasil=$query->row();
        // if (isset($hasil))
        // {
        //     return "";
        // } else
        // {
        //     return $hasil->nilaivar;
        // }
        return $hasil;    
    }

    public function getdataharga($data)
    {
        $sql = "select harga from harga where tujuan='".$data."'";
		$query = $this->db->query($sql);
		$hasil=$query->row();
        // if (isset($hasil))
        // {
        //     return "";
        // } else
        // {
        //     return $hasil->nilaivar;
        // }
        return $hasil;    
    }

 public function simpanharga($data)
    {
		$sql = "select max(idHarga) maxid from harga";
		$query = $this->db->query($sql);
		$max=$query->row();
        if (isset($max))
        {
            $hasilrow=$max->maxid;
            $data['idHarga']=$hasilrow+1;            
        } else {
            $data['idHarga']=0;            
        }

        $query = $this->db->insert("harga", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }

    public function savedata($data,$nilai)
    {
        $sql = "update informasi set nilaivar='".$nilai."' where namavar='".$data."'";
		$query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function savedataharga($data,$nilai)
    {
        $sql = "update harga set harga='".$nilai."' where tujuan='".$data."'";
		$query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }


    public function update($data, $BiayaBPJS)
    {
 
        $query = $this->db->update("informasi", $data, $BiayaBPJS);
 
        if($query){
            return true;
        } else {
            return false;
        }
 
    }
 

    public function updateharga($data, $idHarga)
    {
        $this->db->where('idHarga', $idHarga);
        $this->db->set('tujuan', $data['tujuan']);
        $this->db->set('harga', $data['harga']);
        $this->db->set('hargasopir', $data['hargasopir']);
        $query = $this->db->update("harga");

        if($query){
            return true;
        }else{
            return false;
        }
 
    }
    
    public function hapusharga($idHarga)
    {
 
        $this->db->where('idHarga', $idHarga);
        $hasil = $this->db->delete('harga');
        if($hasil){
            return true;
        }else{
            return false;
        }
      
    }

 
}