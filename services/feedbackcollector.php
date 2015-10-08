<?php

$eid=$_GET['eid'];
$speaker=$_GET['speaker'];
$session=$_GET['session'];
$q1=$_GET['q1'];
$q2=$_GET['q2'];
$q3=$_GET['q3'];
$q4=$_GET['q4'];
$q5=$_GET['q5'];
$q6=$_GET['q6'];
$q7=$_GET['q7'];
$q8=$_GET['q8'];
$q9=$_GET['q9'];
$q10=$_GET['q10'];
$q11=$_GET['q11'];
$q12=$_GET['q12'];
$q13=$_GET['q13'];
$q14=$_GET['q14'];
$q15=$_GET['q15'];
$s1=$_GET['s1'];
$s2=$_GET['s2'];
$s3=$_GET['s3'];
$s4=$_GET['s4'];
include('../in/connect.php');
//echo 'hie'.$speaker;
$uid=$eid.$speaker;
mysql_query("insert into feedbacks values('','$eid','$uid','$speaker','$session','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$s1','$s2','$s3','$s4')");

	echo '{"tid":"'.$tid.'"}';
?>