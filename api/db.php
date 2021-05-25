<?php //$dbname = 'oneweeko_data'; $dbuser = 'oneweeko_user'; $dbpass = 'Wj6qk9&3'; $dbhost = 'localhost:3306'; $connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to '$dbhost'"); mysql_select_db($dbname) or die("Could not open the database '$dbname'"); 
$con = mysqli_connect("localhost:3306","root","","absensi");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>
