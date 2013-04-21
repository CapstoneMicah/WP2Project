<?php 
session_start();

if ( isset($_POST['loginRestricted']) && empty($_SESSION['user']) )
{
   header("Location: login.php?target=" . $_SERVER['PHP_SELF']);
   exit;
}

?>
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
  }
?>
</div><!-- END body div -->
<div id="rightBar">
<div class="divHeader">
</div>
<?php include('./mostCompatible.php'); ?>
</div>
