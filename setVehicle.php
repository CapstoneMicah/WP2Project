<?php
  session_start();
  require_once('./lib/db.php');

  function getVehicleID($year, $makeID, $modelID, $submodelID, $engineID){
    $global $mysqli;
    $query = "SELECT vehicleConfig.configID "//vehicleMake.name, 
                //vehicleModel.name, 
                //vehicleSubmodel.name, 
                //vehicleEngine.name
              ." FROM vehicleConfig
                JOIN vehicleMake ON (vehicleConfig.makeID=vehicleMake.makeID)
                JOIN vehicleModel ON (vehicleConfig.modelID=vehicleModel.modelID)
                LEFT JOIN vehicleSubmodel ON (vehicleConfig.submodelID=vehicleSubmodel.submodelID)
                JOIN vehicleEngine ON (vehicleConfig.engineID=vehicleEngine.engineID)
              WHERE vehicleConfig.makeID = ?
                AND vehicleConfig.modelID = ?
                AND vehicleConfig.submodelID = ?
                AND vehicleConfig.engineID = ?";
    $sth = $mysqli->prepare($query);
    //May need to check if null and set to 0
    $rd = $query->execute($makeID, $modelID, $submodelID, $engineID);
    return $vehicleID;
  }

  function setVehicle($year, $makeID, $modelID, $submodelID, $engineID){
   
    if($vehicleID = getVehicleID($year, $makeID, $modelID, $submodelID, $engineID)){
      $_SESSION['myVehicle'] = $vehicleID; 
      return true;
    }else{
      return false;
    }
  }
?>
