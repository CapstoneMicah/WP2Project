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
    error: 
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


