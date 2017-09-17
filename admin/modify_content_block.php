<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Block Content</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin_panel.css">
</head>
<body>

<!-- *****************************************ADMIN NAVBAR STARTS HERE **************************************************-->
    <div id="wrapper" class="active">  
    <!-- Sidebar -->
            <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul id="sidebar_menu" class="sidebar-nav">
           <li class="sidebar-brand"><a id="menu-toggle" href="#">Admin<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
        </ul>
        <ul class="sidebar-nav" id="sidebar">
           <li><a href="modify_users_block.php">Block Users</a></li>
           <li><a href="modify_users_unblock.php">Unblock Users</a></li>
           <ul class="sidebar-nav" id="sidebar">
                <li><a href="modify_content_block.php">Block Content</a></li>
                <li><a href="modify_content_unblock.php">Unblock Content</a></li>
           </ul>
          <li><a>Add checklist</a></li>
          <li><a>Delete checklist</a></li>
          <li><a href="../php/logout.php">Logout</a></li>
        </ul>
      </div>

<!-- *****************************************ADMIN NAVBAR ENDS HERE **************************************************-->


<p class="well lead">&emsp;Block content</p>

<?php

include '../php/config.php';

$query= "SELECT * FROM forum ORDER BY id DESC";
$data= mysqli_query($connection, $query) or die(mysqli_error($connection));


  while($row = mysqli_fetch_array($data))
  {
    
    ?>
    
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default" style="width: 60%; margin-left: 50px; margin-right: 50px; word-wrap: break-word;">

            <?php 

            if($row['blocked'] == 0)
            {
              ?>
              <div class="alert alert-success fade in">
                <div class="panel-heading">
                  <strong>  <?php echo $row['username']; ?> </strong> &emsp;&emsp; <b> ID= <?php echo $row['id']; ?> </b> <span class="text-muted">commented 5 days ago</span>
                </div>
                <div class="panel-body">
                   <?php echo $row['content']; ?>
                </div><!-- /panel-body -->
              </div><!-- /alert success -->

              <?php
            }

            else
            {
              ?>
              <div class="alert alert-danger fade in">
                <div class="panel-heading">
                  <strong>  <?php echo $row['username']; ?> </strong> &emsp;&emsp; <b> ID= <?php echo $row['id']; ?> </b> <span class="text-muted">commented 5 days ago</span>
                </div>
                <div class="panel-body">
                   <?php echo $row['content']; ?>
                </div><!-- /panel-body -->
              </div><!-- /alert success -->

              <?php
            }

            ?>                
          </div><!-- /panel panel-default -->
        </div><!-- /col-sm-5 -->
      </div><!-- /row -->
    </div><!-- /container -->
    <!-- <br><br><br><br><br><br><br><br> -->

    <?php
  }

?>

<div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <div class="row">
              <div class="col-md-12">
              <div class="container">
                <div class="row"> <!-- div da esquerda -->
                    <!-- Text input CNPJ e Razao Social-->
                    <div class="col-sm-8 contact-form"> <!-- div da direita -->
                        <form id="contact" method="post" class="form" role="form" action="block_content.php">
                            
                            <br>
                            <div class="row">
                                <div class="col-xs-6 col-md-9 form-group">
                                    <input class="form-control" id="inputcidade" name="id" placeholder="Enter ID of post to be blocked" type="number" />
                                </div>
                                
                            <div class="col-xs-4 col-md-12 form-group">
                                <div class="controls">
                                    <textarea class="form-control" id="message" name="message" placeholder="Reason for blocking" rows="5"></textarea>
                                </div>
                            </div>
                            <br />
                            
                            <div class="row">
                                <div class="col-xs-12 col-md-12 form-group">
                                    <button class="btn btn-primary pull-right" type="submit" name="block_content" value="Blocked">Block</button>
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

    <?php

    // error_reporting(E_ALL ^ E_NOTICE);


    if($_SESSION['block_status'] == 7)
    {
        ?>

        <div class="container" style="padding-top: 20px;">
          <div class="row">         
            <div class="alert alert-success fade in">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <!-- <h4>You must be logged in!</h4> -->
              <p>Post successfully blocked.</p>
            </div>
         </div>
        </div>
        
        <?php
    }

    elseif($_SESSION['block_status'] == 8)
    {
        ?>

        <div class="container" style="padding-top: 20px;">
          <div class="row">         
            <div class="alert alert-danger fade in">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <!-- <h4>You must be logged in!</h4> -->
              <p>This post is already blocked.</p>
            </div>
         </div>
        </div>
        
        <?php
    }

    elseif($_SESSION['block_status'] == 9)
    {
        ?>

        <div class="container" style="padding-top: 20px;">
          <div class="row">         
            <div class="alert alert-danger fade in">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <!-- <h4>You must be logged in!</h4> -->
              <p>This ID does not exist.</p>
            </div>
         </div>
        </div>
        
        <?php
    }

   ?>   
    </div>

</body>
</html>