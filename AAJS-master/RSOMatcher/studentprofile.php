<?php
session_start();
include('db_login.php');

$Email = $_SESSION['login'];
$query = mysqli_query($link, "SELECT * FROM Users WHERE inputEmail = '".$Email."';")
 ?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RSO Matcher - Student Profile</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">RSO Matcher</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="">Student Profile
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rsoprofile.php">RSO Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Student Profile</h1>
        <table class ="table-light" border= "2" cellpadding = "4" align="center">
            <tr>
                <th> NetID </th>
                <th> Email </th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Major </th>
                <th> Graduation Year </th>
                <th> Degree Level Pursuing </th>
            </tr>
        <?php
        while ($row = mysqli_fetch_array($query)) {
            echo
                "<tr>
                <td>{$row['netid']}</td>
                <td>{$row['inputEmail']}</td>
                <td>{$row['firstName']}</td>
                <td>{$row['lastName']}</td>
                <td>{$row['major']}</td>
                <td>{$row['graduationYear']}</td>
                <td>{$row['degreeLevelPursuing']}</td>
                </tr>\n";
        }
         ?>
        </table>
        <a href="logout.php">Logout</a>
        </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="css/jquery.min.js"></script>
  <script src="css/bootstrap.bundle.min.js"></script>

</body>

</html>
