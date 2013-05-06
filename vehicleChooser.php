<?php
require_once('./lib/db.php');


?>
    <form name="vehicleSelect" action="" method="POST">
      <div id="yearDiv">
        <select id="yearSelect" name="yearChoice" class="vehicleSelection">
          <option value="" >Year</option>
          <!-- If more years are added, generate from DB results -->
          <option value="2013" >2013</option>
        </select>
      </div><!-- End yearDiv -->
    </form>
