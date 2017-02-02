<!DOCTYPE html>
<html>
<head>
	<title>Online Voting</title>
	<link href="css/main.css" rel="stylesheet" type="text/css">
	<script src="js/main.js"></script>
</head>
<body>
	<h1 class="headd">Students' Gymkhana Elections</h1>

<?php
	session_start();
	if(!isset($_SESSION['admin_id'])){
		header('Location: admin_logout.php');
	}
	Include "connection.php";
	function add_mod($uname,$id,$password,$system_ips){
		$query1='insert into moderator values("'.$uname.'","'.$id.'","'.$password.'","'.$system_ips.'")';
		if( mysql_query($query1) && mysql_affected_rows() == 1  ){
			echo "Moderator Added";
		}
		else
		{
			echo "Error while Adding !!";
		}
	}
	function delete_mod($uname,$id){
		$sq="delete from moderator where id='".$id."' and uname='".$uname."'";
		if( mysql_query($sq) && mysql_affected_rows() == 1  ){
			echo "Moderator Deleted";
		}
		else
		{
			echo "Error while Deleting !!";
		}
	}
	function mod_add_ip($uname,$id,$add_ip){
		
		$sq1="select * from moderator where id='".$id."' and uname='".$uname."'";
		//echo $sq1;
		$result=mysql_query($sq1);
		$row=mysql_fetch_assoc($result);
		echo $row['system_ips'];
		$system_ips=unserialize($row['system_ips']);
		echo $system_ips;
		
		array_push($system_ips,$add_ip);

		$system_ips=serialize($system_ips);
		echo $system_ips;
		$sq2="update moderator set system_ips='".$system_ips."' where id='".$id."'";
		echo $sq2;
		if(mysql_query($sq2) && mysql_affected_rows()==1 ){
			echo "ip added";
		}
		else
		{
			echo "Error while adding ip";
		}
	}
	// function mod_delete_ip($id,$delete_ip){
	// 	$sq1="select * from moderator where id='".$id."'";
	// 	$result=mysql_query($sq1);
	// 	$row=mysql_fetch_assoc($result);
	// 	$system_ips=unserialise($row['system_ips']);
	// 	array_splice($system_ips[array_search($delete_ip]));
	// 	$system_ips=serilaise($system_ips);
	// 	$sq2='update table moderator set system_ips="'.$system_ips.'" where id="'.$id.'"';
	// 	if(mysql_query($sq2) && mysql_affected_rows()==1 ){
	// 		echo "ip deleted";
	// 	}
	// 	else
	// 	{
	// 		echo "Error while deleting ip";
	// 	}


	// }
	function add_system($add_system_ip,$stype){
		$sq="insert into system values('".$add_system_ip."','2','-','".$stype."')";
		if(mysql_query($sq) && mysql_affected_rows()==1){
			echo "Succesfully Added system ip";
		}
		else{
			echo "Error while Adding";
		}

	}
	function delete_system($delete_system_ip){
		$sq="Delete from system where ip='".$delete_system_ip."'";
		if(mysql_query($sq) && mysql_affected_rows()==1){
			echo "Succesfully Deleted system ip";
		}
		else{
			echo "Error while Deleting system ip";
		}

	}

	$type = $_GET['type'];
	echo $type;
	if ($type=="am"){

		$uname=mysql_real_escape_string($_POST['uname']);
		// echo $uname;
		$id=mysql_real_escape_string($_POST['id']);
		$password=mysql_real_escape_string($_POST['password']);
		$cpassword=mysql_real_escape_string($_POST['cpassword']);
		// echo $uname;
		// $system_ips=array();
		// $system_ips=serialise($system_ips);	
		$system_ips = "a:0:{}";
		if($password===$cpassword){
				// echo "hi";
				add_mod($uname,$id,$password,$system_ips);
		}
		else{
			echo "passwords do not match,try again";
		
		}
	}	
	
	elseif($type=="rm"){
		$uname=mysql_real_escape_string($_POST['uname']);
		$id=mysql_real_escape_string($_POST['id']);
		//echo $uname . $id;
		delete_mod($uname,$id);

}
elseif($type=="as"){
	//echo "hello";
	$add_system_ip=mysql_real_escape_string($_POST['ip']);
	$stype=mysql_real_escape_string($_POST['stype']);
	//echo $add_system_ip . $stype;
	add_system($add_system_ip,$stype);

}
elseif($type=="rs"){
	$delete_ip=mysql_real_escape_string($_POST['ip']);
	// $stype=mysql_real_escape_string($POST['stype']);
	delete_system($delete_ip);

}
elseif($type=="asm"){
	$uname=mysql_real_escape_string($_POST['uname']);
	$id=mysql_real_escape_string($_POST['id']);
	$ip=mysql_real_escape_string($_POST['ip']);
	mod_add_ip($uname,$id,$ip);

}
elseif($type="usm"){
	$stype=mysql_real_escape_string($POST['stype']);
	echo "hey";
}
		


?>

</body>
</html>