<?php

session_start();
		#Database Details

          define('DB_HOST', 'localhost');
          define('DB_NAME', 'bookmytrip');
          define('DB_USER', 'root'); 
          define('DB_PASS', '');

          $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Failed to connect to database:".mysqli_error($connection));

          $db= mysqli_select_db($connection, DB_NAME) or die("Failed to connect to MySql".mysqli_error($connection));

         ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Make Your Trip</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/myt.css" rel="stylesheet">

<script type="text/javascript">
	 function showCostEstimate(q) {
        if (q == "") {
            document.getElementById("cost").innerHTML = "0";
            return;
        } else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cost").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","get_cost.php?q="+q,true);

            xmlhttp.send();
        }
    }

    function showCostSourceStates(q) {
        if (q == "") {
        } else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cost").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","get_cost_states.php?q="+q,true);

            xmlhttp.send();
        }
    }

    function showCostCities(q) {
        if (q == "") {
        } else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cost").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","get_cost_cities.php?q="+q,true);

            xmlhttp.send();
        }
    }

    function showCities() {
	    if (document.getElementById('states_from').value == "") {
	    document.getElementById('city_label').style.visibility='hidden';
	    document.getElementById('city').style.visibility='hidden';
	    }
	    else if(document.getElementById('states_from').style.visibility == 'hidden'){
	    document.getElementById('city_label').style.visibility='hidden';
	    document.getElementById('city').style.visibility='hidden';
	    }
	    else {
	    document.getElementById('city_label').style.visibility='visible';
	    document.getElementById('city').style.visibility='visible';
	    }

 	}

    function showSourceStates() {
      if (document.getElementById('states_to').value == "") {
      document.getElementById('states_label').style.visibility='hidden';
      document.getElementById('states_from').style.visibility='hidden';
      }
      else {
      document.getElementById('states_label').style.visibility='visible';
      document.getElementById('states_from').style.visibility='visible';
      }
    }

</script>

</head>
<body>
	<!-- *****************************************NAVBAR STARTS HERE **************************************************-->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">bookMyTrip</a>
    </div>

     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home </a></li>
        <li class="active"><a href="make-your-trip.php">Make Your Trip <span class="sr-only">(current)</span></a></li>
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

      
    </div>
  </div>
</nav>

<!-- *****************************************NAVBAR ENDS HERE *************************************************-->


<div class="row">
  <div class="col-xs-6">
  	
    <label style="padding-left: 40px;">Select destination state:</label>
    <div style="padding-left: 40px;" class="btn-group">
      <select id="states_to" name="states_to" onchange="showCostEstimate(this.value); showSourceStates(); showCities(); ">
        <option value=""> - </option>

        <?php
            $res = mysqli_query($connection,"SELECT * FROM states");
            while($row = mysqli_fetch_assoc($res)) {
              echo "<option value =".$row['id'].">";
              echo $row['name'];
              echo "</option>";
            }
        ?>
      </select>

    </div>
<br>

<label id="states_label" style="padding-left: 40px; visibility: hidden;">Select source state:</label>
    <div style="padding-left: 40px; visibility: hidden; position: relative;" class="btn-group">
      <select id="states_from" name="states_from" onchange="showCostSourceStates(this.value); showCities()">
        <option value=""> - </option>

          <?php
            $res = mysqli_query($connection,"SELECT * FROM source_states");
            
            while($row = mysqli_fetch_assoc($res)) {
              echo "<option value=".$row['id'].">";
              echo $row['name'];
              echo "</option>";
            }
        ?>

      </select>
    </div>
<br>

<label id="city_label" style="padding-left: 40px; visibility: hidden;">Select city:</label>
    <div style="padding-left: 40px; visibility: hidden; position: relative;" class="btn-group">

      <select id="city" name="city" onchange="showCostCities(this.value);">
        <option value=""> - </option>

    <?php
            $query = mysqli_query($connection, "SELECT temp from cost c, states s WHERE s.id = c.id && c.id = 1");
            $state = mysqli_fetch_assoc($query);
            $id = $state['temp'];

            $res = mysqli_query($connection,"SELECT c.name AS city_name, c.id AS city_id FROM cities c, states s where s.id = $id && s.name = c.state");
            
            while($row = mysqli_fetch_assoc($res)) {
              echo "<option value=".$row['city_id'].">";
              echo $row['city_name'];
              echo "</option>";
            }

    ?>

      </select>
    </div>
<br>


  </div>
  
  <h1>
    <div class="col-xs-6">Cost Estimate: &#8377; 
      <span id="cost" style="color: blue;"></span>
    </div>
  </h1>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>