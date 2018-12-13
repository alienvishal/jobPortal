<?php
if(isset($this->session->userdata['logged_in'])){
	header("location:check_login");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Candidate Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"/>
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
	<?php echo '<link rel="stylesheet" href="'.base_url('/assets/css/candidate_register.css').'"/>'; ?>
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
			<li><a href="<?php echo base_url('home/login'); ?>"><b>Log In</b></a></li>
			<li><a href="<?php echo base_url('home/register'); ?>"><b>Sign Up</b></a></li>
			<li><a href="#"><b>Contact Us</b></a></li>
		</ul>
	</div>
	<br>
	<div class = "section_menu">
		<div class="sign_up"><b><h3 style="padding-left: 30px;">Candidate Log In</h3></b></div>
		<center>
			<div class = "login_box">
				<form action="<?php echo site_url('Candidate/check_login');?>"method="post">
				<span class="error"><?php echo validation_errors(); ?></span>
					<br>
					<label>Email Id:</label>
					<span class="error">*</span>
					<br>
					<input type="email" name="email" size="30" value="<?php echo set_value('email')?>" required /><br>
					<br><br>
					<label>Password</label>
					<span class="error">*</span>
					<br>
					<input type="password" name="password" size="30" required /><br>
					<br><br>
					<button class ="btn btn-primary" type="submit" name = "logIn" style="width: 100px;">Log In</button>
					<button class = "btn btn-primary" name = "signUp" style="width: 100px;"onclick="location.href = '<?php echo base_url('Candidate/register'); ?>'">Sign Up</button>
				</form>
			</div>
		</center>
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