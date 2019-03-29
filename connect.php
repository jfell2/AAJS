<?php

$netid = filter_input(INPUT_POST, 'netid');
$year = filter_input(INPUT_POST, 'year');
$college = filter_input(INPUT_POST, 'college');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "test";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
	die('Connect Error ('. mysqli_connect_errno() .') '
	. mysqli_connect_error());
}
else{
	$sql = "INSERT INTO test (netid, year, college)
	values ('$netid','$year','$college')";
	if ($conn->query($sql)){
		echo "New record is inserted sucessfully";
	}
	else{
		echo "Error: ". $sql ."
		". $conn->error;
	}
$conn->close();
	}
?>
