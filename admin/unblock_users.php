<?php

// for $_SESSION['block_status']:
// 1. user Successfully blocked
// 2. user is already blocked
// 3. username does not exist
// 4. user Successfully unblocked
// 5. user is already unblocked

include('../php/admin_login.php');

if(isset($_POST['unblock']))
{
	Unblock_user($connection);
}

function Unblock_user($connection){

	if(!empty($_POST['username']))
	{
		$check_blocked= "SELECT blocked FROM customer WHERE username= '$_POST[username]'";
		$check_row_present= mysqli_query($connection, $check_blocked) or die(mysqli_error($connection));

		$status= 0;
		$blocked= 1;

		if($row= mysqli_fetch_array($check_row_present))
		{
			$status= 1;
			$blocked= $row['blocked'];
		}

		if($status == 1)
		{
			if($blocked == 1)
			{
				$query = "UPDATE customer SET blocked= 0 WHERE username= '$_POST[username]'";
				$data = mysqli_query($connection, $query)  or die(mysqli_error($connection));
				$_SESSION['block_status']= 4;
				header("location: modify_users_unblock.php");
			}

			else
			{
				$_SESSION['block_status']= 5;
				header("location: modify_users_unblock.php");
			}
		}

		else
		{
			$_SESSION['block_status']= 3;
			header("location: modify_users_unblock.php");
		}
	}
}
