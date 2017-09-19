<?php

session_start();
echo "in logout.php here";
session_destroy();

error_reporting(E_ALL ^ E_NOTICE);

header("Location: ../index.php"); // Redirecting To Home Page

?>