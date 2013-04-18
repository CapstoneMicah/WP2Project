<?php
  require_once('./lib/db.php');
  require_once('./searchfns.php');
ini_set('error_log','../../error_log.log');

function buildRows($searchResults){
  $rowResults = array();
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
  <center><h2>Search Results</h2></center>

  <table class="partResults" >
    <tr id="partRowHeader">
      <th>Brand/Vendor</th>
      <th>Part Number</th>
      <th>Description</th>
      <th>Category</th>
      <th>Subcategory</th>
      <th>Location</th>
      <th>Vehicle Applications</th>
      <th>My Vehicle</th>
    </tr>
  
<?php  
  foreach($resultRows as $index => $row){ 
    echo '<tr class="partRow" >';
      echo '<td>'.$row['brand'].'</td>';
      echo '<td>'.$row['partnumber'].'</td>';
      echo '<td>'.$row['description'].'</td>';
      echo '<td>'.$row['category'].'</td>';
      echo '<td>'.$row['subcategory'].'</td>';
      echo '<td>'.$row['location'].'</td>';
      echo '<td>';
        echo '<a href="javascript:viewApplications('.$row['partnumber'].')">View Applications</a>';
      echo '</td>';
      echo '<td>';
        echo '<div class="check" style="float:left;font-size:0.6em;color:red;"><img src="./inc/img/check.png" /><br />'.$row['downscore'].'</div>';
        echo '<div class="x" style="float:right;font-size:0.6em;color:green;"><img src="./inc/img/x.png" /><br />'.$row['upscore'].'</div></td>';
    echo '</tr>';
  }//end foreach
?>
</table>
<?php
  }//END if buildRows
}

function searchParts(){
  global $mysqli;
  if(isset($_POST['pnSearch'])) {
    // call partnumber search
    $searchResults = array();
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
      }
    }else{
      echo "unable to execute query";
    }

    displayResults($searchResults);  
  }//END isset($_POST
  return true;
}


?>
