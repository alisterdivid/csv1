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
	var email = $("#email").val( );
	var phone = $("#phone").val( );
	var firstName = $("#firstName").val( );
	var lastName = $("#lastName").val( );
	var address = $("#address").val( );
	var userType = $("#userType").val( );
	var photo = $("#previewImage").find("img").attr("src");
	var description = $("#description").val();
	
	if( username == "" ){ alert("Please input the username."); return; }
	if( email == "" ){ alert("Please input the Email."); return; }
	if( !validateEmail( email ) ){ alert("Please input the Email correctly."); return; }
	if( userType == "" ){ alert("Please select the User Type."); return; }
	
	$.ajax({
        url: "async-saveUser.php",
        dataType : "json",
        type : "POST",
        data : { username : username, password : password, email : email, phone : phone, firstName : firstName, lastName : lastName,
        		address : address, userType : userType, photo : photo, description : description, userId : userId },
        success : function(data){
            if(data.result == "success"){
            	alert("User saved successfully.");
            	window.location.href="userMgrList.php";
            }
        }
    });			
	
}