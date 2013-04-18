<?php
require_once('./lib/db.php');

$makeQuery = "SELECT
             vehicleMake.name AS make
          FROM
             vehicleMake
";

$modelQuery = "SELECT
             vehicleModel.name AS model
          FROM
             vehicleModel
";
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

$makeResult = $mysqli->query($makeQuery);
$modelResult = $mysqli->query($modelQuery);
$submodelResult = $mysqli->query($submodelQuery);
$engineResult = $mysqli->query($engineQuery);
?>
    <form name="vehicleSelect" action="" method="POST">
      <select name="yearChoice" class="vehicleSelection">
        <option value="" >Year</option>
        <!-- If more years are added, generate from DB results -->
        <option value="2013" >2013</option>
      </select></br>
      <select name="makeChoice" class="vehicleSelection">
        <option value="" >Make</option>
        <?php
          while($make = $makeResult->fetch_assoc()){
            echo '<option value="'.$make['make'].'">'.$make['make'].'</option>';
          }
        ?>
      </select><br />
      <div id="modelDiv">
      <select name="modelChoice" class="vehicleSelection">
        <option value="" >Model</option>
        <?php
          while($model = $modelResult->fetch_assoc()){
            echo '<option value="'.$model['model'].'">'.$model['model'].'</option>';
          }
        ?>
      </select><br />
      </div>
      <div id="submodelDiv"> 
      <select name="subModelChoice" class="vehicleSelection">
        <option value="" >Submodel/Trim</option>
        <?php
          while($submodel = $submodelResult->fetch_assoc()){
            echo '<option value="'.$submodel['submodel'].'">'.$submodel['submodel'].'</option>';
          }
        ?>
      </select><br />
      </div>
      <div id="engineDiv">
      <select name="engineChoice" class="vehicleSelection">
        <option value="" >Engine</option>
        <?php
          while($engine = $engineResult->fetch_assoc()){
            echo '<option value="'.$engine['engine'].'">'.$engine['engine'].'</option>';
          }
        ?>
      </select><br />
      <input type="hidden" name="action" value="vehicleSelected" />
      <input type="submit" name="vehicleSelected" value="Go" />
      </div>
    </form>
