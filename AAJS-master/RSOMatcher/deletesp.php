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
      $sql = "DELETE FROM RSO_members WHERE netid = '$deleteFilter'";
      if ($conn->query($sql)){
            $sql = "DELETE FROM Users WHERE netid='$deleteFilter'";
        if ($conn->query($sql)){
  		    echo('<script>alert("Your Profile has been deleted!");</script>');
                    echo('<script>window.location="logout.php";</script>');
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
