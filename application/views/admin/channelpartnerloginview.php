<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Provident | Channel Partner | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/css/cloud-admin.css" >
<link href="<?php echo base_url()?>data/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- DATE RANGE PICKER -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" type="text/css"  href="<?php echo base_url()?>data/css/datepicker.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>data/js/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.min.css" />
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
        <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
          <div id="logo"> <a href="javascript:void(0);"><img src="<?php echo base_url()?>data/img/logo/logo.png" height="40" alt="Provident" /></a> </div>
        </div>
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
            <h2 class="bigintro">Channel Partner Sign In</h2>
            <span id="login_res"></span>
            <form role="form" id="cp_login_form" method="post">
              <div class="form-group">
                <label for="Registration">Registration No. *</label>
                <i class="fa fa-user"></i>
                <input type="text" class="form-control" name="registrationNum" id="registrationNum" placeholder="Registration No.">
              </div>
              <div class="form-group">
                <label for="Password">Password *</label>
                <i class="fa fa-lock"></i>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              </div>
              <div>
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </form>
            <div class="login-helpers"> <a href="#" onclick="swapScreen('forgot_bg');return false;">Forgot Password?</a> <br>
              Don't have an account with us? <a href="#" onclick="swapScreen('register_bg');return false;">Register
              now!</a> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/LOGIN --> 
  <!-- REGISTER -->
  <section id="register_bg" class="font-400">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
          <div class="login-box login-box-own">
            <h2 class="bigintro">Channel Partner Registration</h2>
            <div class="divide-40"></div>
            <!--<div class="form-group col-xs-12">
                <div class="col-xs-6 left">
                </div>
                <div class="col-xs-6 right">
                    <img src="<?php echo base_url();?>data/img/icon-print.png" id="print"/>
                </div>
            </div>-->
            <form id="regchannelpartnerprofileform" class="form_container left_label" method="post" role="form">
             <div id="msg"></div>
             
              <div class="form-group col-xs-12">
                <div class="col-xs-6 left">
                  <label >Company Name *</label>
                  <input type="text" class="form-control" name="companyname" id="companyname" >
                </div>
                <div class="col-xs-6 right">
                  <label >Contact person *</label>
                  <input type="text" class="form-control" name="name" id="name">
                </div>
              </div>
              <div class="form-group col-xs-12">
                <div class="col-xs-6 left">
                  <label >Password *</label>
                  <input type="password" class="form-control" name="pwd" id="pwd" >
                </div>
                <div class="col-xs-6 right">
                  <label >Confirm Password *</label>
                  <input type="password" class="form-control" name="cnfpassword" id="cnfpassword">
                </div>
              </div>
              <div class="form-group col-xs-12">
                <div class="col-xs-6 left">
                  <label >Date of Incorporation </label>
                  <input type="text" class="form-control" name="dateofincorporation" id="dateofincorporation">
                </div>
                <div class="col-xs-6 right">
                  <label >Date of Birth </label>
                  <input type="text" class="form-control" name="dateofbirth" id="dateofbirth">
                </div>
              </div>
              <div class="form-group col-xs-12">
                <div class="col-xs-6 left">
                  <label >PAN No. </label>
                  <input type="text" class="form-control" name="pannum" id="pannum">
                </div>
                <div class="col-xs-6 right">
                  <label >Service Tax Regn No. *</label>
                  <input type="text" class="form-control" name="servicetaxregnnum" id="servicetaxregnnum">
                </div>
              </div>
              <div class="form-group col-xs-12">
                <div class="col-xs-6 left">
                  <label >Email ID *</label>
                  <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="col-xs-6 right">
                  <div class="col-xs-6 left">
                    <label >Mobile No. *</label>
                    <input type="text" class="form-control" name="mobile" id="mobile">
                  </div>
                  <div class="col-xs-6 right">
                    <label >Alternate No. </label>
                    <input type="text" class="form-control" name="alternatenum" id="alternatenum">
                  </div>
                </div>
              </div>
              <div class="form-group col-xs-12">
                <div class="col-xs-6 left">
                  <label >Registered Address *</label>
                  <input type="text" class="form-control" name="registeredaddress" id="registeredaddress">
                </div>
                <div class="col-xs-6 right">
                  <label >Communication Address *</label>
                  <input type="text" class="form-control" name="commaddress" id="commaddress">
                </div>
              </div>
              <div class="form-group col-xs-12">
                <div class="col-xs-6 left">
                  <div class="col-xs-6 left">
                    <label >City *</label>
                    <input type="text" class="form-control" name="regcity" id="regcity">
                  </div>
                  <div class="col-xs-6 right">
                    <label >Pin Code *</label>
                    <input type="text" class="form-control" name="regpin" id="regpin">
                  </div>
                </div>
                <div class="col-xs-6 right">
                  <div class="col-xs-6 left">
                    <label >City *</label>
                    <input type="text" class="form-control" name="commcity" id="commcity">
                  </div>
                  <div class="col-xs-6 right">
                    <label >Pin Code *</label>
                    <input type="text" class="form-control" name="commpin" id="commpin">
                  </div>
                </div>
              </div>
              <div class="form-group col-xs-12">
                <div class="col-xs-6 left">
                  <label >Organisation Type *</label><!--
                  <select class="form-control">
                    <option value="SoleProprietorship">Sole Proprietorship</option>
                    <option value="Partnership">Partnership</option>
                    <option value="PrivateLimited">Private Limited</option>
                    <option value="PublicLimited Others">Public Limited Others</option>
                  </select>-->
                  	<select data-placeholder="Select organizationtype" name="organizationtype" class="form-control">
                        <option value="">Select Organization Type</option>
                        <option value="soleproprietorship">Sole Proprietorship</option>
                        <option value="partnership">Partnership</option>
                        <option value="privatelimited">Private Limited</option>
                        <option value="publiclimitedothers">Public Limited Others</option>
                    </select>
                </div>
                <div class="col-xs-6 right">
                  <label >Member of any Association </label>
                  <input type="text" class="form-control" name="memberofassociation" id="memberofassociation">
                </div>
              </div>
              <div class="form-group col-xs-12">
                <div class="col-xs-6 left">
                  <label >Web Site </label>
                  <input type="text" class="form-control" name="website" id="website">
                </div>
                <div class="col-xs-6 right">
                  <label >Nature of Business</label>
                  <select multiple class="form-control" name="natureofbusiness[]">
                    <option value="LandSourcingforDevelopers">Land Sourcing for Developers</option>
                    <option value="ResidentialSales">Residential Sales</option>
                    <option value="CommercialSales">Commercial Sales</option>
                    <option value="AgriculturalLandSales">Agricultural Land Sales</option>
                    <option value="IndustrialSales">Industrial Sales</option>
                    <option value="ProjectConsultanty">Project Consultanty</option>
                    <option value="PropertyManagementRentals">Property Management Rentals (Res./Comm.)</option>
                  </select>
                </div>
                <div class="clearfix"> </div>
              </div>
              <div class="form-group col-xs-12">
                <div class="col-xs-6 left">
                  <label>Constitutional Document</label>
                  <input type="file"  class="file" name="constitutionaldocuments" id="constitutionaldocuments">
                </div>
                <div class="col-xs-6 right">
                  <label>Registration Certification</label>
                  <input type="file"  class="file" name="registrationcertifications" id="registrationcertifications">
                </div>
              </div>
              <div>
                <label class="checkbox">
                  <input type="checkbox" class="uniform" value="" name="terms" checked>
                  I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a> *</label>
                <button type="submit" class="btn btn-success">Sign Up</button>
              </div>
            </form>
            <div class="login-helpers"> <a href="#" onclick="swapScreen('login_bg');return false;"> Back to Login</a> <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/REGISTER --> 
  <!-- FORGOT PASSWORD -->
  <section id="forgot_bg">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
          <div class="login-box">
            <h2 class="bigintro">Reset Password</h2>
            <div class="divide-40"></div>
            <form role="form">
              <div class="form-group">
                <label for="exampleInputEmail1">Enter your Email address *</label>
                <i class="fa fa-envelope"></i>
                <input type="email" class="form-control" id="exampleInputEmail1" >
              </div>
              <div>
                <button type="submit" class="btn btn-info">Send Me Reset Instructions</button>
              </div>
            </form>
            <div class="login-helpers"> <a href="#" onclick="swapScreen('login_bg');return false;">Back to Login</a> <br>
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
<!-- Placed at the end of the document so the pages load faster --> 
<!-- JQUERY --> 
<script src="<?php echo base_url()?>data/js/jquery/jquery-2.0.3.min.js"></script> 
<script src="<?php echo base_url();?>data/js/jquery-validate/jquery.validate.js"></script> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/bootstrap-datepicker.js"></script>
<!-- JQUERY UI--> 
<script src="<?php echo base_url()?>data/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script> 
<!-- Cookie --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/jQuery-Cookie/jquery.cookie.min.js"></script> 
<!-- BOOTSTRAP --> 
<script src="bootstrap-dist/js/bootstrap.min.js"></script> 
<!-- UNIFORM --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/uniform/jquery.uniform.min.js"></script> 
<!-- BACKSTRETCH --> 
<script type="text/javascript" src="<?php echo base_url()?>data/js/backstretch/jquery.backstretch.min.js"></script> 
<!-- CUSTOM SCRIPT --> 
<script type="text/javascript">
		var urljs="<?php echo base_url()?>";
		var url="<?php echo site_url()?>"; 
	</script> 
<script src="<?php echo base_url();?>data/js/admin.js"></script> 
<script src="<?php echo base_url()?>data/js/script.js"></script> 
<script>
		jQuery(document).ready(function() {		
			App.setPage("login_bg");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script> 
<script type="text/javascript">
		function swapScreen(id) {
			jQuery('.visible').removeClass('visible animated fadeInUp');
			jQuery('#'+id).addClass('visible animated fadeInUp');
		}
	</script> 
<!-- /JAVASCRIPTS -->
</body>
</html>