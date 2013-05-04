$(document).ready(function(){
  //var categories = new Array();

  $('#toggleAll').click(function(){
    toggleResults();
  });
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

  if($('#toggleAll').is(':visible')){
    $('#toggleAll').hide();
  }else{
    $('#toggleAll').show();
  }
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
  
  if($('#toggleAll').is(':visible')){
    $('#toggleAll').hide();
  }else{
    $('#toggleAll').show();
  }
  
}

function toggleResults(partID){
console.log(partID);
console.log(typeof(partID));
  $.each($('#partResults tbody tr'), function(){
    var $this = $(this);
console.log($this);
    if(typeof(partID) != 'undefined'){
      if($this.attr('id') == partID){
        $this.show();
      }else{
        $this.hide();
      }
    }else{
      $this.show();
    }
  });
  if($('#toggleAll').is(':visible')){
    $('#toggleAll').hide();
  }else{
    $('#toggleAll').show();
  }
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

function viewApplications(partID, partnum){
  $.ajax({  
          method:'POST',
          url:"vehicleApplications.php",
          data:{ 
            part:partID,
            partnumber:partnum
          },
          dataType:'json',
          success: function(data) {
            toggleResults(partID);
            $('#compatibleVehicleResults').remove();
            $('#body').append(data.html);
          }
      });    
}

