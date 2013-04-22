<?php
require_once('./libs/db.php');
//global $tmp_pass;

   $title="Login"; 
   $css=array("basic.css", "form.css");
   require_once("rfront.php");

function email_formdata($tmp_pass, $cc, $subject)
{  
   if (mail($_POST['email'], $subject, email_message($tmp_pass), "Cc: $cc")){ 
      return TRUE;  
   }

   return FALSE;
}

function email_message($tmp_pass){
  $message = "Your temporary password is ".$tmp_pass
             ."\n\nLogin using your new password at https://www.cs.kent.edu/~mdetamor/wp2/HW2/login.php";

  return $message;

}

function check_valid_email(){
  global $mysqli;

  $sql = "SELECT * FROM customer WHERE email='".$mysqli->real_escape_string($_POST['email'])."'";

  return $mysqli->query($sql);
}
  
function gen_pass() 
{  
   $length=8;
   $strength=2;
   $vowels = 'aeuyj9753';
   $consonants = 'bdghmnpqrstvz-';
   if ($strength & 1) 
   { $consonants .= 'BDGHLMNPQRSTVWXZ_'; }
   if ($strength & 2) 
   { $vowels .= "YUEAJ2468"; }
   if ($strength & 4) 
   { $consonants .= ',.#'; $vowels .= '@$%'; }
   $password = '';
   $c_max=strlen($consonants)-1;
   $v_max=strlen($vowels)-1;
   $alt = time() % 2;
   for ($i = 0; $i < $length; $i++) 
   { $password .= 
       $alt ? $consonants[rand(0,$c_max)] 
            : $vowels[rand(0,$v_max)];
     $alt = !$alt;
   }
   return $password;
}

function set_temp_pass($tmp_pass, $email){
  global $mysqli;

  $pass_hash=crypt($tmp_pass, '$2a$09$dynamicwebdesign$');

  $sql = "UPDATE customer SET passhash = '".$pass_hash."' WHERE email = '".$email."'";  
  return $mysqli->query($sql);
}

if(isset($_POST['email'])){
  $successFlag = false;
  $tmp_pass = gen_pass();
  if(check_valid_email()){
    if(set_temp_pass($tmp_pass, $_POST['email'])){
      if(email_formdata($tmp_pass, null, "Your Temporary Password")){
        $successFlag = true;
      }
    }
  }
  if($successFlag){
    echo "Your temporary password has been mailed.";
  }
  
} else {
?>

<h3>Enter your email account and we'll send you a temporary password</h3>
<form name="emailpass" action="" method="POST">
  <label for="email">Email: </label><input name="email" size="25"></input>
  <input type="submit" name="submit" value="Email Temporary Password" />
</form>
<?php
  
}

require_once("rback.php"); 
//bool mail ( string $to , string $subject , string $message 
  // [, string $additional_headers [, string $additional_parameters ]] )
?>
