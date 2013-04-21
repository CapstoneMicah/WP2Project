
<?php 
  require_once('./tempfns.php');
  addCss($css); 
  addJs($js); 
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
    <div id="vehicleSelectFormDiv">
      My Vehicles: <br />
      <?php 
      // Query DB and present vehicle selection inputs 
        require_once('./vehicleChooser.php'); 
      // If vehicle is selected, display secondary vehicle chooser for cross-compatible parts
      ?> 
    </div><!-- End vehicleSelectForm -->
    <div id="vehicleSelectExtension">
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
        <center>Add a Part:</center>
        <form name="addPart" action="" method="POST">
          <?php require_once('./categoryList.php'); ?>
          <?php require_once('./subcategoryList.php'); ?>
          <?php require_once('./brandList.php'); ?>
          <div id="newPnDiv" style="display:none;">
            <input name="partnumber" placeholder="New Part Number" style="width:150px;"></input>
            <br />
          </div><!-- End newPnDiv -->
          <input type="hidden" name="action" value="addPart" />
          <div id="pnAddDiv" style="display:none;">
            <input type="submit" name="add" value="Add" />
          </div><!-- End pnAddDiv -->
        </form>
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
