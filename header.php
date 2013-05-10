<html>
<head>
<?php 
  require_once('./tempfns.php');
  addCss($css); 
  addJs($js); 
?>
</head>
<div id="topbar">
  
  <div id="logo"><h3>Part Fitter</h3></div>
  <div id="slogan">Auto Part Compatibility Reference</div>
  <div id="user"><b>
  <?php
      require_once("headerUserArea.php");
    ?>
  </b></div>
</div>
<?php

?>
<!-- <div id="headerNav">
 <a href="./login.php">Login</a> 
</div>-->
<div id="controlbar">
<!--  <div id="logoAndPN">-->
  <!-- <div id="logo">
      Part Fitter
    </div>--><!-- END logo -->
    <div id="pnSearch" class="chooser">
      <div id="pnSearchFormDiv">
        Search Partnumbers:<br />
        <form name="pnSearchForm" action="" method="POST">
          <input name="pnSearch" placeholder="PN-012-345"></input>
          <input type="hidden" name="action" value="searchParts" />
          <input type="submit" name="search" value="Serach" />
        </form>
      </div><!-- End pnSearchFormDiv -->
    </div><!-- End pnSearch --> 
<!--  </div>--><!-- END logoAndPN -->
  <div class="separator"></div>  
  <div id="vehicleSelect" class="chooser">
    <div id="vehicleSelectDiv">
<!--My Vehicles: <br /> -->
      <div id="myVehiclesButton" class="collapsed" >
      My Vehicles (<?php echo sizeof($_SESSION['vehicles'])?sizeof($_SESSION['vehicles']):0; ?>)
      </div><!-- End myVehicles button -->
    </div><!-- End vehicleSelect -->
    <div id="vehicleSelectExtension" style="display:none;">
      <?php 
      // Query DB and present vehicle selection inputs 
        require_once('./vehicleChooser.php'); 
      // If vehicle is selected, display secondary vehicle chooser for cross-compatible parts
      ?> 
    </div><!-- End vehicleSelectExtension -->
  </div><!-- End vehicleSelect -->
  <?php 
  //  if(isset($_SESSION['user_id'])){
      // Search for existing part. If exists, warn and display part page
      // Else present the part creation form
//      echo '<div class="headSeparator" style="float:left;margin-top:50px;">OR</div>';
?>
    <div class="separator"></div>
    <div id="pnAdder" class="chooser">
      <div id="pnAdderFormDiv">
        <div id="partAdderButton" class="collapsed" >Add a Part</div><!-- End partAdder button -->
      </div>
      <div id="partAdderExtension" style="display:none;">
        <?php echo $_SESSION['test']; ?>
        <?php echo $_SESSION['error']; ?>
        <div id="pnAdderFormComponentsDiv">
          <form name="addPart" action="addPart.php" method="POST">
            <?php require_once('./categoryList.php'); ?>
          </form>
        </div>
      </div><!-- End pnAddForm -->
      <div id="pnAddExtension" style="display:none;">
      </div><!-- End pnAddExtension -->
    </div><!-- End pnAdder -->
    <?php
     // }//End user_id check
    ?>

  <div class="separator"></div>  
</div><!-- End control -->

<div id="bottom"></div>
