<?php
if(isset($this->session->userdata['logged_in'])){
	header("location:check_login");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Candidate Registeration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"/>
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
	<?php echo '<link rel="stylesheet" href="'.base_url('/assets/css/candidate_register.css').'"/>';?>
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
			<li><a href="<?php echo base_url('Home/login'); ?>"><b>Log In</b></a></li>
			<li><a href="<?php echo base_url('Home/register'); ?>"><b>Sign Up</b></a></li>
			<li><a href="#"><b>Contact Us</b></a></li>
		</ul>
	</div>
	<br>
	<div class = "section_menu" style="height: 1321px;">
		<div class="sign_up"><b><h3 style="padding-left: 30px;">Candidate Sign Up</h3></b></div>
		<br>
		<div style="margin-left: 336px;">
			<img src= "<?php echo base_url('assets/images/onechild.jpg')?>">
			<button class="btn btn-primary" style="float: right;margin-right: 422px;margin-top: 35px;" onclick="location.href = '<?php echo base_url('candidate/login') ?>';">I'm an Candidate</button>
		</div>
		<div style="margin-left: 361px;">
		</div>
		<br><br>
		<form action="<?php echo site_url('Candidate/save_information');?>" method="post" style="margin-left: 352px;margin-right: 352px;" enctype="multipart/form-data">
			<table border="0" cellpadding="0" cellspacing="0" width='780px'>
				<tr>
					<td>Current CTC</td>
					<td>
						<input type="text" name="ctc" size="20" value="<?php echo set_value('ctc'); ?>" required />
						<?php echo form_error('ctc', '<div class="error">', '</div>'); ?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>First Name<span class="error">*</span></td>
					<td>
						<input type="text" name="first" size="30" value="<?php echo set_value('first'); ?>" required/><br>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Last Name <span class="error">*</span></td>
					<td>
						<input type="text" name="last" size="30" value="<?php echo set_value('last'); ?>" required/><br>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Gender</td>
					<td>
						<input type="radio" name="gender" value="Male">Male
						<input type="radio" name="gender" value="Female">Female
						<?php echo form_error('gender', '<div class="error">', '</div>'); ?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Date of Birth</td>
					<td>
						<input type="date" id="datepicker" name="datepicker" value="<?php echo set_value('datepicker'); ?>" required/>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Contact Number</td>
					<td>
						<input type="number" name="contact_number" size="30" value="<?php echo set_value('contact_number'); ?>" required/><br>
						<?php echo form_error('contact_number', '<div class="error">', '</div>'); ?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Current Location</td>
					<td>
						<input type="text" name="current_loc" size="30" value="<?php echo set_value('current_loc'); ?>" required/>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Email Id <span class="error">*</span></td>
					
					<td>
						<input type="email" name="email" size="30" value="<?php echo set_value('email'); ?>" required/><br>
						<?php echo form_error('email', '<div class="error">', '</div>'); ?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Password <span class="error">*</span></td>
					
					<td>
						<input type="password" name="password" size="30" required/><br>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Re-enter Password <span class="error">*</span></td>

					<td>
						<input type="password" name="confirm_password" size="30" required/><br>
						<?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Upload Image</td>
					<td>
						<input type="file" name="imgfile" required/><br>
						<?php echo form_error('imgfile', '<div class="error">', '</div>'); ?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Upload CV</td>
					<td>
						<input type="file" name="cv" required/></br>
						<?php echo form_error('cv', '<div class="error">', '</div>'); ?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Job Title</td>
					<td>
						<input type="text" name="job" value="<?php echo set_value('job'); ?>" required/></br>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Experience</td>
					<td>
						<select name="exp">
							<option value=""></option>
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5+">5+</option>
						</select>
						<?php echo form_error('exp', '<div class="error">', '</div>'); ?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
			</table>
			<br>
			<input type="checkbox" name="agree" style="margin-left: 170px;" required/>I Agree to the Terms and Condition
			<br><br>
			<center><button class="btn btn-primary" type="submit" name="submitButton">Sign Up</button></center>
		</form>
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