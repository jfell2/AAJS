<?php

// SPECIFIC TO THE HTML
$netid = filter_input(INPUT_POST, 'netid');
$year = filter_input(INPUT_POST, 'year');
$major = filter_input(INPUT_POST, 'major');
$minor = filter_input(INPUT_POST, 'minor');
$college = filter_input(INPUT_POST, 'college');
$gender = filter_input(INPUT_POST, 'gender');

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
	$sql = "UPDATE members SET year='$year', major='$major', minor='$minor', college='$college', gender='$gender' WHERE netid='$netid'"; //THIS IS WHERE YOUR SQL IS!
	if ($conn->query($sql)){
		echo "Record updated successfully";
	}
	else{
		echo "Error: ". $sql ."
		". $conn->error;
	}
$conn->close();
	}
?>
