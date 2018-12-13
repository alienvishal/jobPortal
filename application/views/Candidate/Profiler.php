<?php
if (!isset($this->session->userdata['logged_in'])) {
header("location: login");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Candidate Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
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
			<li><a href="<?php echo base_url('candidate/dashboard'); ?>"><b>Dashboard</b></a></li>
			<li><a href="<?php echo base_url('candidate/search'); ?>"><b>Search Jobs</b></a></li>
			<li><a href="<?php echo base_url('candidate/applied_jobs');?>"><b>My Applied Jobs</b></a></li>
			<li><a href="<?php echo base_url('candidate/profiler'); ?>"><b>My Profile</b></a></li>
		</ul>
	</div>
	<br>
	<div class = "section_menu">
		<div class="sign_up"><b><h3 style="padding-left: 30px;">My Profile</h3></b></div>
		<form method = "post" action = "<?php echo base_url('Candidate/edit_information')?>">
		<div style="float: right;margin-top: -39px;margin-right: 60px;">
			<button class="btn btn-primary" type="submit" name="edit" style="height: 35px;">Edit</button>
		</div>
		<?php
		form_open('Candidate/edit_information');
		if(isset($displayInfo)){
		?>
		<br>
		<table border="0" width="480px" style="margin-left: 374px;">
			<tr>	
				<td><img src="<?php echo base_url().'uploads/'.$displayInfo[0]['imgupload'] ?>" width="150px" height="150px"></td>
				<td></td>
			</tr>
			<tr> <td>&nbsp;</td> </tr>
			<tr>	
				<td>Resume:</td>
				<td><a href="<?php echo base_url().'documents/'.$displayInfo[0]['resume']; ?>">  <?php echo $displayInfo[0]['resume']; ?></a></td>
			</tr>
			<tr> <td>&nbsp;</td> </tr>
			<tr>	
				<td>Job Title:</td>
				<td> <?php echo $displayInfo[0]['jobtitle']; ?></a></td>
			</tr>
			<tr> <td>&nbsp;</td> </tr>
			<tr>	
				<td>Experience:</td>
				<td> <?php echo $displayInfo[0]['experience']; ?></a></td>
			</tr>
			<tr> <td>&nbsp;</td> </tr>
			<tr>	
				<td>Current CTC:</td>
				<td> <?php echo $displayInfo[0]['ctc']; ?></a></td>
			</tr>
			<tr> <td>&nbsp;</td> </tr>
			<tr>	
				<td>First Name:</td>
				<td> <?php echo $displayInfo[0]['firstname']; ?></a></td>
			</tr>
			<tr> <td>&nbsp;</td> </tr>
			<tr>	
				<td>Last Name:</td>
				<td> <?php echo $displayInfo[0]['lastname']; ?></a></td>
			</tr>
			<tr> <td>&nbsp;</td> </tr>
			<tr>	
				<td>Gender:</td>
				<td> <?php echo $displayInfo[0]['gender']; ?></a></td>
			</tr>
			<tr> <td>&nbsp;</td> </tr>
			<tr>	
				<td>Date of Birth:</td>
				<td> <?php echo date('d-m-Y', strtotime($displayInfo[0]['dob'])); ?></a></td>
			</tr>
			<tr> <td>&nbsp;</td> </tr>
			<tr>	
				<td>Contact Number:</td>
				<td> <?php echo $displayInfo[0]['contactnumber']; ?></a></td>
			</tr>
			<tr> <td>&nbsp;</td> </tr>
			<tr>	
				<td>Current Location:</td>
				<td> <?php echo $displayInfo[0]['currentloc']; ?></a></td>
			</tr>
			<tr> <td>&nbsp;</td> </tr>
			<tr>	
				<td>Email ID:</td>
				<td> <?php echo $displayInfo[0]['emailid']; ?></a></td>
			</tr>
		</table>
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