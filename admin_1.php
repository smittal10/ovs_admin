<?php

	session_start();
	if(!isset($_SESSION['admin_id'])){
		header('Location: http://localhost/ovs/admin_logout.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>OVS - Admin</title>
</head>
<body>
	<h1>
		Hello world
	</h1>
	<a href="admin_logout.php">{{logout}}</a>

	<br>
	<br>
	<a href="cms.php"><b>CMS</b></a>
	<br>
	<br>
	<a href="results_1.php"><b>LIVE RESULTS</b></a>

	

</body>
</html>