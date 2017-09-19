<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Block Users</title>

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

<!-- Page content -->
      <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <div class="row">
              <div class="col-md-12">
              <p class="well lead">Block users</p>
              <div class="container">
                <div class="row"> <!-- div da esquerda -->
                    <!-- Text input CNPJ e Razao Social-->
                    <div class="col-sm-8 contact-form"> <!-- div da direita -->
                        <form id="contact" method="post" class="form" role="form" action="block_users.php">
                            
                            <br>
                            <div class="row">
                                <div class="col-xs-6 col-md-9 form-group">
                                    <input class="form-control" id="inputcidade" name="username" placeholder="Enter username to be blocked" type="text" />
                                </div>
                                <div class="col-xs-4 col-md-3 form-group">
                                    <select class="form-control" id="selectbasic" name="selectestado" >
                                        <option>List</option>

                                        <?php

                                        include '../php/config.php';

                                        session_start();

                                        error_reporting(E_ALL ^ E_NOTICE);

                                        echo $_SESSION['login-user'];

                                        // echo "Reached the php";

                                        $query= "SELECT username FROM customer";
                                        $data= mysqli_query($connection, $query) or die(mysqli_error($connection));

                                        while($row= mysqli_fetch_array($data))
                                        {
                                            if($row['username'] != 'admin')
                                            {

                                                ?>

                                                <option><?php echo $row['username'];?></option>

                                                <?php

                                            }
                                        }

                                        ?>
                                        
                                    </select>
                            </div><!--fim Text input cidade e estado-->
                            <div class="col-xs-4 col-md-12 form-group">
                                <div class="controls">
                                    <textarea class="form-control" id="message" name="message" placeholder="Reason for blocking" rows="5"></textarea>
                                </div>
                            </div>
                            <br />
                            
                            <div class="row">
                                <div class="col-xs-12 col-md-12 form-group">
                                    <button class="btn btn-primary pull-right" type="submit" name="block" value="Blocked">Block</button>
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

    <?php

    // error_reporting(E_ALL ^ E_NOTICE);


    if($_SESSION['block_status'] == 1)
    {
        ?>

        <div class="container" style="padding-top: 20px;">
          <div class="row">         
            <div class="alert alert-success fade in">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <!-- <h4>You must be logged in!</h4> -->
              <p>User successfully blocked.</p>
            </div>
         </div>
        </div>
        
        <?php
    }

    elseif($_SESSION['block_status'] == 2)
    {
        ?>

        <div class="container" style="padding-top: 20px;">
          <div class="row">         
            <div class="alert alert-danger fade in">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <!-- <h4>You must be logged in!</h4> -->
              <p>This user is already blocked.</p>
            </div>
         </div>
        </div>
        
        <?php
    }

    elseif($_SESSION['block_status'] == 3)
    {
        ?>

        <div class="container" style="padding-top: 20px;">
          <div class="row">         
            <div class="alert alert-danger fade in">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <!-- <h4>You must be logged in!</h4> -->
              <p>This username does not exist.</p>
            </div>
         </div>
        </div>
        
        <?php
    }

   ?> 
      
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>