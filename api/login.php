<?php
header("Content-Type:application/json");
	include('db.php');
//	print_r($_POST);
	if ($_POST['mtd']=="LOGIN")
	{
		if (isset($_POST['username']))
		{
			$result = mysqli_query($con,"SELECT p.*,pr.gpslong,pr.gpslat FROM pegawai p INNER JOIN perusahaan pr on p.perusahaan_id=pr.id WHERE p.username='".$_POST['username']."' and p.password='".$_POST['password']."'");
			if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_array($result);
			$nama = $row['nama'];
			$id = $row['id'];
			$username = $row['username'];
			$gpslong = $row['gpslong'];
			$gpslat = $row['gpslat'];
			response($nama, $gpslong, $gpslat, $id, $username);
			mysqli_close($con);
			}else{
				response(NULL, NULL, 200,"No Record Found");
			}
		}
	}

function response($nama,$gpslat,$gpslong,$id,$username){
	$response['id'] = $id;
	$response['username'] = $username;
	$response['nama'] = $nama;
	$response['gpslat'] = $gpslat;
	$response['gpslong'] = $gpslong;
	$json_response = json_encode($response);
	echo $json_response;
}
?>