<?php
  session_start();
  $updateMajor = filter_input(INPUT_POST, 'updateMajor');
  $updateGraduationYear = filter_input(INPUT_POST, 'updateGraduationYear');
  $updateDegreeLevelPersuing = filter_input(INPUT_POST, 'updateDegreeLevelPersuing');
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
      if ($updateDegreeLevelPersuing == "" && $updateMajor == "" && $updateGraduationYear == "") {
              $sql = "SELECT * FROM Users";
      } else if ($updateDegreeLevelPersuing == "" && $updateMajor == "" && $updateGraduationYear != "") {
              $sql = "UPDATE Users SET graduationYear = '$updateGraduationYear' WHERE inputEmail = '$Email'";
      } else if ($updateDegreeLevelPersuing == "" && $updateMajor != "" && $updateGraduationYear != "") {
              $sql = "UPDATE Users SET major = '$updateMajor', graduationYear = '$updateGraduationYear' WHERE inputEmail = '$Email'";
      } else if ($updateDegreeLevelPersuing != "" && $updateMajor == "" && $updateGraduationYear != "") {
              $sql = "UPDATE Users SET degreeLevelPursuing = '$updateDegreeLevelPersuing', graduationYear = '$updateGraduationYear' WHERE inputEmail = '$Email'";
      } else if ($updateDegreeLevelPersuing != "" && $updateMajor != "" && $updateGraduationYear != "") {
              $sql = "UPDATE Users SET degreeLevelPursuing = '$updateDegreeLevelPersuing', major = '$updateMajor', graduationYear = '$updateGraduationYear' WHERE inputEmail = '$Email'";
      } else if ($updateDegreeLevelPersuing != "" && $updateMajor == "" && $updateGraduationYear == "") {
              $sql = "UPDATE Users SET degreeLevelPursuing = '$updateDegreeLevelPersuing' WHERE inputEmail = '$Email'";
      } else if ($updateDegreeLevelPersuing != "" && $updateMajor != "" && $updateGraduationYear == "") {
              $sql = "UPDATE Users SET degreeLevelPursuing = '$updateDegreeLevelPersuing', major = '$updateMajor' WHERE inputEmail = '$Email'";
      } else {
              $sql = "UPDATE Users SET major = '$updateMajor' WHERE inputEmail = '$Email'";
      }
      if ($conn->query($sql)){
  		    echo('<script>alert("Your Profile has been updated!");</script>');
                    echo('<script>window.location="studentprofile.php";</script>');
        }else{
      		echo "Error: ". $sql ."
      		". $conn->error;
      	}
     $conn->close();
 }

  ?>
