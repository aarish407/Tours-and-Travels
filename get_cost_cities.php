<?php
session_start();

$q = intval($_GET['q']);

$cost1 = 0;

$con = mysqli_connect('localhost','root','');

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, "bookmytrip");

mysqli_query($con, "UPDATE cost SET cost = 0 WHERE id = 2");

    $result = mysqli_query($con,"SELECT * FROM cities WHERE id = '".$q."'");
      while($row = mysqli_fetch_array($result)) {
        $cost1 += $row['cost'];
}

mysqli_query($con, "UPDATE cost SET cost = $cost1 WHERE id = 2");

$sum = $_SESSION['cost'] + $cost1;

// $query = mysqli_query($con,"SELECT * FROM cost LIMIT 2");

// while($row = mysqli_fetch_array($query))
// {
//    $costs     = $row['cost'];
//    $sum     += intval($costs);
// }
echo $sum;

mysqli_close($con);
?>
