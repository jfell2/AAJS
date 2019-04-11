

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RSO Matcher - RSO Profile</title>

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
          <li class="nav-item">
            <a class="nav-link" href="studentprofile.html">Student Profile</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="">RSO Profile</a>
            <span class="sr-only">(current)</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search.html">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <h4 class="text-center mt-4">three select search</h4>
  <h6 class="text-center mb-4">bootstrap 4</h6>
  <section class="search-sec">
      <div class="container">
          <form action="rsoprofile.php" method="post">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="row">
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                              <select class="form-control search-slt" name="searchMajor">
                                  <option value="" disabled selected>Select Major</option>
                                  <option value="IE">IE</option>
                                  <option value="Systems">Systems</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                              </select>
                          </div>
                           <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                              <select class="form-control search-slt" name="searchDegreeLevelPursuing">
                                  <option value="" disabled selected>Select Degree Level</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                              </select>
                          </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                              <select class="form-control search-slt" name="searchGraduationYear">
                                  <option value="" disabled selected>Select Graduation Year</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                              </select>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                              <input type="text" class="form-control search-slt" name="searchNetid" placeholder = "Input a NetID">
                          </div>
                      </div>
                  </div>
              </div>
      </div>
  </section>
  <section class="search-sec">
      <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="row">
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                              <input type="text" class="form-control search-slt" name="searchTitle" placeholder="Enter RSO Title">
                          </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                              <select class="form-control search-slt" name="searchCategory">
                                  <option value="" disabled selected>Select RSO Category</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                              </select>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                              <select class="form-control search-slt" name="searchDepartment">
                                  <option value="" disabled selected>Select RSO Department</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                                  <option>Example one</option>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>
              <br>
              <input type="submit" name="submit" class="btn btn-light btn-block" value="Submit">
          </form>
      </div>
  </section>

  <!-- Bootstrap core JavaScript -->
  <script src="css/jquery.min.js"></script>
  <script src="css/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php
if(isset($_REQUEST['submit']))
{
	$majorFilter=$_REQUEST['searchMajor'];

	include('db_login.php');
	$query=mysqli_query($link, "SELECT * FROM Users WHERE major='".$majorFilter."'");
	$row=mysqli_fetch_array($query);
	if(empty($row))
	{
		#False Info / User doesn't exist
		echo('<script>alert("No records found");</script>');
    echo('<script>window.location="rsoprofile.php";</script>');
	}
	else
	{
    echo "<table>"; // start a table tag in the HTML

    echo "<tr><td>" . $row['netid'] . "</td><td>" . $row['inputEmail'] . "</td></tr>" . $row['firstName'] . "</td></tr>" . $row['lastName'] . "</td></tr>" . $row['major'] . "</td></tr>" . $row['graduationYear'] . "</td></tr>";  //$row['index'] the index here is a field name

    echo "</table>"; //Close the table in HTML;
	}

}

?>
