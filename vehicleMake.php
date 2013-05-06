<?php
require_once('./lib/db.php');

$makeResult = $mysqli->query("SELECT vehicleMake.name, vehicleMake.makeID " .
                             "FROM vehicleMake");
?>

      <div id="makeDiv">
        <select id="makeSelect" name="makeChoice" class="vehicleSelection">
          <option value="" >Make</option>
          <?php
            while($make = $makeResult->fetch_assoc()){
              echo '<option value="'.$make['makeID'].'">'.$make['name'].'</option>';
            }
          ?>
        </select><br/>
      </div><!-- End makeDiv -->


