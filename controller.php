<?php 
session_start();

if ( isset($_POST['loginRestricted']) && empty($_SESSION['user']) )
{
   header("Location: login.php?target=" . $_SERVER['PHP_SELF']);
   exit;
}

?>

<div id="leftbar">
  <div class="divHeader">
    <?php 
      if($_POST['action'] == 'searchParts'){
        echo '<h3>Refine by Category</h3>'; 
      };//elseif($_POST['action'] == 'applications' || $_SERVER['SCRIPT_NAME'] == "vehicleApplications.php"){
        //echo '<h3>Other Applications</h3>';
     // }
    ?>
  </div><!-- End divHeader -->
<?php
    // Add any conditions/data to leftbar
    if($_POST['action'] == 'searchParts'){
      // Add any additional data to leftbar on partsearch
    }
?>
</div><!-- End leftbar -->

<div id="body"> 
<?php
  if(!empty($_POST['action'])){
    $action = $_POST['action'];
    if($action == "searchParts"){
      include('./searchParts.php');
      if(!searchParts()){
        echo "ERROR SEARCHING PARTS";
      }else{
       echo "searched parts...";
      }
    }elseif($action == "addPart"){
      include('./addPart.php');
    }elseif($action == "vehicleSelected"){
      include('setVehicle.php');
      if(!setVehicle($_POST['year'], $_POST['makeID'], $_POST['modelID'], $_POST['submodelID'], $_POST['engineID'])){
        echo "ERROR SETTING VEHICLE";
      }
    }
  }else{
    // home page or current page
   
    //home page
    include('home.php'); 
    
    //&& $_SESSION['hideStartGuide'] == 1 ) {
      include('startGuide.php');
  }
?>
</div><!-- END body div -->


<div id="rightbar">
  <div class="divHeader">
    <?php 
      //if($_POST['action'] == 'searchParts'){
        //echo '<h3>Part Search Rightbar</h3>'; 
      //}else
if($_POST['action'] == 'applications' || $_SERVER['SCRIPT_NAME'] == "vehicleApplications.php"){
        echo '<h3>Other Applications</h3>';
      }
    ?>
  </div>
  <?php 
    if($_POST['action'] == 'applications' || $_SERVER['SCRIPT_NAME'] == "vehicleApplications.phhp"){
      include('./mostCompatible.php'); 
    }
  ?>
</div><!-- End rightBar div -->
