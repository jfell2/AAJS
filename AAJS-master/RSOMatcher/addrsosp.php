<?php
  session_start();
  $addRSOsp = filter_input(INPUT_POST, 'addRSOsp');
  $addnetid = filter_input(INPUT_POST, 'addnetid');
  $Email = $_SESSION['login'];
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "rso_matcher";

  $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
    } else {
      $sql = "INSERT INTO RSO_members (Title, netid) VALUES ('$addRSOsp', '$addnetid')";
      if ($conn->query($sql)){
                    echo('<script>alert("Your profile has been updated!");</script>');
                    echo('<script>window.location="studentprofile.php";</script>');
        }else{
                echo('<script>alert("ERROR: RSO does not exist or netid does not match.");</script>');
                echo('<script>window.location="studentprofile.php";</script>');
        }
      $conn->close();
 }

  ?>
