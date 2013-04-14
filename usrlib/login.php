<?php
session_start();
$realm="Super Club";
require_once("loginfns.php");

if ( !empty($_POST['submit']) && $_POST['submit']=="Login"
     && !empty($_SESSION['target']) )
{// process login
   global $mysqli;
   if ( check_pass($_POST['username'],$_POST['pass']) )
   {// login success 
      $sql = "SELECT id FROM customer WHERE username='".$_POST['username']."'";
      if($query = $mysqli->query($sql)){
        $res = $query->fetch_assoc();  
        $_SESSION['user']=$_POST['username'];
        $_SESSION['user_id']=$res['id'];
           //login_fn();
        header("Location: " . $_SESSION['target']);
        exit;
      }
   }
   else  
   {// login failed
      $title="Login Failed"; 
      $css=array("basic.css", "form.css");
      require("rfront.php");
      echo "<h2 class='error'>Incorrect Userid/Password</h2>";
      echo "<p class='error'>Please try again.</p>";
      require_once("loginform.php");
   } 
}
else // new login
{  require_once("sessionfns.php");

   https(); //logout_fn(); new_session();
   if ( !empty($_REQUEST['target']) )
   {  $_SESSION['target']=$_REQUEST['target']; }
   else
   {  $_SESSION['target']='order.php';}

   $title="Login"; 
   $css=array("basic.css", "form.css");
   require_once("rfront.php");
   require_once("loginform.php");
}
require_once("rback.php"); 
?>
