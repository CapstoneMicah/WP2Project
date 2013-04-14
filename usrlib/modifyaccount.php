<?php session_start();
if ( empty($_SESSION['user']) )
{  header("Location: login.php?target=" . $_SERVER['PHP_SELF']);
   exit;
}
require_once('regfns.php');

$title="Update Account"; 
$css=array("basic.css","form.css");
require("rfront.php");

if (!empty($_POST['action']) && $_POST['action']=="change pass"){
   pass_check($_POST['pass']);
   pass_match($_POST['pass'],$_POST['pass2']);
   nomatch($_POST['oldpass'],$_POST['pass']);
   if ( empty($errmsg) &&  change_passwd(
          $_SESSION['user'],$_POST['oldpass'],
	  $_POST['pass'],$errmsg
   ) ) { 
     $msg="Password change complete."; 
   } else { 
     $msg="Password change failed. " . $errmsg; 
   }

  echo "<h2>Password Change for ".$_SESSION['user']."</h2>";

} elseif(!empty($_POST['action']) && $_POST['action']=="customer info"){
 
  $customerInfo = array($_POST['user'], $_POST['email'], $_POST['firstname'],
                        $_POST['lastname'], $_POST['address'], $_POST['city'],
                        $_POST['state'], $_POST['zip']);

  if(updateCustomerInfo(&$customerInfo)){
    $_SESSION['user'] = $_POST['user'];
    $msg="Successfully updated account information.";
  } else {
    $msg="Account information update failed.";
  }

  echo "<h2>Account Information Change for ".$_SESSION['user']."</h2>";
}

?>
<p class="error"><?php echo $msg; ?></p>
<?php require("rback.php"); ?>
