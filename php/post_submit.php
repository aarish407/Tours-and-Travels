<?php

include('login.php');

// define('DB_HOST', 'localhost');
// define('DB_NAME', 'bookmytrip');
// define('DB_USER', 'root'); 
// define('DB_PASS', '');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Failed to connect to database:".mysqli_error($connection));

$db= mysqli_select_db($connection, DB_NAME) or die("Failed to connect to MySql".mysqli_error($connection));

if(isset($_POST['post_submit']))
{
	echo "";

	Record($connection);
}

function Record($connection)
{
	$text= $_POST['text'];
	$username= $_SESSION['login_user'];
	$query= "INSERT INTO forum (id, username, record_time, content) VALUES ('', '$username', now(), '$text')";
	$data= mysqli_query($connection, $query) or die(mysqli_error($connection));

	if($data)
	{
		echo "Post submitted.";
	}
}

?>