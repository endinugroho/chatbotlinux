<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class DaftarPasienmodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $sql = "SELECT * FROM antrean";
		$query = $this->db->query($sql);
        return $query->result();
    }
 
    public function get_all_pagi($tanggal)
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $sql = "SELECT * FROM antrean where tanggal='".$tanggal."' and UPPER(sesi)='PAGI'";
		$query = $this->db->query($sql);
        return $query->result();
    }

    public function get_all_sore($tanggal)
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $sql = "SELECT * FROM antrean where tanggal='".$tanggal."' and UPPER(sesi)='SORE'";
		$query = $this->db->query($sql);
        return $query->result();
    }
   
    public function simpan($data)
    {
        // $sql = "update ratemanpower set status='".$status."' where idRateManPower=".$idrate;
		// $query = $this->db->query($sql);
        // if($query){
        //     return true;
        // }else{
        //     return false;
        // }        
        $sql = "select (ifnull(max(noantrian),0)+1) noantrian from antrean where tanggal='".$data['tanggal']."' and UPPER(sesi)='".strtoupper($data['sesi'])."' and noantrian<6";
		$query = $this->db->query($sql);
		$max=$query->row();
        if (isset($max))
        {
            if ($max->noantrian>=6)
            {
                $sql2 = "select (ifnull(max(noantrian),0)+1) noantrian from antrean where tanggal='".$data['tanggal']."' and UPPER(sesi)='".strtoupper($data['sesi'])."'";
                $query2 = $this->db->query($sql2);
                $max2=$query2->row();
                $data['noantrian']=$max2->noantrian; 
            } else
            {
                $data['noantrian']=$max->noantrian; 
            }
        }
        $query = $this->db->insert("antrean", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function edit($id)
    {
 
        $query = $this->db->where("id", $id)
                ->get("antrean");
 
        if($query){
            return $query->row();
        }else{
            return false;
        }
 
    }
 
    public function update($data, $id)
    {
 
        $query = $this->db->where("id", $id)
						->update("antrean", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function hapus($id)
    {
 
        $this->db->where('id', $id);
        $hasil = $this->db->delete('antrean');
        if($hasil){
            return true;
        }else{
            return false;
        }
      
    }
}