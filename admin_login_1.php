<?php
	
	Include 'connection.php';

	// check_ip("voter_login_1.php", null);
	session_start();
	if(isset($_SESSION['admin_id'])){
		header('Location: admin_1.php');
	}
	// elseif(isset($_SESSION['voter_id'])){
	// 	session_unset();
	// 	session_destroy();
	// }
	// elseif(isset($_SESSION['worker_id'])){
	// 	session_unset();
	// 	session_destroy();
	// }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Voting</title>
	<link href="css/main.css" rel="stylesheet" type="text/css">
	<script src="js/main.js"></script>
</head>
<body>

	<div id="main1" class="main">
		<h1>Admin Login</h1>
		<form method="post" action="admin_login.php">
			<input type="text" name="uname" placeholder="User name">
			<input type="password" name="pass" placeholder="Password">
			<input type="submit">
	</form>
	</div>
	<div class="navigation">
		<a href="index.php">Home</a>
	</div>

</body>
</html>