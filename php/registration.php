<?php

// for $_SESSION['no_login_view']:
// 	1: forum.php
// 	2: booking.html

// for $_SESSION['incorrect_login']:
// 1: incorrect username or password
// 2: blocked user
// 3: user already exists (exclusively for registration)
// 4: password and confirm password do not match 

error_reporting(E_ALL ^ E_NOTICE);

session_start();

define('DB_HOST', 'localhost');
define('DB_NAME', 'bookmytrip');
define('DB_USER', 'root'); 
define('DB_PASS', '');

echo "reached registration.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Failed to connect to database:".mysqli_error($connection));

$db= mysqli_select_db($connection, DB_NAME) or die("Failed to connect to MySql".mysqli_error($connection));

// echo "here";
$var= $_POST['register-submit'];
echo $var;
if(isset($var))
{
	echo "in the first if";

	Signup($connection);
}


function Signup($connection){

	// echo " In Signup function";
	if(!empty($_POST['username']))
	{
		$pass= $_POST['password'];
		$cpass= $_POST['confirm-password'];
		$result= strcmp($_POST['password'], $_POST['confirm-password']);

		echo $pass."<br />".$cpass."<br />".$result."<br />";

		if($result != 0)
		{
			$_SESSION['incorrect_login']= 4;
			header("location: ../login.php");
		}

		else
		{
			$query = mysqli_query($connection, "SELECT * FROM customer WHERE username = '$_POST[username]' AND password = '$_POST[password]' ") or die(mysqli_error($connection));

			// echo "in big if";

			if(!$row = mysqli_fetch_array($query)) // or die(mysqli_error($connection)))
			{
				echo "in the if before new user";
				NewUser($connection);
			}

			else{
				echo "in this else";
				$_SESSION['incorrect_login']= 3;
				header("location: ../login.php");
				echo "Already registered.";
			}
		}		
	}
}

function NewUser($connection){
echo "In NewUser function";

	$name= $_POST['name'];
	$username= $_POST['username'];
	$email= $_POST['email'];
	$phone= $_POST['phone'];
	$password= $_POST['password'];
	$blocked= 0;
	$query = "INSERT INTO customer (username, name, email, phone, password, blocked) VALUES ('$username', '$name', '$email', '$phone', '$password', $blocked)";
	$data= mysqli_query($connection, $query) or die(mysqli_error($connection));

	if($data){
		$username= $_POST['username'];
		$_SESSION['login_user']= $username;

		if($_SESSION['no_login_view'] == 1)
		{
			header("location: ../forum.php");
		}

		elseif(!isset($_SESSION['no_login_view']))
		{
			header("location: ../index.php");
		}
		// echo "Your registration is Complete.";
	}

	// $print= mysqli_query($connection, "SELECT * FROM users");

	// print_r($print);

}


?>