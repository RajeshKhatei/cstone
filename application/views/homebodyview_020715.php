<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>

<!-- Basic -->
<meta charset="utf-8">
<title>Cstone</title>
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Porto - Responsive HTML5 Template">
<meta name="author" content="One Touch">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Favcon -->
<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/x-icon"/>

<!-- Web Fonts  -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900,200,100' rel='stylesheet' type='text/css'>

<!-- Vendor CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/YTPlayer.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/tweet-carousel.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl/owl.theme.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl/owl.transitions.css">

<!-- Theme CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/color2.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css">

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/magnific-popup.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.mCustomScrollbar.css">

<!-- Head Libs -->
<script src="<?php echo base_url();?>assets/js/vendor/modernizr.js"></script>

<!--[if IE]>
            <link rel="stylesheet" href="css/ie.css">
    <![endif]-->

<!--[if lt IE 9]>
        <script src="js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
                    <script src="js/vendor/excanvas/excanvas.js"></script>
    <![endif]-->

<!-- Javascript Page Loader -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/vendor/pace.min.js" data-pace-options='{ "ajax": false }'></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/preloading.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/validate.js"></script>-->
</head>
<body data-spy="scroll" data-target="#main_menu2">
<!-- Your Body Content Start From Here -->
<?php echo $content;?>
<!--  Your Body Content End Here --> 

<!-- Vendor --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/vendor/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/vendor/bootstrapValidator.min.js"></script> 

<!-- helpful plugin --> 
<script src="<?php echo base_url();?>assets/js/vendor/wow.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/vendor/mixitup.js"></script> 
<script src="<?php echo base_url();?>assets/js/vendor/jflickrfeed.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/vendor/jquery.appear.js"></script> 
<script src="<?php echo base_url();?>assets/js/vendor/jquery.mb.YTPlayer.js"></script> 
<script src="<?php echo base_url();?>assets/js/tweet/carousel.js"></script> 
<script src="<?php echo base_url();?>assets/js/owl.carousel.js"></script> 
 

<!-- Theme Initialization Files --> 
<script src="<?php echo base_url();?>assets/js/plugins.js"></script> 

<!-- Theme Need Files --> 
<script src="<?php echo base_url();?>assets/js/main.js"></script> 

<script>
$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      autoPlay: 3000, //Set AutoPlay to 3 seconds
 
      items : 6,
      itemsDesktop : [1199,6],
      itemsDesktopSmall : [979,4]
 
  });
 
});
		 
</script> 
<script src="<?php echo base_url();?>assets/js/jquery.mCustomScrollbar.js"></script> 
<script src="<?php echo base_url();?>assets/js/jquery.mousewheel.js"></script> 
<script src="<?php echo base_url();?>assets/js/jquery.mousewheel-3.0.6.js"></script> 
<script>
    (function($){
        $(window).load(function(){
            $(".scroll").mCustomScrollbar();
			theme:"dark";
        });
    })(jQuery);
</script>
<script src="<?php echo base_url();?>assets/js/jquery.magnific-popup.js"></script> 
<script>
	$('.popup-link').magnificPopup({
	  type:'inline',
	  midClick: true 
	});
</script>
<script type="text/javascript" src="<?php echo base_url();?>data/js/jquery-validate/jquery.validate.js"></script> 
<script type="text/javascript">
	var urljs="<?php echo base_url()?>";
	var url="<?php echo site_url()?>";
</script> 
<script>
/*function ajaxloading(){
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
}*/

//Contact Info
$('#contactformsubmit').validate({
	errorClass: 'error',
	validClass: 'valid',
	rules: {
		name: { required: true},
		email: { required: true, email: true},	
		phone: { required: true,number: true, minlength: 10, maxlength: 10},		
		message: { required: true}
	},
	messages:{
		name: { required: "Please enter Name"},
		email: { required: "Please enter Email Id"},	
		phone: { required: "Please enter Phone No."},			
		message: { required: "Please enter Message"}
	},	
	submitHandler: function(){
		//ajaxloading();
		
		$("#contact_res").html('<div class="alert alert-success"><button class="close" type="button" data-dismiss="alert">×</button><strong>Sending Mail ...</strong></div>');
		
		
		$('#Submit2').prop("disabled",true);			
		var js=$('#contactformsubmit').serializeArray(); 				
		$.post(url+"home/sendcontactinfo",js,function(data){
			//closeajax()
			if(data.result>0){
				$("#contact_res").html(data.view);
				setTimeout(function(){
					$("#contact_res").hide();
					location.reload();
				},5000);
			}else{
				$("#contact_res").html(data.view);
				setTimeout(function(){
					$("#contact_res").hide();
					location.reload();
				},5000);
			}
			$("#contact_res").show();
		},"json");
		return false;
	}
});	

//Career Info
$('#careerformsubmit').validate({
	errorClass: 'error',
	validClass: 'valid',
	rules: {
		careername: { required: true},
		careeremail: { required: true, email: true},			
		careerphone: { required: true, number: true, minlength: 10, maxlength: 10},
		careerjob: { required: true},
		careerresume: { required: true}
	},
	messages:{
		careername: { required: "Please enter Name"},
		careeremail: { required: "Please enter Email Id"},			
		careerphone: { required: "Please enter Phone No."},			
		careerjob: { required: "Please enter Job name"},			
		careerresume: { required: "Please upload resume"}
	},	
	submitHandler: function(){	
		$("#career_res").html('<div class="alert alert-success"><button class="close" type="button" data-dismiss="alert">×</button><strong>Sending Mail ...</strong></div>');
					
		var form = new FormData($('#careerformsubmit')[0]);
		 $.ajax({
				url: url+"home/sendcareerinfo",
				type: 'POST',
				data:form,						
				dataType: "json",             
				cache: false,
				contentType: false, //must, tell jQuery not to process the data
				processData: false, //must, tell jQuery not to set contentType
				success: function(data) {
					if(data.result>0){
						$("#career_res").html(data.view);
						setTimeout(function(){
							$("#career_res").hide();
							location.reload();
						},5000);
					}
					else{
						$("#contact_res").html(data.view);
						setTimeout(function(){
							$("#career_res").hide();
							location.reload();
						},5000);
					}
					$("#career_res").show();
				}
		});	
	}
	/*submitHandler: function(){
		
		$("#career_res").html('<div class="alert alert-success"><button class="close" type="button" data-dismiss="alert">×</button><strong>Sending Mail ...</strong></div>');
		
		
		$('#Submit1').prop("disabled",true);			
		var js=$('#careerformsubmit').serializeArray(); 				
		$.post(url+"home/sendcontactinfo",js,function(data){
			//closeajax()
			if(data.result>0){
				$("#career_res").html(data.view);
				setTimeout(function(){
					$("#career_res").hide();
					location.reload();
				},5000);
			}else{
				$("#contact_res").html(data.view);
				setTimeout(function(){
					$("#career_res").hide();
					location.reload();
				},5000);
			}
			$("#career_res").show();
		},"json");
		return false;
	}*/
});	
</script>


</body>
</html>