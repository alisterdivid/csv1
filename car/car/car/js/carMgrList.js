function onCheckAll( obj ){
	if( obj.checked ){
		$("table#example").find("input:checkbox").prop("checked", true);
	}else{
		$("table#example").find("input:checkbox").prop("checked", false);
	}
}
function onDeleteCar( ){
	var objList = $("table#example").find("input#chkCarId:checkbox:checked");
	if( objList.length == 0 ){ alert("Please select Car to delete."); return;}
	var strIds = "";
	for( var i = 0 ; i < objList.length; i ++ ){
		strIds += objList.eq(i).val();
		if( i != objList.length - 1 )
			strIds += ",";
	}
	if( !confirm("Are you sure?") ){ return; }
    $.ajax({
        url: "async-deleteCar.php",
        dataType : "json",
        type : "POST",
        data : { carIds : strIds },
        success : function(data){
            if(data.result == "success"){
            	alert("Cars deleted succesfully.");
            	window.location.reload();
            }
        }
    });		
}