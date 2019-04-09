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
	$sql = "INSERT INTO members (netid, year, major, minor, college, gender)
	values ('$netid','$year', '$major', '$minor', '$college', '$gender')";
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
