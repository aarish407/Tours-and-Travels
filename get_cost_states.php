<?php

session_start();

$q = intval($_GET['q']);
$cost = 0;

//Database connection
$con = mysqli_connect('localhost','root','');

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, "bookmytrip");

//fetching id of destination state stored in temp in 1st row
$hello = mysqli_query($con, "SELECT temp from cost WHERE id = 1");
$s = mysqli_fetch_array($hello);

//reseting state cost to 0
mysqli_query($con, "UPDATE cost SET cost = 0 WHERE id = 1");

//using switch case to check destination state and accordingly add the cost
switch ($s['temp']) {
  case 1:
     $result = mysqli_query($con,"SELECT * FROM source_states WHERE id = '".$q."'");
      while($row = mysqli_fetch_array($result)) {
        $cost += $row['to_goa'];
      }
    break;

  case 2:
     $result = mysqli_query($con,"SELECT * FROM source_states WHERE id = '".$q."'");
      while($row = mysqli_fetch_array($result)) {
        $cost += $row['to_kashmir'];
      }
  
  default:
     $result = mysqli_query($con,"SELECT * FROM source_states WHERE id = '".$q."'");
      while($row = mysqli_fetch_array($result)) {
        $cost += 0;
      } 
    break;
}

//updating cost in auxiliary cost table
mysqli_query($con, "UPDATE cost SET cost = $cost WHERE id = 1");

//Printing Sum of all costs

$sum = $_SESSION['cost'] + $cost;
// $query = mysqli_query($con,"SELECT * FROM cost LIMIT 1");

// while($row = mysqli_fetch_array($query))
// {
//    $costs     = $row['cost'];
//    $sum     += intval($costs);
// }
echo $sum;

mysqli_close($con);
?>