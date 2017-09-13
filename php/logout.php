<?php

session_start();
echo "in logout.php here";
session_destroy();

header("Location: ../index.php"); // Redirecting To Home Page

?>