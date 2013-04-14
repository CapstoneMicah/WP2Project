<?php 
session_start();

if ( isset($_POST['loginRestricted']) && empty($_SESSION['user']) )
{
   header("Location: login.php?target=" . $_SERVER['PHP_SELF']);
   exit;
}

$title="Home";
$css=array("./inc/css/basic.css");//, "form.css");

require("./header.php");
//require("rfront.php");
//require("orderfns.php");

require("rback.php");
?> 
