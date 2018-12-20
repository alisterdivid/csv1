function onSubmitBid( ){
	var userType = $("#userType").val();
	if( userType != "U" ){ alert("You can't bid on here."); return; }
	var currentPrice = $("#currentPrice").val();
	var myPrice = $("#myPrice").val( );
	var carId = $("#carId").val();
	if( !isNumber( myPrice ) ){ alert( "You have to input the Price correctly."); $("#myPrice").val(""); $("#myPrice").focus();return; }
	if( currentPrice * 1 > myPrice * 1 ){ alert( "You have to input Your Price bigger than Current Price."); $("#myPrice").focus(); return; }
	
	$.ajax({
        url: "async-submitBid.php",
        dataType : "json",
        type : "POST",
        data : { carId : carId, price : myPrice },
        success : function(data){
            if(data.result == "success"){
            	alert("Your bid submiteed successfully.");
            	$("#myPrice").val("");
            }else{
            	$("#labelCurrentPrice").html( data.price + " EGP" );
            }
        }
    });		
}