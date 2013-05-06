<?php
require_once('./lib/db.php');

$engineQuery = "select distinct engineID, engineName from (select vehicleEngine.engineID as
engineID, vehicleEngine.name as engineName from vehicleConfig join vehicleModel
using (modelID) join vehicleSubmodel using (submodelID) join vehicleEngine using (engineID) where
modelID = ". $_POST['modelID'] ." AND submodelID =" . $_POST['submodelID'] . ") as result";

$engineResult = $mysqli->query($engineQuery);

?>
      <div id="engineDiv">
        <select id="engineSelect" name="engineChoice" class="vehicleSelection">
          <option value="" >Engine</option>
          <?php
            while($engine = $engineResult->fetch_assoc()){
              echo '<option value="'.$engine['engineID'].'">'.$engine['engineName'].'</option>';
            }
          ?>
        </select><br />
      </div><!-- End engineDiv -->
 
