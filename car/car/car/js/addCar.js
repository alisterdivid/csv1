$(document).ready( function(){
	$("input#imageUpload").change( function(){
		fnUploadPicture( this );
	});	
});
function fnUploadPicture( obj ){
	$(obj).parents("form").ajaxForm({
		// target: '#' + $(obj).parents("form").find("#imagePrevDiv").val(),
		success : function( data ){
			$(obj).parents("form").find("div#previewImage").html( data );
			var objClone = $("#clonePhotoItem").clone();
			objClone.show();
			objClone.attr("id", "photoItem");
			$("#photoList").append( objClone );
			objClone.find("input#imageUpload").change( function(){
				fnUploadPicture( this );
			});
		}
	}).submit();	
}
function onChangeManufacturer( ){
	var manufacturerId = $("#manufacturer").val( );
	$.ajax({
        url: "async-getModelList.php",
        dataType : "json",
        type : "POST",
        data : { manufacturerId : manufacturerId },
        success : function(data){
            if(data.result == "success"){
            	var strHTML = '<option value="">Select Model.</option>';
            	for( var i = 0; i < data.modelList.length; i ++ ){
            		strHTML += '<option value=' + data.modelList[i].ec_model + '>' + data.modelList[i].ec_title + '</option>';
            	}
            	$("#model").html( strHTML );
            }else{            	
            }
        }
    });	
}

function onAddCar( ){
	var manufacturerId = $("#manufacturer").val( );
	var modelId = $("#model").val( );
	var year = $("#year").val( );
	var price = $("#price").val( );
	var sealedYn = $("#sealedYn").get(0).checked?"Y":"N";
	var featuredYn = "N";
	var status = "PENDING";
	var speed = $("#speed").val( );
	var internalColor = $("#internalColor").val( );
	var externalColor = $("#externalColor").val( );
	var video = $("#video").val( );
	var description = $("#description").val( );
	var carId = $("#carId").val( );
	
	var objPhoto = $("#photoList").find("div#previewImage").find("img");
	var photo = [];
	for( var i = 0; i < objPhoto.length; i ++ ){
		if( i > 0 && i == objPhoto.length - 1 && $("#noCarPhoto").val() == objPhoto.eq(i).attr("src") ){
			
		}else
			photo[i] = objPhoto.eq(i).attr("src");
	}
	if( manufacturerId == "" ) { alert("Please Select Manufacturer."); return; }
	if( modelId == "" ) { alert("Please Select Model."); return; }
	if( year == "" ) { alert("Please Input Year."); return; }
	if( price == "" ) { alert("Please Input Price."); return; }
	if( speed == "" ) { alert("Please Input Speed."); return; }

	$.ajax({
        url: "async-addCar.php",
        dataType : "json",
        type : "POST",
        data : { carId : carId, manufacturerId : manufacturerId, modelId : modelId, year : year, price : price, sealedYn : sealedYn, featuredYn : featuredYn, status : status,
    		speed : speed, internalColor : internalColor, externalColor : externalColor, video : video, description : description, photo : photo },
        success : function(data){
            if(data.result == "success"){
            	alert("Car saved successfully.");
            	window.location.href = "myCars.php";
            }else{
            }
        }
    });		
	
}