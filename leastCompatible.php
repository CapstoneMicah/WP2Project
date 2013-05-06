<?php

  $query = "SELECT
              vehicleMake.name as make,
              vehicleModel.name as model,
              vehicleSubmodel.name as submodel,
              vehicleEngine.name as engine,
              count(vehiclePartScore.vehicleConfigID) as numApplications
            FROM 
              vehicleConfig
              JOIN vehicleMake USING (makeID)
              JOIN vehicleModel USING (modelID)
              LEFT JOIN vehicleSubmodel USING (submodelID)
              LEFT JOIN vehicleEngine USING (engineID)
              JOIN vehiclePartScore USING (vehicleConfigID)
            GROUP BY vehicleConfigID 
            ORDER BY numApplications ASC
            LIMIT 10";
  if($sth = $mysqli->query($query)){
    $i=1;
    while($row = $sth->fetch_assoc()){
      echo '<div class="leastCompatible">';
      echo $i.".&nbsp;&nbsp;".$row['make']."&nbsp;".$row['model']."&nbsp;".$row['submodel']."&nbsp;".$row['engine']."<div class='compatibleCount'>+".$row['numApplications']."</div>";
      echo "</div>";//end least compatible
      $i++;
    }
  }

?>
