<?php

include 'config.php';

error_reporting(E_ALL ^ E_NOTICE);

session_start();


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
				$_SESSION['login_user']="admin";
				echo "Admin successfully logged in";
				header("location: ../admin/modify_users_block.php");
			}

			else
			{
				$_SESSION['incorrect_login']= 1;
				header("location: ../admin_login.php");
				echo "Entered username or password is wrong";
			}
		}
	}
}


?>