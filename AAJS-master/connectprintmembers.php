<?php

// SPECIFIC TO THE HTML
$major = filter_input(INPUT_POST, 'major');

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
	$sql = "SELECT * FROM members
    WHERE major='$major'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    echo $row['netid'];
    echo nl2br("\n");
  }
	if ($conn->query($sql)){
		echo "Record is printed sucessfully";
	}
	else{
		echo "Error: ". $sql ."
		". $conn->error;
	}
$conn->close();
	}
?>
