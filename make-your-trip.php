<?php

  include('php/login.php');

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
   

    <script>
    // function showCostEstimate(q) {
    //     if (q == "") {
    //         document.getElementById("cost").innerHTML = "0";
    //         return;
    //     } else { 
    //         if (window.XMLHttpRequest) {
    //             // code for IE7+, Firefox, Chrome, Opera, Safari
    //             xmlhttp = new XMLHttpRequest();
    //         } else {
    //             // code for IE6, IE5
    //             xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    //         }
    //         xmlhttp.onreadystatechange = function() {
    //             if (this.readyState == 4 && this.status == 200) {
    //                 document.getElementById("cost").innerHTML = this.responseText;
    //                 // var json = JSON.parse(xmlhttp.responseText);
    //                 // alert(json);
    //             }
    //         };
    //         // xmlhttp.open("GET","get_cost.php?q="+q+"&r="+r,true);
    //         xmlhttp.open("GET","get_cost.php?q="+q,true);

    //         xmlhttp.send();
    //     }
    // }

    function showCostEstimate(q) {
      var obj, dbParam, xmlhttp;
      obj = { "table":"customers", "limit":10 };
      dbParam = JSON.stringify(obj);
      xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("demo").innerHTML = this.responseText;
       }
      };
      xmlhttp.open("GET", "json_demo_db.php?x=" + dbParam, true);
      xmlhttp.send();
    }

    function showCostSourceStates(q) {
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
                    // var json = JSON.parse(xmlhttp.responseText);
                    // alert(json);
                }
            };
            // xmlhttp.open("GET","get_cost.php?q="+q+"&r="+r,true);
            xmlhttp.open("GET","get_cost_states.php?q="+q,true);

            xmlhttp.send();
        }
    }

    function showCostGoa(q) {
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
                    // var json = JSON.parse(xmlhttp.responseText);
                    // alert(json);
                }
            };
            // xmlhttp.open("GET","get_cost.php?q="+q+"&r="+r,true);
            xmlhttp.open("GET","get_cost_goa.php?q="+q,true);

            xmlhttp.send();
        }
    }

    function showCostKashmir(q) {
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
                    // var json = JSON.parse(xmlhttp.responseText);
                    // alert(json);
                }
            };
            // xmlhttp.open("GET","get_cost.php?q="+q+"&r="+r,true);
            xmlhttp.open("GET","get_cost_kashmir.php?q="+q,true);

            xmlhttp.send();
        }
    }

    function showCities() {
      if (document.getElementById('states_to').value == "1") {
      document.getElementById('city-label').style.visibility='visible';
      document.getElementById('cities-goa').style.visibility='visible';
      document.getElementById('cities-kashmir').style.visibility='hidden';
      }
      else if (document.getElementById('states_to').value == "2") {
      document.getElementById('city-label').style.visibility='visible';
      document.getElementById('cities-kashmir').style.visibility='visible';
      document.getElementById('cities-goa').style.visibility='hidden';
      }
      else {
      document.getElementById('city-label').style.visibility='hidden';
      document.getElementById('cities-goa').style.visibility='hidden';
      document.getElementById('cities-kashmir').style.visibility='hidden';
      }
    }

    </script>

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

      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- *****************************************NAVBAR ENDS HERE **************************************************-->


<div class="row">
  <div class="col-xs-6">
    <label style="padding-left: 40px;">Select destination state:</label>
    <div style="padding-left: 40px;" class="btn-group">
      <select id="states_to" name="states_to" onchange="showCostEstimate(this.value); showCities();">
        <option name="" value=""> - </option>
        <option name="Goa" value="1">Goa</option>
        <option name="Kashmir" value="2">Kashmir</option>
      </select>

    </div>
<br>
<label style="padding-left: 40px;">Select source state:</label>
    <div style="padding-left: 40px;" class="btn-group">
      <select id="states_from" name="states_from" onchange="showCostSourceStates(this.value);">
        <option value=""> - </option>
        <option value="1">Andhra Pradesh</option>
        <option value="2">Arunachal Pradesh</option>
        <option value="3">Assam</option>
        <option value="4">Bihar</option>
        <option value="5">Chhattisgarh</option>
        <option value="6">Goa</option>
        <option value="7">Gujarat</option>
        <option value="8">Haryana</option>
        <option value="9">Himachal Pradesh</option>
        <option value="10">Jammu and Kashmir</option>
        <option value="11">Jharkhand</option>
        <option value="12">Karnataka</option>
        <option value="13">Kerala</option>
        <option value="14">Madhya Pradesh</option>
        <option value="15">Maharashtra</option>
        <option value="16">Manipur</option>
        <option value="17">Meghalaya</option>
        <option value="18">Mizoram</option>
        <option value="19">Nagaland</option>
        <option value="20">Orissa</option>
        <option value="21">Punjab</option>
        <option value="22">Rajasthan</option>
        <option value="23">Sikkim</option>
        <option value="24">Tamil Nadu</option>
        <option value="25">Telangana</option>
        <option value="26">Tripura</option>
        <option value="27">Uttar Pradesh</option>
        <option value="28">Uttarakhand</option>
        <option value="29">West Bengal</option>
      </select>
    </div>
<br>
     <label id="city-label" style="padding-left: 40px; visibility: hidden;">Select city:</label>
    <div style="padding-left: 40px;" class="btn-group">
      <select id="cities-goa" name="cities_goa" style="visibility: hidden; position: absolute; z-index: 1;" onchange="showCostGoa(this.value)" >
        <option value=""> - </option>
        <option value="1">Panjim</option>
        <option value="2">Candolim</option>
        <option value="3">Vasco Da Gama</option>
        </select>
        <select id="cities-kashmir" name="cities_kashmir" style="visibility: hidden; position: relative; z-index: 2;" onchange="showCostKashmir(this.value)" >
        <option value=""> - </option>
        <option value="1">Srinagar</option>
        <option value="2">Jammu</option>
        <option value="3">Leh Ladakh</option>
      </select>      
    </div>
  </div>
  <h1>
    <div class="col-xs-6">Cost Estimate: &#8377; 
      <span id="cost" style="color: blue;"></span>
    </div>
  </h1>
</div>

























    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>