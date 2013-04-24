$(document).ready(function(){
  //var categories = new Array();
  //sortCatSubcats();
  //console.log(catSubcatAssoc.sort());
  sortObject(catSubcatAssoc, function(key,value){
    //console.log(key); 
    //console.log(catSubcatAssoc[key]);
  });
  //categories = //getCategories();
  for(category in catSubcatAssoc){
    $('#leftbar').append('<b>'+category+'</b><br />');
    for(subcat in catSubcatAssoc[category]){
        
      $('#leftbar').append('&nbsp;&nbsp;&nbsp<b>'+subcat+'</b><br />');
    }
  }
});

function sortCatSubcats(){
  //for(category in sortCatSubcats){
    
  //}
}

function getCategories(){
  //var categories = new Array(),
    //  $catResults = $('.catResult'),
     // $subcatResults = $('.subcatResult');
  
  $.each($catResults, function(){
    //console.log($(this).html()+"\n");
    
  });
  //categories  
}
