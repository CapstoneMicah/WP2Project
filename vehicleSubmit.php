<?php
require_once('./lib/db.php');


$configQuery = "SELECT vehicleConfigID FROM vehicleConfig where modelID = " .
$_POST['modelID'] . " AND submodelID = " . $_POST['submodelID'] . 
" AND engineID = " . $_POST['engineID'];

$configResults = $mysqli->query($configQuery);

session_start();
$configResult = $configResults->fetch_assoc();

if ($_SESSION['vehicleID'])
  $set = true;

$_SESSION['vehicleID'] = $configResult['vehicleConfigID'];

if ($set && $configResult['vehicleConfigID'])
  echo "Vehicle Successfully Changed";
else if ($configResult['vehicleConfigID'])
  echo "Vehicle Successfully Added";
?>
