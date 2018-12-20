function onSendComment( ){
	var txtComment = $("#comment").val( );
	var carId = $("#carId").val( );
	$.ajax({
        url: "async-addComment.php",
        dataType : "json",
        type : "POST",
        data : { txtComment : txtComment, carId : carId },
        success : function(data){
            if(data.result == "success"){
            	var objClone = $("#cloneCommentItem").clone();
            	objClone.attr("id", "commentItem");
            	objClone.show();
            	objClone.find("#photo").attr( "src", data.photo );
            	objClone.find("#header").html( data.username + "<span><i class='icon-time'> " + data.createdTime + "</i></span>" );
            	objClone.find("#txtComment").text( txtComment );
            	$("#commentList").prepend( objClone );
            	$("#comment").val( "" );
            }else{
            	
            }
        }
    });		
}
var isSubmitBid = false;
function onSubmitBid( ){
	if( isSubmitBid ) return;
	var userType = $("#userType").val();
	if( userType == "A" ){ alert("You can't bid on here."); return; }
	var currentPrice = $("#currentPrice").val();
	var myPrice = $("#myPrice").val( );
	var carId = $("#carId").val();
	if( !isNumber( myPrice ) ){ alert( "You have to input the Price correctly."); $("#myPrice").val(""); $("#myPrice").focus();return; }
	// if( currentPrice * 1 > myPrice * 1 ){ alert( "You have to input Your Price bigger than Current Price."); $("#myPrice").focus(); return; }
	isSubmitBid = true;
	$.ajax({
        url: "async-submitBid.php",
        dataType : "json",
        type : "POST",
        data : { carId : carId, price : myPrice },
        success : function(data){
        	isSubmitBid = false;
            if(data.result == "success"){
            	$("#btnSubmitBid").attr("disabled", false);
            	alert("Your bid submiteed successfully.");
            	$("#myPrice").val("");
            	if( data.price != "" ){
            		$("#labelCurrentPrice").html( data.price + " EGP" );
            	}
            }
        }
    });		
}
function onChooseBidder( obj ){
	var bidChoosen = $("#bidChoosen").val( );
	var carId = $("#carId").val( );
	
	if( bidChoosen == "Y" ){
		return;
	}
	$("#bidChoosen").val( "Y" );
	$(obj).removeClass("btn-info");
	$(obj).addClass("btn-danger");
	$(obj).html( "Choosen" );
	
	var bidId = $(obj).parents("td").eq(0).find("input").val();
	$.ajax({
        url: "async-chooseBidder.php",
        dataType : "json",
        type : "POST",
        data : { bidId : bidId },
        success : function(data){
            if(data.result == "success"){
            	
            }
        }
    });
}