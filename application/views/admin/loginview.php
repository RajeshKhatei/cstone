<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Cstone | Admin | Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]>
    <script src="js/flot/excanvas.min.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/css/cloud-admin.css" >
	
	<link href="<?php echo base_url()?>data/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />-->
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/uniform/css/uniform.default.min.css" />
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/css/animatecss/animate.min.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body class="login">	
	<!-- PAGE -->
	<section id="page">
			<!-- HEADER -->
			<header>
				<!-- NAV-BAR -->
				<div class="container">
					<div class="row">
						<!--<div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
							<div id="logo">
								<a href="javascript:void(0);"><img src="<?php echo base_url()?>data/img/logo/logo.png" height="40" alt="Provident" /></a>
							</div>
						</div>-->
					</div>
				</div>
				<!--/NAV-BAR -->
			</header>
			<!--/HEADER -->
			<!-- LOGIN -->
			<section id="login_bg" class="visible">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
							<div class="login-box">
								<h2 class="bigintro">Admin Login</h2>                                								
                                <span id="login_res"></span>                                
								<form id="login_form" method="post">
								  <div class="form-group">
									<label for="userName">Username</label>
									<i class="fa fa-user"></i>
									<input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off">
								  </div>
								  <div class="form-group"> 
									<label for="password">Password</label>
									<i class="fa fa-lock"></i>
									<input type="password" class="form-control" name="password" placeholder="Password"  id="password">
								  </div>
								  <div class="form-actions">
									<!--<label class="checkbox"> <input type="checkbox" class="uniform" value=""> Remember me</label>-->
									<button type="submit" class="btn btn-success">Login</button>
								  </div>
								</form>
								
								<div class="login-helpers">
									<!--<a href="#" onclick="swapScreen('forgot');return false;">Forgot Password?</a>--> <br>									
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<!-- FORGOT PASSWORD -->
			<section id="forgot">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="login-box-plain">
								<h2 class="bigintro">Reset Password</h2>
								<!--<div class="divide-40"></div>-->
                                <span id="forgot_res"></span>
								<form id="forgotpasswordform" action="" method="post">
								  <div class="form-group">
									<label for="exampleInputEmail1">Enter your Email address</label>
									<i class="fa fa-envelope1"></i>
									<input type="text" class="form-control" name="email" id="email" value="" placeholder="Email">
								  </div>
								  <div class="form-actions">
									<button type="submit" class="btn btn-info">Send Me Reset Instructions</button>
								  </div>
								</form>
								<div class="login-helpers">
									<a href="#" onclick="swapScreen('login_bg');return false;">Back to Login</a> <br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- FORGOT PASSWORD -->
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- JQUERY -->    
	<script src="<?php echo base_url()?>data/js/jquery/jquery-2.0.3.min.js"></script>
    <script src="<?php echo base_url();?>data/js/jquery-validate/jquery.validate.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url()?>data/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
    <!-- Cookie -->
    <script type="text/javascript" src="<?php echo base_url()?>data/js/jQuery-Cookie/jquery.cookie.min.js"></script> 
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url()?>data/bootstrap-dist/js/bootstrap.min.js"></script>	
	<!-- UNIFORM -->
	<script type="text/javascript" src="<?php echo base_url()?>data/js/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>data/js/backstretch/jquery.backstretch.min.js"></script>
    <!-- USER DEFINE -->
    <script type="text/javascript">
		var urljs="<?php echo base_url()?>";
		var url="<?php echo site_url()?>"; 
	</script> 
	<script src="<?php echo base_url();?>data/js/admin.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo base_url()?>data/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("login_bg"); //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<script type="text/javascript">
		function swapScreen(id) {
			jQuery('.visible').removeClass('visible animated fadeInUp');
			jQuery('#'+id).addClass('visible animated fadeInUp');
		}
	</script>
</body>
</html>