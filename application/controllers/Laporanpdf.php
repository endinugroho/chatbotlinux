<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Mpostingsopirmodel');

    }
    

    function cetak(){
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        // setting jenis font yang akan digunakan
        // $data=$this->Mpostingsopirmodel->get_all();
        $sql1="SELECT * FROM sopir where idSopir=".explode("-",$_POST['sopir'])[0];
        $query = $this->db->query($sql1);
		$row1=$query->row();
        if ($row1->SPVmanpower>0)
        {
            $sql = "SELECT * FROM ratemanpower r inner join sopir s on r.Sopir_idSopir=s.idSopir where r.tanggal between '".$_POST['min']."' AND '".$_POST['max']."' and s.idSopir=".explode("-",$_POST['sopir'])[0];
//        echo $sql;
            $query = $this->db->query($sql);
            $data=$query->result();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(190,7,'Rincian Gaji '.explode("-",$_POST['sopir'])[1],0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(190,7,'Dari tanggal '.$_POST['min'].' sampai tanggal '.$_POST['max'],0,1,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(25,6,"",0,1,'C'); 
            $pdf->Cell(25,6,"Man Power",0,1,'C'); 
            $pdf->Cell(25,6,"",0,1,'C'); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,6,"Tanggal",1,0);
            $pdf->Cell(27,6,"Shift",1,0);
            $pdf->Cell(27,6,"No Trucking",1,0);
            $pdf->Cell(27,6,"Ukuran",1,0);
            $pdf->Cell(27,6,"No Container",1,0);
            $pdf->Cell(27,6,"Retase",1,0);
            $pdf->Cell(25,6,"Status",1,1); 
            $total=0;
            foreach ($data as $row){
                $pdf->Cell(20,6,$row->tanggal,1,0);
                $pdf->Cell(27,6,$row->shift,1,0);
                $pdf->Cell(27,6,$row->nomortrucking,1,0);
                $pdf->Cell(27,6,$row->ukuran,1,0);
                $pdf->Cell(27,6,$row->nocontainer,1,0);
                $pdf->Cell(27,6,$row->retase,1,0);
                $pdf->Cell(25,6,$row->status,1,1);
                $total+=$row->retase; 
            }
            $pdf->Cell(20,6,"Total",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,$total,1,0);
            $pdf->Cell(25,6,"",1,1); 
            $pdf->Output();
        }

        if ($row1->SPVrepo>0)
        {
            $sql = "SELECT * FROM raterepo r inner join sopir s on r.Sopir_idSopir=s.idSopir where r.tanggal between '".$_POST['min']."' AND '".$_POST['max']."'";
            // echo $sql;
            $query = $this->db->query($sql);
            $data=$query->result();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(190,7,'Rincian Gaji '.explode("-",$_POST['sopir'])[1],0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(190,7,'Dari tanggal '.$_POST['min'].' sampai tanggal '.$_POST['max'],0,1,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(25,6,"",0,1,'C'); 
            $pdf->Cell(25,6,"Repo",0,1,'C'); 
            $pdf->Cell(25,6,"",0,1,'C'); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,6,"Tanggal",1,0);
            $pdf->Cell(27,6,"No Container",1,0);
            $pdf->Cell(27,6,"No Trucking",1,0);
            $pdf->Cell(17,6,"Pekerjaan",1,0);
            $pdf->Cell(17,6,"Ukuran",1,0);
            $pdf->Cell(17,6,"Type",1,0);
            $pdf->Cell(27,6,"Retase",1,0);
            $pdf->Cell(25,6,"Status",1,1); 
            $total=0;
            foreach ($data as $row){
                $pdf->Cell(20,6,$row->tanggal,1,0);
                $pdf->Cell(27,6,$row->nocontainer,1,0);
                $pdf->Cell(27,6,$row->notrucking,1,0);
                $pdf->Cell(17,6,$row->pekerjaan,1,0);
                $pdf->Cell(17,6,$row->ukuran,1,0);
                $pdf->Cell(17,6,$row->typecontainer,1,0);
                $pdf->Cell(27,6,$row->retase,1,0);
                $pdf->Cell(25,6,$row->status,1,1);
                $total+=$row->retase; 
            }
            $pdf->Cell(20,6,"Total",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(17,6,"",1,0);
            $pdf->Cell(17,6,"",1,0);
            $pdf->Cell(17,6,"",1,0);
            $pdf->Cell(27,6,$total,1,0);
            $pdf->Cell(25,6,"",1,1); 
            if ($row1->SPVDoor==0)
            {
                $pdf->Output();
            }
        }

        if ($row1->SPVDoor>0)
        {
            $sql = "SELECT *,h.tujuan tujuandoor FROM ratedoor r inner join sopir s on r.Sopir_idSopir=s.idSopir inner join harga h on r.tujuan=h.idHarga where r.tanggal between '".$_POST['min']."' AND '".$_POST['max']."'";
            // echo $sql;
            $query = $this->db->query($sql);
            $data=$query->result();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(190,7,'Rincian Gaji '.explode("-",$_POST['sopir'])[1],0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(190,7,'Dari tanggal '.$_POST['min'].' sampai tanggal '.$_POST['max'],0,1,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(25,6,"",0,1,'C'); 
            $pdf->Cell(25,6,"Dooring",0,1,'C'); 
            $pdf->Cell(25,6,"",0,1,'C'); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,6,"Tanggal",1,0);
            $pdf->Cell(27,6,"Tujuan",1,0);
            $pdf->Cell(27,6,"No Container",1,0);
            $pdf->Cell(27,6,"No Trucking",1,0);
            $pdf->Cell(17,6,"Muat",1,0);
            $pdf->Cell(17,6,"Ukuran",1,0);
            $pdf->Cell(27,6,"Retase",1,0);
            $pdf->Cell(25,6,"Status",1,1); 
            $total=0;
            foreach ($data as $row){
                $pdf->Cell(20,6,$row->tanggal,1,0);
                $pdf->Cell(27,6,$row->tujuandoor,1,0);
                $pdf->Cell(27,6,$row->nocontainer,1,0);
                $pdf->Cell(27,6,$row->notrucking,1,0);
                $pdf->Cell(17,6,$row->muat,1,0);
                $pdf->Cell(17,6,$row->ukuran,1,0);
                $pdf->Cell(27,6,$row->retase,1,0);
                $pdf->Cell(25,6,$row->status,1,1);
                $total+=$row->retase; 
            }
            $pdf->Cell(20,6,"Total",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(17,6,"",1,0);
            $pdf->Cell(17,6,"",1,0);
            $pdf->Cell(17,6,"",1,0);
            $pdf->Cell(27,6,$total,1,0);
            $pdf->Cell(25,6,"",1,1); 
            $pdf->Output();
        }

    }

    function cetakrekapan(){
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        // setting jenis font yang akan digunakan
        // $data=$this->Mpostingsopirmodel->get_all();

        if ($_POST['tipepekerjaan']=="Manpower")
        {
            $sql = "SELECT * FROM ratemanpower r inner join sopir s on r.Sopir_idSopir=s.idSopir where r.tanggal between '".$_POST['min']."' AND '".$_POST['max']."'";
//        echo $sql;
            $query = $this->db->query($sql);
            $data=$query->result();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(190,7,'Rekapan Perolehan Retase Manpower',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(190,7,'Dari tanggal '.$_POST['min'].' sampai tanggal '.$_POST['max'],0,1,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(25,6,"",0,1,'C'); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,6,"Tanggal",1,0);
            $pdf->Cell(27,6,"Nama Sopir",1,0);
            $pdf->Cell(27,6,"No Trucking",1,0);
            $pdf->Cell(27,6,"Ukuran",1,0);
            $pdf->Cell(27,6,"Retase",1,0);
            $pdf->Cell(25,6,"Insentif",1,1); 
            $total=0;
            foreach ($data as $row){
                $pdf->Cell(20,6,$row->tanggal,1,0);
                $pdf->Cell(27,6,$row->Nama,1,0);
                $pdf->Cell(27,6,$row->nomortrucking,1,0);
                $pdf->Cell(27,6,$row->ukuran,1,0);
                $pdf->Cell(27,6,$row->retase,1,0);
                $pdf->Cell(25,6,"",1,1);
                $total+=$row->retase; 
            }
            $pdf->Cell(20,6,"Total",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,$total,1,0);
            $pdf->Cell(25,6,"",1,1); 
            $pdf->Output();
        }
        if ($_POST['tipepekerjaan']=="Repo")
        {
            if ($_POST['pekerjaan']=="Semua")
            {
                $sql = "SELECT DISTINCT(r.tanggal),s.Nama,(select count(ukuran) from raterepo where ukuran=20 and tanggal=r.tanggal and Sopir_idSopir=r.Sopir_idSopir) ukuran20,(select count(ukuran) from raterepo where ukuran=40 and tanggal=r.tanggal and Sopir_idSopir=r.Sopir_idSopir) ukuran40, r.retase  FROM raterepo r INNER JOIN sopir s ON r.Sopir_idSopir=s.idSopir WHERE r.tanggal BETWEEN '".$_POST['min']."' and '".$_POST['max']."'";

            } else
            {
                $sql = "SELECT DISTINCT(r.tanggal),s.Nama,(select count(ukuran) from raterepo where ukuran=20 and tanggal=r.tanggal and Sopir_idSopir=r.Sopir_idSopir and pekerjaan='".$_POST['pekerjaan']."') ukuran20,(select count(ukuran) from raterepo where ukuran=40 and tanggal=r.tanggal and Sopir_idSopir=r.Sopir_idSopir) ukuran40, r.retase  FROM raterepo r INNER JOIN sopir s ON r.Sopir_idSopir=s.idSopir WHERE r.tanggal BETWEEN '".$_POST['min']."' and '".$_POST['max']."'";            
            }
//        echo $sql;
            $query = $this->db->query($sql);
            $data=$query->result();

            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(190,7,'Rekapan Perolehan Retase Repo',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(190,7,'Dari tanggal '.$_POST['min'].' sampai tanggal '.$_POST['max'],0,1,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(25,6,"",0,1,'C'); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,6,"Tanggal",1,0);
            $pdf->Cell(27,6,"Nama Sopir",1,0);
            $pdf->Cell(27,6,"Ukuran 20",1,0);
            $pdf->Cell(27,6,"Ukuran 40",1,0);
            $pdf->Cell(27,6,"Retase",1,0);
            $pdf->Cell(25,6,"Insentif",1,1); 
            $total=0;
            foreach ($data as $row){
                $pdf->Cell(20,6,$row->tanggal,1,0);
                $pdf->Cell(27,6,$row->Nama,1,0);
                $pdf->Cell(27,6,$row->ukuran20,1,0);
                $pdf->Cell(27,6,$row->ukuran40,1,0);
                $pdf->Cell(27,6,$row->retase,1,0);
                $pdf->Cell(25,6,"",1,1);
                $total+=$row->retase; 
            }
            $pdf->Cell(20,6,"Total",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,$total,1,0);
            $pdf->Cell(25,6,"",1,1); 
            $pdf->Output();
        }

        if ($_POST['tipepekerjaan']=="Dooring")
        {
            $sql = "SELECT * FROM ratedoor r inner join sopir s on r.Sopir_idSopir=s.idSopir where r.tanggal between '".$_POST['min']."' AND '".$_POST['max']."'";
//        echo $sql;
            $query = $this->db->query($sql);
            $data=$query->result();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(190,7,'Rekapan Perolehan Retase Dooring',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(190,7,'Dari tanggal '.$_POST['min'].' sampai tanggal '.$_POST['max'],0,1,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(25,6,"",0,1,'C'); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,6,"Tanggal",1,0);
            $pdf->Cell(27,6,"Nama Sopir",1,0);
            $pdf->Cell(27,6,"No Trucking",1,0);
            $pdf->Cell(27,6,"Ukuran",1,0);
            $pdf->Cell(27,6,"Retase",1,0);
            $pdf->Cell(25,6,"Insentif",1,1); 
            $total=0;
            foreach ($data as $row){
                $pdf->Cell(20,6,$row->tanggal,1,0);
                $pdf->Cell(27,6,$row->Nama,1,0);
                $pdf->Cell(27,6,$row->notrucking,1,0);
                $pdf->Cell(27,6,$row->ukuran,1,0);
                $pdf->Cell(27,6,$row->retase,1,0);
                $pdf->Cell(25,6,"",1,1);
                $total+=$row->retase; 
            }
            $pdf->Cell(20,6,"Total",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,"",1,0);
            $pdf->Cell(27,6,$total,1,0);
            $pdf->Cell(25,6,"",1,1); 
            $pdf->Output();
        }

    }    

    function cetaktujuan(){
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        // setting jenis font yang akan digunakan
        // $data=$this->Mpostingsopirmodel->get_all();

        $sql = "SELECT * from harga h INNER JOIN vendor v on h.idVendor=v.idVendor WHERE v.idVendor=".$_POST['customer'] ;
//        echo $sql;
        $query = $this->db->query($sql);
        $data=$query->result();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(190,7,'Informasi Harga Tujuan Dooring',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'Dari Customer ',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,6,"",0,1,'C'); 
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,"Tujuan",1,0);
        $pdf->Cell(27,6,"Harga",1,0);
        $pdf->Cell(27,6,"Harga Sopir",1,0);
        $pdf->Cell(27,6,"Harga Repo",1,1);
        $total1=0;$total2=0;$total3=0;
        foreach ($data as $row){
            $pdf->Cell(30,6,$row->tujuan,1,0);
            $pdf->Cell(27,6,$row->harga,1,0);
            $pdf->Cell(27,6,$row->hargasopir,1,0);
            $pdf->Cell(27,6,$row->hargarepo,1,0);
            $pdf->Cell(25,6,"",0,1);
            $total1+=$row->harga; 
            $total2+=$row->hargasopir; 
            $total3+=$row->hargarepo; 
        }
        $pdf->Cell(30,6,"Total",1,0);
        $pdf->Cell(27,6,$total1,1,0);
        $pdf->Cell(27,6,$total2,1,0);
        $pdf->Cell(27,6,$total3,1,0);
        $pdf->Cell(25,6,"",0,1); 
        $pdf->Output();

    }    


    function index(){
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(35,6,'NIM',1,0);
        $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
        $pdf->Cell(35,6,'NO HP',1,0);
        $pdf->Cell(35,6,'TANGGAL LHR',1,1);
        $pdf->SetFont('Arial','',10);
        $pdf->Output();
    }
}