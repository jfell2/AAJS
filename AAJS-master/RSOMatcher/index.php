<?php

session_start();

if(isset($_SESSION['sig']))
{
        $logbutton = "Logout";
        $logdata = "logout.php";
} else {
        $logbutton = "Login";
        $logdata = "login.php";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RSO Matcher - Home</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">RSO Matcher</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="studentprofile.php">Student Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rsoprofile.php">RSO Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="forum.php">Forum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=<?php echo"$logdata"?>><?php echo"$logbutton"?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Welcome to the RSO Matcher </h1>
        <p class="lead">We help students find an organization that is best suited for them!</p>
        <p class="lead">Search different RSO's based off your interests or use our reccomendations to help find your perfect RSO!</p>
      </div>
    </div>
    <center>
    <a class="btn btn-primary btn-lg " href="register.php" role="button">Get Started</a>
  </div>



  <!-- Bootstrap core JavaScript -->
  <script src="css/jquery.min.js"></script>
  <script src="css/bootstrap.bundle.min.js"></script>

</body>

</html>
