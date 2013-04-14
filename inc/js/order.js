function validateForm(){
	var crust = document.pizzaorder.crust;
	var    size = document.pizzaorder.size;
	var    toppings = document.pizzaorder.elements['toppings[]'];
	//var totalCost = 0;
	var    crustFlag = true;
	var   sizeFlag = true;
	var   errStr = '';  

	  for (var i=0; i<crust.length; i++) {
		if(crust[i].checked) {
		  crustFlag = false;
		  document.pizzaorder.crustCost.value = productPrices['Crust'][crust[i].value.split(',')[0]];
		}
	  }
	//  alert('here');
	  if(crustFlag) {  
		errStr += "Must select a crust.\n";
	  }
	  
	 
	  for (var i=0; i<size.length; i++) {
		if(size[i].checked){
		  sizeFlag = false;
		  document.pizzaorder.sizeCost.value = productPrices['Size'][size[i].value.split(',')[0]];
		}
	  }
	  if(sizeFlag) {
		  errStr += "Must select a size.\n";
	  }
	  
	  var toppingsCost = 0;
	  
	  for (var i=0; i<toppings.length; i++)
		if (toppings[i].checked)
			toppingsCost += productPrices['Topping'][toppings[i].value.split(',')[0]];
	  
	  document.pizzaorder.topCost.value = toppingsCost;
	  
	  if (errStr)
		alert('ERROR: '+errStr);
	  
	  return !errStr;
}
