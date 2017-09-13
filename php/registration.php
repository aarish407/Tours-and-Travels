<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'bookmytrip');
define('DB_USER', 'root'); 
define('DB_PASS', '');

// echo "reached phop";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Failed to connect to database:".mysqli_error($connection));

$db= mysqli_select_db($connection, DB_NAME) or die("Failed to connect to MySql".mysqli_error($connection));

// echo "here";
$var= $_POST['register-submit'];
echo $var;
if(isset($var))
{
	// echo "Signed Up";

	Signup($connection);
}


function Signup($connection){

	// echo " In Signup function";
	if(!empty($_POST['username']))
	{
		// echo "yo";

		$query = mysqli_query($connection, "SELECT * FROM customer WHERE username = '$_POST[username]' AND password = '$_POST[password]' ") or die(mysqli_error($connection));

		// echo "in big if";

		if(!$row = mysqli_fetch_array($query) or die(mysqli_error($connection)))
		{
			// echo "in if";
			NewUser($connection);
		}

		else{
			echo "Already registered.";
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
		echo "Your registration is Complete.";
	}

	// $print= mysqli_query($connection, "SELECT * FROM users");

	// print_r($print);

}


?>