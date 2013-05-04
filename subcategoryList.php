<?php
require_once('./lib/db.php');

global $mysqli;

$query = "select partSubcategory.name, partSubcategory.subcategoryID from " .
         "partCategoryConfig join partCategory using (categoryID) join " . 
         "partSubcategory using (subcategoryID) where categoryID =" .
         $_POST['formData'];

?>
<div id="newPnSubcatDiv">
<?php
$rd = $mysqli->query($query);
if(sizeof($rd)){
  echo '<select id="subCat" name="subcategory" class="partAddSelection">';
  echo '<option value="" >Subcategory</option>';
  echo '<option value="" >None</option>';
}
while($row = $rd->fetch_assoc()){
  echo '<option name="'.$row['name'].'" value="'.$row['subcategoryID'].'" >'.$row['name'].'</option>';
}
if(sizeof($rd)){
  echo '</select>';
}
?>
</div><!-- End newPnSubcatDiv -->
