// JavaScript Document
$(document).ready(function(){	//Start
	
	function gettables(){
		
	$('.data_tbl').dataTable({  
		"sPaginationType": "bs_full",
		"aaSorting": [],
		"iDisplayLength": 10,
		"oLanguage": {
			"sLengthMenu": "<span class='lenghtMenu'> _MENU_</span><span class='lengthLabel'>Entries per page:</span>",    
		},
		"sDom": '<"table_top"fl<"clear">>,<"table_content"t>,<"table_bottom"p<"clear">>'
		});
		$("div.table_top select").addClass('tbl_length');	 
	}
	
	function ajaxloading(){
	
		var ajaximage="<img style='margin-top:25%' src='"+urljs+"data/img/loaders/ajax-loader.gif'/>";
	
		var height=$(document).height();
	
		var width=$(document).width();
	
		var obj=$(document.createElement('div')).attr("class","pacpop").css({"position":"absolute","top":"40%","left":"50%","width":"auto","height":"100px"});
	
		var objf=$(document.createElement('div')).attr('class','pacpopbac').css({'position':'absolute','top':'0px','left':'0px','opacity':'0.9','height':height,'width':width,'background':'#fff'});
	
		$("body").append(objf);
	
		$("body").append(obj);
	
		obj.html(ajaximage);		
	}
	
	function closeajax(){
	
		$(".pacpop").remove();
	
		$(".pacpopbac").remove();
	}
	
	function clearfields(){
	
		$(".clear_button").click(function(){
			
			$(".clear_fields").val("");
	
			$(".clear_check").removeAttr("checked");
	
			$(".clear_uploads").text("");
	
		});
	}
	
	//Admin Login
	/*jQuery.validator.addMethod("checkadmin", function(value, element) {
		b=true;
		if(value=="admin"){
			b=true;
		}else{
			b=value.length<6?false:true;
		}
		return this.optional(element)|| b;
	}, "Username should contain atleast 6 characters");*/
	
	$('#login_form').validate({
		errorClass: 'error',
		validClass: 'valid',
		rules: {
			username: { required: true/*, checkadmin: true */},
			password: { required: true/*, minlength: 6 */}
		},
		messages:{
			username: { required: "Please enter user name"/*,minlength: "Username should contain atleast 6 characters!!" */},
			password: { required: "Please enter Password"/*,minlength: "Password should contain atleast 6 characters!!"*/  }
		},	
		submitHandler: function(){
			
			var js=$('#login_form').serializeArray();
			$.post(url+"admin/login/auth",js,function(data){
				if(data.result>0){
					$("#login_res").html(data.view);
					window.location=url+"admin/dashboard";
				}else{
					$("#login_res").html(data.view);
					setTimeout(function(){
						$("#login_res").hide();
					},5000);
					$("#login_res").show();
				}
			},"json");
			return false;
		}
	});
	
	//Admin Forgot password
	$('#forgotpasswordform').validate({
		errorClass: 'error',
		validClass: 'valid',
		rules: {
		email: { required: true,email:true  }			
		},
		messages:{
			email: { required: "Please enter email",email:"Please enter a valid email" }			
		},	
		submitHandler: function(){
			var js={'email':$("[name=email]").val()}
			$.post(url+"admin/login/resetpwd",js,function(data){
				if(data.result>0){
					$("#forgot_res").html(data.view);
					setTimeout(function(){
						$("#forgot_res").hide();						
					},5000);
					$("#email").val("");					
				}else{
					$("#forgot_res").html(data.view);
					setTimeout(function(){
						$("#forgot_res").hide();						
					},5000);
					$("#email").val("");					
				}	
				$("#forgot_res").show();				
			},"json");		
		}
	});
	
	//User Login	
	$('#cp_login_form').validate({
		
		errorClass: 'error',
		validClass: 'valid',
		rules: {
			registrationNum: { required: true },
			password: { required: true }
		},
		messages:{
			registrationNum: { required: "Please enter registration no." },
			password: { required: "Please enter Password"/*,minlength: "Password should contain atleast 6 characters!!"*/  }
		},	
		submitHandler: function(){
			
			var js=$('#cp_login_form').serializeArray();
			
			$.post(url+"channelpartner/login/channelpartnerloginauth",js,function(data){
				
				if(data.result>0){
					
					$("#login_res").html(data.view);
					
					window.location=url+"admin/dashboard";
					
				}else{
					
					$("#login_res").html(data.view);
					
					setTimeout(function(){
						
						$("#login_res").hide();
						
					},5000);
					
					$("#login_res").show();
				}
			},"json");
			
			return false;
		}
	});
	
	//User Forgot password
	$('#userforgotpasswordform').validate({
		
		errorClass: 'error',
		validClass: 'valid',
		rules: {
			
			email: { required: true,email:true  }			
		},
		messages:{
			
			email: { required: "Please enter email",email:"Please enter a valid email" }			
		},	
		submitHandler: function(){
			
			var js={'email':$("[name=email]").val()}
			
			$.post(url+"channelpartner/login/resetpwd",js,function(data){
				
				if(data.result>0){
					
					$("#forgot_res").html(data.view);
					
					setTimeout(function(){
						
						$("#forgot_res").hide();
												
					},5000);
					
					$("#email").val("");					
				}else{
					
					$("#forgot_res").html(data.view);
					
					setTimeout(function(){
						
						$("#forgot_res").hide();	
											
					},5000);
					
					$("#email").val("");
										
				}	
				
				$("#forgot_res").show();	
							
			},"json");		
		}
	});
		
	//adminuser		
	if($("#adminuserstbl").length>0){
		getadminusers();
	}
	
	function getadminusers(){
		ajaxloading();
		$.post(url+"admin/adminusers/getadminusers",function(data){
			closeajax();
			$("#adminuserstbl").html(data.result);
			addadminuser();
			gettables();
			
		},"json");
	}
	
	function addadminuser(){
		$('.addadminuser').click(function(){
			var adminId=$(this).attr('data-id');
			ajaxloading();
			$.post(url+"admin/adminusers/addadminuser",{'id':adminId},function(data){
				closeajax();
				if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{								
					$.modal(data.result);
					submitadminuser();
				}			
				clearfields();
				
			},"json");
			
		});
		
		$('.status_admin_user').click(function(){
			var adminId=$(this).attr('data-id');
			var title=$(this).attr('title');
			ajaxloading();
			$.post(url+"admin/adminusers/adminstatus",{'id':adminId,'title':title},function(data){
				closeajax();
				if(data.result>0){
					getadminusers();
					$.noty({text: data.msg,layout: 'top',modal:true,type: 'success'});
				}else if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{
					$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
				}			
				clearfields();
				
			},"json");
		});
		
		$('.del_admin_user').click(function(){
			var adminId=$(this).attr('data-id');
			var title=$(this).attr('title');
			ajaxloading();
			
			var r=confirm("Are you sure ?");
			if (r==true)
			{
			  $.post(url+"admin/adminusers/deleteadminuser",{'id':adminId,'title':title},function(data){
				closeajax();
				if(data.result>0){
					getadminusers();
					$.noty({text: data.msg,layout: 'top',modal:true,type: 'success'});
				}else if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{
					$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
				}			
				clearfields();								
			  },"json");
			}else{
				closeajax();
			}
			
		});
	}
	
	function submitadminuser(){
		/*jQuery.validator.addMethod("checkadmin", function(value, element) {
			b=true;
			if(value=="admin"){
				b=true;
			}else{
				b=value.length<6?false:true;
			}
			return this.optional(element)|| b;
		}, "Username should contain atleast 6 characters");*/
		
		$('#addeditadminuserform').validate({
			errorClass: 'error',
			validClass: 'valid',
			rules: {
				firstName: { required: true },
				username: { required: true ,/*checkadmin: true,*/
					remote: {
						url: url+"admin/adminusers/checkadminusername",
						type: "post",
						data:{
							edit: function() { 
									return $("[name=username]").attr("data-edit");
								  }
							 }
						   }
					},
				email :{
					required:true,
					email:true,
					remote: {
					url: url+"admin/adminusers/checkadminemail",
					type: "post",
					data:{
						edit: function() { 
							return $("[name=email]").attr("data-edit");
							}
						}
					},
				},
				password: { required: true/*, minlength: 6*/ },
				confirm_password: { required: true, /*minlength: 6 ,*/equalTo:"[name=password]"},
				roleId:{required:true}
			},
			messages:{
				firstName: { required: "Please enter first name" },
				username: { required: "Please enter Admin User name", minlength: "Username should contain atleast 6 characters!!",remote: "The user already exists in the database!!.Please try another one." },
				email: { required: "Please enter Email", email:"Invalid email eg:- abc@xyz.com",remote: "The email already exists !!!.Please try another one." },
				password: { required: "Please enter Password"/*,minlength: "Password should contain atleast 6 characters!!"  */},
				confirm_password: { required: "Please confirm the Password",/*minlength: "Password should contain atleast 6 characters!!",*/equalTo:"Please enter the same password to confirm!!." },
				roleId:{required:"Please select role"}
			},	
			submitHandler: function(){
				//ajaxloading();
				$('.btndisable').prop("disabled",true);
				
				var admin=$('#addeditadminuserform').serializeArray();
				
				$.post(url+"admin/adminusers/saveadminuser",admin,function(data){
					
					//closeajax();
					if(data.result>0){
						
						getadminusers();
						$.noty({text: 'Saved Successfully !!!',layout: 'top',modal:true,type: 'success'});
											
					}else{
						
						$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
						
					}
					$(".simplemodal-close").trigger("click");
					
				},"json");
			
			}
		});
	}
	
	//role		
	if($("#adminrolestbl").length>0){
		
		getroles();
	}
	
	function getroles(){
		
		ajaxloading();
		
		$.post(url+"admin/roles/getroles",function(data){
			
			closeajax();
			
			$("#adminrolestbl").html(data.result);
			addrole();
			gettables();
			
		},"json");
	}
	
	function addrole(){
		
		$('.addadminrole').click(function(){
			
			ajaxloading();
			var roleId=$(this).attr('data-id');
			
			$.post("roles/addrole",{'id':roleId},function(data){
				
				closeajax();
				if(data.result==-1){
					
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
					
				}else{	
					$.modal(data.result);				
				}
				
				clearfields();
				submitrole();
				
			},"json");			
		});
		
		$('.roledelete').click(function(){
			
			var adminId=$(this).attr('data-id');
			var title=$(this).attr('title');
			ajaxloading();
			
			var r=confirm("Are you sure ?");
			if (r==true)
			{
			  $.post(url+"admin/roles/delrole",{'id':adminId,'title':title},function(data){
				  
				closeajax();
				if(data.result>0){
					
					getroles();
					$.noty({text: data.msg,layout: 'top',modal:true,type: 'success'});
					
				}else if(data.result==-1){
					
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
					
				}else{
					
					$.noty({text: 'Unable to Save !!!Error occured !!!',layout: 'top',modal:true,type: 'error'});
					
				}			
				clearfields();	
											
			  },"json");
			}else{
				
				closeajax();
				
			}			
		});
	}
	
	function submitrole(){
		
		$('#saverolesform').validate({
			errorClass: 'error',
			validClass: 'valid',
			rules: {
				roleName: { required: true,
					remote: {
						url: url+"admin/roles/checkrolename",
						type: "post",
						data:{
							edit: function() { 							
									return $("[name=roleName]").attr("data-edit");
								}						
							}
						}
					}
			},
			messages:{
				roleName: { required: "Please enter Role name",remote:"Role Name already exists!!!" }			
			},	
			submitHandler: function(){
				var roleId=$("#roleId").val();
				var admin=$('#saverolesform').serializeArray();
				
				$.post(url+"admin/roles/saverole",admin,function(data){
					if(data.result>0){
						getroles();
						$.noty({text: 'Saved Successfully!!!',layout: 'top',modal:true,type: 'success'});
					}
					else{
						$.noty({text: 'Unable to Submit!!Error occured!',layout: 'top',modal:true,type: 'error'});
					}
					$(".simplemodal-close").trigger("click");
				},"json");				
			
			}
		});
	}	
	
	//product		
	if($("#producttbl").length>0){
		getproduct();
	}
	
	function getproduct(){
		ajaxloading();
		$.post(url+"admin/product/getproduct",function(data){
			closeajax();
			$("#producttbl").html(data.result);
			addproduct();
			gettables();
			
		},"json");
	}
	
	function addproduct(){
		
		$('.addproduct').click(function(){
			var productId=$(this).attr('data-id');
			ajaxloading();
			$.post(url+"admin/product/addproduct",{'id':productId},function(data){
				closeajax();
				if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{								
					$.modal(data.result);
					submitproduct();
				}			
				clearfields();
				
			},"json");
			
		});
		
		$('.status_product').click(function(){
			var productId=$(this).attr('data-id');
			var title=$(this).attr('title');
			ajaxloading();
			$.post(url+"admin/product/productstatus",{'id':productId,'title':title},function(data){
				closeajax();
				if(data.result>0){
					getproduct();
					$.noty({text: data.msg,layout: 'top',modal:true,type: 'success'});
				}else if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{
					$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
				}			
				clearfields();
				
			},"json");
		});
		
		$('.del_product').click(function(){
			var productId=$(this).attr('data-id');
			var title=$(this).attr('title');
			ajaxloading();
			
			var r=confirm("Are you sure ?");
			if (r==true)
			{
			  $.post(url+"admin/product/deleteproduct",{'id':productId,'title':title},function(data){
				closeajax();
				if(data.result>0){
					getproduct();
					$.noty({text: data.msg,layout: 'top',modal:true,type: 'success'});
				}else if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{
					$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
				}			
				clearfields();								
			  },"json");
			}else{
				closeajax();
			}
			
		});
	}
	
	function submitproduct(){
		
		longDesc = new nicEditor({fullPanel : true,uploadURI:urljs+'data/js/nicUpload.php'}).panelInstance('longDesc');
				
		$('#addeditproductform').validate({
			errorClass: 'error',
			validClass: 'valid',
			rules: {
				productName: { required: true },
				shortDesc: { required: true },
				longDesc: { required: true }
			},
			messages:{
				productName: { required: "Please enter Product Name" },
				shortDesc: { required: "Please enter Short Description" },
				longDesc: { required: "Please enter Long Description" }
			},	
			submitHandler: function(){
				//ajaxloading();
				$('.btndisable').prop("disabled",true);
				
				var lead=$('#addeditproductform').serializeArray();
				
				$.post(url+"admin/product/saveproduct",lead,function(data){
					
					//closeajax();
					if(data.result>0){
						
						getproduct();
						$.noty({text: 'Saved Successfully !!!',layout: 'top',modal:true,type: 'success'});
											
					}else{
						
						$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
						
					}
					$(".simplemodal-close").trigger("click");
					
				},"json");
			
			}
		});
	}
	
	//testimonial		
	if($("#testimonialtbl").length>0){
		gettestimonial();
	}
	
	function gettestimonial(){
		ajaxloading();
		$.post(url+"admin/testimonial/gettestimonial",function(data){
			closeajax();
			$("#testimonialtbl").html(data.result);
			addtestimonial();
			gettables();
			
		},"json");
	}
	
	function addtestimonial(){
		
		$('.addtestimonial').click(function(){
			var testimonialId=$(this).attr('data-id');
			ajaxloading();
			$.post(url+"admin/testimonial/addtestimonial",{'id':testimonialId},function(data){
				closeajax();
				if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{								
					$.modal(data.result);
					submittestimonial();
				}			
				clearfields();
				
			},"json");
			
		});
		
		$('.status_testimonial').click(function(){
			var testimonialId=$(this).attr('data-id');
			var title=$(this).attr('title');
			ajaxloading();
			$.post(url+"admin/testimonial/testimonialstatus",{'id':testimonialId,'title':title},function(data){
				closeajax();
				if(data.result>0){
					gettestimonial();
					$.noty({text: data.msg,layout: 'top',modal:true,type: 'success'});
				}else if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{
					$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
				}			
				clearfields();
				
			},"json");
		});
		
		$('.del_testimonial').click(function(){
			var testimonialId=$(this).attr('data-id');
			var title=$(this).attr('title');
			ajaxloading();
			
			var r=confirm("Are you sure ?");
			if (r==true)
			{
			  $.post(url+"admin/testimonial/deletetestimonial",{'id':testimonialId,'title':title},function(data){
				closeajax();
				if(data.result>0){
					gettestimonial();
					$.noty({text: data.msg,layout: 'top',modal:true,type: 'success'});
				}else if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{
					$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
				}			
				clearfields();								
			  },"json");
			}else{
				closeajax();
			}
			
		});
	}
	
	function submittestimonial(){
						
		$('#addedittestimonialform').validate({
			errorClass: 'error',
			validClass: 'valid',
			rules: {
				comments: { required: true },
				commentedBy: { required: true }
			},
			messages:{
				comments: { required: "Please enter Testimonial" },
				commentedBy: { required: "Please enter Testimonial Given By" }
			},	
			submitHandler: function(){
				//ajaxloading();
				$('.btndisable').prop("disabled",true);
				
				var lead=$('#addedittestimonialform').serializeArray();
				
				$.post(url+"admin/testimonial/savetestimonial",lead,function(data){
					
					//closeajax();
					if(data.result>0){
						
						gettestimonial();
						$.noty({text: 'Saved Successfully !!!',layout: 'top',modal:true,type: 'success'});
											
					}else{
						
						$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
						
					}
					$(".simplemodal-close").trigger("click");
					
				},"json");
			
			}
		});
	}
	
	//career		
	if($("#careertbl").length>0){
		getcareer();
	}
	
	function getcareer(){
		ajaxloading();
		$.post(url+"admin/career/getcareer",function(data){
			closeajax();
			$("#careertbl").html(data.result);
			addcareer();
			gettables();
			
		},"json");
	}
	
	function addcareer(){
		
		$('.addcareer').click(function(){
			var careerId=$(this).attr('data-id');
			ajaxloading();
			$.post(url+"admin/career/addcareer",{'id':careerId},function(data){
				closeajax();
				if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{								
					$.modal(data.result);
					submitcareer();
				}			
				clearfields();
				
			},"json");
			
		});
		
		$('.status_career').click(function(){
			var careerId=$(this).attr('data-id');
			var title=$(this).attr('title');
			ajaxloading();
			$.post(url+"admin/career/careerstatus",{'id':careerId,'title':title},function(data){
				closeajax();
				if(data.result>0){
					getcareer();
					$.noty({text: data.msg,layout: 'top',modal:true,type: 'success'});
				}else if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{
					$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
				}			
				clearfields();
				
			},"json");
		});
		
		$('.del_career').click(function(){
			var careerId=$(this).attr('data-id');
			var title=$(this).attr('title');
			ajaxloading();
			
			var r=confirm("Are you sure ?");
			if (r==true)
			{
			  $.post(url+"admin/career/deletecareer",{'id':careerId,'title':title},function(data){
				closeajax();
				if(data.result>0){
					getcareer();
					$.noty({text: data.msg,layout: 'top',modal:true,type: 'success'});
				}else if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{
					$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
				}			
				clearfields();								
			  },"json");
			}else{
				closeajax();
			}
			
		});
	}
	
	function submitcareer(){
	
		shortjobDesc = new nicEditor({fullPanel : true,uploadURI:urljs+'data/js/nicUpload.php'}).panelInstance('shortjobDesc');
		longjobDesc = new nicEditor({fullPanel : true,uploadURI:urljs+'data/js/nicUpload.php'}).panelInstance('longjobDesc');
						
		$('#addeditcareerform').validate({
			errorClass: 'error',
			validClass: 'valid',
			rules: {
				jobName: { required: true },
				shortjobDesc: { required: true }
			},
			messages:{
				jobName: { required: "Please enter Job Name" },
				shortjobDesc: { required: "Please enter career Given By" }
			},	
			submitHandler: function(){
				//ajaxloading();
				$('.btndisable').prop("disabled",true);
				
				var lead=$('#addeditcareerform').serializeArray();
				
				$.post(url+"admin/career/savecareer",lead,function(data){
					
					//closeajax();
					if(data.result>0){
						
						getcareer();
						$.noty({text: 'Saved Successfully !!!',layout: 'top',modal:true,type: 'success'});
											
					}else{
						
						$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
						
					}
					$(".simplemodal-close").trigger("click");
					
				},"json");
			
			}
		});
	}
	
	//events		
	if($("#eventstbl").length>0){
		getevents();
	}
	
	function getevents(){
		ajaxloading();
		$.post(url+"admin/events/getevents",function(data){
			closeajax();
			$("#eventstbl").html(data.result);
			addevents();
			gettables();
			
		},"json");
	}
	
	function addevents(){
		
		$('.addevents').click(function(){
			var eventsId=$(this).attr('data-id');
			ajaxloading();
			$.post(url+"admin/events/addevents",{'id':eventsId},function(data){
				closeajax();
				if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{								
					$.modal(data.result);
					submitevents();
				}			
				clearfields();
				
			},"json");
			
		});
		
		$('.status_events').click(function(){
			var eventsId=$(this).attr('data-id');
			var title=$(this).attr('title');
			ajaxloading();
			$.post(url+"admin/events/eventsstatus",{'id':eventsId,'title':title},function(data){
				closeajax();
				if(data.result>0){
					getevents();
					$.noty({text: data.msg,layout: 'top',modal:true,type: 'success'});
				}else if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{
					$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
				}			
				clearfields();
				
			},"json");
		});
		
		$('.del_events').click(function(){
			var eventsId=$(this).attr('data-id');
			var title=$(this).attr('title');
			ajaxloading();
			
			var r=confirm("Are you sure ?");
			if (r==true)
			{
			  $.post(url+"admin/events/deleteevents",{'id':eventsId,'title':title},function(data){
				closeajax();
				if(data.result>0){
					getevents();
					$.noty({text: data.msg,layout: 'top',modal:true,type: 'success'});
				}else if(data.result==-1){
					$.noty({text: 'You don\'t have permission !!!',layout: 'top',modal:true,type: 'error'});
				}else{
					$.noty({text: 'Unable to Save !!! Error occured !!!',layout: 'top',modal:true,type: 'error'});
				}			
				clearfields();								
			  },"json");
			}else{
				closeajax();
			}
			
		});
	}
	
	function submitevents(){

		eventDesciption = new nicEditor({fullPanel : true,uploadURI:urljs+'data/js/nicUpload.php'}).panelInstance('eventDesciption');
		
		var newseventsfiles;
	
		$('#bannerimages').on('change', prepareAgreementUpload);
	
		function prepareAgreementUpload(event)
		{
			newseventsfiles = event.target.files;
		}
	
		$('#addediteventsform').validate({		
	
				errorClass: 'error',
	
				validClass: 'valid',
	
				rules: {
	
					eventName: { required: true }				
	
				},
	
				messages:{
	
					eventName: { required: "Please enter title"}
	
				},	
	
				submitHandler: function(){
	
					var data = new FormData();
	
					if(typeof newseventsfiles != 'undefined'){
	
						$.each(newseventsfiles, function(key, value)
	
						{
							data.append("key[]", value);
	
						});
	
					}				
	
					data.append("eventsId", $("#eventsId").val());
	
					data.append("eventName", $("#eventName").val());	
	
					data.append("eventDesciption", $("#eventDesciption").val());				
	
					$.ajax({
						url: url+"admin/events/saveevents",
	
						type: 'POST',
	
						data: data,
	
						cache: false,
	
						dataType: 'json',
	
						processData: false, // Don't process the files
	
						contentType: false, // Set content type to false as jQuery will tell the server its a query string request
	
						success: function(data, textStatus, jqXHR)
						{
							if(typeof data.error === 'undefined')
	
							{
								// Success so call function to process the form
	
								//submitForm(event, data);
	
								if(data.result>0){
									
									//$("#rent_data_tbl").dataTable().fnDraw();
									getevents();
									
									$.noty({text: 'Saved Successfully!!!',layout: 'top',modal:true,type: 'success'});				
	
								}
	
								else if(data.result==0){
									$.noty({text: 'Unable to Save!!!Error occured!!!',layout: 'top',modal:true,type: 'error'});
								}
								$(".simplemodal-close").trigger("click");
	
							}
	
							else
	
							{
								// Handle errors here
								console.log('ERRORS: ' + data.error);
							}
	
						},
	
						error: function(jqXHR, textStatus, errorThrown)
	
						{
							// Handle errors here
	
							console.log('ERRORS: ' + textStatus);
	
							// STOP LOADING SPINNER
	
						}
	
					});		
	
				}
	
			});	
	}
	
});		//End