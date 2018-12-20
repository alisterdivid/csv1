$(document).ready( function(){
	$("input#imageUpload").change( function(){
		$(this).parents("form").ajaxForm({
			target: '#' + $(this).parents("form").find("#imagePrevDiv").val()
		}).submit();
	});	
});
function onSaveUser( ){
	var userId = $("#userId").val( );
	var username = $("#username").val( );
	var password = $("#password").val( );
	var firstName = $("#firstName").val( );
	var lastName = $("#lastName").val( );
	var email = $("#email").val( );
	var phone = $("#phone").val( );
	var address = $("#address").val( );
	var description = $("#description").val( );
	var photo = $("div#previewImage").find("img").attr("src");

	$.ajax({
        url: "async-updateProfile.php",
        dataType : "json",
        type : "POST",
        data : { userId : userId, username : username, password : password, firstName : firstName, lastName : lastName,
        		email : email, phone : phone, address : address, description : description, photo : photo },
        success : function(data){
            if(data.result == "success"){
            	alert("Profile Updated Successfully.");
            	window.location.href = "carList.php";
            }else{
            	
            }
        }
    });		
}