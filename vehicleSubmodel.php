<?php

require_once('./lib/db.php');

$submodelQuery = "select distinct subID, subName from (select
vehicleSubmodel.submodelID as subID, vehicleSubmodel.name as subName from
vehicleConfig join vehicleModel using (modelID) join vehicleSubmodel using
(submodelID) where modelID = " . $_POST['formData']  . ") as result";

$submodelResult = $mysqli->query($submodelQuery);
?>


      <div id="submodelDiv"> 
        <select id="submodelSelect" name="subModelChoice" class="vehicleSelection">
          <option value="" >Submodel/Trim</option>
          <?php
            while($submodel = $submodelResult->fetch_assoc()){
              echo '<option value="'.$submodel['subID'].'">'.$submodel['subName'].'</option>';
            }
          ?>
        </select><br />
      </div><!-- End submodelDiv -->
