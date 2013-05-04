$(document).ready(function() {

  $('#myVehiclesButton').click(function(event){
    $(this).toggleClass('expanded').toggleClass('collapsed');
    if ($(this).hasClass('expanded')) {
      $('#vehicleSelectExtension').show();
    } else {
      $('#vehicleSelectExtension').hide();
    }
    event.stopPropagation();
  });

  $('#partAdderButton').click(function(event){
    $(this).toggleClass('expanded').toggleClass('collapsed');
    if ($(this).hasClass('expanded')) {
      $('#partAdderExtension').show();
    } else {
      $('#partAdderExtension').hide();
    }
    event.stopPropagation();
  });


  $('html').click(function(){
    var $myVehiclesButton = $('#myVehiclesButton'),
        $vehicleSelection = $('#vehicleSelectExtension'),
        $partAdderButton = $('#partAdderButton'),
        $partAdderSelection = $('#partAdderExtension');
    if ($myVehiclesButton.hasClass('expanded')) { 
      $myVehiclesButton.toggleClass('expanded').toggleClass('collapsed'); 
    } 
    if ($partAdderButton.hasClass('expanded')) {
      $partAdderButton.toggleClass('expanded').toggleClass('collapsed');
    }
    $vehicleSelection.hide();
    $partAdderSelection.hide();
  });

  $('#vehicleSelectExtension').click(function(event){
      event.stopPropagation();
  });

  $('#partAdderExtension').click(function(event) {
    event.stopPropagation();
  });
});


function loadNextSelect(data) {
  // Called from: selectedValue()
  // Precondition: A <select> field has an <option> chosen
  // Postcondition: The next <select> field is populated and displayed


  // Ajax request to query next selection
  $.ajax({
    url: "./getSelectData.php",
    type: "POST",
    data: currentSelections,
    success: function(response) {
      
      $selector = response.      


      $selector.show();
    }
//    error: 
  });

}

function selectedValue(currentSelected) {
  // currentSelected is the id of the <select> that has been changed  
  var lastSelector = "engineSelector";

  if(currentSelector == lastSelector) {
    return true;
  }

  var data = {},
      currentSelected;

  $('.currentSelector');


  loadNextSelect(data);
}


