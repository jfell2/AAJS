<?php
  session_start();
  $addRSOsp = filter_input(INPUT_POST, 'removeRSOsp');
  $addnetid = filter_input(INPUT_POST, 'removenetid');
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
      $sql = "DELETE FROM RSO_members WHERE Title = '$addRSOsp' AND netid = '$addnetid'";
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
