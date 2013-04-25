<?php
  session_start();
  require_once('./lib/db.php');
  require_once('./searchfns.php');
ini_set('error_log','../../error_log.log');
$_SESSION['vehicleID'] = 1;
function buildRows($searchResults){
  $rwResults = array();
  $i = 0;
  foreach($searchResults as $category => $subcategories){
    foreach($subcategories as $subcategory => $results){
      foreach($results as $brand => $partnumber){
        $rowResults[$i] = array(
            'brand' => $brand,
            'category' => $category,
            'subcategory' => $subcategory,
            'partnumber' => $partnumber
        );
        $i++;
      }
    }
  }
  //if the size of the results coming in was > 0
  // and we're returning rows > 0
  if(sizeof($rowResults)){
    return $rowResults;
  }else{
    return false;
  }
}


function displayResults($searchResults){
  if($resultRows = buildRows($searchResults)){
?>
<div id="partSearchResults">
  <center><h2></h2></center>

  <table class="partResults" >
    <tr>
      <td colspan="8" id="tableName" style="background-color:#555;color:#FFF;"><center>Search Results</center></td>
    </tr>

    <tr id="partRowSortAsc">
      <td><a href="" class="sortAsc" id="sortBrandAsc"></a></td>
      <td><a href="" class="sortAsc" id="sortPnAsc"></a></td>
      <td><a href="" class="sortAsc" id="sortDescripAsc"></a></td>
      <td><a href="" class="sortAsc" id="sortCatAsc"></a></td>
      <td><a href="" class="sortAsc" id="sortSubCatAsc"></a></td>
      <td><a href="" class="sortAsc" id="sortLocAsc"></a></td>
      <td></td>
      <td></td>
    </tr>
    <tr id="partRowHeader">
      <th>Brand/Vendor</th>
      <th style="min-width:100px;">Part Number</th>
      <th>Description</th>
      <th>Category</th>
      <th>Subcategory</th>
      <th>Location</th>
      <th>Vehicle Applications</th>
      <th>My Vehicle</th>
    </tr>
    <tr id="partRowSortDesc">
      <td><a href="" class="sortDesc" id="sortBrandDesc"></a></td>
      <td><a href="" class="sortDesc" id="sortPnDesc"></a></td>
      <td><a href="" class="sortDesc" id="sortDescripDesc"></a></td>
      <td><a href="" class="sortDesc" id="sortCatDesc"></a></td>
      <td><a href="" class="sortDesc" id="sortSubCatDesc"></a></td>
      <td><a href="" class="sortDesc" id="sortLocDesc"></a></td>
      <td></td>
      <td></td>
    </tr>
  
<?php  
  foreach($resultRows as $index => $row){ 
?>
    <tr class="partRow">
      <td class="brandResult"><?php echo $row['brand']; ?></td>
      <td class="pnResult"><?php echo $row['partnumber']; ?></td>
      <td class="descResult"><?php echo $row['description']; ?></td>
      <td class="catResult"><?php echo $row['category']; ?></td>
      <td class="subcatResult"><?php echo $row['subcategory']; ?></td>
      <td class="locResult"><?php echo $row['location']; ?></td>
      <td class="appsResult">
        <a href="javascript:viewApplications('<?php echo $row['partnumber']; ?>')">View Applications</a>
      </td>
<?php
  if($_SESSION['vehicleID']){
    getVehiclePartScore($row['partID']);
?>
      <td class="myVehResult">
        <div class="checkDiv">
          <a href="javascript:setCompatible('<?php echo $_SESSION['vehicleID']; ?>');" class="checkbutton"></a>
          <br /><?php echo $row['downScore']; ?>
        </div><!-- End checkDiv -->
        <div class="xDiv">
          <a href="javascript:setIncompatible('<?php echo $_SESSION['vehicleID']; ?>');" class="xbutton"></a>
          <br /><?php echo $row['upScore']; ?>
        </div><!-- end xDiv -->
      </td>
<?php
  }//end myVehicle td
?>
    </tr>
  <?php }//end foreach ?>
</table>
</div><!-- End partSearchResults -->
<?php
  }//END if buildRows
}

function setCatSubcats($catSubcatAssoc) {
?>
  <script>
    catSubcatAssoc = <?php echo json_encode($catSubcatAssoc); ?>;
  </script>
<?php
}

function searchParts(){
  global $mysqli;
  if(isset($_POST['pnSearch'])) {
    // call partnumber search
    $searchResults = array();
    $catSubcatAssoc = array();

    $query = "SELECT
                parts.partID,
                parts.partnumber AS partnumber, 
                parts.description,
                brand.name AS brand,
                partCategory.name AS category,
                partSubcategory.name AS subcategory
              FROM parts
                LEFT JOIN brand ON (parts.brandID=brand.brandID)
                LEFT JOIN partCategory ON (parts.categoryID=partCategory.categoryID)
                LEFT JOIN partSubcategory ON (parts.subcategoryID=partSubcategory.subcategoryID)
              WHERE parts.partnumber LIKE '".$_POST['pnSearch']."%'";

    if($rd = $mysqli->query($query)){
      while($row = $rd->fetch_assoc()){
        $searchResults[$row['category']][$row['subcategory']][$row['brand']] = $row['partnumber'];
        $catSubcatAssoc[$row['category']][$row['subcategory']] = 1;
      } 
    }else{
      echo "unable to execute query";
    }
    echo '<script>rightLeft="left"</script>';
    displayResults($searchResults);
    setCatSubcats($catSubcatAssoc);
  }//END isset($_POST
  return true;
}

function getVehiclePartScore($partID) {
  global $mysqli;

  $query = "SELECT
              upScore,
              downScore
            FROM
              vehiclePartScore
            WHERE
              vehicleConfigID = '".$_SESSION['vehicleID']."'
              AND partID = ".$partID."
            LIMIT 1";

  if($rd = $mysqli->query($query)) {
    $row = $rd->fetch_assoc();
    return $row;
  }else{
    return false;
  }
  
}
?>
