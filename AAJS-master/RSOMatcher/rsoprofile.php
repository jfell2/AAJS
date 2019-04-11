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
                                  <option value="Art History">Art History</option>
                                  <option value="Biology (MCB)">Biology (MCB)</option>
                                  <option value="Computer Engineering">Computer Engineering</option>
                                  <option value="Computer Sceince">Computer Science</option>
                                  <option value="Industrial Engineering">Industrial Engineering</option>
                                  <option value="Mechanical Engineering">Mechanical Engineering</option>
                                  <option value="Psychology">Psychology</option>
                                  <option value="Secondary Education of English">Secondary Education of English</option>
                                  <option value="Systems Engineering and Design">Systems Engineering and Design</option>
                              </select>
                          </div>
                           <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                              <select class="form-control search-slt" name="searchDegreeLevelPursuing">
                                  <option value="" disabled selected>Select Degree Level</option>
                                  <option value="Undergraduate Freshman">Undergraduate Freshman</option>
                                  <option value="Undergraduate Sophomore">Undergraduate Sophomore</option>
                                  <option value="Undergraduate Junior">Undergraduate Junior</option>
                                  <option value="Undergraduate Senior">Undergraduate Senior</option>
                                  <option value="Graduate Student">Graduate Student</option>
                                  <option value="Alumni">Alumni</option>
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
                                  <option value="Academic/Pre-Professional">Academic</option>
                                  <option value="Creative/Performing Arts">Creative</option>
                                  <option value="Social">Social</option>
                                  <option value="Service/Philanthropy">Service</option>
                                  <option value="Club Sports">Club Sports</option>
                                  <option value="Religious">Religious</option>
                              </select>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                              <select class="form-control search-slt" name="searchDepartment">
                                  <option value="" disabled selected>Select RSO Department</option>
                                  <option value="CS">CS</option>
                                  <option value="ECE">ECE</option>
                                  <option value="Engineering">Engineering</option>
                                  <option value="ISE">ISE</option>
                                  <option value="MechSE">MechSE</option>
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
<br>
<?php
include('db_login.php');
$query = mysqli_query($link,"SELECT * FROM RSO");

if(isset($_REQUEST['submit']))
{
	$majorFilter=$_REQUEST['searchMajor'];

	include('db_login.php');
	$query=mysqli_query($link, "SELECT * FROM RSO r, RSO_members rm, Users u WHERE r.title=rm.title AND rm.netid = u.netid AND u.major='".$majorFilter."'");
	$row=mysqli_fetch_array($query);
	if(empty($row))
	{
		#False Info / User doesn't exist
		echo('<script>alert("No records found");</script>');
    echo('<script>window.location="rsoprofile.php";</script>');
	}
	else
	{
    $query=mysqli_query($link, "SELECT * FROM RSO r, RSO_members rm, Users u WHERE r.title=rm.title AND rm.netid = u.netid AND u.major='".$majorFilter."'");

	}

}

while($row = mysqli_fetch_assoc($query)) {

?>
  <div class="wrap-collabsible">
    <input id=<?php echo $row['Title'] ?> class="toggle" type="checkbox">
    <label for=<?php echo $row['Title'] ?> class="lbl-toggle"><?php echo $row['Title'] ?></label>
    <div class="collapsible-content">
      <div class="content-inner">
        <div class="row">
            <div class="col-sm">
              <center>
                <?php echo "Category: " . $row['Category'] ?>
            </div>
            <div class="col-sm">
              <center>
                <?php echo "President: " . $row['President'] ?>
            </div>
            <div class="col-sm">
              <center>
                <?php echo "Treasurer: " . $row['Treasurer'] ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
              <center>
                <?php echo "Department: " . $row['Department'] ?>
            </div>
            <div class="col-sm">
              <center>
                <?php echo "Website: " . $row['Website'] ?>
            </div>
            <div class="col-sm">
              <center>
                <?php echo "Email: " . $row['Email'] ?>
            </div>
        </div>
        <p>
          <center>
          <?php echo  $row['Description'] ?>
        </p>
        <div>
          <center>
            <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        View <?php echo $row['Title'] ?> Members
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['Title'] ?> Members</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>
  </div>
  <br>

<?php
}
 ?>

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
         <form>
           <div class="form-group">
             <label for="recipient-name" class="col-form-label">RSO Name:</label>
             <input type="text" class="form-control" id="recipient-name">
           </div>
           <div class="form-group">
             <label for="recipient-name" class="col-form-label">President:</label>
             <input type="text" class="form-control" id="recipient-name">
           </div>
           <div class="form-group">
             <label for="recipient-name" class="col-form-label">Treasurer:</label>
             <input type="text" class="form-control" id="recipient-name">
           </div>
           <div class="form-group">
             <label for="recipient-name" class="col-form-label">Website:</label>
             <input type="text" class="form-control" id="recipient-name">
           </div>
           <div class="form-group">
             <label for="recipient-name" class="col-form-label">Email:</label>
             <input type="text" class="form-control" id="recipient-name">
           </div>
           <div class="form-group">
             <label for="message-text" class="col-form-label">Description:</label>
             <textarea class="form-control" id="message-text"></textarea>
           </div>
           <div class="form-group">
             <select class="form-control search-slt" name="searchGraduationYear">
                 <option value="" disabled selected>Category</option>
                 <option>Example one</option>
                 <option>Example one</option>
                 <option>Example one</option>
                 <option>Example one</option>
                 <option>Example one</option>
                 <option>Example one</option>
             </select>
         </div>
         <div class="form-group">
           <select class="form-control search-slt" name="searchGraduationYear">
               <option value="" disabled selected>Department</option>
               <option>Example one</option>
               <option>Example one</option>
               <option>Example one</option>
               <option>Example one</option>
               <option>Example one</option>
               <option>Example one</option>
           </select>
       </div>
         </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-primary">Add RSO</button>
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
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">RSO Name:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Delete RSO</button>
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
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">RSO Name:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">President:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Treasurer:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Website:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="form-group">
            <select class="form-control search-slt" name="searchGraduationYear">
                <option value="" disabled selected>Category</option>
                <option>Example one</option>
                <option>Example one</option>
                <option>Example one</option>
                <option>Example one</option>
                <option>Example one</option>
                <option>Example one</option>
            </select>
        </div>
        <div class="form-group">
          <select class="form-control search-slt" name="searchGraduationYear">
              <option value="" disabled selected>Department</option>
              <option>Example one</option>
              <option>Example one</option>
              <option>Example one</option>
              <option>Example one</option>
              <option>Example one</option>
              <option>Example one</option>
          </select>
      </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Update RSO</button>
      </div>
    </div>
  </div>
</div>

</body>


</html>
