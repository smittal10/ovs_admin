<?php
	Include "connection.php";
	session_start();
	if(!isset($_SESSION['admin_id'])){
		header('Location: http://localhost/ovs/admin_logout.php');
	}
	$sq="select ip,availability from system";
	$res=mysql_query($sq);
	 $res1=mysql_query($sq);


?>

<!DOCTYPE html>
<html>
<head>
	<title>OVS - Admin</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="admin_header">
	ADMIN PANEL - ELECTIONS
	</div>

	<div class="admin_navigation">
		<a href="results_1.php">Current Results</a>
		<a href="cms.php">Admin Panel</a>
		<a href="admin_logout.php">Logout</a>
	</div>
	<br>
	<br>
	<div id="all_forms">
		<form action="admin.php?type=am" method="post" class="cms_form" autocomplete="off">
			<div class="cms_form_header">
				Add Moderator
			</div>
			<input type="text" name="uname" placeholder="Moderator username">
			<input type="text" name="id" placeholder="Moderator id">
			<input type="password" name="password" placeholder="Password">
			<input type="password" name="cpassword" placeholder="Confirm Password">
				
			<input type="submit" value="Add Moderator">
		</form>
		<form action="admin.php?type=rm" method="post" class="cms_form">
			<div class="cms_form_header">
				Remove Moderator
			</div>
			<input type="text" name="uname" placeholder="Moderator username">
			<input type="text" name="id" placeholder="Moderator id">
			
				
			<input type="submit" value="Remove Moderator">
		</form>
		<form action="admin.php?type=as" method="post" class="cms_form">
			<div class="cms_form_header">
				Add System
			</div>
			<input type="text" name="ip" placeholder="System IP">
			<!-- <input type="text" name="id" placeholder="System MAC"> -->
			<div class="cms_form_radio">
				<div class="cms_form_radio_each">
					<input type="radio" name="stype" value="voting_machine">
					<span>Voting Machine</span>
				</div>
				<div class="cms_form_radio_each">
					<input type="radio" name="stype" value="moderator">
					<span>Moderator</span>
				</div>
			</div>
			<input type="submit" value="Add System">
		</form>
		<form action="admin.php?type=rs" method="post" class="cms_form">
			<div class="cms_form_header">
				Remove System
			</div>
			<select name="ip">
				<?php 
					while($row=mysql_fetch_assoc($res)){
						if($row['availability'] == "2")
							echo '<option value="'.$row['ip'].'">'.$row['ip'].'</option>';				
					}
				?>

			</select>
				
			<input type="submit" value="Remove System">
		</form>
		<form action="admin.php?type=asm" method="post" class="cms_form">
			<div class="cms_form_header">
				Assign System to Moderator
			</div>
			<input type="text" name="uname" placeholder="Moderator username">
			<input type="text" name="id" placeholder="Moderator id">
			<select name="ip">
				<?php 
					while($row=mysql_fetch_assoc($res1)){
						if($row['availability'] == "2")
							echo '<option value="'.$row['ip'].'">'.$row['ip'].'</option>';				
					}
				?>
			</select>
				
			<input type="submit" value="Assign System">
		</form>
		<form action="admin.php?type=usm" method="post" class="cms_form">
			<div class="cms_form_header">
				Unassign Systems
			</div>
			
			<div class="cms_form_checkbox">
				<div class="cms_form_checkbox_each">
					<input type="checkbox" name="stype" value="192.168.0.1">
					<span>192.168.0.1</span>
				</div>
				<div class="cms_form_checkbox_each">
					<input type="checkbox" name="stype" value="192.168.0.2">
					<span>192.168.0.2</span>
				</div>
			</div>
			<input type="submit" value="Unassign System">
		</form>
	</div>
</body>
</html>