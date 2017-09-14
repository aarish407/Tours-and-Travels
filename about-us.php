<?php

  include('php/login.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>About us</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <li><a href="index.php">Home </a></li>
        <li><a href="make-your-trip.php">Make Your Trip</a></li>
        <li class="active"><a href="about-us.php">About Us <span class="sr-only">(current)</span></a></li>
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
</nav>

<!-- *****************************************NAVBAR ENDS HERE **************************************************-->

<div class="container">
  <h2>About Us</h2>
  <font size="4"><p><b>bookmytrip! </b>is a website designed to make your journey easier.All you have to do is choose a city and a date and the rest will be taken care of. Our uniqueness is that we provide customers with the cost estimate of the trip they're plaanning to take.<i>"Travel is about scraping together enough pennies to make a dream trip a reality.Never will a traveller look back and wish they hadn't wandered somewhere new."</i>We do believe that our travellers crave new sights and memories.Most of the times the only trip we regret is the one we didn't take..... So don't waste time,BOOK A TRIP RIGHT NOW!</p></font>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
<div class="item active">
        <img src="img/stars.jpeg" alt="stars" style="width:100%;">
        <div class="carousel-caption">
          <h1 style="text-align: center;">Plan your Next Getaway Now!</h1>
          <p><i>"Travelling..... It leaves you speechless, then turns you into a story teller!"</i></p>
        </div>
      </div>
      <div class="item ">
        <img src="img/tour1.jpeg" alt="lakes" style="width:100%;">
        <div class="carousel-caption">
          <h3><i>"When life gives you mountains...,Put on your boots and hike!</i></h3>
          <p></p>
        </div>
      </div>

      <div class="item">
        <img src="img/boat.jpg" alt="rivers" style="width:100%;">
        <div class="carousel-caption">
          <h3><i>"Off all the books in the world,the best stories are found between the pages of a passport!"</i></h3>
          <p>"</p>
        </div>
      </div>
    
    <!--<div class="item">
        <img src="stars.jpeg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>-->

      <div class="item">
        <img src="img/tour2.jpeg" alt="Beaches" style="width:100%;">
        <div class="carousel-caption">
          <h3><font color="black">Beaches</font></h3>
          <p></p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!--  YOUTUBE VIDEOS-->

<div align="center">

<h3><i>"Difficult Roads Often lead to Beautiful Destinations"</i></h3>
<iframe width="560" height="315" src="https://www.youtube.com/embed/vCOGKDx0Zb8?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
&nbsp;&nbsp;<iframe width="560" height="315" src="https://www.youtube.com/embed/HYeN4RHhLAI?rel=0&amp;showinfo=0&amp;start=9" frameborder="0" allowfullscreen></iframe>
</div>
<!--<div align="left">
<iframe width="560" height="315" src="https://www.youtube.com/embed/HYeN4RHhLAI?rel=0&amp;showinfo=0&amp;start=9" frameborder="0" allowfullscreen></iframe></div>-->




 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>