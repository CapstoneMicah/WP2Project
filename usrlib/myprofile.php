<?php session_start();
ini_set("display_errors", "1");
error_reporting(-1);
if ( empty($_SESSION['user']) )
{  header("Location: login.php?target=" . $_SERVER['PHP_SELF']);
   exit;
}
$title="User Profile"; 
$css=array("basic.css", "form.css");
require("rfront.php");
require_once("accountfns.php");

$customerInfo = getCustomerInfo();

//$username = $customerInfo['username'];
//$address = $customerInfo['address'];
//$zip = $customerInfo['zip5'];

?>
<h2>Profile for <?php echo $_SESSION['user']; ?></h2>

<h3>Change Account Info</h3>
<form method="post" action="modifyaccount.php">
<div class="entry">
<label for="user">Username:</label><span class="field"><input name="user" id="user" value="<?php echo $customerInfo['username'] ?>" size="25" /></span>
</div>
<div class="entry">
<label for="email">Email:</label><span class="field"><input name="email" id="email" value="<?php echo $customerInfo['email'] ?>" size="25" /></span>
</div>
<div class="entry">
<label for="firstname">First Name:</label><span class="field"><input name="firstname" id="firstname" value="<?php echo $customerInfo['firstname'] ?>" size="25" /></span>
</div>
<div class="entry">
<label for="lastname">Last Name:</label><span class="field"><input name="lastname" id="lastname" value="<?php echo $customerInfo['lastname'] ?>" size="25" /></span>
</div>
<div class="entry">
<label for="address">Address:</label><span class="field"><input name="address" id="address" value="<?php echo  $customerInfo['address'] ?>" size="25" /></span>
</div>
<div class="entry">
<label for="city">City:</label><span class="field"><input name="city" id="city" value="<?php echo $customerInfo['city'] ?>" size="25" /></span>
</div>
<div class="entry">
<label for="state">State:</label><span class="field"><input name="state" id="state" value="<?php echo $customerInfo['state'] ?>" size="15" /></span>
</div>
<div class="entry">
<label for="zip">Zip:</label><span class="field"><input name="zip" id="zip" value="<?php echo $customerInfo['zip5'] ?>" size="5" /></span>
</div>
<div class="entry">
<label></label>
<input type="hidden" name="action" value="customer info" />
<input type="submit" name="submit" value="Save" /></div>
</form>
<h3>Change Password</h3>
<form method="post" action="modifyaccount.php">

<div class="entry">
<label for="oldpass">Old Password:</label><span class="field"><input type="password"
name="oldpass" id="oldpass" required="" size="25" /></span>
</div>
<div class="entry">
<label for="pass">New Password:</label><span class="field"><input type="password" name="pass" id="pass" required="" size="25" /> (8 or more characters)</span>
</div>
<div class="entry">
<label for="pass2">New Password Again:</label><span class="field"><input type="password" name="pass2" id="pass2" required="" size="25" /></span>
</div>
<div class="entry">
<label></label>
<input type="hidden" name="action" value="change pass" />
<input type="submit" name="submit" value="Change Now" /></div>
</form>
<?php require("rback.php"); ?>
