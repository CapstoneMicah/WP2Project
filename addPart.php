<?php
  //require_once('./controlbar.php');
  require_once('./lib/db.php');
  global $mysqli;

  if(isset($_POST['partnumber'])){echo "ZERO";
    //Insert into DB
    $query = "SELECT COUNT(*) AS partCount
              FROM parts
              WHERE partnumber='".$_POST['partnumber']."'";
echo $query;
    $rd = $mysqli->query($query);
var_dump($rd);
$result = $rd->fetch_assoc();
var_dump($result);
  if($result['exists'] > 0){
echo "query executed<br />";

//var_dump($rd->fetch_assoc());
      // Part already exists; 
      // redirect to part page  with "already exists" message
//echo "redirecting";      
//header("Location: http://www.cs.kent.edu/~mdetamor/wp2/PROJECT/partPage.php?pn=".$_POST['partnumber']."&ae=1");
    }else{
echo "ONE";
      $query = "INSERT INTO parts (partnumber, categoryID, subcategoryID, brandID) VALUES ('".$_POST['partnumber']."','".$_POST['category']."','".$_POST['subcategory']."','".$_POST['brand']."' ) ";
      if($rd = $mysqli->query($query)){
        //Possibly need a better solution to redirect to the
        //partPage with current vars (category, subcat, brand)
        //instead of re-searching once there
echo "TWO";
//        header("Location: ./partPage.php?pn=".$_POST['partnumber']);
      }else{
echo "THREE";
        //Error handling
        echo "Unable to insert part into DB. ".$mysqli->error;
      }
    }
  }
  
?>
