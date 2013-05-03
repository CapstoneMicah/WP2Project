<?php
  session_start();
  require_once('./lib/db.php');
  require_once('./searchfns.php');
array_push($js, "./inc/js/jquery.tablesorter.min.js");
ini_set('error_log','../../error_log.log');
$_SESSION['vehicleID'] = 1;
function buildRows($searchResults){
  $rwResults = array();
  $i = 0;
/*  foreach($searchResults as $category => $subcategories){
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
  }*/
  foreach($searchResults as $partID => $partData){
   
    $rowResults[$i] = array(
      'partID' => $partID,
      'partnumber' => $partData['partnumber'],
      'category' => $partData['category'],
      'subcategory' => $partData['subcategory'],
      'brand' => $partData['brand']
    );
    $i++;
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

  <table id="partResults" class="tablesorter" >
    <thead>
    <tr>
      <th colspan="8" id="tableName" style="background-color:#555;color:#FFF;"><center>Search Results</center></th>
    </tr>

  <!--  <tr id="partRowSortAsc">
      <td><a href="" class="sortAsc" id="sortBrandAsc"></a></td>
      <td><a href="" class="sortAsc" id="sortPnAsc"></a></td>
      <td><a href="" class="sortAsc" id="sortDescripAsc"></a></td>
      <td><a href="" class="sortAsc" id="sortCatAsc"></a></td>
      <td><a href="" class="sortAsc" id="sortSubCatAsc"></a></td>
      <td><a href="" class="sortAsc" id="sortLocAsc"></a></td>
      <td></td>
      <td></td>
    </tr>-->
    
    <tr id="partRowHeader">
      <th class="headerCell">Brand/Vendor</th>
      <th class="headerCell" style="min-width:100px;">Part Number</th>
      <th class="headerCell">Description</th>
      <th class="headerCell">Category</th>
      <th class="headerCell">Subcategory</th>
      <th class="headerCell">Location</th>
      <th class="headerCell">Vehicle Applications</th>
      <th class="headerCell">My Vehicle</th>
    </tr>
</thead>
<!--    <tr id="partRowSortDesc">
      <td><a href="" class="sortDesc" id="sortBrandDesc"></a></td>
      <td><a href="" class="sortDesc" id="sortPnDesc"></a></td>
      <td><a href="" class="sortDesc" id="sortDescripDesc"></a></td>
      <td><a href="" class="sortDesc" id="sortCatDesc"></a></td>
      <td><a href="" class="sortDesc" id="sortSubCatDesc"></a></td>
      <td><a href="" class="sortDesc" id="sortLocDesc"></a></td>
      <td></td>
      <td></td>
    </tr>
  -->
<tbody>
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
    $row['scores'] = getVehiclePartScore($row['partID']);

?>
      <td class="myVehResult">
        <div class="checkDiv">
          <a id="<?php echo $row['partID'].'UP'; ?>" href="javascript:setCompatible(<?php echo $_SESSION['vehicleID'].','.$row['partID']; ?>);" class="checkbutton"></a>
          <br /><div style="color:#55DD44;"><?php echo $row['scores']['up'] ? $row['scores']['up'] : '0'; ?></div>
        </div><!-- End checkDiv -->
        <div class="xDiv">
          <a id="<?php echo $row['partID'].'DOWN'; ?>" href="javascript:setIncompatible(<?php echo $_SESSION['vehicleID'].','.$row['partID']; ?>);" class="xbutton"></a>
          <br /><div style="color:#DD4444;"><?php echo $row['scores']['down'] ? $row['scores']['down'] : '0'; ?></div>
        </div><!-- end xDiv -->
      </td>
<?php
  }//end myVehicle td
?>
    </tr>
  <?php }//end foreach ?>
  </tbody>
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
        $searchResults[$row['partID']] = array(
            'partnumber' => $row['partnumber'],
            'category' => $row['category'],
            'subcategory' => $row['subcategory'],
            'brand' => $row['brand']
        );
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
              upScore AS up,
              downScore AS down
            FROM
              vehiclePartScore
            WHERE
              vehicleConfigID = ".$_SESSION['vehicleID']."
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
