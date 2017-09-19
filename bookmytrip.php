<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'bookmytrip');
define('DB_USER', 'root'); /*xampp default username*/
define('DB_PASS', ''); /*xampp default password*/

session_start();

error_reporting(E_ALL ^ E_NOTICE);


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Failed to connect to database:".mysqli_error($connection));
/*Sequence of connect matters*/

$db= mysqli_select_db($connection, DB_NAME) or die("Failed to connect to MySql".mysqli_error($connection));

if(isset($_POST['submit']))
{
	// echo "in the if";

	Calculation($connection);
}

function Calculation($connection)
{
	if(!empty($_POST['destination']) && !empty($_POST['source']))
	{
		$destination= $_POST['destination'];
		$source= $_POST['source'];

		$total_cost= 0;
		$costd= 0;
		$costs= 0;

		$dest_query= "SELECT cost FROM destination WHERE destination= '$destination'";
		$dest_res= mysqli_query($connection, $dest_query);

		while($row= mysqli_fetch_array($dest_res))
		{
			$costd= $row['cost'];
			// echo $costd;
		}

		$source_query= "SELECT cost FROM source WHERE source= '$source' AND destination= '$destination'";
		$source_res= mysqli_query($connection, $source_query);

		while($row= mysqli_fetch_array($source_res))
		{
			$costs= $row['cost'];
			// echo $costs;
		}

		$total_cost= $costs + $costd;

		$transport= $_POST['transport'];

		if($transport == 'Bus')
			$total_cost= $total_cost*(2/5);

		elseif($transport == 'Train')
			$total_cost= $total_cost*(3/5);

		$no_d= $_POST['no_d'];
		$total_cost= $no_d*0.5*($total_cost);

		$no_p= $_POST['no_p'];
		$total_cost= $no_p*0.5*($total_cost);

		$no_s= $_POST['no_s'];
		$total_cost= ($no_s - 2)*0.8*($total_cost);

		$status1= 0;
		$status2= 0;
		$status3= 0;

		// echo isset($_POST['city1'])."   " ;
		if($_POST['city1'] != '')
		{
			$status1= 1;
			$city_query= "SELECT cost, state FROM city WHERE name= '$_POST[city1]'";
			$city_res= mysqli_query($connection, $city_query);

			while($row= mysqli_fetch_array($city_res))
			{
				if($destination != $row['state'])
				{
					$_SESSION['error']= $_POST['city1'].' does not belong to '.$destination;
					header("location: make_my_trip.php");
				}

				else
				{
					$total_cost= $total_cost + $row['cost'];
				}
			}
		}

		if($_POST['city2'] != '')
		{
			$status2= 1;
			$city_query= "SELECT cost, state FROM city WHERE name= '$_POST[city2]'";
			$city_res= mysqli_query($connection, $city_query);

			while($row= mysqli_fetch_array($city_res))
			{
				if($destination != $row['state'])
				{
					$_SESSION['error']= $_POST['city2'].' does not belong to '.$destination;
					header("location: make_my_trip.php");
				}

				else
				{
					$total_cost= $total_cost + $row['cost'];
				}
			}
		}

		if($_POST['city3'] != '')
		{
			$status3= 1;
			$city_query= "SELECT cost, state FROM city WHERE name= '$_POST[city3]'";
			$city_res= mysqli_query($connection, $city_query);

			while($row= mysqli_fetch_array($city_res))
			{
				if($destination != $row['state'])
				{
					$_SESSION['error']= $_POST['city3'].' does not belong to '.$destination;
					header("location: make_my_trip.php");
				}

				else
				{
					$total_cost= $total_cost + $row['cost'];
				}
			}
		}

		if($status1 == 0 && $status2 == 0 && $status3 == 0)
		{
			echo "You must enter a city.";
			// header("location: make_my_trip.php");
		}

		

		$_SESSION['final_cost']= $total_cost;
		echo "<strong>Your cost estimate is  &#8377 ".$total_cost."</strong><br />";
		header("location: make_my_trip.php");
	}
}

?>