<?php
if (!isset($this->session->userdata['logged_in1'])) {
header("location: login");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Post Job</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<?php echo '<link rel="stylesheet" href="'.base_url('/assets/css/post_job.css').'"/>'; ?>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
<body>
<div class = "main_page">
	<h1><b>Job Portal</b></h1>
	<br>
	<div class="menu_box">
		<ul>
			<li><a href="<?php echo base_url('employer/dashboard')?>"><b>Dashboard</b></a></li>
			<li><a href="<?php echo base_url('employer/post_job') ?>"><b>Post New Job</b></a></li>
			<li><a href="<?php echo base_url('employer/mypost') ?>"><b>My Jobs</b></a></li>
			<li><a href="#"><b>My Profile</b></a></li>
		</ul>
		<div style="float: right;margin-top: -39px;margin-right: 60px;">
			<div class = "dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $this->session->userdata['logged_in1']['company_name']; ?></button>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('Employer/logout')?>">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<br>
	<div class = "section_menu">
		<div class="emp_sign_up"><b><h3 style="padding-left: 30px;">Post New Job</h3></b></div>
		<br><br>
		<?php
			if(isset($singlePostList)){
		?>	
		<div style="margin-left: 361px;">		
		<span class="error"><?php echo validation_errors();?></span>
		</div>
		<form method="post" action="<?php echo site_url('Employer/update_record');?>">
			<table border="0" cellpadding="0" align="center" width='480px'>
				<tr>
					<td>Job Title<span class="error">*</span></td>
					<td>
						<input type="hidden" name="e_jobtitle" value="<?php echo base64_encode($singlePostList[0]->id) ;?>">
						<input type="text" name="job_title" size="30" value="<?php echo $singlePostList[0]->jobtitle;?>" required><br>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Description<span class="error">*</span></td>
					<td>
						<textarea name="desc" rows="3" cols="30" required><?php echo $singlePostList[0]->description; ?></textarea><br>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Budget(CTC)<span class="error">*</span></td>
					<td>
						<input type="text" name="budget" size="10" value="<?php echo $singlePostList[0]->budget;?>" required>lakhs<br>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Job Type</td>
					<td>
						<select name="job_type">
							<option value="<?php echo $singlePostList[0]->jobtype; ?>"><?php echo $singlePostList[0]->jobtype; ?></option>
							<option value="Full Time">Full Time</option>
							<option value="Part Time">Part Time</option>
						</select>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Job Location</td>
					<td>
						<select name="job_location">
							<option value="<?php echo $singlePostList[0]->joblocation; ?>"><?php echo $singlePostList[0]->joblocation; ?></option>
							<option value="Mumbai">Mumbai</option>
							<option value="Pune">Pune</option>
							<option value="Bangalore">Bangalore</option>
							<option value="Delhi">Delhi</option>
						</select>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Experience:</td>
					<td>
						<select name="experience">
							<option value="<?php echo $singlePostList[0]->experience; ?>"><?php echo $singlePostList[0]->experience; ?></option>
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
				<tr>
					<td></td>
					<td>
						<button class="btn btn-primary" name="postJob" type="submit">Update
						</button>
					</td>
				</tr>
			</table>
		</form>
		<?php
		}
		else{
		?>
		<form method="post" action="<?php echo site_url('Employer/save_job_post'); ?>">
			<table border="0" cellpadding="0" align="center" width='480px'>
				<tr>
					<td>Job Title<span class="error">*</span></td>
					<td>
						<input type="text" name="job_title" size="30" value ="<?php echo set_value('job_title'); ?>" required><br>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Description<span class="error">*</span></td>
					<td>
						<textarea name="desc" rows="3" cols="30" required><?php echo set_value('desc'); ?></textarea><br>
						<?php echo form_error('desc','<div class="error">', '</div>');?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Budget(CTC)<span class="error">*</span></td>
					<td>
						<input type="text" name="budget" size="4" value ="<?php echo set_value('budget'); ?>" required>lakhs<br>
						<?php echo form_error('budget','<div class="error">', '</div>');?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Job Type</td>
					<td>
						<select name="job_type">
							<option value=""></option>
							<option value="Full Time">Full Time</option>
							<option value="Part Time">Part Time</option>
						</select>
						<?php echo form_error('job_type','<div class="error">', '</div>');?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Job Location</td>
					<td>
						<select name="job_location">
							<option value=""></option>
							<option value="Mumbai">Mumbai</option>
							<option value="Pune">Pune</option>
							<option value="Bangalore">Bangalore</option>
							<option value="Delhi">Delhi</option>
						</select>
						<?php echo form_error('job_location','<div class="error">', '</div>');?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td>Experience:</td>
					<td>
						<select name="experience">
							<option value=""></option>
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5+">5+</option>
						</select>
						<?php echo form_error('experience','<div class="error">', '</div>');?>
					</td>
				</tr>
				<tr> <td>&nbsp;</td> </tr>
				<tr>
					<td></td>
					<td>
						<button class="btn btn-primary" name="postJob" type="submit">POST
						</button>
					</td>
				</tr>
			</table>
		</form>
		<?php
		}
		?>
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