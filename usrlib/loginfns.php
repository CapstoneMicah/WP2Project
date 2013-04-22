<?php
//$PASSWORD_FILE="passwd_file.php";
//const USE_ERROR_DIR = 
require_once('./libs/db.php');
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('error_log','../../error_log.log');



function login_fn() {
  echo "login called.";
  
  // touching file";  
  //touch("login.mark"); 
}
function logout_fn() {
  echo "logout called. UNLINKING file";  
  //unlink("login.mark");  
}

function https()
{   if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS']!="on")
    {   header("Location: https://" . $_SERVER['SERVER_NAME']
         .  $_SERVER['REQUEST_URI']);
        exit;  // back to browser
    }
}

function http()
{   if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=="on")
    {   header("Location: http://" . $_SERVER['SERVER_NAME']
         .  $_SERVER['REQUEST_URI']);
        exit;  // back to browser
    }
}

function change_passwd(&$user,&$oldpass,&$pass,&$err)
{ 
  if (! check_pass($user,$oldpass)) // double check login
  { 
    $err .= "Old password wrong."; 
    return false;  
  }

  $pass_hash=crypt($pass, '$2a$09$dynamicwebdesign$');
  $sql = "UPDATE customer SET passhash = '".$pass_hash."' WHERE username = '".$user."'";
  
  return $mysqli->query($sql);
}  // change_email is similar

function check_pass(&$user,&$pass)
{ 
  global $mysqli;
  if (($authUserLine = user_lookup($user)))
     return false;// no entry for user
//  $res = $mysqli->query("select * from product limit 2");
  $sql = "SELECT * FROM customer WHERE username='".$user."'";
  if($result = $mysqli->query($sql)){
      $ps = $result->fetch_assoc();//["passhash"];
      $existingPass = $ps['passhash'];
      return (crypt($pass,'$2a$09$dynamicwebdesign$') == $existingPass);
  }
 
  return false; 
}

function user_lookup(&$user)
{ //return array_shift(preg_grep("/$id:.*$/", file($file))); 
 global $mysqli;
 echo "chekking user... $user";
  $user = $mysqli->real_escape_string($user);
error_log( "escape string", 3, "../../error_log.log");
  if($query = $mysqli->query("SELECT username FROM customer WHERE username = '".$user."'")){
    error_log( var_dump($query), 3, "../../error_log.log");
return false;  
}else{
   error_log( "query error ".$mysqli->error, 3, "../../error_log.log");
    return true;
  
  }
  //$result = $query->get_result();
//echo $query?"true":"false";
  //return ($query->num_rows ? false : true);
  
}

function get_email(&$id,&$file)
{  if ( $authUserLine=check_user($id,$file) )
   { preg_match("/(.*):$id:/", $authUserLine, $matches);
     $email = $matches[1];
     return $email;
   }
}

function add_customer(&$user,&$first,&$last,&$pass,&$email,&$address,&$city,&$state,&$zip)
{
global $mysqli;
error_log("adding customer\n", 3, "../../error_log.log");
echo "ADDING CUSTOMER"; 
if ( user_lookup($user) ) return false;  // user exists
echo "checked user";  
$pass_hash=crypt($pass, '$2a$09$dynamicwebdesign$');
  //$f=@fopen($file, "a");
  //if ($f)
  //{ fwrite($f, "// 
    $user = $mysqli->real_escape_string($user);
    $first = $mysqli->real_escape_string($first);
    $last = $mysqli->real_escape_string($last);
    $pass_hash = $mysqli->real_escape_string($pass_hash);
    $email = $mysqli->real_escape_string($email);
    $address = $mysqli->real_escape_string($address);
    $city = $mysqli->real_escape_string($city);
    $state = $mysqli->real_escape_string($state);
    $zip = $mysqli->real_escape_string($zip);
    $template = "INSERT INTO customer (username, lastname, firstname, email, passhash, address, city, state, zip5) VALUES (?,?,?,?,?,?,?,?,?)";
// $query->bind_param("ssssssssd", ) 
    $input = array($user, $last, $first, $email, $pass_hash, $address, $city, $state);
    if($stmt = $mysqli->prepare($template)){
      $stmt->bind_param('ssssssssi', $user, $last, $first, $email, $pass_hash, $address, $city, $state, $zip);
      if(!$stmt->execute()){
        error_log("couldn't add customer", 3, '../../error_log.log');
        return false;
      }
      error_log("executed insert customer without issue...",3,"../../error_log.log");
      return true;
//echo $stmt->fetch();
  
    }


 //fclose($f);
    return ( true );
}
//// PHP random password generator
//// based on code from webtoolkit.info

///  echo gen_pass() . "\n";
/// add_passwd("pswang","opensesame", $PASSWORD_FILE, "pswang@kent.edu");
/// 
///  if ( check_pass("pwang","opensesame",$PASSWORD_FILE) )
///     echo "password check success!\n";
///  else
///     echo "password check failed!\n";  
?>
