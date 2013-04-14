<?php
require_once("./libs/db.php");

function getPrevOrders(){
  global $mysqli;
  //$sql = "INSERT INTO ";

}

function getCustomerInfo() {
    global $mysqli;
    $sql = "SELECT * FROM customer WHERE id = '".$mysqli->real_escape_string($_SESSION['user_id'])."'";
	
    $rv = $mysqli->query($sql);
    $customerInfo = $rv->fetch_assoc();
    
   // $username = $customerInfo['username'];
  //  $address = $customerInfo['address'];
   // $zip = $customerInfo['zip'];
    return $customerInfo;
    //if($username){
    //$result = array(&$username, &$address, &$zip);
   // return &$result;
    //} else {
    //  return false;
   // }
}

function updateCustomerInfo(){
    global $mysqli;
    $sql = "UPDATE customer SET"
                ." username = '".$mysqli->real_escape_string($input['user'])
                ."' email = '".$mysqli->real_escape_string($input['email'])
                ."' lastname = '".$mysqli->real_escape_string($input['lastname'])
                ."' firstname = '".$mysqli->real_escape_string($input['firstname'])
                ."' address = '".$mysqli->real_escape_string($input['address'])
                ."' city = '".$mysqli->real_escape_string($input['city'])
                ."' state = '".$mysqli->real_escape_string($input['state'])
                ." zip5 = ".$mysqli->real_escape_string($input['zip'])
           ." WHERE id = '".$_SESSION['user_id']."'";

    return $mysqli->query($sql);

}


?>
