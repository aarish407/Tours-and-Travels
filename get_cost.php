<?php

session_start();

$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, "bookmytrip");

$query = mysqli_query($con, "UPDATE cost SET temp = $q WHERE id = 1");

$_SESSION['cost'] = 0;

echo $_SESSION['cost'];

mysqli_close($con);
?>


<!-- 
Steps: 

1. Select destination state
2. Select source state
3. Select city
4. Select mode of transport(bus/train/plane)
5. Select hotel stars

-->