<?php
if(isset($this->session->userdata['logged_in1'])){
	header("location:check_login");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employer Registration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"/>
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
	<?php echo '<link rel="stylesheet" href="'.base_url('/assets/css/employer_register.css').'"/>'; ?>
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
			<li><a href="<?php echo base_url('/home/login') ?>"><b>Log In</b></a></li>
			<li><a href="<?php echo base_url('/home/Register') ?>"><b>Sign Up</b></a></li>
			<li><a href="#"><b>Contact Us</b></a></li>
		</ul>
	</div>
	<br>
	<div class = "section_menu" style="height: 1371px;">
		<div class="emp_sign_up"><b><h3 style="padding-left: 30px;">Employer Sign Up</h3></b></div>
		<br>
		<div style="margin-left: 336px;">
			<img src= "<?php echo base_url('assets/images/child.jpg')?>">
			<button class="btn btn-primary" style="float: right;margin-right: 422px;margin-top: 35px;" onclick="location.href = '<?php echo base_url('employer/login');?>'">I'm an Employer</button>
		</div>
		<br>
			<form action="<?php echo site_url('Employer/save_information');?>" method="post" style="margin-left: 352px;margin-right: 352px;">
				<table border="0" cellpadding="0" cellspacing="0" width='780px'>
					<tr>
						<td>Company Name <span class="error">*</span></td>
						<td><input type="text" name="company_name" size = "30" value = "<?php echo set_value('company_name'); ?>" required></td>

					</tr>
					<tr> <td>&nbsp;</td> </tr>
					<tr>
						<td>Company Address</td>
						<td><textarea rows="3" cols="30" name="company_address" required><?php echo set_value('company_address'); ?></textarea></td>
					</tr>
					<tr> <td>&nbsp;</td> </tr>
					<tr>
						<td>First Name<span class="error">*</span></td>
						<td><input type="text" name="firstname" size="30" value = "<?php echo set_value('firstname'); ?>" required></td>
					</tr>
					<tr> <td>&nbsp;</td> </tr>
					<tr>
						<td>Last Name <span class = "error">*</span></td>
						<td><input type="text" name="lastname" size="30" value = "<?php echo set_value('lastname'); ?>" required></td>
					</tr>
					<tr> <td>&nbsp;</td> </tr>
					<tr>
						<td>Gender</td>
						<td><input type="radio" name="gender" value="Male">Male
						<input type="radio" name="gender" value="Female">Female
						<?php echo form_error('gender', '<div class="error">', '</div>'); ?></td>
					</tr>
					<tr> <td>&nbsp;</td> </tr>
					<tr>
						<td>Contact Number</td>
						<td><input type="number" name="contact_number" size="10" value = "<?php echo set_value('contact_number'); ?>"required>
						<?php echo form_error('contact_number', '<div class="error">', '</div>'); ?></td>
					</tr>
					<tr> <td>&nbsp;</td> </tr>
					<tr>
						<td>Current Location</td>
						<td><input type="text" name="current_loc" size="30" value = "<?php echo set_value('current_loc'); ?>" required></td>
					</tr>
					<tr> <td>&nbsp;</td> </tr>
					<tr>
						<td>Email Id <span class="error">*</span></td>
						<td><input type="email" name="email" size="30" value = "<?php echo set_value('email');?>" required>
						<?php echo form_error('email', '<div class="error">', '</div>'); ?></td>
					</tr>
					<tr> <td>&nbsp;</td> </tr>
					<tr>
						<td>Password <span class="error">*</span></td>
						<td><input type="password" name="password" size="30" required></td>
					</tr>
					<tr> <td>&nbsp;</td> </tr>
					<tr>
						<td>ReEnter Password<span class="error">*</span></td>
						<td><input type="password" name="confirm_password" size="30" required>
						<?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?></td>
					</tr>
					<tr> <td>&nbsp;</td> </tr>
				</table>
				<input type="checkbox" name="agree" style="margin-left: 170px;" required/>I Agree to the Terms and Condition
			<br><br>
			<center><button class="btn btn-primary" type="submit" name="submitButton">Sign Up</button></center>
			</form>
			<br>
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