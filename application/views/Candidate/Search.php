<?php
if (!isset($this->session->userdata['logged_in'])) {
header("location: login");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Candidate Search Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<?php echo '<link rel="stylesheet" href="'.base_url('/assets/css/candidate_searchjob.css').'"/>'; ?>
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
	<div class = "sub_menu">
		<div class="sign_up"><b><h3 style="padding-left: 30px;">Job Search</h3></b></div>
		<form method="post" action="<?php echo site_url('Candidate/execute_search')?>">
			<br>
			<table border="0" cellpadding="0" width="520px" style="margin-left: 63px;">
				<tr>
					<td><h5>Job Type:</h5></td>
					<td><h5>Job Location:</h5></td>
					<td><button class="btn btn-primary" type="submit" name="search">Search</button></td>
				</tr>
				<tr>
					<td>
						<select name="job_type">
							<option value="Full Time">Full time</option>
							<option value="Part Time">Part time</option>
							<option value="contract_based">Contract based</option>
						</select>
					</td>
					<td>
						<select name="job_location">
							<option value="Mumbai">Mumbai</option>
							<option value="Delhi">Delhi</option>
							<option value="Bangalore">Bangalore</option>
							<option value="Pune">Pune</option>
						</select>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<br>
	<div id="sub_menu1">
		<b><h3 style="padding-left: 30px;">Search Results</h3></b>	
	<br>
	<div style="margin-left: 55px;">
	<?php
	echo form_open('candidate/execute_search');
	if(isset($result)){
		echo "<table border= '6' class='table' style='margin-left: -25px;'>
			<tbody>
				<thead>
					<th scope='col'>Job Title</th>
					<th scope='col'>Company Name</th>
					<th scope='col'>Job Location</th>
				</thead> ";
		echo "<tbody>";
		if(empty($result)){
			echo"<tr>";
			echo "<td colspan = '3'><center><b>No result</b></center></td>";
			echo "</tr>";
		}
		else{
			foreach($result as $val){
				echo "<tr>";
					echo "<td><a href=".base_url('Candidate/displayrecord?id=').base64_encode($val['id']).">".$val['jobtitle']."</a></td>";
					echo "<td>".$val['company_name']."</td>"; 
					echo "<td>".$val['joblocation']."</td>";
				echo "</tr>";	
			}
		}
	echo "</tbody>";
	echo "</table>";
	}
	?>	
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