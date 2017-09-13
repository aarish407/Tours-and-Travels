<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'bookmytrip');
define('DB_USER', 'root'); 
define('DB_PASS', '');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Failed to connect to database:".mysqli_error($connection));

$db= mysqli_select_db($connection, DB_NAME) or die("Failed to connect to MySql".mysqli_error($connection));

$var= $_POST['login-submit'];
echo $var;
if(isset($var))
{
	// echo "Signed Up";

	Check($connection);
}

function Check($connection)
{
	if(!empty($_POST['username']))
	{
		$query = mysqli_query($connection, "SELECT * FROM customer WHERE username = '$_POST[username]' AND password = '$_POST[password]' ") or die(mysqli_error($connection));

		$status= 0;
		$blocked= 0;

		while($row = mysqli_fetch_array($query)) {
			echo "In while";
			echo $row['username'];
			echo $row['password'];
			$blocked= $row['blocked'];
			$status= 1;
		}

		// blocked = 0 --> Not blocked
		// blocked = 1 --> blocked

		// status = 1 --> row present
		// status = 0 --> row absent

		if($blocked == 0)	
		{
			if($status != 0)
			{
				echo "Admin successfully logged in";
			}

			else
			{
				echo "Entered username or password is wrong";
			}
		}

		else
		{
			echo "Cannot login because you have been blocked.";
		}
	}
}


?>