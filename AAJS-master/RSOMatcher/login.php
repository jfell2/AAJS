<?php
session_start();

if(isset($_SESSION['sig']))
{
	#User is already logged in
	echo("<script>window.location='studentprofile.php'</script>");
}

#Check if the login form was submitted
if(isset($_REQUEST['submit']))
{
	#Perform login action
	$Email=$_REQUEST['inputEmail'];
	$Password=$_REQUEST['inputPassword'];

	include('db_login.php');
	$query=mysqli_query($link, "SELECT * FROM Users WHERE inputEmail='".$Email."' AND inputPassword='".$Password."'");
	$row=mysqli_fetch_array($query);
	if(empty($row))
	{
		#False Info / User doesn't exist
		echo('<script>alert("False login credentials!");</script>');
	}
	else
	{
		#User exists and login is successful
		$_SESSION['sig']="OK";
		echo('<script>window.location="studentprofile.php"</script>');
	}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RSO Matcher - Login</title>

  <link href="css/all.min.css" rel="stylesheet" type="text/css">

  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-light">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post" action="login.php">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <input type="submit" name="submit" class="btn btn-dark btn-block" value="Login">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3 db-dark" href="register.php">Register an Account</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="css/jquery.min.js"></script>
  <script src="css/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="css/jquery.easing.min.js"></script>

</body>

</html>
