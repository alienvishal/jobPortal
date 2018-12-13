<?php
if (!isset($this->session->userdata['logged_in'])) {
header("location: login");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update  Information</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
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
			<li><a href="<?php echo base_url('candidate/dashboard'); ?>"><b>Dashboard</b></a></li>
			<li><a href="<?php echo base_url('candidate/search'); ?>"><b>Search Jobs</b></a></li>
			<li><a href="<?php echo base_url('candidate/applied_jobs');?>"><b>My Applied Jobs</b></a></li>
			<li><a href="<?php echo base_url('candidate/profiler'); ?>"><b>My Profile</b></a></li>
		</ul>
	</div>
	<br>
	<div class = "section_menu">
		<div class="sign_up"><b><h3 style="padding-left: 30px;">Candidate Update Information</h3></b></div>
		<br>
		<div style="margin-left: 336px;">
			<img src= "<?php echo base_url('assets/images/onechild.jpg')?>">
		</div>
		<br><br>
		<?php 
		if(isset($singleUser)){
		?>
		<form action="<?php echo site_url('Candidate/update_information');?>" method="post" style="margin-left: 352px;margin-right: 352px;" enctype="multipart/form-data">
			<table border="0" cellpadding="0" cellspacing="0" width='480px'>
				<tr>
					<td>Current CTC</td>
					<td> 
						<input type="text" name="ctc" size="20" value = "<?php echo $singleUser[0]['ctc'];?>" required/>
						<?php echo form_error('ctc','<div class="error">', '</div>');?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>First Name<span class="error">*</span></td>
					<td>
						<input type="text" name="first" size="30" value = "<?php echo $singleUser[0]['firstname'];?>" required/><br>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Last Name <span class="error">*</span></td>
					<td>
						<input type="text" name="last" size="30" value = "<?php echo $singleUser[0]['lastname'];?>" required/><br>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Gender</td>
					<td>
						<input type="radio" name="gender" value="Male">Male
						<input type="radio" name="gender" value="Female">Female
						<?php echo form_error('gender','<div class="error">', '</div>');?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Date of Birth</td>
					<td>
						<input type="date" id="datepicker" name="datepicker" value = "<?php echo $singleUser[0]['dob'];?>" required/>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Contact Number</td>
					<td>
						<input type="number" name="contact_number" size="30" value = "<?php echo $singleUser[0]['contactnumber'];?>" required/><br>
						<?php echo form_error('contact_number','<div class="error">', '</div>');?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Current Location</td>
					<td>
						<input type="text" name="current_loc" size="30" value = "<?php echo $singleUser[0]['currentloc'];?>" required/>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Email Id <span class="error">*</span></td>
					
					<td>
						<input type="email" name="email" size="30" value = "<?php echo $singleUser[0]['emailid'];?>" required/><br>
						<?php echo form_error('email','<div class="error">', '</div>');?>
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
						<input type="file" name="cv"  required/></br>
						<?php echo form_error('cv', '<div class="error">', '</div>'); ?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Job Title</td>
					<td>
						<input type="text" name="job" value = "<?php echo $singleUser[0]['jobtitle'];?>" required/></br>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Experience</td>
					<td>
						<select name="exp">
							<option value="<?php echo $singleUser[0]['experience'];?>"><?php echo $singleUser[0]['experience'];?></option>
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5+">5+</option>
						</select>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
			</table>
			<br>
			<input type="checkbox" name="agree" style="margin-left: 170px;" required/>I Agree to the Terms and Condition
			<br><br>
			<center><button class="btn btn-primary" type="submit" name="submitButton">Update</button></center>
		</form>
		<?php 
		}?>
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