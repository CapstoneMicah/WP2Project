<?php  /////    regfns.php    /////
require_once("loginfns.php");
define("ID_LEN",5);
define("PASS_LEN",8);
$errmsg="";



//functior nomatch(&$old,&$new,&$err)
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('error_log','../../error_log.log');
function nomatch(&$old, &$new,&$err)
{  if ( $old==$new )
   {  $err .= "New and old passwords are the same!";
      return false;
   }
   return true;
}

function user_check()
{ global $errmsg;//,$PASSWORD_FILE;
  if( empty($_POST['username']) )
  { $errmsg .= "The username field is empty.";  return false; }
  if( strlen($_POST['username']) < ID_LEN )
  { $errmsg .= "The username ". $_POST['username'] . " is too short.";
    return false;
  }
echo "user lookup";
  if(  user_lookup($_POST['username']) )//,$PASSWORD_FILE) )
  { $errmsg = "The userid " . $_POST['uid'] . 
           " exists. Please use a different userid.";
//  error_log( "checked user",3,"../../error_log.log");
    return false;
  }
  //error_log( "user success",3,"../../error_log.log");
  return true;
}

function pass_check(&$pass)
{ global $errmsg;
  if( empty($pass) )
  { $errmsg .= "The password is empty.";  return false; }
  if( strlen($pass) < PASS_LEN )
  { $errmsg .= "The password is too short.";
    return false;
  }
  return true;
}

function email_check(&$email)
{ global $errmsg;
  if( empty($email) )
  { $errmsg .= "The email is empty.";  return false; }
  return true;
}

function pass_match(&$pass,&$pass2)
{ global $errmsg;
  if( $pass != $pass2 )
  { $errmsg .= "The passwords don't match.";  return false; }
  return true;
}

function record_customer()
{ global $errmsg;
error_log( "RECORD CUST", 3, "../../error_log.log");
  if(! add_customer($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['pass'], $_POST['email'], $_POST['address'], $_POST['city'], $_POST['state'],  $_POST['zip']))
  {
    error_log('Failed to store customer', 3, "../../error_log.log"); 
    $errmsg .= "Failed to store customer data.";  return false; 
  }
  return true;
}

function check_reg_data()
{ global $errmsg; error_log("check reg data",3,"../../error_log.log");
  user_check($_POST['username']); error_log("chk usr",3,"../../error_log.log");
  pass_check($_POST['pass']);
//error_log( "chk pass", 3, "../../error_log.log");
  pass_match($_POST['pass'],$_POST['pass2']); error_log("pass match", 3, "../../error_log.log");
  email_check($_POST['email']);error_log( "email",3,"../../error_log.log");
//error_log( "finished checking reg data",3,"../../error_log.log");
  return (empty($errmsg)) ;
}
