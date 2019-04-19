<?php
  $deleteFilter = filter_input(INPUT_POST, 'deleteTitle');
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "rso_matcher";

  $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
  if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
  } else {
    $sql = "DELETE FROM rso_members WHERE Title='$deleteFilter'";
    if ($conn->query($sql)){
          $sql = "DELETE FROM rso WHERE Title='$deleteFilter'";
      if ($conn->query($sql)){
		    echo('<script>alert("RSO Deleted!");</script>');
        echo('<script>window.location="rsoprofile.php";</script>');
      }else{
    		echo "Error: ". $sql ."
    		". $conn->error;
    	}
  	}
  	else{
  		echo "Error: ". $sql ."
  		". $conn->error;
  	}
  $conn->close();
  	}
?>
