<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Admin | <?php echo $title?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">

<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/css/cloud-admin.css" >
<link rel="stylesheet" type="text/css"  href="<?php echo base_url()?>data/css/themes/default.css" id="skin-switcher" >
<link rel="stylesheet" type="text/css"  href="<?php echo base_url()?>data/css/responsive.css" >
<link rel="stylesheet" type="text/css"  href="<?php echo base_url()?>data/css/styles.css" >
<link rel="stylesheet" type="text/css"  href="<?php echo base_url()?>data/css/sprite.css" >
<!-- TYPEAHEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/typeahead/typeahea.css" />
<!-- SELECT2 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/select2/select2.min.css" />
<link rel="stylesheet" type="text/css"  href="<?php echo base_url()?>data/css/themes.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/font-awesome/css/font-awesome.min.css">
<!-- FULL CALENDAR -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/fullcalendar/fullcalendar.min.css" />
<!-- UNIFORM -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/uniform/css/uniform.default.min.css" />
<link href="<?php echo base_url();?>data/css/ui-elements.css" rel="stylesheet" type="text/css">
<!-- BOOTSTRAP SWITCH -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>data/js/bootstrap-switch/bootstrap-switch.min.css" />
<!-- JQUERY UI-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.min.css" />
<!--<link rel="stylesheet" type="text/css"  href="<?php echo base_url()?>data/css/data-table.css" >-->
<!-- FUELUX TREE -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/fuelux-tree/fuelux.min.css" />
<!-- DATA TABLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<link rel="stylesheet" type="text/css"  href="<?php echo base_url()?>data/css/datepicker.css" >
<!-- plupload -->
<link rel="stylesheet" href="<?php echo base_url()?>data/js/plupload/js/jquery.plupload.queue/css/plupload-gebo.css" />
<!-- ANIMATE -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/css/animatecss/animate.min.css" />
<!-- COLORBOX -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/colorbox/colorbox.min.css" />
<!-- FONTS -->
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<!-- Video -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/css/videolightbox.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/css/overlay-minimal.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/css/magnific-popup.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/css/jquery.simplyscroll.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/css/slider-style.css"/>
</head>

<body>
<!-- HEADER -->

<header class="navbar clearfix" id="header">
  <div class="container">
    <div class="navbar-brand">       
      <!-- COMPANY LOGO -->       
      <a href=""> <img src="<?php echo base_url()?>data/img/logo/logo.png" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120"> </a>       
      <!-- /COMPANY LOGO --> 
      
      <!-- TEAM STATUS FOR MOBILE -->      
      <div class="visible-xs"> <a href="#" class="team-status-toggle switcher btn dropdown-toggle"> <i class="fa fa-users"></i> </a> </div>      
      <!-- /TEAM STATUS FOR MOBILE -->       
      <!-- SIDEBAR COLLAPSE -->      
      <div id="sidebar-collapse" class="sidebar-collapse btn"> 
      	<i class="fa fa-bars" data-icon1="fa fa-bars" data-icon2="fa fa-bars" ></i> 
      </div>      
      <!-- /SIDEBAR COLLAPSE -->       
    </div>
    
    <!-- BEGIN TOP NAVIGATION MENU -->    
    <ul class="nav navbar-nav pull-right">      
      <!-- BEGIN USER LOGIN DROPDOWN -->      
      <li class="dropdown user" id="header-user"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img alt="" src="<?php echo base_url()?>data/img/avatars/user.png" /> <span class="username"><?php echo $this->session->userdata('cstone_session_name');?></span> <i class="fa fa-angle-down"></i> </a>
        <ul class="dropdown-menu">
          <!--<li><a href="javascript:void(0);" id="myprofile"><i class="fa fa-user"></i> My Profile</a></li>-->
          <li><a href="logout" id="logout"><i class="fa fa-power-off"></i> Log Out</a></li>
        </ul>
      </li>      
      <!-- END USER LOGIN DROPDOWN -->      
    </ul>    
    <!-- END TOP NAVIGATION MENU -->     
  </div>
</header>
<!--/HEADER --> 

<!-- PAGE -->
<section id="page">   
  <!-- SIDEBAR -->  
<?php 				

	echo $this->load->view("admin/sidemenuview","",true);

?>  
  <!-- /SIDEBAR -->
  
  <div id="main-content">
  <!--<div id="main-content">-->
    <div class="container">
      <div class="row">
        <div id="content" class="col-lg-12">           
          <!-- PAGE HEADER-->          
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">                 
                <!-- BREADCRUMBS -->                
                <ul class="breadcrumb">
                  <li> <i class="fa fa-home"></i> <a href="">Home</a> </li>
                  <li><?php echo $title?></li>
                </ul>                
                <!-- /BREADCRUMBS -->
                
              </div>              
              <!--USER SECTION-->              
              <?php 
				echo $content;	
			 ?>              
              <!--/USER SECTION-->               
            </div>
          </div>          
          <!-- /PAGE HEADER -->           
        </div>
      </div>
    </div>
  </div>
</section>
<!--/PAGE --> 

<!-- JAVASCRIPTS --> 

<!-- Placed at the end of the document so the pages load faster --> 

<!-- JQUERY --> 

<script src="<?php echo base_url()?>data/js/jquery/jquery-2.0.3.min.js"></script> 

<script type="text/javascript" src="<?php echo base_url()?>data/js/swfobject.js"></script>
<script src="<?php echo base_url()?>data/js/jquery.tools.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>data/js/videolightbox.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url()?>data/js/bootstrap-datepicker.js"></script> 
<script src="<?php echo base_url();?>data/js/jquery-validate/jquery.validate.js"></script> 
<!-- JQUERY UI--> 
<script src="<?php echo base_url()?>data/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script> 
<!-- BOOTSTRAP --> 
<script src="<?php echo base_url()?>data/bootstrap-dist/js/bootstrap.min.js"></script> 
<script type="text/javascript">
var urljs="<?php echo base_url()?>";
var url="<?php echo site_url()?>"; 
</script> 
<script src="<?php echo base_url();?>data/js/admin.js"></script> 
<script src="<?php echo base_url();?>data/js/jQuery.print.js"></script> 
<script src="<?php echo base_url();?>data/js/jquery.noty.js"></script> 
<script src="<?php echo base_url();?>data/js/jquery.simplemodal-1.4.4.js"></script> 
<!-- DATE RANGE PICKER --> 
<script src="<?php echo base_url();?>data/js/bootstrap-daterangepicker/moment.min.js"></script> 
<script src="<?php echo base_url();?>data/js/bootstrap-daterangepicker/daterangepicker.min.js"></script> 
<!-- SLIMSCROLL-->  
<script type="text/javascript" src="<?php echo base_url()?>data/js/jquery.simplyscroll.js"></script>
<!-- BLOCK UI -->
<script type="text/javascript" src="<?php echo base_url();?>data/js/jQuery-BlockUI/jquery.blockUI.min.js"></script> 
<!-- FUELUX TREE -->
<script type="text/javascript" src="<?php echo base_url()?>data/js/fuelux-tree/fuelux.tree.min.js"></script>
<!-- DATA TABLES --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/datatables/media/js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/datatables/media/assets/js/datatables.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script> 
<!-- TYPEHEAD --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/typeahead/typeahead.min.js"></script> 
<!-- COUNTABLE --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/countable/jquery.simplyCountable.min.js"></script>
<!-- INPUT MASK --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script> 
<!-- FILE UPLOAD --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/bootstrap-fileupload/bootstrap-fileupload.min.js"></script> 
<!-- SELECT2 --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/select2/select2.min.js"></script> 
<!-- UNIFORM --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/uniform/jquery.uniform.min.js"></script> 
<!-- TIMEAGO --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/timeago/jquery.timeago.min.js"></script> 
<!-- BOOTSTRAP SWITCH --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/bootstrap-switch/bootstrap-switch.min.js"></script> 
<!-- CKEDITOR  
<script type="text/javascript" src="<?php echo base_url()?>data/js/ckeditor/ckeditor.js"></script>--> 
<!-- NICEDITOR-->
<script type="text/javascript" src="<?php echo base_url()?>data/js/nicEdit.js"></script>
<!-- COOKIE --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/jQuery-Cookie/jquery.cookie.min.js"></script> 
<!-- AUTOSIZE --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/autosize/jquery.autosize.min.js"></script> 
<!-- RATY --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/jquery-raty/jquery.raty.min.js"></script> 
<!-- FULL CALENDAR --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/fullcalendar/fullcalendar.min.js"></script> 
<!-- plupload -->
<script type="text/javascript" src="<?php echo base_url()?>data/js/plupload/js/plupload.full.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>data/js/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>
<!-- ISOTOPE -->
<script type="text/javascript" src="<?php echo base_url()?>data/js/isotope/jquery.isotope.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>data/js/isotope/imagesloaded.pkgd.min.js"></script>
<!-- COLORBOX -->
<script type="text/javascript" src="<?php echo base_url()?>data/js/colorbox/jquery.colorbox.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>data/js/jquery.magnific-popup.js"></script>
<script src="<?php echo base_url()?>data/js/swfobject.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>data/js/jquery.tools.min.js" type="text/javascript"></script>
<!-- end --> 
<!-- CUSTOM SCRIPT --> 
<script src="<?php echo base_url()?>data/js/script.js"></script> 
<script>
	jQuery(document).ready(function() {
		App.setPage("elements");
		App.setPage("gallery");
		App.init();
	});
</script> 
<!-- /JAVASCRIPTS -->
</body>
</html>