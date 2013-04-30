<?php
require_once('./lib/db.php');

global $mysqli;

$query = "SELECT DISTINCT name, categoryID FROM partCategory";

$rd = $mysqli->query($query);
?>
<div id="newPnCategoryDiv">
<?php
if(sizeof($rd)){
  echo '<select id="cat" name="category" class="partAddSelection">';
  echo '<option value="" >Category</option>';
}
while($row = $rd->fetch_assoc()){
  echo '<option name="'.$row['name'].'" value="'.$row['categoryID'].'" >'.$row['name'].'</option>';
}
if(sizeof($rd)){
  echo '</select>';
}
?>
</div><!-- End newPnCategoryDiv -->
