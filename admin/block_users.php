<?php

// for $_SESSION['block_status']:
// 1. user Successfully blocked
// 2. user is already blocked
// 3. username does not exist (block)
// 4. user Successfully unblocked
// 5. user is already unblocked
// 6. username does not exist (unblock)
// 7. content successfully blocked
// 8. content already blocked
// 9. no such id present (block)
// 10. content successfully unblocked
// 11. content already unblocked
// 12. no such id present (unblock)

include('../php/admin_login.php');	

error_reporting(E_ALL ^ E_NOTICE);


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
				$_SESSION['block_status']= 1;
				header("location: modify_users_block.php");
			}

			else
			{
				// echo "  This user is already blocked.";
				$_SESSION['block_status']= 2;
				header("location: modify_users_block.php");
			}
		}

		else
		{
			echo "  Username does not exist.";
			$_SESSION['block_status']= 3;
			header("location: modify_users_block.php");
		}
	}
}
