<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
?>
<html>
<head>
<title>Demo Create and Consume Simple REST API in PHP - AllPHPTricks.com</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div style="width:700px; margin:0 auto;">

<h3>Demo Create and Consume Simple REST API in PHP</h3>   
<form action="" method="POST">
<label>Enter ID:</label><br />
<input type="text" name="sopir_id" placeholder="Enter Order ID" required/>
<br /><br />
<button type="submit" name="submit">Submit</button>
</form>    

<?php
if (isset($_POST['sopir_id']) && $_POST['sopir_id']!="") {
	$sopir_id = $_POST['sopir_id'];
	$url = "http://localhost/restapi/api.php?sopir_id=".$sopir_id;
	
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	
	$result = json_decode($response);
	
	echo "<table>";
	echo "<tr><td>Sopir ID:</td><td>$result->idSopir</td></tr>";
	echo "<tr><td>Amount:</td><td>$result->Nama</td></tr>";
	echo "<tr><td>Response Code:</td><td>$result->Alamat</td></tr>";
	echo "<tr><td>Response Desc:</td><td>$result->Kota</td></tr>";
	echo "</table>";
}
    ?>

<br />
<strong>Sample Order IDs for Demo:</strong><br />
15478952<br />
15478955<br />
15478958<br />
15478959
<br /><br />
<a href="https://www.allphptricks.com/create-and-consume-simple-rest-api-in-php/"><strong>Tutorial Link</strong></a> <br /><br />
For More Web Development Tutorials Visit: <a href="https://www.allphptricks.com/"><strong>AllPHPTricks.com</strong></a>
</div>
</body>
</html>