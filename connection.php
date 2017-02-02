<?php

	@error_reporting(2);

	$db_host = "localhost";
	$db_uname = "root";
	$db_pw = "placements2017";
	$db_database = "ovs";

	$conn = mysql_connect($db_host, $db_uname, $db_pw);
	if (!$conn)
	{
	  echo "Please try later.";
	}
	else
	{
		mysql_select_db($db_database, $conn);
	}

	function check_ip($for_voter, $for_moderator){
		$localIP = getHostByName(getHostName());
	
		$command="/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
		$localIP = exec ($command);
		// echo $localIP;
		$cnt = 0;
		$sq = "select * from system where ip = '" . $localIP . "'";
		$result = mysql_query($sq);
		while( $row = mysql_fetch_assoc($result) ){
			//echo $row['type'];
			$cnt ++;
			if($row['type'] === "moderator" && $for_moderator!=null){
				header('Location: ' . $for_moderator);
			}
			elseif($row['type'] === "voting_machine" && $for_voter!=null){
				header('Location: ' . $for_voter);
			}
		}
		if($cnt == 0){
			header('Location: error.php');
		}
		
	}


?>