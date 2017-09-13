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
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="css/for.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
        <li><a href="make-your-trip.html">Make Your Trip</a></li>
        <li><a href="about-us.html">About Us</a></li>
        <li><a href="testimonials.php">Testimonials</a></li>
      </ul>
      
      <?php if(isset($_SESSION['login_user'])) {?>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="php/logout.php">Hi <b> <?php echo $_SESSION['login_user']; ?> </b>Logout</a>
        </li>
      </ul>

      <?php } else { ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.html">Login/Sign Up</a></li>
      </ul>
      <?php } ?>

      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- *****************************************NAVBAR ENDS HERE **************************************************-->

<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="ibox-content m-b-sm border-bottom">
                <div class="p-xs">
                    <div class="pull-left m-r-md">
                        <i class="fa fa-globe text-navy mid-icon"></i>
                    </div>
                    <h2>Testimonials!</h2>
                    <span>Feel free to choose whatever you're interested in.</span>
                </div>
            </div>

            <div class="ibox-content forum-container">

                <div class="forum-title">
                 <h3>General subjects</h3>
                </div>

                <div class="forum-item active">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="forum-icon">
                                <i class="fa fa-shield"></i>
                            </div>
                            <a href="forum_post.html" class="forum-item-title">General Discussion</a>
                            <div class="forum-sub-title">Talk about your very own travel experience, your favorite places,hotels, talk about enything.
                            </div>
                        </div>
                        <div class="col-sm-4 well">
                            <form accept-charset="UTF-8" action="php/post_submit.php" method="POST">
                                <textarea class="form-control" id="text" name="text" placeholder="Type in your message" rows="5"></textarea>
                                <h6 class="pull-right" id="count_message"></h6>
                                <button class="btn btn-info" name="post_submit" type="submit">Post </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>




























    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>