<?php

include('php/login.php');

error_reporting(E_ALL ^ E_NOTICE);


if(!isset($_SESSION['login_user']))
{
  $_SESSION['no_login_view']= 1;
  header("location: login.php");
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Failed to connect to database:".mysqli_error($connection));

$db= mysqli_select_db($connection, DB_NAME) or die("Failed to connect to MySql".mysqli_error($connection));

?>

<!DOCTYPE html>
<html>
<head>
  <title>Forum</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/forum.css">
</head>
<body>
<!-- *****************************************NAVBAR STARTS HERE **************************************************-->
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">bookMyTrip</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="make_my_trip.php">Make Your Trip   </a></li>
        <li><a href="about-us.php">About Us</a></li>
        <li class="active"><a href="forum.php">Forum <span class="sr-only">(current)</span></a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="php/logout.php">Hi <b> <?php echo $_SESSION['login_user']; ?> </b>Logout</a>
        </li>
      </ul>

      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- *****************************************NAVBAR ENDS HERE **************************************************-->


<!-- <?php

$query= "SELECT username, content FROM forum";
$data= mysqli_query($connection, $query) or die(mysqli_error($connection));

while($row = mysqli_fetch_array($data))
{
    ?>
    <p><b> <?php echo $row['username']; ?> </b></p><br>
    <p> <?php echo $row['content']; ?> </p><br><br>
    <?php 
}

?>  -->

<div class="col-xs-12 col-md-12 form-group">
  <form action= "testimonials.php">
    <button class="btn btn-primary pull-right" type="submit" name= "Forum Post">Post on the Forum!</button>
    <!--<button class="btn btn-primary pull-right" type="submit">Enviar</button>-->
  </form>
</div>



<?php

$query= "SELECT * FROM forum ORDER BY id DESC";
$data= mysqli_query($connection, $query) or die(mysqli_error($connection));

  while($row = mysqli_fetch_array($data))
  {
    if($row['blocked'] == 0)
    {
      ?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default" style="width: 60%; margin-left: 50px; margin-right: 50px; word-wrap: break-word;">
              <div class="panel-heading">
                <strong>  <?php echo $row['username']; ?> </strong> 
              </div>
              <div class="panel-body">
                 <?php echo $row['content']; ?>
              </div><!-- /panel-body -->
            </div><!-- /panel panel-default -->
          </div><!--/col-sm-5-->
        </div><!-- /row -->
      </div><!-- /container -->
      <br><br><br><br><br><br>

      <?php
    }
  }

?>

<br><br><br><br><br><br>


<hr>
<div id="footer">
  <footer><h4>
    <?php 

    include 'footer.php'; 

    ?>
    </h4>
  </footer>
  
</div>
</body>
</html>