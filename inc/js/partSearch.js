$(document).ready(function(){
  //var categories = new Array();
  //sortCatSubcats();
  $('#partResults').tablesorter();
  sortObject(catSubcatAssoc, function(key,value){
    //console.log(key); 
    //console.log(catSubcatAssoc[key]);
  });
  for(category in catSubcatAssoc){
    $('#leftbar').append('<a href="javascript:refineSearchCategory(\''+category+'\');">'+category+'</a><br />');
    for(subcat in catSubcatAssoc[category]){
        
      $('#leftbar').append('&nbsp;&nbsp;&nbsp<a href="javascript:refineSearchSubcat(\''+category+'\',\''+subcat+'\');">'+subcat+'</a><br />');
    }
  }
});

function refineSearchCategory(catName){
  $.each($('#partResults').find('.catResult'), function(){
    var $this = $(this);
    if($this.html() == catName){
      $this.parent('tr').show();
    }else{
      $this.parent('tr').hide();
    }
  });
}

function refineSearchSubcat(catName, subcatName){
  $.each($('#partResults').find('.catResult'), function(){
    var $this = $(this);
    if(($this.html() == catName) && ($this.siblings('.subcatResult').html() == subcatName)){
      $this.parent('tr').show();
    }else{
      $this.parent('tr').hide();
    }
  });
}

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
