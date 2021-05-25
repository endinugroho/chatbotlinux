<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Menu extends CI_Controller {
 
    public function __construct(){
 
        parent ::__construct();
 
        //load model
        $this->load->model('Menumodel');
        $this->load->model('Aplikasimodel');
 
    }
 
    public function index()
    {
        $data = array(
 
            'title'     => 'Data Absensi',
            'dataperush' => $this->Menumodel->get_all(),
 
        );
        $this->load->view('templates/header',$data);
        $this->load->view('Menu', $data);
        $this->load->view('templates/footer',$data);
    }
 
     public function tambah()
    {
        $data = array(
 
            'title'     => 'Tambah Data Menu',
			'method' => 'Tambah',
            'dataperush' => $this->Menumodel->get_all(),
            'dataaplikasi' => $this->Aplikasimodel->get_all(),
            'datamenu' => $this->Menumodel->get_all(),
            'method' => 'Add',

        );
        $this->load->view('templates/header',$data);
        $this->load->view('detailMenu', $data);
        $this->load->view('templates/footer',$data);
    }

	function gen_uuid() {
		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			// 32 bits for "time_low"
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
	
			// 16 bits for "time_mid"
			mt_rand( 0, 0xffff ),
	
			// 16 bits for "time_hi_and_version",
			// four most significant bits holds version number 4
			mt_rand( 0, 0x0fff ) | 0x4000,
	
			// 16 bits, 8 bits for "clk_seq_hi_res",
			// 8 bits for "clk_seq_low",
			// two most significant bits holds zero and one for variant DCE1.1
			mt_rand( 0, 0x3fff ) | 0x8000,
	
			// 48 bits for "node"
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
		);
	}
    
    public function simpan()
    {
        $idparent = 0;
        if ($this->input->post("parent")!=NULL)
        {
            $idparent=$this->input->post("parent");    
        }    

//		$jawabangambar = $_POST['jawabangambar'];

        $nama_file = $_FILES['jawabangambar']['name'];
        if ($nama_file!="")
        {

        $ukuran_file = $_FILES['jawabangambar']['size'];
        $tipe_file = $_FILES['jawabangambar']['type'];
        $tmp_file = $_FILES['jawabangambar']['tmp_name'];

        // Set path folder tempat menyimpan gambarnya
        // $path = "images/".$nama_file;
        if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
            if($tipe_file == "image/jpeg")
            {
                $hasil = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        
                // 16 bits for "time_mid"
                mt_rand( 0, 0xffff ),
        
                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand( 0, 0x0fff ) | 0x4000,
        
                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand( 0, 0x3fff ) | 0x8000,
        
                // 48 bits for "node"
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
                $path = "images/".$hasil.".jpg";

            } else
            {
                $hasil = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        
                // 16 bits for "time_mid"
                mt_rand( 0, 0xffff ),
        
                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand( 0, 0x0fff ) | 0x4000,
        
                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand( 0, 0x3fff ) | 0x8000,
        
                // 48 bits for "node"
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
                $path = "images/".$hasil.".png";

            }

            // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if($ukuran_file <= 800000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan :	
            // Proses simpan ke Database

            // $query = "INSERT INTO gambar(nama,ukuran,tipe) VALUES('".$nama_file."','".$ukuran_file."','".$tipe_file."')";
            // $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
            $data = array(
 
                'pertanyaan'         => $this->input->post("pertanyaan"),
                'jawabantext'         => $this->input->post("jawabantext"),
                'jawabangambar'     => $path,
                'command'         => $this->input->post("command"),
                'idaplikasi'         => $_SESSION["idaplikasi"],//$this->input->post("aplikasi"),
                'idparent'         => $idparent,
                'isjawaban'         => $this->input->post("isjawaban"),
    
            );
     
            $hasil=$this->Menumodel->simpan($data);
     
            if ($hasil)
            {
                $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data Menu berhasil ditambah di database.
                                                    </div>');            
            } else
            {
                $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data Menu tidak ditambah di database.
                                                    </div>');            
            }
                
            }else{
            // Jika gambar gagal diupload, Lakukan :
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Maaf gambar gagal diupkiad</div>');            

            // echo "Maaf, Gambar gagal untuk diupload.";
            // echo "<br><a href='form.php'>Kembali Ke Form</a>";
            }
        }else{
            // Jika ukuran file lebih dari 1MB, lakukan :
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 250kB</div>');            
            // echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
            // echo "<br><a href='form.php'>Kembali Ke Form</a>";
        }
        }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.</div>');            
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        // echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
        // echo "<br><a href='form.php'>Kembali Ke Form</a>";
        }

    } else
    {
        $data = array(
 
            'pertanyaan'         => $this->input->post("pertanyaan"),
            'jawabantext'         => $this->input->post("jawabantext"),
            'jawabangambar'     => "",
            'command'         => $this->input->post("command"),
            'idaplikasi'         => $_SESSION["idaplikasi"],//$this->input->post("aplikasi"),
            'idparent'         => $idparent,
            'isjawaban'         => $this->input->post("isjawaban"),

        );
 
        $hasil=$this->Menumodel->simpan($data);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data Menu berhasil ditambah di database.
                                                </div>');            
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data Menu tidak ditambah di database.
                                                </div>');            
        }

    }
 
        //redirect
        redirect('Menu');
 
    }
 
    public function edit($id)
    {
        $id_siswa = $this->uri->segment(3);
 
        $data = array(
 
            'title'     => 'Edit Data Menu',
            'dataperush' => $this->Menumodel->edit($id),
            'dataaplikasi' => $this->Aplikasimodel->get_all(),
            'datamenu' => $this->Menumodel->get_all(),
			'method' => 'Edit',
        );
        $this->load->view('templates/header',$data);
        $this->load->view('detailMenu', $data);
        $this->load->view('templates/footer',$data);
    }
 
    public function update()
    {
        $id = $this->input->post("id");
        $data = array(
            'pertanyaan'         => $this->input->post("pertanyaan"),
            'jawabantext'         => $this->input->post("jawabantext"),
            'command'         => $this->input->post("command"),
            'idaplikasi'         => $_SESSION["idaplikasi"], //$this->input->post("aplikasi"),
            'idparent'         => $this->input->post("parent"),
            'isjawaban'         => $this->input->post("isjawaban"),
        );
 
        $hasil=$this->Menumodel->update($data, $id);
 
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data Menu berhasil diupdate didatabase.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data Menu tidak diupdate di database.
                                                </div>');            
        }
 
        //redirect
        redirect('Menu');
 
    }
 
    public function hapus($id)
    {
        $hasil=$this->Menumodel->hapus($id);
        //redirect
        if ($hasil)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data Menu berhasil dihapus di database.
                                                </div>');
        } else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data Menumodel tidak dihapus di database.
                                                </div>');            
        }
        redirect('Menu');
 
    }
    public function detailmenuu(){
        $data = array(
 
            'title'     => 'Data Absensi',
            'dataperush' => $this->Menumodel->get_all(),
 
        );
        $this->load->view('a',$data);
    }
 


}