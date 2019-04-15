<?php
session_start();

if(!isset($_SESSION['sig']))
{
        echo("<script>window.location='login.php'</script>");
}

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
            <a class="nav-link" href="index.php">Home</a>
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
            <a class="nav-link" href="logout.php">Logout</a>
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
        <p>

        </p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update" data-whatever="@getbootstrap">Update Profile</button>
        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">Update Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Major:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Graduation Year:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                </form>
              </div>
              <div class="modal-body">
                <input type="submit" name="updatesubmit" class="btn btn-primary btn-block" value="Update Profile">
              </div>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete" data-whatever="@getbootstrap">Delete Profile</button>
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">Delete Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p class="lead">Are you sure you want to delete your profile?</p>
              </div>
              <div class="modal-body">
                <input type="submit" name="deletesubmit" class="btn btn-primary btn-block" value="Delete Profile">
                <?php
                        include('db_login.php');
                        if(isset($_REQUEST['deletesubmit'])) {
                                $query=mysqli_query($link, "DELETE * FROM Users WHERE inputEmail='".$Email."';");
                                echo('<script>alert("Your profile has been deleted.");</script>');
                                echo('<script>window.location="index.php"</script>');
                        }
                ?>
              </div>
            </div>
          </div>
        </div>

        </body>


        </html>


        <h2 class="mt-5"> Recommendations </h2>
        <p class="lead"> This is a shortlist of RSOs that our advanced matching algorithm has hand-picked for you as a possible match based on your profile.  We hope our recommendations help you in your search to find an RSO that is right for you!</p>
        <table class ="table-light" border= "2" cellpadding = "4" align="center">
            <tr>
                <th> Title </th>
                <th> Description </th>
                <th> Category </th>
                <th> Website</th>
                <th> Email </th>
                <th> Department </th>
            </tr>
        <?php
                $query = mysqli_query($link, "SELECT * FROM Users WHERE inputEmail = '".$Email."';");
                while ($row = mysqli_fetch_array($query)) {
                        $netid = $row['netid'];
                        $inputEmail = $row['inputEmail'];
                        $firstName = $row['firstName'];
                        $lastName = $row['lastName'];
                        $major = $row['major'];
                        $graduationYear = $row['graduationYear'];
                        $degreeLevelPursuing = $row['degreeLevelPursuing'];
                }
                $query = mysqli_query($link, "SELECT * FROM ((SELECT * FROM ((SELECT * FROM ((SELECT *, count(*) as countmajor FROM ((SELECT Title, Description, Category, Website, Email, Department, graduationYear, RSOmerge.netid as netid, major FROM Users INNER JOIN ((SELECT RSO_members.Title, RSO_members.netid, Description, Category, Website, Email, Department FROM RSO INNER JOIN RSO_members ON RSO.Title = RSO_members.Title) as RSOmerge) ON Users.netid = RSOmerge.netid) as trimerge) WHERE major = '".$major."' GROUP BY Title) as t1) HAVING countmajor > 0) as final1) UNION ( SELECT * FROM((SELECT *, count(*) as countgradyear FROM ((SELECT Title, Description, Category, Website, Email, Department, graduationYear, RSOmerge.netid as netid, major FROM Users INNER JOIN ((SELECT RSO_members.Title, RSO_members.netid, Description, Category, Website, Email, Department FROM RSO INNER JOIN RSO_members ON RSO.Title = RSO_members.Title) as RSOmerge) ON Users.netid = RSOmerge.netid) as trimerge) WHERE graduationYear = '".$graduationYear."' GROUP BY Title) as t2) HAVING countgradyear > 1)) as final) GROUP BY Title;");
                if (!$query) {
                    printf("Error: %s\n", mysqli_error($link));
                    exit();
                }
                while ($row = mysqli_fetch_array($query)) {
                        echo
                            "<tr>
                            <td>{$row['Title']}</td>
                            <td>{$row['Description']}</td>
                            <td>{$row['Category']}</td>
                            <td>{$row['Website']}</td>
                            <td>{$row['Email']}</td>
                            <td>{$row['Department']}</td>
                            </tr>\n";

                }
         ?>
         </table>
         <p>






        </p>
        <p>
        </p>
        </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="css/jquery.min.js"></script>
  <script src="css/bootstrap.bundle.min.js"></script>

</body>

</html>
