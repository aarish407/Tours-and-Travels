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

if(isset($_POST['unblock_content']))
{
	Unblock_content($connection);
}

function Unblock_content($connection){

	if(!empty($_POST['id']))
	{
		$check_blocked= "SELECT blocked FROM forum WHERE id= '$_POST[id]'";
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
				$query = "UPDATE forum SET blocked= 0 WHERE id= '$_POST[id]'";
				$data = mysqli_query($connection, $query)  or die(mysqli_error($connection));
				$_SESSION['block_status']= 10;
				header("location: modify_content_unblock.php");
			}

			else
			{
				$_SESSION['block_status']= 11;
				header("location: modify_content_unblock.php");
			}
		}

		else
		{
			$_SESSION['block_status']= 12;
			header("location: modify_content_unblock.php");
		}
	}
}
