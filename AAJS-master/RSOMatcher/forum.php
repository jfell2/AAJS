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

  <title>RSO Matcher - Forum</title>

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
          <li class="nav-item">
            <a class="nav-link" href="rsoprofile.php">RSO Profile</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="forum.php">Forum</a>
            <span class="sr-only">(current)</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=<?php echo"$logdata"?>><?php echo"$logbutton"?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
<?php
include('db_login.php');

$query=mysqli_query($link, "SELECT * from questions");

while($newrow = mysqli_fetch_assoc($query)) {
?>
  <div class="wrap-collabsible">
    <input id=<?php echo $newrow['q_id'] ?> class="toggle" type="checkbox">
    <label for=<?php echo $newrow['q_id'] ?> class="lbl-toggle"><?php echo $newrow['q_title'] ?></label>
    <div class="collapsible-content">
      <div class="content-inner">
          <center>
        <?php
        include('db_login.php');
        $query2 = mysqli_query($link, "SELECT * from answers where answers.q_id = '".$newrow['q_id']."'");
        while($row = mysqli_fetch_assoc($query2)) {
          echo  "Answer: " . $row['a_text'];
        ?>
        <br>
        <br>
        <?php
        } ?>
        <div>
          <center>
            <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="<?php echo "#ModaladdAnswer" . $newrow['q_id'] ?>">
        Add Answer
      </button>

        </div>
      </div>
    </div>
  </div>
  <br>
  <!-- Modal -->
  <div class="modal fade" id="<?php echo "ModaladdAnswer" . $newrow['q_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $newrow['q_title'] ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="<?php echo $newrow['q_title'] ?>Label">Add Answer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" id="answer_text" action="forum.php">
              <input type="text" class="form-control" name="answer_txt" placeholder="Enter Your Answer Here" />
              <br />
              <input type="submit" class="btn btn-primary btn-block" name="submitA" id="submitA" value="Add" />
          </form>
          <?php
          if(isset($_REQUEST['submitA']))
          {
          	$a_txt=$_REQUEST['answer_txt'];

          	include('db_login.php');

          	$query = mysqli_query($link, "INSERT INTO answers (a_text, q_id) VALUES ('".$a_txt."', '".$newrow['q_id']."' );");
            echo('<script>window.location="forum.php"</script>');
          }

           ?>
        </div>
      </div>
    </div>
  </div>
<?php
}
 ?>

<center>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addQ" data-whatever="@getbootstrap">Add Question</button>

<div class="modal fade" id="addQ" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addQLabel">Add Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="question_text" action="forum.php">
            <input type="text" class="form-control" name="question_txt" placeholder="Enter Your Question Here" />
            <br />
            <input type="submit" class="btn btn-primary btn-block" name="submitQ" id="submitQ" value="Add" />
        </form>
        <?php
        if(isset($_REQUEST['submitQ']))
        {
        	$q_txt=$_REQUEST['question_txt'];

        	include('db_login.php');

        	$query = mysqli_query($link, "INSERT INTO questions (q_title) VALUES ('".$q_txt."');");
          echo('<script>window.location="forum.php"</script>');
        }

         ?>
      </div>
    </div>
  </div>
</div>

</body>


</html>
