<?php
$mysqli = new mysqli("webdev.cs.kent.edu","mdetamor","810226034", "mdetamor");

if (mysqli_connect_errno())
{
    error_log('Could not connect: '.mysqli_connect_error().'\n', 3, "../../../error_log.log");
    exit();
}

//mysql_select_db("mdetamor", $con);	
?>
