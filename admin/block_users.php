<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'bookmytrip');
define('DB_USER', 'root'); /*xampp default username*/
define('DB_PASS', ''); /*xampp default password*/

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Failed to connect to database:".mysqli_error($connection));
/*Sequence of connect matters*/

$db= mysqli_select_db($connection, DB_NAME) or die("Failed to connect to MySql".mysqli_error($connection));

if(isset($_POST['block']))
{
	Block_user($connection);
}

function Block_user($connection){

	if(!empty($_POST['username']))
	{
		$check_blocked= "SELECT blocked FROM customer WHERE username= '$_POST[username]'";
		$check_row_present= mysqli_query($connection, $check_blocked) or die(mysqli_error($connection));

		$status= 0;
		$blocked= 0;

		if($row= mysqli_fetch_array($check_row_present))
		{
			$status= 1;
			$blocked= $row['blocked'];
		}

		if($status == 1)
		{
			if($blocked == 0)
			{
				$query = "UPDATE customer SET blocked= 1 WHERE username= '$_POST[username]'";
				$data = mysqli_query($connection, $query)  or die(mysqli_error($connection));

				echo "  Successful";
			}

			else
			{
				echo "  This user is already blocked.";
			}
		}

		else
		{
			echo "  Username does not exist.";
		}
	}
}
