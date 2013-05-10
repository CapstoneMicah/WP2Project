<?php
require_once('./lib/db.php');
global $mysqli;
session_start();

if(isset($_POST['partnumber']))
{
$query = "SELECT COUNT(*) AS partCountdb FROM parts
WHERE partnumber='".$_POST['partnumber']."'";
$results = $mysqli->query($query);
$result = $results->fetch_assoc();
}

if (!($_SESSION['vehicleID']))
  $_SESSION['error'] = "No Vehicle Selected";
else if ($result->num_rows > 0)
  $_SESSION['error'] = "Part Already Exists";
else
{
  $addPartQuery = "INSERT INTO parts (partnumber, brandID) VALUES ('" . 
  $_POST['partnumber'] . "'," . $_POST['brand'] . " ) ";
  $success = $mysqli->query($addPartQuery); 
}
if ($success == 1)
  $_SESSION['error'] = "Part Added";

echo $_SESSION['error'];

header("Location: https://" . $_SERVER['SERVER_NAME'] . "/~sfarina/partPicker");

?>
