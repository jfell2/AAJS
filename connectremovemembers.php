<?php

// SPECIFIC TO THE HTML
$netid = filter_input(INPUT_POST, 'netid');

// SPECIFIC TO THE LOCALHOST
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
	$sql = "DELETE FROM members
	WHERE netid='$netid'";
	if ($conn->query($sql)){
		echo "Record deleted successfully";
	}
	else{
		echo "Error: ". $sql ."
		". $conn->error;
	}
$conn->close();
	}
?>
