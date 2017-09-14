<?php

include('../php/admin_login.php');

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
  <title>Comments</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/forum.css">
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
        <li><a href="make-your-trip.php">Make Your Trip   </a></li>
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


<?php

$query= "SELECT * FROM forum ORDER BY id DESC";
$data= mysqli_query($connection, $query) or die(mysqli_error($connection));

  while($row = mysqli_fetch_array($data))
  {
    ?>
    <div class="container">
      <div class="row">
        <div class="col-sm-5">
          <div class="panel panel-default">
            <div class="panel-heading">
              <strong>  <?php echo $row['username']; ?> </strong> &emsp;&emsp; <b> id= <?php echo $row['id']; ?> </b> <span class="text-muted">commented 5 days ago</span>
            </div>
            <div class="panel-body">
               <?php echo $row['content']; ?>
            </div><!-- /panel-body -->
          </div><!-- /panel panel-default -->
        </div><!-- /col-sm-5 -->
      </div><!-- /row -->
    </div><!-- /container -->
    <br><br><br><br><br><br>

    <?php
  }

?>

<div>
<fieldset style= "width: 30%">
<table border= "0">
  <tr>
    <form method = "POST" action="unblock_content.php">
    <td>
      Enter id of post to be unblocked
    </td>
    <td>
      <input type="text" name="id">
    </td>
  </tr>

  <tr>
    <td>
      <input id="button" type="submit" name="unblock_content" value="Unblock_content">
    </td>
  </tr>
  </form>
</table>
</fieldset>
</div>

</body>
</html>