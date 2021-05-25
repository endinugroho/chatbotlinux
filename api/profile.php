<?php
header("Content-Type:application/json");
	include('db.php');
//	print_r($_POST);
	if ($_POST['mtd']=="GET")
	{
		if (isset($_POST['username']))
		{
			$result = mysqli_query($con,"SELECT * FROM Pegawai WHERE username='".$_POST['username']."'");
			if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_array($result);
			$nama = $row['nama'];
			$alamat = $row['alamat'];
			$telepon = $row['telepon'];
			$jabatan = $row['telepon'];
			$username = $row['telepon'];
			$password = $row['telepon'];
			$foto = $row['telepon'];
			response($nama, $alamat,$telepon,$jabatan,$username,$password,$foto);
			mysqli_close($con);
			}else{
				response(NULL, NULL, 200,"No Record Found");
			}
		}
	}

function response($nama,$alamat,$telepon,$jabatan,$username,$password,$foto){
	$response['nama'] = $nama;
	$response['alamat'] = $alamat;
	$response['telepon'] = $telepon;
	$response['jabatan'] = $jabatan;
	$response['username'] = $username;
	$response['password'] = $password;
	$response['foto'] = $foto;
	$json_response = json_encode($response);
	echo $json_response;
}
?>