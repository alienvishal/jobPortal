<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"/>
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
	<?php echo '<link rel="stylesheet" href="'.base_url('/assets/css/login.css').'"/>'; ?>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
<body>
<div class = "main_page">
	<h1><b>Job Portal</b></h1>
	<br>
	<div class="menu_box">
		<ul>
			<li><a href="#"><b>Home</b></a></li>
			<li><a href="<?php echo base_url('/home/login');?>"><b>Log In</b></a></li>
			<li><a href="<?php echo base_url('/home/register');?>"><b>Sign Up</b></a></li>
			<li><a href="#"><b>Contact Us</b></a></li>
		</ul>
	</div>
	<br>
	<div class = "section_menu">
		<div class="log_in"><b><h3 style="padding-left: 30px;">Sign Up</h3></b></div>
		<center style = "margin-top: 90px;">
			<b>You are</b>
			<br>
		</center>
		<br>
		<div style="padding-left: 381px;">
			<img src="<?php echo base_url('assets/images/child.jpg')?>">
    	</div>
    	<img src="<?php echo base_url('assets/images/onechild.jpg')?>" style="float: right;margin-top: -80px;margin-right: 367px;">
    	<br>
    	<div style="border:1px solid black;border-radius: 5px;width:219px;height: 92px;margin-left: 340px;">
    		<h1 style="padding-top: 16px;"><center><a href="<?php echo base_url('employer/register') ?>">Employer</a></center></h1>
    	</div>
    	<div style="border:1px solid black;border-radius: 5px;width:219px;height: 92px;margin-left: 598px;margin-top: -94px;">
    		<h1 style="padding-top: 16px;"><center><a href="<?php echo base_url('Candidate/register') ?>">Individual</a></center></h1>
    	</div>
	</div>
	<br>
	<div id = "footer">
		<ul>
			<li><a href="#">Our Team</a></li>
			<li><a href="#">How it Works</a></li>
			<li><a href="#">FAQ</a></li>
			<li><a href="#">Contact Us</a></li>
		</ul>
		<div style="float: right;margin-top: -55px;">
			<ul>
				<li><a href="#"><i class="fa fa-facebook-f fa-2x"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin fa-2x"></i></a></li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>
