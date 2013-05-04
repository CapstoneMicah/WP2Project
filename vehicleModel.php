<?php
require_once('./lib/db.php');


$modelQuery = "select distinct name, id from(select vehicleMake.name as makeName, ".
"vehicleModel.name as name, vehicleModel.modelID as id from ".
"vehicleConfig join vehicleMake using (makeID) join vehicleModel using (modelID) ".
"where makeID = " . $_POST['formData'] . ") as joined";

$modelResult = $mysqli->query($modelQuery);

?>
      <div id="modelDiv">
        <select id="modelSelect" name="modelChoice" class="vehicleSelection">
          <option value="" >Model</option>
          <?php
            while($model = $modelResult->fetch_assoc()){
              echo '<option value="'.$model['id'].'">'.$model['name'].'</option>';
            }
          ?>
        </select><br />
      </div><!-- End modelDiv -->

