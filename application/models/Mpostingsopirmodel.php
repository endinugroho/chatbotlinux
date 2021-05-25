<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class mpostingsopirmodel extends CI_model{
 
    public function get_all()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $date = date("Y/m/d");
        $d = date_parse_from_format("Y-m-d", $date);
        $bulan1= $d["month"];
        $bulan2= 0;
        $tahun1= $d["year"];
        $tahun2=$tahun1;
        if ($bulan1==1)
        {
            $tahun2=$tahun1-1;
            $bulan2=12;
        } else
        {
            $bulan2=$bulan1-1;
        }
        $sql = "SELECT * FROM ratemanpower r inner join sopir s on r.Sopir_idSopir=s.idSopir where (month(tanggal)=".$bulan1." and year(tanggal)=".$tahun1.") or (month(tanggal)=".($bulan2)." and year(tanggal)=".$tahun2.")" ;
        //echo $sql; 
		$query = $this->db->query($sql);
        return $query->result();
    }
 
    public function get_allspv()
    {
        $date = date("Y/m/d");
        $d = date_parse_from_format("Y-m-d", $date);
        $bulan= $d["month"];
        $tahun1= $d["year"];
        $tahun2=$tahun1;
        if ($bulan==1)
        {
            $tahun2=$tahun1-1;
        }
        $sql = "SELECT s.Nama,r.* FROM ratemanpower r INNER JOIN sopir s on r.Sopir_idSopir=s.idSopir WHERE s.SPVmanpower=1 
 and (month(r.tanggal)=".$bulan." and year(r.tanggal)=".$tahun1.") or (month(r.tanggal)=".($bulan-1)." and year(r.tanggal)=".$tahun2.")" ;
		$query = $this->db->query($sql);
        return $query->result();
    }

    public function get_allspvrepo()
    {
        $date = date("Y/m/d");
        $d = date_parse_from_format("Y-m-d", $date);
        $bulan= $d["month"];
        $tahun1= $d["year"];
        $tahun2=$tahun1;
        if ($bulan==1)
        {
            $tahun2=$tahun1-1;
        }
        $sql = "SELECT s.Nama,r.* FROM raterepo r INNER JOIN sopir s on r.Sopir_idSopir=s.idSopir WHERE s.SPVrepo=1 
 and (month(r.tanggal)=".$bulan." and year(r.tanggal)=".$tahun1.") or (month(r.tanggal)=".($bulan-1)." and year(r.tanggal)=".$tahun2.")" ;
 //echo $sql;
		$query = $this->db->query($sql);
        return $query->result();
    }

    public function get_allspvdoor()
    {
        $date = date("Y/m/d");
        $d = date_parse_from_format("Y-m-d", $date);
        $bulan= $d["month"];
        $tahun1= $d["year"];
        $tahun2=$tahun1;
        if ($bulan==1)
        {
            $tahun2=$tahun1-1;
        }
        $sql = "SELECT s.Nama,r.* FROM ratedoor r INNER JOIN sopir s on r.Sopir_idSopir=s.idSopir WHERE s.SPVDoor=1 
 and (month(r.tanggal)=".$bulan." and year(r.tanggal)=".$tahun1.") or (month(r.tanggal)=".($bulan-1)." and year(r.tanggal)=".$tahun2.")" ;
 echo $sql;
		$query = $this->db->query($sql);
        return $query->result();
    }


    // public function get_allrepo()
    // {
 
    //      $date = date("Y/m/d");
    //     $d = date_parse_from_format("Y-m-d", $date);
    //     $bulan= $d["month"];
    //     $sql = "SELECT * FROM raterepo where month(tanggal)=".$bulan;
	// 	$query = $this->db->query($sql);
    //     return $query->result();
    // }

    public function get_allrepo()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $date = date("Y/m/d");
        $d = date_parse_from_format("Y-m-d", $date);
        $bulan1= $d["month"];
        $bulan2= 0;
        $tahun1= $d["year"];
        $tahun2=$tahun1;
        if ($bulan1==1)
        {
            $tahun2=$tahun1-1;
            $bulan2=12;
        } else
        {
            $bulan2=$bulan1-1;
        }
        $sql = "SELECT * FROM raterepo r inner join sopir s on r.Sopir_idSopir=s.idSopir where (month(tanggal)=".$bulan1." and year(tanggal)=".$tahun1.") or (month(tanggal)=".($bulan2)." and year(tanggal)=".$tahun2.")" ;
        echo $sql; 
		$query = $this->db->query($sql);
        return $query->result();
    }

public function get_alldoor()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        $date = date("Y/m/d");
        $d = date_parse_from_format("Y-m-d", $date);
        $bulan1= $d["month"];
        $bulan2= 0;
        $tahun1= $d["year"];
        $tahun2=$tahun1;
        if ($bulan1==1)
        {
            $tahun2=$tahun1-1;
            $bulan2=12;
        } else
        {
            $bulan2=$bulan1-1;
        }
        $sql = "SELECT * FROM ratedoor r inner join sopir s on r.Sopir_idSopir=s.idSopir where (month(tanggal)=".$bulan1." and year(tanggal)=".$tahun1.") or (month(tanggal)=".($bulan2)." and year(tanggal)=".$tahun2.")" ;
        echo $sql; 
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

    public function simpandoor($data)
    {
		$sql = "select max(idRateDoor) maxid from ratedoor";
		$query = $this->db->query($sql);
		$max=$query->row();
        if (isset($max))
        {
            $hasilrow=$max->maxid;
            $data['idRateDoor']=$hasilrow+1;            
        } else {
            $data['idRateDoor']=0;            
        }

        $query = $this->db->insert("ratedoor", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }

    public function simpanppjk($data)
    {
		$sql = "select max(idRatePPJK) maxid from rateppjk";
		$query = $this->db->query($sql);
		$max=$query->row();
        if (isset($max))
        {
            $hasilrow=$max->maxid;
            $data['idRatePPJK']=$hasilrow+1;            
        } else {
            $data['idRatePPJK']=0;            
        }

        $query = $this->db->insert("rateppjk", $data);
 
        if($query){
            return $data['idRatePPJK'];
        }else{
            return false;
        }
 
    }

    public function simpanbc20($data)
    {
		$sql = "select max(idBC20) maxid from bc20";
		$query = $this->db->query($sql);
		$max=$query->row();
        if (isset($max))
        {
            $hasilrow=$max->maxid;
            $data['idBC20']=$hasilrow+1;            
        } else {
            $data['idBC20']=0;            
        }

        $query = $this->db->insert("bc20", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }

    public function simpanbc23($data)
    {
		$sql = "select max(idBC23) maxid from bc23";
		$query = $this->db->query($sql);
		$max=$query->row();
        if (isset($max))
        {
            $hasilrow=$max->maxid;
            $data['idBC23']=$hasilrow+1;            
        } else {
            $data['idBC23']=0;            
        }

        $query = $this->db->insert("bc23", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }


    public function simpanbc28($data)
    {
		$sql = "select max(idBC28) maxid from bc28";
		$query = $this->db->query($sql);
		$max=$query->row();
        if (isset($max))
        {
            $hasilrow=$max->maxid;
            $data['idBC28']=$hasilrow+1;            
        } else {
            $data['idBC28']=0;            
        }

        $query = $this->db->insert("bc28", $data);
 
        if($query){
            return true;
        }else{
            return false;
        }
 
    }

    public function statusspv($status,$idrate)
    {
		$sql = "update ratemanpower set status='".$status."' where idRateManPower=".$idrate;
		$query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function statusdoc($status,$idrate)
    {
		$sql = "update ratemanpower set status='".str_replace('%20',' ',$status)."' where idRateManPower=".$idrate;
		$query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function statusdocrepo($status,$idrate)
    {
		$sql = "update raterepo set status='".str_replace('%20',' ',$status)."' where idRateRepo=".$idrate;
		$query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function statusdocdoor($status,$idrate)
    {
		$sql = "update ratedoor set status='".str_replace('%20',' ',$status)."' where idRateDoor=".$idrate;
		$query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }


    public function statusspvrepo($status,$idrate)
    {
		$sql = "update raterepo set status='".$status."' where idRateRepo=".$idrate;
		$query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }    
    
    public function statusspvdoor($status,$idrate)
    {
		$sql = "update ratedoor set status='".$status."' where idRateDoor=".$idrate;
		$query = $this->db->query($sql);
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