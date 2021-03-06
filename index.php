<?php 

include('php/login.php'); // Includes Login Script

error_reporting(E_ALL ^ E_NOTICE);

// echo "here";

// echo $_SESSION['login_user'];
// if(isset($_SESSION['login_user'])){
//   echo "<br /> in here";
// }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
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
        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="make_my_trip.php">Make Your Trip</a></li>
        <li><a href="about-us.php">About Us</a></li>
        <li><a href="forum.php">Forum</a></li>
      </ul>
      
      <?php if(isset($_SESSION['login_user'])) {?>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="php/logout.php">Hi <b> <?php echo $_SESSION['login_user']; ?> </b>Logout</a>
        </li>
      </ul>

      <?php } else { ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">Login/Sign Up</a></li>
      </ul>
      <?php } ?>
            
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
<!--</nav>-->

<!-- *****************************************NAVBAR ENDS HERE **************************************************-->

<!-- Carousel
************************************************************** -->
<div id="myCarousel" class="carousel slide">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img src="img/2.jpeg" style="width:100%; height: 70%;" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
          <p><font size="14" color="#990000">The Perfect Place To Plan Your Getaway</font></p>
          <p style="text-align: center;"><font size="12" align="center">bookMyTrip!</font></p>
          <p></p>
          <!--<p><a class="btn btn-lg btn-primary" href="about-us.php">More about us!</a>-->
        </p>
        </div>
      </div>
    </div>
    <div class="item">
      <img src="img/lel.jpeg" style="width:100%;height:70%;" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
          
          <p><font size="14">Travel With Us</font></p>
          <p><font size="10">For the Best Deal!</font></p>
          
        </div>
      </div>
    </div>
    <div class="item">
      <img src="img/mount2.jpeg" style="width:100%;height:70%;" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
          
          <p><font size="12" color="#922345"><b>Capture The Moment</b></font></p>
          
        </div>
      </div>
    </div>
<div class="item">
      <img src="img/trip7.jpeg" style="width:100%;height:70%;" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
          
          <p><font size="14" color="#4040a1"><i>Experience</i></font></p>
          <p><font size="7" color="#4040a1">a holiday like never before!</font></p>
          
        </div>
      </div>
    </div>
<div class="item">
      <img src="img/beach2.jpeg" style="width:100%;height:70%;" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
         
          <p><font size="7" color="#dac292"><i>"To Travel Is To Live...."</i></font></p>
         
        </div>
      </div>
    </div>
    <div class="item">
      <img src="img/trip5.jpeg" style="width:100%;height:70%;" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
         
          <p><font size="7" color="#990000"><i>Adventure Awaits!!</i></font></p>
          
        </div>
      </div>
    </div>

    
    

  </div>
  <!-- Controls  to move -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>  
</div>
</nav>
<!-- /.carousel -->


<!-- Circle wala stuff
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

  
  <div class="row">
    <div class="col-md-4 text-center">
      <img class="img-circle" src="img/trip4.jpeg" style="width:140px;height:140px;">
      <h2>About us!</h2>
      <p>Read more about us here</p>
      <p><a class="btn btn-default" href="about-us.php">View details »</a></p>
    </div>
    <div class="col-md-4 text-center">
      <img class="img-circle" src="img/trip.jpeg" style="width: :120px;height:120px;">
      <h2>Make your Trip!</h2>
      <p>Get a cost estimate before you could book and plan your trip accordingly!</p>
      <p><a class="btn btn-default" href="make-your-trip.php">View details »</a></p>
    </div>
    <div class="col-md-4 text-center">
      <img class="img-circle" src="img/trip2.jpeg" style="width:140px;height:140px;">
      <h2>Post your experience Here!</h2>
      <p>Post and read various posts on travel.</p>
      <p><a class="btn btn-default" href="forum.php">View details »</a></p>
    </div>
  </div><!-- /.row -->




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






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>