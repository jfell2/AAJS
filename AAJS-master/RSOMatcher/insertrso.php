<?php
  $title = filter_input(INPUT_POST, 'title');
  $president = filter_input(INPUT_POST, 'president');
  $treasurer = filter_input(INPUT_POST, 'treasurer');
  $website = filter_input(INPUT_POST, 'website');
  $email = filter_input(INPUT_POST, 'email');
  $description = filter_input(INPUT_POST, 'description');
  $category = filter_input(INPUT_POST, 'category');
  $department = filter_input(INPUT_POST, 'department');

  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "rso_matcher";

  $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
  if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
  } else {
    $sql = "INSERT INTO rso (Title, President, Treasurer, Description, Category, Website, Email, Department)
    VALUES ('$title', '$president', '$treasurer', '$description', '$category', '$website', '$email', '$department')";
    if ($conn->query($sql)){
      echo('<script>alert("RSO Added!");</script>');
      echo('<script>window.location="rsoprofile.php";</script>');
  	}
  	else{
  		echo "Error: ". $sql ."
  		". $conn->error;
  	}
  $conn->close();
  	}
  ?>
