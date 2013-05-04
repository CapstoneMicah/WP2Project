<?php
require_once('./lib/db.php');
$vehicleResults = array();
$response = array();
$response['success'] = 1;


function generateVehiclesTable($vehicleResults){
  global $mysqli;
  $vehicleTableHTML = '
    <table id="compatibleVehicleResults" class="tablesorter">
      <thead>
        <tr>
          <th colspan="5" style="background-color:#555;color:#FFF;">
            Compatible Vehicles for Part# '.$_POST['partnumber'].'
          </th>
        </tr>
        <tr>
          <th class="headerCell">Make</th>
          <th class="headerCell">Model</th>
          <th class="headerCell">Submodel</th>
          <th class="headerCell">Engine</th>
          <th class="headerCell">Score</th>
        </tr>
      </thead>
      <tbody>';
        $vehicleTableHTML .= generateVehicleRows($vehicleResults);
      $vehicleTableHTML .= '</tbody>
    </table>';
  return $vehicleTableHTML;
}

function generateVehicleRows($vehicleResults){
         //generateVehicleRows($vehicleResults);
  $vehicleRows = '';
  foreach($vehicleResults as $vehicle => $row){
    $vehicleRows .= '
        <tr class="vehicleRow">
          <td class="makeResult">'.$row['make'].'</td>
          <td class="modelResult">'.$row['model'].'</td>
          <td class="submodelResult">'.$row['submodel'].'</td>
          <td class="engineResult">'.$row['engine'].'</td>
          <td class="scoreResult">
            <div class="vehicleScores">
              <div class="checkDiv">
                <a href="setCompatible('.$vehicle.','.$_POST['part'].');" class="checkbutton"></a></br>
                <div style="color:#55DD44;">'.$row['upScore'].'</div>
              </div><!--End checkDiv-->
              <div class="xDiv">
                <a href="setIncompatible('.$vehicle.','.$_POST['part'].');" class="xbutton"></a></br>
                <div style="color:#55DD44;">'.$row['downScore'].'</div>
              </div><!--End checkDiv-->
            </div><!--End vehicleScores-->
          </td> 
        </tr>';
  }
  
  if(strlen($vehicleRows)){
    return $vehicleRows;
  }else{
    return '<tr><td colspan="5">No compatible vehicles found...</td></tr>';
  }
}



$query = "SELECT
            vehicleConfig.vehicleConfigID AS vehicleID, 
            vehicleMake.name AS make, 
            vehicleModel.name AS model, 
            vehicleSubmodel.name AS submodel, 
            vehicleEngine.name AS engine, 
            upScore, 
            downScore 
          FROM 
            vehicleConfig 
            JOIN vehicleMake using (makeID) 
            JOIN vehicleModel using (modelID)
            LEFT JOIN vehicleSubmodel using (submodelID) 
            LEFT JOIN vehicleEngine using (engineID) 
            JOIN vehiclePartScore using (vehicleConfigID) 
          WHERE vehiclePartScore.partID=".$_POST['part']."
            AND vehiclePartScore.upScore>0";


if($sth = $mysqli->query($query)){
  while($row = $sth->fetch_assoc()){
    $vehicleResults[$row['vehicleID']] = array(
      'make' => $row['make'],
      'model' => $row['model'],
      'submodel' => $row['submodel'],
      'engine' => $row['engine'],
      'upScore' => $row['upScore'],
      'downScore' => $row['downScore']
    );
  }
  $response['html'] = generateVehiclesTable($vehicleResults);
}else{
  $response['success'] = 0;
  $response['error'] = "Unable to execute compatible vehicles query.".$mysqli->errno;
}
echo json_encode($response);

?>
