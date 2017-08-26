$(document).ready(function(){
	$("#btn-login").click( function(){
		//alert("xdg");
		$("#btn-login").button("loading");
		var id = $("#uid").val().trim();
		var ps = $("#pwd").val().trim();
		if ( id.length == 0){
			$("#uid").focus();
			err("Enter your email	");
			$("#btn-login").button("reset");
			return;
			
		}
		if ( ps.length == 0){
			$("#pwd").focus();
			err("Enter your password	");
			$("#btn-login").button("reset");
			return;
		}
		
		
		$.post(
			"login.php",
			{email:id,password:ps}
		).done(function(data){
			//alert(data);
			if(data=="success"){
				window.location="admin.php";
				return;
			}else if(data=="fail"){
				$("#btn-login").button("reset");
				$("#uid").focus();
				err("Invalid User Id or Password");
				$("#pwd").val('');	
			}else if(data=="deactive"){
				$("#btn-login").button("reset");
				$("#uid").focus();
				err("your account has been deactivated");
				$("#pwd").val('');	
			}else{
				err("Server failure");
				$("#btn-login").button("reset");
			}
			
			
		}).error(function(data,msg){
			err("Server failure");
			$("#btn-login").button("reset");
		});
		
	} );
	
});

function err(msg){
	$("#err").text(msg);
}





