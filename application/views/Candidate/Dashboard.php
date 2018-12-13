<?php
if (!isset($this->session->userdata['logged_in'])) {
header("location: login");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Candidate DashBoard</title>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
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
			<li><a href="<?php echo base_url('candidate/dashboard'); ?>"><b>Dashboard</b></a></li>
			<li><a href="<?php echo base_url('candidate/search'); ?>"><b>Search Jobs</b></a></li>
			<li><a href="<?php echo base_url('candidate/applied_jobs');?>"><b>My Applied Jobs</b></a></li>
			<li><a href="<?php echo base_url('candidate/profiler'); ?>"><b>My Profile</b></a></li>
		</ul>
		<div style="float: right;margin-top: -39px;margin-right: 60px;">
			<div class = "dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $this->session->userdata['logged_in']['name']; ?></button>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('Candidate/logout') ?>">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<br>
	<div class = "section_menu">
		<div class="log_in"><b><h3 style="padding-left: 30px;">Dashboard</h3></b></div>
		<div style="margin-left: 55px;margin-top: 70px;">
			<h3>Welcome to Job Portal Candidate Dashboard</h3>
		</div>
	</div>
	<br>
	<div id = "footer">
		<ul>
			<li><a href="#">Our Team</a></li>
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