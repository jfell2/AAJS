<?php

#Check if the form was submitted
if(isset($_REQUEST['submit']))
{
	#Perform Registration Action
	$Net_ID=$_REQUEST['netid'];
  $Email=$_REQUEST['inputEmail'];
	$FirstName=$_REQUEST['firstName'];
	$LastName=$_REQUEST['lastName'];
	$Password=$_REQUEST['inputPassword'];
  $Major=$_REQUEST['major'];
  $GradYear=$_REQUEST['graduationYear'];
  $DegLevPur=$_REQUEST['degreeLevelPursuing'];
  $RSO_1=$_REQUEST['RSO1'];
  $RSO_2=$_REQUEST['RSO2'];

	include('db_login.php');

	$query = mysqli_query($link, "INSERT INTO Users (netid, inputEmail, firstName, lastName, inputPassword, major, graduationYear, degreeLevelPursuing) VALUES ('".$Net_ID."','".$Email."','".$FirstName."','".$LastName."','".$Password."','".$Major."','".$GradYear."','".$DegLevPur."');")
	or die("Error in registration!!");

	if (isset($RSO_1)) {
		$query2 =mysqli_query($link, "INSERT INTO RSO_members (Title, netid) VALUES ('".$RSO_1."','".$Net_ID."');") or die("Error in registration!!");
	}
	if (isset($RSO_2)) {
		$query3 =mysqli_query($link, "INSERT INTO RSO_members (Title, netid) VALUES ('".$RSO_2."','".$Net_ID."');") or die("Error in registration!!");
	}
	#Go to the login page

	echo('<script>window.location="login.php"</script>');
}


#Continue to show the form if it was not submitted

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RSO Matcher - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-light">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="lastName" class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" name="inputPassword" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="netid" class="form-control" placeholder="NetID" required="required">
                  <label for="netid">NetID</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-label-group">
                          <input type="text" name="major" class="form-control" placeholder="Major" required="required" autofocus="autofocus">
                              <label for="major">Major</label>
                              </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-label-group">
                          <input type="text" name="graduationYear" class="form-control" placeholder="Graduation Year" required="required">
                              <label for="graduationYear">Graduation Year</label>
                              </div>
                  </div>
              </div>
          </div>
          <div class="form-group">
              <div class="form-label-group">
                  <input type="text" name="degreeLevelPursuing" class="form-control" placeholder="Ex. Bachelors, Masters" required="required">
                      <label for="degreeLevelPursuing">Degree Level Pursuing</label>
                      </div>
          </div>
          <p class="lead">Please list one or two RSOs that you are in if applicable.</p>
          <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-label-group">
                          <input type="text" name="RSO1" class="form-control" placeholder="RSO">
                              <label for="RSO1">RSO 1</label>
                              </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-label-group">
                          <input type="text" name="RSO2" class="form-control" placeholder="RSO">
                              <label for="RSO2">RSO 2</label>
                              </div>
                  </div>
              </div>
          </div>

          <input type="submit" name="submit" class="btn btn-dark btn-block" value="Register">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Click here if you already have an account.</a>
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
