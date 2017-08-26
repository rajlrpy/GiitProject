$(document).ready(function(){
	$(".disable_account_btn").click(function(){
		var did = $(this).attr("deleteid");
		$.post("php/disable_admin.php",{uuid:did}).done(function(data){
				if(data == "success"){
					$('table[uid="'+ did +'"]').hide();
					location.reload();
				}else{
					alert("Unable To Delete user..");
				}
			}).error(function(err,msg){
				alert(err);
				alert(msg);
			});
	});
	
	
	//_________________________________________
	$(".edit_account_btn").click(function(){
		var id = $(this).attr("edit_id");
		$(this).addClass("disp-none");
		//alert("vehbeg");
		$( 'table[uid="'+id+'"] .save_account_btn' ).removeClass("disp-none");
		
		$( 'table[uid="'+id+'"] input' ).removeAttr("readonly");
		$( 'table[uid="'+id+'"] select' ).removeClass("disp-none");
		//alert("here");
 		

	});
	
	$(".save_account_btn").click(function(){
		var id = $(this).attr("save_id");
		$(this).addClass("disp-none");
 		$( 'table[uid="'+id+'"] .edit_account_btn' ).removeClass("disp-none");
	 	$( 'table[uid="'+id+'"] select' ).addClass("disp-none");
		var name= $('table[uid="'+id+'"] .name' ).val().trim();	
		var email= $('table[uid="'+id+'"] .email' ).val().trim();	
		var username= $('table[uid="'+id+'"] .username' ).val().trim();	
		var pwd= $('table[uid="'+id+'"] .password' ).val().trim();	
		var scope= $('table[uid="'+id+'"] .scope' ).val();	
		var category= $('table[uid="'+id+'"] .category' ).val();	
		var topic= $('table[uid="'+id+'"] .topic' ).val();	
		var tutorial= $('table[uid="'+id+'"] .tutorial' ).val();	
		 if ( email.length == 0 || name.length ==0 || username.length==0 || pwd.length==0 ){ 
			alert("complete the details..");
		 }else{
		 
		$.post("php/saveadmin.php",{uuid:id,name:name,email:email,username:username,pwd:pwd,scope:scope,category:category,topic:topic,tutorial:tutorial}).done(function(data){
				//alert(data);
				if(data == "success"){
					location.reload();
				}else{
					alert("Unable to update");
				}
			}).error(function(err,msg){
				alert(err);
				alert(msg);
		 });}
	});
	 	
	$(".jq_menu").click(function(){	
		var id = $(this).attr("jq_content");
		$(".jq_menu").removeClass("bgblue");
		$(this).addClass("bgblue");
		 
		$( ".jq_contents" ).hide(0,function(){
				if(!$(id).is(":visible")){
				$(id).show();
			  	}
		});
	});
  
 
	$(".addbutton").click(function(){
		$("#alluser").addClass("disp-none");
		$("#addnewadmin").removeClass("disp-none");
		$("#searchbox").addClass("disp-none");
		 
	});
	
	$("#addnewadmin .cancel_user").click(function(){
			$("#addnewadmin .save_user").attr("disabled","true");
			location.reload();
	});
	
	
		
	$('#addnewadmin .save_user').click(function(){
		var aname = $('#addnewadmin .name').val().trim();
		var aemail = $('#addnewadmin .email').val().trim();
		var ausername = $('#addnewadmin .username').val().trim();
		var apwd = $('#addnewadmin .password').val().trim();
		var ascope = $('#addnewadmin .scope').val();
		var acategory = $('#addnewadmin .category').val();
		var atopic = $('#addnewadmin .topic').val();
		var atutorial = $('#addnewadmin .tutorial').val();
		if ( aemail.length == 0 || aname.length ==0 || ausername.length==0 || apwd.length==0 ){ 
			alert("complete the details..");
		}
		else{
	 	$.post("php/views/adminaddnew.php",
		{aname:aname,aemail:aemail,ausername:ausername,apwd:apwd,ascope:ascope,acategory:acategory,atopic:atopic,atutorial:atutorial}
		).done(function(data){
		 
		if(data=="success"){
			location.reload();
		}else{
				alert("Unable to update");
			}
		}).error(function(err,msg){
			alert(err);
			alert(msg);
		});
		}
	});



	$("#search").click(function(){
		var txt = $("#search_user").val().trim();
		if(txt.length==0)
			return;
		$('.table_user').addClass("disp-none");
		$('table[uid="'+txt+'"]').removeClass("disp-none");
		$(".cancel_account_table").show();
	});
	$("#search_user").keyup(function(){
		var txt = $(this).val();
		if(txt.trim().length==0){
			$('.table_user').removeClass("disp-none");
			$(".cancel_account_table").hide();
		}
	});
	$(".cancel_account_table").click(function(){
		$("#search_user").val("");
		$('.table_user').removeClass("disp-none");
		$(".cancel_account_table").hide();
	});
	
	//myaccount save//
	
	$('table[uid="my_account_edit"] button.save_my_account').click(function(){
		var id = $(this).attr("save_id");
		alert(id);
		var name= $('table[uid="my_account_edit"] input.name' ).val().trim();
	 
		var email= $('table[uid="my_account_edit"] input.email' ).val().trim();	
 
		var username= $('table[uid="my_account_edit"] input.username' ).val().trim();	
	 
		var pwd= $('table[uid="my_account_edit"] input.password' ).val().trim();	
		 
 		if ( email.length == 0 || name.length ==0 || username.length==0 || pwd.length==0 ){ 
			alert("complete the details..");
			return;
		}else{
			$.post("php/views/savemyaccount.php",{uuid:id,name:name,email:email,username:username,pwd:pwd}).done(function(data){
				alert(data);	
				if(data == "success"){
					location.reload();
				}else{
					alert("Unable to update");
				}
			}).error(function(err,msg){
				alert(err);
				alert(msg);
			});
		}
	});
	//canccel
	
	$('table[uid="my_account_edit"] button.cancel_my_account').click(function(){
	 
		var name=$('table[uid="my_account_edit"]').attr("my_name"); 
	//	alert(name);
		var email=$('table[uid="my_account_edit"]').attr("my_email"); 
	//	alert(email);
		var uid=$('table[uid="my_account_edit"]').attr("my_uid"); 
	//	alert(uid);
		var pwd=$('table[uid="my_account_edit"]').attr("my_pwd");
		//alert(pwd);
	 	$('table[uid="my_account_edit"] input.username').val(uid);
		$('table[uid="my_account_edit"] input.password').val(pwd);
		$('table[uid="my_account_edit"] input.name').val(name);
		$('table[uid="my_account_edit"] input.email').val(email);
		
	});
 
		//_____edit scope____________________________________
	$(".edit_scope_btn").click(function(){
		var id = $(this).attr("edit_id");
		//alert(id);
		$(this).addClass("disp-none");
		//alert("vehbeg");
		$( 'table[uid="'+id+'"] .save_scope_btn' ).removeClass("disp-none");
		$( 'table[uid="'+id+'"] input' ).removeAttr("readonly");
		$( 'table[uid="'+id+'"] select' ).removeClass("disp-none");
		//alert("here");
 		

	});
	
	
	//----save scope ---
	
	
	$(".save_scope_btn").click(function(){
		var id = $(this).attr("save_scope_id");
		$(this).addClass("disp-none");
 		$( 'table[uid="'+id+'"] .edit_scope_btn' ).removeClass("disp-none");
	  	var name= $('table[uid="'+id+'"] .name' ).val().trim();	
		 
		 if (name.length ==0){ 
			alert("complete the details..");
		 }else{
		 
		$.post("php/views/savescope.php",{uuid:id,name:name}).done(function(data){
				//alert(data);
				if(data == "success"){
					alert("successfully updated");
					location.reload();
				}else{
					alert("Unable to update");
				}
			}).error(function(err,msg){
				alert(err);
				alert(msg);
		 });}
	});
	 //----cancel scope
	 $('.cancel_scope_btn').click(function(){
		var id = $(this).attr("cancel_scope_id");
 		var name=$('table[uid ="'+id+'"]').attr("scope_edit_nm"); 
	 		//alert(pwd);
			//alert(name);
	 	$('table[uid="'+id+'"] input.name').val(name);
		 
	});
 
 //--addnew cancel scope
 
 	$("#addnewscope .add_scope_cancel").click(function(){
			$("#addnewscope .save_scope_btn").attr("disabled","true");
			location.reload();
	});
	
//addnew save scope	
		
	$('#addnewscope .add_scope_save').click(function(){
		var aname = $('#addnewscope .name').val().trim();
		if (aname.length ==0){ 
			alert("complete the details..");
		}
		else{
	 	$.post("php/views/addnewscope.php",
		{aname:aname}
		).done(function(data){
		 alert(data);
		if(data=="success"){
			alert("saved scope");
			location.reload();
		}else{
				alert("Unable to update");
			}
		}).error(function(err,msg){
			alert(err);
			alert(msg);
		});
		}
	});

 $(".addbutton").click(function(){
		$(".addscopeshow").addClass("disp-none");
		$("#addnewscope").removeClass("disp-none");
		$("#scope_table #searchbox").addClass("disp-none");
		 
	});
 	
});		