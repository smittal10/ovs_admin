<?php
Include "connection.php";

// echo "hello";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Results</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <fieldset>
  
    <legend>Live Results</legend>
    
    <ul>
    <?php
    $query_rs_vote = "SELECT * FROM candidates";
    $rs_vote = mysql_query($query_rs_vote);
    $sq="Select year,course,branch, sum(vote_count) as svc from candidates group by year,course,branch";
      
    $result=mysql_query($sq);
    // $row = mysql_fetch_assoc($result);
 
    while($row_rs_vote = mysql_fetch_assoc($rs_vote)){
      //$sq1="select roll_no,sum(vote_count) as svc from candidates group by year,course,branch having roll_no='".$row_rs_vote['roll_no']."'";
      $sq1="select roll_no,sum(vote_count) as svc from candidates where  year = '". $row_rs_vote['year'] ."   '  and course = '". $row_rs_vote['course'] ."   ' and branch = '". $row_rs_vote['branch'] ."   ' ";
      $res=mysql_query($sq1);
      $r=mysql_fetch_assoc($res);
      // print_r($r);
     echo  '<li>'. $row_rs_vote['name']."(".$row_rs_vote['roll_no'].")".'<br /><div class="results-bar" style="width:<?php echo round($percentQuestion1,2); ?>%;">'.$row_rs_vote['vote_count'].'/'.$r['svc'].' votes </div>.</li>';
  
}
    
    // echo '</ul>';
   
    // print_r($row);
    echo "<br>";
    while($row = mysql_fetch_assoc($result)) {
      
      echo "<b>Total votes casted in:".$row['course'].",".$row['branch'].",".$row['year']."yr-->".$row['svc']."</b><br>";
  
    }
      
    ?>
    
    Back to Voting
  
  </fieldset>
  
</body>
</html>