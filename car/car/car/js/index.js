$(document).ready( function(){
	$.ajax({
        url: "async-addVideoTemp.php",
        dataType : "json",
        type : "POST",
        data : { data1 : "" },
        success : function(data){
            if(data.result == "success"){
            	
            }else{
            	
            }
        }
    });	
});
