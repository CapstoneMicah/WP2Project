function setCompatible(vehicleConfigID, partID){
  $.ajax({
    type:"POST",
    url:"compatibility.php",
    data:{
      setCompatible: 1,
      vehicle:vehicleConfigID, 
      part:partID
    }
  }).done(function(success){
    console.log(this);
    var checkID = "#"+partID+"UP";
    $(checkID).addClass('on');
  }); 
}

function setIncompatible(vehicleConfigID, partID){
  $.ajax({
    type:"POST",
    url:"compatibility.php",
    data:{
      setIncompatible: 1,
      vehicle:vehicleConfigID, 
      part:partID
    }
  }).done(function(success){
    var xID = "#"+partID+"DOWN";
    $(xID).addClass('on');
  }); 
}
