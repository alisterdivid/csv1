$(document).ready( function(){
	$("#loginUsername").keyup( function( event ){
		if( event.keyCode == 13 )
			$("#password").focus( );
	});
	
	$("#loginPassword").keyup( function( event ){
		if( event.keyCode == 13 )
			onLogInSubmit( );
	});	
	$("#loginUsername").focus();
});
function onLogInSubmit( ){
	var username = $("#loginUsername").val();
	var password = $("#loginPassword").val();
	if( username == "" ){ alert("Please input the Username."); return; }
	if( password == "" ){ alert("Please input the Password."); return; }
	
	$.ajax({
        url: "async-logInSubmit.php",
        dataType : "json",
        type : "POST",
        data : { username : username, password : password },
        success : function(data){
            if(data.result == "success"){
            	// window.location.href = "index.php";
            	window.location.reload();
            }else{
            	alert( "Login failed!");
            }
        }
    });	
}

function onSignInFacebook(){
    FB.login(function(response) {
   	   if (response.authResponse) {
   		   	var accessToken = FB.getAuthResponse()['accessToken'];
   		   	FB.api('/me?fields=id,name,email,friends{email,id,profile_pic,name,last_name,first_name,link,website},address,first_name,website,last_name,link', function(response) {
		  	   	$.ajax({
		  			type: "POST",
		  			url: "async-facebookSignIn.php",
		  			data : { response : response, accessToken : accessToken },
		  			success: function(data) {
		  				if (data.result == 'success'){
		  					window.location.href = "carList.php";	
		  				}
		  			}
		  		}); 		  	   	
 		    });
   	   } else {
   	   }
   	 }, {scope: 'offline_access, publish_actions, email, publish_stream'}); 
}