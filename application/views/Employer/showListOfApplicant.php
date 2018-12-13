<?php
if (!isset($this->session->userdata['logged_in1'])) {
header("location: login");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Show List of Applicant</title>
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
		<div class="log_in"><b><h3 style="padding-left: 30px;">ALL JOBS APPLIED FOR <?php echo strtoupper($title[0]->jobtitle); ?> </h3></b></div>
		<br><br>
		<div style="margin-left: 55px;">
		<?php
		echo form_open('Employer/show_list_of_applicant');
			if(isset($list)){
				static $counter = 0;
				echo "<table border = '6' class= 'table' align='center' style='margin-left: -25px;'>
						<thead>
							<tr>
								<th scope='col'>Name</th>
								<th scope='col'>Title</th>
								<th scope='col'>Current CTC (Lakhs)</th>
								<th scope='col'>Current Location</th>
								<th scope='col'>Action</th>
							</tr>
						</thead> ";
				echo "<tbody>";
				if(empty($list)){
					echo"<tr>";
					echo "<td colspan = '5'><center><b>No result</b></center></td>";
					echo "</tr>";
				}
				else{
					foreach($list as $row)
					{	
						echo "<tr>";
							echo "<td>".implode(" ", array($row->firstname,$row->lastname))."</font></u></td>";
							echo "<td>".$row->jobtitle."</td>";
							echo "<td>".$row->ctc."</td>";
							echo "<td>".$row->currentloc."</td>";
							echo "<td>";
							echo "<a download href=".base_url('Employer/downloadresume?id=').base64_encode($row->id)."><u>Download Resume</a></u></a>&nbsp;&nbsp;&nbsp;</td>";
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