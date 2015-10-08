<?php

include('../in/connect.php');

$count=mysql_result(mysql_query("select count(sid) x from session_details"),0,'x');
$json='{"schedule":[';
for($i=0;$i<$count;$i++){
		$sid=mysql_result(mysql_query("select sid x from session_details"),$i,'x');
		$typ=mysql_result(mysql_query("select typ x from session_details"),$i,'x');
		$title=mysql_result(mysql_query("select title x from session_details"),$i,'x');
		$date=mysql_result(mysql_query("select date x from session_details"),$i,'x');
		$stime=mysql_result(mysql_query("select stime x from session_details"),$i,'x');
		$etime=mysql_result(mysql_query("select etime x from session_details"),$i,'x');
		$speaker=mysql_result(mysql_query("select speaker x from session_details"),$i,'x');
		$location=mysql_result(mysql_query("select location x from session_details"),$i,'x');
		$desc=mysql_result(mysql_query("select * from session_details"),$i,'desc');
		$attachment=mysql_result(mysql_query("select download x from session_details"),$i,'x');
		$json=$json.',{"tid":"'.$sid.'","typ":"'.$typ.'","title":"'.$title.'","date":"'.$date.'","stime":"'.$stime.'","etime":"'.$etime.'","speaker":"'.$speaker.'","venue":"'.$location.'","desc":"'.$desc.'","attachment":"'.$attachment.'"}';
}
$json=$json.']}';
$json=substr($json,0,13).substr($json,14,strlen($json));
echo $json;
?>