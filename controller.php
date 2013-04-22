<?php 
session_start();

if ( isset($_POST['loginRestricted']) && empty($_SESSION['user']) )
{
   header("Location: login.php?target=" . $_SERVER['PHP_SELF']);
   exit;
}

?>

<div id="leftbar" style="display:none;">

</div>

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


<div id="rightBar">
  <div class="divHeader">
    <?php 
      if($_POST['action'] == 'searchParts'){
        echo '<h3>Part Search Rightbar</h3>'; 
      }elseif($_POST['action'] == 'applications' || $_SERVER['SCRIPT_NAME'] == "vehicleApplications.php"){
        echo '<h3>Other Applications</h3>';
      }
    ?>
  </div>
  <?php 
    if($_POST['action'] == 'searchParts'){
      echo 'Searched parts...';
    }elseif($_POST['action'] == 'applications' || $_SERVER['SCRIPT_NAME'] == "vehicleApplications.phhp"){
      include('./mostCompatible.php'); 
    }
  ?>
</div><!-- End rightBar div -->
