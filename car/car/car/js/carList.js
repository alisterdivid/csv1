function onSearch( ){
	var minSpeed = $("#minSpeed").val();
	var maxSpeed = $("#maxSpeed").val();
	
	var minPrice = $("#minPrice").val();
	var maxPrice = $("#maxPrice").val();
	
	var minYear = $("#minYear").val();
	var maxYear = $("#maxYear").val();
	
	if( minSpeed != "" && !isNumber(minSpeed) ){ alert("Please input Min Speed correctly."); return false; }
	if( maxSpeed != "" && !isNumber(maxSpeed) ){ alert("Please input Max Speed correctly."); return false; }
	if( minSpeed != "" && maxSpeed != "" && minSpeed * 1 > maxSpeed * 1 ) { alert("Please input Speed range correctly."); return false; }
	
	if( minPrice != "" && !isNumber(minPrice) ){ alert("Please input Min Price correctly."); return false; }
	if( maxPrice != "" && !isNumber(maxPrice) ){ alert("Please input Max Price correctly."); return false; }
	if( minPrice != "" && maxPrice != "" && minPrice * 1 > maxPrice * 1 ) { alert("Please input Price range correctly."); return false; }
	
	if( minYear != "" && !isNumber(minYear) ){ alert("Please input Min Year correctly."); return false; }
	if( maxYear != "" && !isNumber(maxYear) ){ alert("Please input Max Year correctly."); return false; }
	if( minYear != "" && maxYear != "" && minYear * 1 > maxYear * 1 ) { alert("Please input Year range correctly."); return false; }
	
	return true;
}

function onClear(){
	$("#minSpeed").val("");
	$("#maxSpeed").val("");
	
	$("#minPrice").val("");
	$("#maxPrice").val("");
	
	$("#minYear").val("");
	$("#maxYear").val("");
	$("#manufacturer").val("");
	return false;
	
}