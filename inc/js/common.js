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

  var $left = $('#leftbar'),
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
