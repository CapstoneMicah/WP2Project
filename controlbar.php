
<?php 
  require_once('./tempfns.php');
  addCss($css); 
  addJs($js); 
?>
<!-- <div id="headerNav">
 <a href="./login.php">Login</a> 
</div>-->
<div id="controlbar">
  <div id="logoAndPN">
    <div id="logo">
      Part Fitter
    </div><!-- END logo -->
    <div id="pnSearch" class="chooser">
      Search Partnumbers:<br />
      <form name="partSearch" action="" method="POST">
        <input name="pnSearch" placeholder="PN-012-345"></input><br />
        <input type="hidden" name="action" value="searchParts" />
        <input type="submit" name="search" value="Serach" />
      </form>
    </div><!-- End pnSearch --> 
  </div><!-- END logoAndPN -->
  <div class="separator"></div>  
  <div id="vehicleSelect" class="chooser">
    Search by Vehicle:<br />
    <?php 
      // Query DB and present vehicle selection inputs 
      require_once('./vehicleChooser.php'); 
      // If vehicle is selected, display secondary vehicle chooser for cross-compatible parts
    ?>
  </div><!-- End vehicleSelect -->
  <?php 
  //  if(isset($_SESSION['user_id'])){
      // Search for existing part. If exists, warn and display part page
      // Else present the part creation form
//      echo '<div class="headSeparator" style="float:left;margin-top:50px;">OR</div>';
?>
      <div class="separator"></div>
      <div id="pnAdder" class="chooser">
      <center>Add a Part:</center>
      <form name="addPart" action="" method="POST">
        <?php require_once('./categoryList.php'); ?>
        <br />
        <?php require_once('./subcategoryList.php'); ?>
        <br />
        <?php require_once('./brandList.php'); ?>
        <br />
        <input name="partnumber" placeholder="New Part Number" style="width:150px;"></input>
        <input type="hidden" name="action" value="addPart" />
        <br />
        
        <input type="submit" name="add" value="Add" />
      </form>
     </div>
  <?php
   // }//End user_id check
  ?>

  <div class="separator"></div>  
    <?php
      require_once("headerUserArea.php");
    ?>

</div><!-- End control -->
