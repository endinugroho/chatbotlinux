<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Grafikmodel extends CI_model{
 
    public function get_trafikuser()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        @session_start();
        if(@$_SESSION['idapp'] == 0 ) {
            $id = $_SESSION["idaplikasi"];
        } else {
            $id = $_SESSION['idapp'];
        }
        // SELECT t.message,m.pertanyaan FROM `transaksi` t INNER JOIN menu m on t.message=m.command WHERE t.idaplikasi=$id
        $sql = "SELECT c.name as nama,COUNT(c.name) as total FROM transaksi t INNER JOIN customer c ON t.idcustomer = c.id GROUP BY c.name,t.idaplikasi HAVING t.idaplikasi=".$id;
        echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }
 
    public function get_trafikkeyword()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        @session_start();
        if(@$_SESSION['idapp'] == 0 ) {
            $id = $_SESSION["idaplikasi"];
        } else {
            $id = $_SESSION['idapp'];
        }
        $sql = "SELECT t.message,m.pertanyaan,COUNT(t.message) jumlah,m.idaplikasi FROM transaksi t INNER JOIN menu m ON t.message = m.command GROUP by t.message,m.pertanyaan HAVING m.idaplikasi=".$id;
        // echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_trafiktanggal()
    {
        // $query = $this->db->select("*")
        //          ->from('sopir')
        //          ->order_by('idSopir', 'ASC')
        //          ->get();
        @session_start();
        if(@$_SESSION['idapp'] == 0 ) {
            $id = $_SESSION["idaplikasi"];
        } else {
            $id = $_SESSION['idapp'];
        }
        $tahun = date('Y');
        $bulan = date('m');
        $sql = "select 
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-01') tanggal1,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-02') tanggal2,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-03') tanggal3,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-04') tanggal4,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-05') tanggal5,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-06') tanggal6,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-07') tanggal7,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-08') tanggal8,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-09') tanggal9,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-10') tanggal10,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-11') tanggal11,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-12') tanggal12,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-13') tanggal13,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-14') tanggal14,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-15') tanggal15,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-16') tanggal16,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-17') tanggal17,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-18') tanggal18,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-19') tanggal19,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-20') tanggal20,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-21') tanggal21,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-22') tanggal22,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-23') tanggal23,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-24') tanggal24,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-25') tanggal25,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-26') tanggal26,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-27') tanggal27,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-28') tanggal28,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-29') tanggal29,
        (SELECT COUNT(*) from transaksi WHERE idaplikasi=$id AND date(tanggaljam)='$tahun-$bulan-30') tanggal30";

        // echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

}