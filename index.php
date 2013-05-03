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
    "./inc/js/jquery.tablesorter.min.js",
    "./inc/js/common.js",
    "./inc/js/vehicleSelect.js",
    "./inc/js/compatibility.js",
    "./inc/js/partSearch.js"
  );
 
  //if(empty($_SESSION['hideStartGuide']) || $_SESSION['hideStartGuide'] != 1) {
    array_push($css,"./inc/css/startGuide.css");
  //}
//array_push($js, "./inc/js/jquery.tablesorter.min.js");

  require("./header.php"); 
?>
<div id="mainContainer">
<div id="mainWrapper">
<?php  require_once("./controller.php"); ?>
</div>
</div>
<?php  require("rback.php");i ?> 
