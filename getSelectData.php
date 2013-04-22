<?php
  require_once('./lib/db.php');

  $jsonResult = array( 
    'error' => '',
    'data' => array() 
  );

  if(empty($_POST['currentSelected'])) {
    print json_encode($jsonResult);
    return true;
  }

  

  $query = "SELECT ".$table.".".$field." AS vehicleLevel FROM ".$table.$whereClause;


  $queryResult = $mysqli->query($query);

  if($row = $queryResult->fetch_assoc()){
    // Only one row should ever be returned
    $jsonResult['vehicleLevel'] = $row['vehicleLevel'];
  }else{
    $jsonResult['error'] = "Unable to fetch vehicle level from DB.";
  }

  print json_encode($jsonResult);
  

  
?>
