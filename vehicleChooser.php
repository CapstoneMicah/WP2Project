<?php
require_once('./lib/db.php');

$query = "SELECT
             vehicleMake.name AS make
          FROM
             vehicleMake
";

$makeResult = $mysqli->query($query);
?>
    <form name="vehicleSelect" action="selectVehicle.php" method="POST">
      Make:
      <select name="makeChoice">
        <?php
          while($make = $makeResult->fetch_assoc()){
            echo '<option value="'.$make['make'].'">'.$make['make'].'</option>';
          }
        ?>
      </select><br />
      <div id="modelDiv">
      Model:
      <select name="modelChoice">

      </select><br />
      </div>
      <div id="engineDiv">
      Engine:
      <select name="engineChoice">

      </select><br />
      </div>
    </form>
