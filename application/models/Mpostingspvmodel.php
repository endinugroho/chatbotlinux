<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class mpostingspvmodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $date = date("Y/m/d");
        $d = date_parse_from_format("Y-m-d", $date);
        $bulan= $d["month"];
        $tahun1= $d["year"];
        $tahun2=$tahun1;
        if ($bulan==1)
        {
            $tahun2=$tahun-1;
        }
        $sql = "SELECT * FROM ratemanpower where (month(tanggal)=".$bulan." and year(tanggal)=".$tahun1.") or (month(tanggal)=".($bulan-1)." and year(tanggal)=".$tahun2.")" ;
		$query = $this->db->query($sql);
        return $query->result();
    }
 
    public function get_allrepo()
    {
 
         $date = date("Y/m/d");
        $d = date_parse_from_format("Y-m-d", $date);
        $bulan= $d["month"];
        $sql = "SELECT * FROM raterepo where month(tanggal)=".$bulan;
		$query = $this->db->query($sql);
        return $query->result();
    }

    public function simpan($data)
    {
		$sql = "select max(idRateManpower) maxid from ratemanpower";
		$query = $this->db->query($sql);
		$max=$query->row();
        if (isset($max))
        {
            $hasilrow=$max->maxid;
            $data['idRateManpower']=$hasilrow+1;            
        } else {
            $data['idRateManpower']=0;            
        }

        $query = $this->db->insert("ratemanpower", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
 
    public function simpanrepo($data)
    {
		$sql = "select max(idRateRepo) maxid from raterepo";
		$query = $this->db->query($sql);
		$max=$query->row();
        if (isset($max))
        {
            $hasilrow=$max->maxid;
            $data['idRateRepo']=$hasilrow+1;            
        } else {
            $data['idRateRepo']=0;            
        }

        $query = $this->db->insert("raterepo", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }
    public function edit($idSopir)
    {
 
        $query = $this->db->where("idSopir", $idSopir)
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
      $this->db->delete('sopir');
    }
 
}