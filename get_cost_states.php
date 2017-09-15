<?php
$q = intval($_GET['q']);
$cost = 0;
$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, "bookmytrip");

// $result = mysqli_query($con,"SELECT * FROM cost WHERE id = 1");

// while($row = mysqli_fetch_array($result)) {
//      $cost = $row['cost'];
// }
    $result = mysqli_query($con,"SELECT * FROM source_states WHERE id = '".$q."'");
        while($row = mysqli_fetch_array($result)) {
             if($q == 1) {
                $goa_result = mysqli_query($con,"SELECT * FROM states WHERE id = 1");
                $goa_row = mysqli_fetch_assoc($goa_result);
                $cost = $goa_row['cost'] + $row['to_goa'];
                echo $cost;
             }
             elseif ($q == 2) {
                $kashmir_result = mysqli_query($con,"SELECT * FROM states WHERE id = 2");
                $kashmir_row = mysqli_fetch_assoc($kashmir_result);
                $cost = $kashmir_row['cost'] + $row['to_kashmir'];
                echo $cost;
              }
        }

        $cost1 = $cost;
        $cost = 0; 

mysqli_close($con);
?>