
<?php 
  require_once('./tempfns.php');
  addCss($css); 
  addJs($js); 
?>
<div id="headerNav">
 <a href="./login.php">Login</a> 
</div>
<div id="control">
  <div id="vehicleSelect" class="chooser" style="float:left;margin:20px">
    Search by Vehicle:<br />
    <?php 
      // Query DB and present vehicle selection inputs 
      require_once('./vehicleChooser.php'); 
      // If vehicle is selected, display secondary vehicle chooser for cross-compatible parts
    ?>
  </div><!-- End vehicleSelect -->
  <div class="headSeparator" style="float:left;border-left:1px solid #EEE;height:100px;margin-top:25px;"></div>  
  <div id="pnSearch" class="chooser" style="float:left;margin:20px;">
    Search Partnumbers:<br />
    <form name="partSearch" action="searchParts.php" method="POST">
      <input name="partnumber"></input>
      <input type="submit" name="search" value="Serach" />
    </form>
  </div><!-- End pnSearch -->
  <?php 
  //  if(isset($_SESSION['user_id'])){
      // Search for existing part. If exists, warn and display part page
      // Else present the part creation form
//      echo '<div class="headSeparator" style="float:left;margin-top:50px;">OR</div>';
      echo '<div class="headSeparator" style="float:left;border-left:1px solid #EEE;height:100px;margin-top:25px;"></div>';
      echo '<div id="pnAdder">';
      echo '</div>';
   // }//End user_id check
  ?>
</div><!-- End control -->
