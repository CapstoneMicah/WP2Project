<?php 
session_start();

if ( isset($_POST['loginRestricted']) && empty($_SESSION['user']) )
{
   header("Location: login.php?target=" . $_SERVER['PHP_SELF']);
   exit;
}

  $title="Home";
  $css=array("./inc/css/style.css");//, "form.css");
  require("./header2.php");
  require("./controlbar.php"); 
?>
<div id="mainContainer">
<?php  require_once("./controller.php"); ?>
</div>

<?php  require("rback.php");i ?> 
