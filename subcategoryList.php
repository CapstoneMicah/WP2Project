<?php
require_once('./lib/db.php');

global $mysqli;

$query = "SELECT DISTINCT name, subcategoryID FROM partSubcategory";
?>
<div id="newPnSubcatDiv" style="display:none;">
<?php
$rd = $mysqli->query($query);
if(sizeof($rd)){
  echo '<select name="subcategory" class="partAddSelection">';
  echo '<option value="" >Subcategory</option>';
}
while($row = $rd->fetch_assoc()){
  echo '<option name="'.$row['name'].'" value="'.$row['subcategoryID'].'" >'.$row['name'].'</option>';
}
if(sizeof($rd)){
  echo '</select>';
}
?>
</div><!-- End newPnSubcatDiv -->
