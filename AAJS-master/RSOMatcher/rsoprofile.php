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

  <title>RSO Matcher - RSO Profile</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript -->
  <script src="css/jquery.min.js"></script>
  <script src="css/bootstrap.bundle.min.js"></script>

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
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="studentprofile.php">Student Profile</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="">RSO Profile</a>
            <span class="sr-only">(current)</span>
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
  <h1 class="text-center mt-4">RSO Search</h4>
  <h4 class="text-center mb-4">Use the filters below to find your next organization!</h6>
  <section class="search-sec">
      <div class="container">
          <form action="rsoprofile.php" method="post">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                              <select class="form-control search-slt" name="searchMajor">
                                  <option value="any">Select Major</option>
                                  <option value="Art History">Art History</option>
                                  <option value="MCB">Biology (MCB)</option>
                                  <option value="Computer Engineering">Computer Engineering</option>
                                  <option value="Computer Science">Computer Science</option>
                                  <option value="Mechanical Engineering">Mechanical Engineering</option>
                                  <option value="Psychology">Psychology</option>
                                  <option value="Secondary Education of English">Secondary Education of English</option>
                                  <option value="Systems Engineering and Design">Systems Engineering and Design</option>
                              </select>
                          </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                              <select class="form-control search-slt" name="searchGraduationYear">
                                  <option value="any">Select Graduation Year</option>
                                  <option value="2019">2019</option>
                                  <option value="2020">2020</option>
                                  <option value="2021">2021</option>
                              </select>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-12 p-0">
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
                          <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                              <input type="text" class="form-control search-slt" name="searchTitle" placeholder="Enter RSO Title">
                          </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                              <select class="form-control search-slt" name="searchCategory">
                                  <option value="any">Select RSO Category</option>
                                  <option value="Academic">Academic</option>
                                  <option value="Hobby">Hobby</option>
                                  <option value="Honors">Honors</option>
                                  <option value="Leadership">Leadership</option>
                                  <option value="Planning Events">Planning Events</option>
                                  <option value="Professional">Professional</option>
                                  <option value="Sports">Sports</option>
                                  <option value="Volunteering">Volunteering</option>
                              </select>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                              <select class="form-control search-slt" name="searchDepartment">
                                  <option value="any">Select RSO Department</option>
                                  <option value="Art">Art</option>
                                  <option value="Computer Science">CS</option>
                                  <option value="ECE">ECE</option>
                                  <option value="Engineering">Engineering</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Industrial Engineering">IE</option>
                                  <option value="Mechanical Engineering">ME</option>
                                  <option value="None">No Affiliation</option>
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
<br>

<center>

 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add" data-whatever="@getbootstrap">Add RSO</button>

 <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="addLabel">Add RSO</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        <form method="post" id="add_form" action="insertrso.php">
             <label for="recipient-name" class="col-form-label">RSO Title:</label>
             <input type="text" class="form-control" name="title">
             <label for="recipient-name" class="col-form-label">President:</label>
             <input type="text" class="form-control" name="president">
             <label for="recipient-name" class="col-form-label">Treasurer:</label>
             <input type="text" class="form-control" name="treasurer">
             <label for="message-text" class="col-form-label">Description:</label>
             <textarea class="form-control" name="description"></textarea>
             <label for="recipient-name" class="col-form-label">Website:</label>
             <input type="text" class="form-control" name="website">
             <label for="recipient-name" class="col-form-label">Email:</label>
             <input type="text" class="form-control" name="email">
            </br>
            <select class="form-control search-slt" name="category">
                <option value="" disabled selected>Category</option>
                <option value="Academic">Academic</option>
                <option value="Hobby">Hobby</option>
                <option value="Honors">Honors</option>
                <option value="Leadership">Leadership</option>
                <option value="Planning Events">Planning Events</option>
                <option value="Professional">Professional</option>
                <option value="Sports">Sports</option>
                <option value="Volunteering">Volunteering</option>
            </select>
           </br>
            <select class="form-control search-slt" name="department">
               <option value="" disabled selected>Department</option>
               <option value="Art">Art</option>
               <option value="Computer Science">CS</option>
               <option value="ECE">ECE</option>
               <option value="Engineering">Engineering</option>
               <option value="Fine Arts">Fine Arts</option>
               <option value="Industrial Engineering">IE</option>
               <option value="Mechanical Engineering">ME</option>
               <option value="None">No Affiliation</option>
             </select>
            </br>
            <input type="submit" class="btn btn-primary btn-block" name="submitinsert" id="submitinsert" value="Add" />
         </form>
       </div>
     </div>
   </div>
 </div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete" data-whatever="@getbootstrap">Delete RSO</button>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteLabel">Delete RSO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="delete_form" action="deleterso.php">
            <label for>RSO Name:</label>
            <input type="text" class="form-control" name="deleteTitle" placeholder="Enter RSO Title" />
            <br />
            <input type="submit" class="btn btn-primary btn-block" name="submitdelete" id="submitdelete" value="Delete" />
        </form>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update" data-whatever="@getbootstrap">Update RSO</button>

<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateLabel">Update RSO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="update_form" action="updaterso.php">
             <label for="recipient-name" class="col-form-label">RSO Title to be updated:</label>
             <input type="text" class="form-control" name="title">
             <label for="recipient-name" class="col-form-label">President:</label>
             <input type="text" class="form-control" name="president">
             <label for="recipient-name" class="col-form-label">Treasurer:</label>
             <input type="text" class="form-control" name="treasurer">
             <label for="message-text" class="col-form-label">Description:</label>
             <textarea class="form-control" name="description"></textarea>
             <label for="recipient-name" class="col-form-label">Website:</label>
             <input type="text" class="form-control" name="website">
             <label for="recipient-name" class="col-form-label">Email:</label>
             <input type="text" class="form-control" name="email">
            </br>
            <select class="form-control search-slt" name="category">
                <option value="any">Category</option>
                <option value="Academic">Academic</option>
                <option value="Hobby">Hobby</option>
                <option value="Honors">Honors</option>
                <option value="Leadership">Leadership</option>
                <option value="Planning Events">Planning Events</option>
                <option value="Professional">Professional</option>
                <option value="Sports">Sports</option>
                <option value="Volunteering">Volunteering</option>
            </select>
           </br>
            <select class="form-control search-slt" name="department">
               <option value="any">Department</option>
               <option value="Art">Art</option>
               <option value="Computer Science">CS</option>
               <option value="ECE">ECE</option>
               <option value="Engineering">Engineering</option>
               <option value="Fine Arts">Fine Arts</option>
               <option value="Industrial Engineering">IE</option>
               <option value="Mechanical Engineering">ME</option>
               <option value="None">No Affiliation</option>
             </select>
            </br>
            <input type="submit" class="btn btn-primary btn-block" name="submitupdate" id="submitupdate" value="Update" />
         </form>
      </div>
    </div>
  </div>
</div>

<br>
<br>

<?php
include('db_login.php');
$query = mysqli_query($link,"SELECT * FROM RSO");

if(isset($_REQUEST['submit']))
{
	$majorFilter=$_REQUEST['searchMajor'];
  $yearFilter=$_REQUEST['searchGraduationYear'];
  $categoryFilter=$_REQUEST['searchCategory'];
  $departmentFilter=$_REQUEST['searchDepartment'];
  $netidFilter=$_REQUEST['searchNetid'];
  $titleFilter=$_REQUEST['searchTitle'];

	include('db_login.php');
  $query=mysqli_query($link, "SELECT DISTINCT * FROM RSO r, RSO_members rm, Users u WHERE r.title=rm.title AND rm.netid = u.netid AND ('$netidFilter'='' OR u.NetID='$netidFilter') AND ('$titleFilter'='' OR r.Title='$titleFilter') AND
    ('$majorFilter'='any' OR u.major='$majorFilter') AND ('$yearFilter'='any' OR u.graduationYear='$yearFilter') AND ('$categoryFilter'='any' OR r.Category='$categoryFilter') AND ('$departmentFilter'='any' OR r.Department='$departmentFilter')");
	$row=mysqli_fetch_array($query);
	if(empty($row))
	{
		#False Info / User doesn't exist
		echo('<script>alert("No records found");</script>');
    echo('<script>window.location="rsoprofile.php";</script>');
	}
	else
	{
    $query=mysqli_query($link, "SELECT DISTINCT * FROM RSO r, RSO_members rm, Users u WHERE r.title=rm.title AND rm.netid = u.netid AND ('$netidFilter'='' OR u.NetID='$netidFilter') AND ('$titleFilter'='' OR r.Title='$titleFilter') AND
      ('$majorFilter'='any' OR u.major='$majorFilter') AND ('$yearFilter'='any' OR u.graduationYear='$yearFilter') AND ('$categoryFilter'='any' OR r.Category='$categoryFilter') AND ('$departmentFilter'='any' OR r.Department='$departmentFilter')");

	}

}

while($newrow = mysqli_fetch_assoc($query)) {
 $memberquery= mysqli_query($link, "SELECT rm.NetID FROM RSO_members rm WHERE rm.title='".$newrow['Title']."'");
?>
  <div class="wrap-collabsible">
    <input id=<?php echo "collapse" . $newrow['President'] ?> class="toggle" type="checkbox">
    <label for=<?php echo "collapse" . $newrow['President'] ?> class="lbl-toggle"><?php echo $newrow['Title'] ?></label>
    <div class="collapsible-content">
      <div class="content-inner">
        <div class="row">
            <div class="col-sm">
              <center>
                <?php echo "Category: " . $newrow['Category'] ?>
            </div>
            <div class="col-sm">
              <center>
                <?php echo "President: " . $newrow['President'] ?>
            </div>
            <div class="col-sm">
              <center>
                <?php echo "Treasurer: " . $newrow['Treasurer'] ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
              <center>
                <?php echo "Department: " . $newrow['Department'] ?>
            </div>
            <div class="col-sm">
              <center>
                <?php echo "Website: " . $newrow['Website'] ?>
            </div>
            <div class="col-sm">
              <center>
                <?php echo "Email: " . $newrow['Email'] ?>
            </div>
        </div>
        <p>
          <center>
          <?php echo  $newrow['Description'] ?>
        </p>
        <div>
          <center>
            <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="<?php echo "#Modal" . $newrow['rso_id'] ?>">
        View <?php echo $newrow['Title'] ?> Members
      </button>

        </div>
      </div>
    </div>
  </div>
  <br>
  <!-- Modal -->
  <div class="modal fade" id="<?php echo "Modal" . $newrow['rso_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $newrow['Title'] ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="<?php echo $newrow['Title'] ?>Label"><?php echo $newrow['Title'] ?> Members</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
           while ($memberrow =  mysqli_fetch_assoc($memberquery)) {
             echo $memberrow['NetID']."<br>";
           }
            ?>
        </div>
      </div>
    </div>
  </div>
<?php
}
 ?>

<br>
<br>

</body>


</html>
