<?php

// for $_SESSION['no_login_view']:
// 	1: forum.php
// 	2: booking.html

// for $_SESSION['incorrect_login']:
// 1: incorrect username or password
// 2: blocked user
// 3: user already exists (exclusively for registration)


session_start();

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
			echo "In while"."<br />";
			echo $row['username']."<br />";
			echo $row['password'];
			$blocked= $row['blocked'];
			$status= 1;
		}

		$check_admin= strcmp($_POST['username'], 'admin');
		echo "<br />".$check_admin."<br />";
		if($check_admin == 0)
		{
			$status= 0;
		}

		// blocked = 0 --> Not blocked
		// blocked = 1 --> blocked

		// status = 1 --> row present
		// status = 0 --> row absent

		if($blocked == 0)	
		{
			if($status != 0)
			{
				$username= $_POST['username'];
				$_SESSION['login_user']=$username;
				print_r($_SESSION);
				

				if($_SESSION['no_login_view'] == 1)
				{
					echo "In this if";
					header("location: ../forum.php");
				}

				elseif (!isset($_SESSION['no_login_view'])) 
				{
					header("location: ../index.php");
					echo "Successfully logged in";
				}				
			}

			else
			{
				$_SESSION['incorrect_login']= 1;
				header("location: ../login.php");
				echo "Entered username or password is wrong";
			}
		}

		else
		{
			$_SESSION['incorrect_login']= 2;
			header("location: ../login.php");
			echo "Cannot login because you have been blocked.";
		}
	}
}


?>