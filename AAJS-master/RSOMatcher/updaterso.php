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
    $sql = "UPDATE rso SET
    President= CASE WHEN '$president'!='' THEN '$president' ELSE President END,
    Treasurer= CASE WHEN '$treasurer'!='' THEN '$treasurer' ELSE Treasurer END,
    Description= CASE WHEN '$description'!='' THEN '$description' ELSE Description END,
    Category=CASE WHEN '$category'!='any' THEN '$category' ELSE Category END,
    Website= CASE WHEN '$website'!='' THEN '$website' ELSE Website END,
    Email=CASE WHEN '$email' !='' THEN '$email' ELSE Email END,
    Department=CASE WHEN '$department'!='any' THEN '$department' ELSE Department END WHERE Title='$title'";
    if ($conn->query($sql)){
      echo('<script>alert("RSO Updated!");</script>');
      echo('<script>window.location="rsoprofile.php";</script>');
  	}
  	else{
  		echo "Error: ". $sql ."
  		". $conn->error;
  	}
  $conn->close();
  	}
  ?>
