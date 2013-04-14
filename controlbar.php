<?php
 
function loginLabel()
{ 
  echo !isset($_SESSION['user']) ? "Login":"Logout";
}
function loginLink()
{
  echo !isset($_SESSION['user']) ? "login.php":"logout.php";
}
?>
<nav class="controlbar">
<?php if($page == "index.php") {?>
<span class="self">Home</span>
<?php } else {?>
<a href="index.php">Home</a><?php }?>

<?php //if($page == "checkout.php") {
?>
<!--<span class="self">Checkout</span>-->
<?php// } else {
?>
<!--<a href="checkout.php">Checkout</a>--><?php //}
?>
<?php// } 
?>

<?php if($page == "login.php") { ?>
<span class="self">Login</span>
<?php } else {?>
<a href="<?php loginLink();?>"><?php loginLabel();?></a><?php }?>
</nav>
