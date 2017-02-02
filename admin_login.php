<?php

	
	Include 'connection.php'; 
	// check_ip("voter_login_1.php", null);
	
	@error_reporting(2);
	//echo "hello world";
	session_start();
	//session_start();
	if(isset($_SESSION['admin_id'])){
		header('Location: admin_1.php');
	}

	$uid = $_POST['uname'];
	$password = $_POST['pass'];


	$sq = "select * from admin where uname = '" . $uid . "' and pass = '" .$password. "' " ;
	echo $sq;
	if( mysql_query($sq) ){
		echo "hello";
    	$_SESSION['admin_id'] = $uid;
    	header('Location: admin_1.php');
	}
	else
	{
		echo "world";
		header('Location: admin_login_1.php');
	}
?>