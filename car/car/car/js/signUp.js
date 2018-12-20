$(document).ready( function(){
	$("#username").keyup( function( event ){
		if( event.keyCode == 13 )
			$("#password").focus( );
	});

	$("#password").keyup( function( event ){
		if( event.keyCode == 13 )
			$("#email").focus( );
	});
	$("#email").keyup( function( event ){
		if( event.keyCode == 13 )
			$("#phone").focus( );
	});	
	$("#phone").keyup( function( event ){
		if( event.keyCode == 13 )
			onSignUpSubmit( );
	});	
	$("#username").focus();
});
function onSignUpSubmit( ){
	var username = $("#username").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var phone = $("#phone").val();
	var userType = "D";
	
	if( username == "" ){ alert("Please input the Username."); return; }
	if( email == "" ){ alert("Please input the Email Address."); return; }
	if( password == "" ){ alert("Please input the Password."); return; }
	if( phone == "" ){ alert("Please input the Phone Number."); return; }
	if( !validateEmail( email ) ){ alert("Please input the Email Address correctly."); return; }
	
	$.ajax({
        url: "async-signUpSubmit.php",
        dataType : "json",
        type : "POST",
        data : { username : username, email : email, password : password, phone : phone, userType : userType },
        success : function(data){
            if(data.result == "success"){
            	alert( "The user registered successfully.");
            	$("#username").val( "" );
            	$("#email").val( "" );
            	$("#password").val( "" );
            	$("#phone").val( "" );
            }else{
            	alert( "The Username or Email Address is already exist.");
            	return;
            }
        }
    });	
}