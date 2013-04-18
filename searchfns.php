<?php
//require_once('./lib/db.php');
error_reporting(E_ALL);

ini_set('error_log','../../error_log.log');
function partnumberSearch($searchString) {
  global $mysqli;
  $searchResults = array();

  $query = "SELECT 
                parts.partnumber,
                partCategory.name AS category,
                brand.name AS brand
            FROM
                parts
                JOIN partApplication ON (parts.partID = partApplication.partID)
                JOIN partCategory ON (partApplication.partCategoryID = partCategory.categoryID)
                JOIN brand ON (parts.brandID = brand.brandID)
            WHERE
                parts.partnumber LIKE '".$searchString."%'";
                // Possibly also determine if vehicle has been selected,
                // JOIN with vehicleConfigs and add "AND vehicleConfigID = $selectedVehicleID
//error_log($query, 3, "../../error_log.log");
  $rd = $mysqli->query($query);
 
if (!$rd) {
    throw new Exception("Database Error [{$mysqli->errno}] {$mysqli->error}");
} 

  error_log($rd, 3, "../../error_log.log");
  $i = 0;
  while($row = $rd->fetch_assoc()){
    $searchResults[$i][$row['partnumber']] = array(
      'brand' => $row['brand'],
      'category' => $row['category']
    );
  }

  if(!sizeof($searchResults)){
    $searchResults['error'] = "No partnumbers match your search.\n";
  }

  return $searchResults;

}


?>
