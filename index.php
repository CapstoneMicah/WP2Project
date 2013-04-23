<?php 
session_start();

if ( isset($_POST['loginRestricted']) && empty($_SESSION['user']) )
{
   header("Location: login.php?target=" . $_SERVER['PHP_SELF']);
   exit;
}

  $title="Home";
  $css=array(
    "./inc/css/topbar.css",
    "./inc/css/controlbar.css",
    "./inc/css/style.css"  
  );
  $js=array(
    "./inc/js/jquery-1.9.1.min.js",
    "./inc/js/vehicleSelect.js"
  );
 
  //if(empty($_SESSION['hideStartGuide']) || $_SESSION['hideStartGuide'] != 1) {
    array_push($css,"./inc/css/startGuide.css");
  //}

  require("./header.php");
  require("./controlbar.php"); 
?>
<div id="mainContainer">
<div id="mainWrapper">
<?php  require_once("./controller.php"); ?>
</div>
</div>
<?php  require("rback.php");i ?> 
