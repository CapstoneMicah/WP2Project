var catSubcatAssoc = new Array();

function sortObject(o, callback, ctx){
  var t = [];

  for(var k in o){
    t.push([k,o[k]]);
  }
//console.log(t);
  t.sort(function(a,b){
    return a[1] < b[1] ? 1 : a[1] > b[1] ? -1 : 0
  });
//console.log("\n");
//console.log(t);
  var l = t.length;
  while(l--){
    callback.call(ctx, t[l][0], t[l][1]);
 //   console.log('\n');
 //   console.log(t);
  }
}

$(document).ready(function(){

/*  var $left = $('#leftbar'),
      $right = $('#rightbar');
  if(rightLeft == "right"){
    $left.hide();
    $right.show();
  }else if(rightLeft == "left"){
    $right.hide();
    $left.show();
  }
    
  $(document.pnSearchForm.search).click(function(event){
  //  switchBars();
  });*/
  


  
  $('body').change(function(event) {
    
    event.stopPropagation();

    var $formToChange = $(event.target).parent().parent();
    
    var jqObject = $formToChange.children();  //using the jQuery children function returns a jquery object
    var jsArray = jqObject.splice(0, jqObject.length); //convert to array for array method access

    //slice out the select tag after the tag that fired the even
    if (jsArray[jsArray.length-1] != event.target.parentNode)
      jsArray = jsArray.splice(0, jsArray.indexOf(event.target.parentNode)+1);

    var urlToLoad;

    switch(event.target.id) {
      case "yearSelect":
        urlToLoad = "vehicleMake.php";
        break;
      case "makeSelect":
        urlToLoad = "vehicleModel.php";
        break;
      case "modelSelect":
        urlToLoad = "vehicleSubmodel.php";
        break;
      case "cat":
        urlToLoad = "subcategoryList.php";
        break;
      case "subCat":
        urlToLoad = "brandList.php";
        break;
      case "brand":
        return false;
    }

    var postValue = event.target.options[event.target.selectedIndex].value;
    
    $.ajax({
      type: "POST",
      url: urlToLoad,
      data: {formData: postValue},
      success:
        function(data) {
          $formToChange.empty();
          $formToChange.append(jsArray, data);
        }
    });
  });
});

function switchBars(){
  console.log("switching bars");
  var $left = $('#leftbar'),
      $right = $('#rightbar');

  if($right.is(':visible')){
    $right.hide();
    $left.show();
  }else{
    $left.hide();
    $right.show();
  }
}
