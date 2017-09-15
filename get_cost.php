<!-- <?php
$q = intval($_GET['q']);
$cost = 0;

$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, "bookmytrip");

$result = mysqli_query($con,"SELECT * FROM states WHERE id = '".$q."'");

while($row = mysqli_fetch_array($result)) {
     $cost += $row['cost'];
     echo $cost;
}

$query = mysqli_query($con, "UPDATE cost SET cost = $cost WHERE id = 1");

mysqli_close($con);
?>
 -->