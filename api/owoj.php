<?php
header("Content-Type:application/json");
if (isset($_GET['mtd']) && $_GET['mtd']!="") {
	include('db.php');

	if ($_GET['mtd']=="GET")
	{
		if (isset($_GET['id']))
		{
			echo "SELECT * FROM `owoj` WHERE id=".$_GET['id']."\n";
			$result = mysqli_query($con,"SELECT * FROM `owoj` WHERE id=".$_GET['id']);
			if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_array($result);
			$id = $row['id'];
			$nama = $row['nama'];
			$deskripsi = $row['deskripsi'];
			response($id, $nama, $deskripsi);
			mysqli_close($con);
			}else{
				response(NULL, NULL, 200,"No Record Found");
			}
		}else {
			echo "SELECT * FROM owoj"."\n";
			$result = mysqli_query($con,"SELECT * FROM owoj");
			if(mysqli_num_rows($result)>0){
				$rows1 = array();
				while($row = mysqli_fetch_array($result))
				{
					$rows1[]=$row;
				}
				echo json_encode($rows1);
			} else
			{
				response(NULL, NULL, 200,"No Record Found");
			}
			
		}
	} elseif ($_GET['mtd']=="EDIT")
	{
		if (isset($_GET['id']))
		{
			$nama = $_GET['nama'];
			$deskripsi = $_GET['deskripsi'];
//			$result = mysqli_query($con,"UPDATE owoj SET nama='",$nama."', deskripsi='",$deskripsi."' WHERE id=".$_GET['id']);
			$sql="UPDATE owoj SET nama='".$nama."', deskripsi='".$deskripsi."' WHERE id=".$_GET['id'];
			echo $sql . "\n";
			
			if (mysqli_query($con, $sql)) {
				response($_GET['id'], $nama, $deskripsi);
   			} else {
				response(NULL, NULL, 200,"Record not update");
		  		mysqli_error($con);
   			}


   			mysqli_close($con);
		}		

	} elseif ($_GET['mtd']=="DEL")
	{
		if (isset($_GET['id']))
		{
			echo "DELETE FROM `owoj` WHERE id=".$_GET['id'] . "\n";
			$result = mysqli_query($con,"DELETE FROM `owoj` WHERE id=".$_GET['id']);
			response(NULL, NULL, 200,"Record Deleted");
		}		
	} 
}
function response($id,$nama,$deskripsi){
	$response['id'] = $id;
	$response['nama'] = $nama;
	$response['deskripsi'] = $deskripsi;
	$json_response = json_encode($response);
	echo $json_response;
}
?>