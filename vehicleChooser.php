<?php
require_once('./lib/db.php');

$submodelQuery = "SELECT
             vehicleSubmodel.name AS submodel
          FROM
             vehicleSubmodel
";
$engineQuery = "SELECT
             vehicleEngine.name AS engine
          FROM
             vehicleEngine
";

//$modelResult = $mysqli->query($modelQuery);
$submodelResult = $mysqli->query($submodelQuery);
$engineResult = $mysqli->query($engineQuery);
?>
    <form name="vehicleSelect" action="" method="POST">
      <div id="yearDiv">
        <select id="yearSelect" name="yearChoice" class="vehicleSelection">
          <option value="" >Year</option>
          <!-- If more years are added, generate from DB results -->
          <option value="2013" >2013</option>
        </select></br>
      </div><!-- End yearDiv -->
          <div id="submodelDiv" style="display:none;"> 
        <select name="subModelChoice" class="vehicleSelection">
          <option value="" >Submodel/Trim</option>
          <?php
            while($submodel = $submodelResult->fetch_assoc()){
              echo '<option value="'.$submodel['submodel'].'">'.$submodel['submodel'].'</option>';
            }
          ?>
        </select><br />
      </div><!-- End submodelDiv -->
      <div id="engineDiv" style="display:none;">
        <select name="engineChoice" class="vehicleSelection">
          <option value="" >Engine</option>
          <?php
            while($engine = $engineResult->fetch_assoc()){
              echo '<option value="'.$engine['engine'].'">'.$engine['engine'].'</option>';
            }
          ?>
        </select><br />
      </div><!-- End engineDiv -->
      <input type="hidden" name="action" value="vehicleSelected" />
      <div id="goDiv" style="display:none;">
         <input type="submit" name="vehicleSelected" value="Go" />
      </div><!-- End goDiv -->
    </form>

