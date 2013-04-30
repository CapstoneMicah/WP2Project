<?php
require_once('./lib/db.php');

global $mysqli;

$query = "SELECT DISTINCT name, brandID FROM brand";

$rd = $mysqli->query($query);
?>
<div id="newPnBrandDiv">
<?php
if(sizeof($rd)){
  echo '<select name="brand" class="partAddSelection">';
  echo '<option value="" >Brand/Vendor</option>';
}
while($row = $rd->fetch_assoc()){
  echo '<option name="'.$row['name'].'" value="'.$row['brandID'].'" >'.$row['name'].'</option>';
}
if(sizeof($rd)){
  echo '</select>';
}
?>
</div><!-- End newPnBrandDiv -->
