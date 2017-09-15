<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, "bookmytrip");

$result = mysqli_query($con,"SELECT * FROM cost WHERE id = 1");

while($row = mysqli_fetch_array($result)) {
     $cost = $row['cost'];
}

$result = mysqli_query($con,"SELECT * FROM kashmir_cities WHERE id = '".$q."'");

while($row = mysqli_fetch_array($result)) {
        $cost += $row['cost'];
        echo $cost;
}

$query = mysqli_query($con, "UPDATE cost SET cost = $cost WHERE id = 1");

mysqli_close($con);
?>