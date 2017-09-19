<?php

session_start();

error_reporting(E_ALL ^ E_NOTICE);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Make my trip</title>
	<script type="text/javascript" src="cost.js"></script>
	<link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin/admin_panel.css">
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
        <li class="active"><a href="make_my_trip.php">Make Your Trip<span class="sr-only">(current)</span></a></li>
        <li><a href="about-us.php">About Us </a></li>
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


    

<div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <div class="row">
              <div class="col-md-12">
              <p class="well lead">Plan your trip</p>

              <?php 
              if(isset($_SESSION['error']))
            {
                ?>

                <div class="container" style="padding-top: 20px;">
                  <div class="row">         
                    <div class="alert alert-danger fade in">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <!-- <h4>You must be logged in!</h4> -->
                      <p><?php echo $_SESSION['error']; ?></p>
                    </div>
                 </div>
                </div>
                
                <?php
            }
?>


              <div class="container">
                <div class="row"> <!-- div da esquerda -->
                    <!-- Text input CNPJ e Razao Social-->
                    <div class="col-sm-8 contact-form"> <!-- div da direita -->
                        <form id="contact" method="post" class="form" action= "bookmytrip.php" role="form">
                            <div class="row">
                                <div class="col-xs-4 col-md-6 form-group">
                                    <input class="form-control" id="inputrazaosocial" name="destination" placeholder="Destination State" type="text" />
                                </div>

                                <div class="col-xs-4 col-md-3 form-group">
                                    <select class="form-control"id="selectbasic" name="selectestado" >
                                        <option>List</option>

                                        <?php

                                        include 'php/config.php';

                                        // session_start();

                                        // echo $_SESSION['login-user'];

                                        // echo "Reached the php";

                                        $query= "SELECT destination FROM destination";
                                        $data= mysqli_query($connection, $query) or die(mysqli_error($connection));

                                        while($row= mysqli_fetch_array($data))
                                        {
                                            ?>

                                            <option><?php echo $row['destination'];?></option>

                                            <?php
                                            
                                        }

                                        ?>

                                    </select>
                                </div>
                            </div> <!-- fim row -->
                            <!-- Text input endereco-->
                            <div class="col-xs-4 col-md-6 form-group">
                                <div class="controls">
                                    <input class="form-control" id="inputendereco" name="source" placeholder="Source State"  type="text">
                                </div>
                            </div><!--fim control-group-->
                                <div class="col-xs-4 col-md-3 form-group">
                                    <select class="form-control"id="selectbasic" name="selectestado" >
                                        <option>List</option>

                                        <?php

                                        include 'php/config.php';

                                        // session_start();

                                        // echo $_SESSION['login-user'];

                                        // echo "Reached the php";

                                        $query= "SELECT DISTINCT source FROM source";
                                        $data= mysqli_query($connection, $query) or die(mysqli_error($connection));

                                        while($row= mysqli_fetch_array($data))
                                        {
                                            ?>

                                            <option><?php echo $row['source'];?></option>

                                            <?php
                                            
                                        }

                                        ?>

                                    
                                    </select>                                    
                                </div>

                            <br> <!--pulando uma linha -->
                            <!-- Text input cidade e estado-->
                            <div class="row">
                                <div class="col-xs-6 col-md-6 form-group">
                                    <input class="form-control" id="inputcidade" name="transport" placeholder="Mode of transport" type="text" />
                                </div>
                                <div class="col-xs-4 col-md-3 form-group">
                                    <select class="form-control"id="selectbasic" name="selectestado" >
                                      
                                    <option>List</option>
                                      <option>Air</option>
                                      <option>Train</option>
                                      <option>Bus</option>  
                                  </select>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-md-6 form-group">
                                    <input class="form-control" id="inputcidade" name="no_d" placeholder="Number of days" type="number" />
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-md-6 form-group">
                                    <input class="form-control" id="inputcidade" name="no_p" placeholder="Number of People" type="number" />
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-md-6 form-group">
                                    <input class="form-control" id="inputcidade" name="no_s" placeholder="Number of stars of hotel" type="number" />
                                </div>

                            </div>
                                <div class="col-xs-6 col-md-3 form-group">
                                    <input class="form-control" id="inputtelefone" name="city1" placeholder="City 1" type="text" />
                                </div>
                                <div class="col-xs-4 col-md-3 form-group">
                                    <input class="form-control" id="inputcontato" name="city2" placeholder="City 2" type="text" />
                                </div>
                                <div class="col-xs-4 col-md-3 form-group">
                                    <input class="form-control" id="inputemail" name="city3" placeholder="City 3" type="text" />
                                </div>

                                <div class="col-xs-4 col-md-3 form-group">
                                    <select class="form-control"id="selectbasic" name="selectestado" >
                                        

                                      <option>List</option>
                                      <?php

                                        include 'php/config.php';

                                        // session_start();

                                        // echo $_SESSION['login-user'];

                                        // echo "Reached the php";

                                        $query= "SELECT DISTINCT name,state FROM city";
                                        $data= mysqli_query($connection, $query) or die(mysqli_error($connection));

                                        while($row= mysqli_fetch_array($data))
                                        {
                                            ?>

                                            <option><?php echo $row['name']."(".$row['state'].")";?></option>

                                            <?php
                                            
                                        }

                                        ?>                                    

                                    
                                    </select>                                    

                                    
                                    </select>  
                                </div>
                            </div><!--fim Text input cidade e estado-->

                            
                            
                            <div class="row">
                                <div class="col-xs-12 col-md-12 form-group">
                                    <button class="btn btn-primary pull-right" name= "submit" type="submit">Cost Estimate</button>
                                    <!-- <button class="btn btn-primary pull-right" type="submit">Limpar</button> -->
                                    <!--<button class="btn btn-primary pull-right" type="submit">Enviar</button>-->
                                </div>
                            </div>
                        </form>
                    </div> <!-- fim div da direita -->
                </div> <!-- fim div da esquerda -->
            </div>
               
            </div>
          </div>
        </div>
    </div>
      
</div>

<?php

if(isset($_SESSION['final_cost']))
{
        ?>

    <div class="container" style="padding-top: 20px;">
      <div class="row">         
        <div class="alert alert-info fade in">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4>Your cost estimate is:</h4>
          <p><?php echo "&#8377 ".$_SESSION['final_cost']; ?></p>
        </div>
     </div>
    </div>
    
    <?php

    // session_destroy();
}

?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

