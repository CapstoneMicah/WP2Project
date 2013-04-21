<?php
  session_start();

function loginLabel()
{  //echo file_exists("login.mark")? "Logout":"Login";
  echo !isset($_SESSION['username']) 
    ? '<b>Login</b>'
    : '<b>Logout</b>';
}
function loginLink()
{ // echo file_exists("login.mark") ? "logout.php":"login.php";
  echo !isset($_SESSION['username']) ? "./usrlib/login.php":"./usrlib/logout.php";
}
?>
<div class="userArea">

<?php 
  if(isset($_SESSION['username'])){
    echo '<h3>Logged in as '.$_SESSION['username'].'</h3><br />'; 
  }
?>
<a href="<?php loginLink();?>"><?php loginLabel();?></a>
<?php
if(!isset($_SESSION['username'])){
    echo ' | <a href="./userlib/register.php">Register</a>';
  }
?>
</div>

<?php
?>
