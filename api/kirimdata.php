<?php  $image = $_POST['image'];
  include('db.php');

  $tanggal=$_POST['tanggal'];
  $sesi=$_POST['sesi'];
  $name = "images/".$_POST['username'].$tanggal.$sesi.".jpg";
  $name2 = "api/images/".$_POST['username'].$tanggal.$sesi.".jpg";
  $realImage = base64_decode($image);
  $tanggal=$_POST['tanggal'];
  $sesi=$_POST['sesi'];
  $waktu=$_POST['waktu'];
  $gpslat=$_POST['gpslat'];
  $gpslong=$_POST['gpslong'];
  $pegawai_id=$_POST['pegawai_id'];
  $foto=$name2;
$sql="INSERT INTO absensi(tanggal,sesi,waktu,gpslat,gpslong,foto,pegawai_id) VALUES('".$tanggal."','".$sesi."','".$waktu."','".$gpslat."','".$gpslong."','".$foto."','".$pegawai_id."')";
	if (mysqli_query($con, $sql)) {
//		response($_GET['id'], $nama, $deskripsi);
		echo "OK";
	} else {
//		response(NULL, NULL, 200,"Record not update");
		mysqli_error($con);
	}

  file_put_contents($name,$realImage);
  
?>