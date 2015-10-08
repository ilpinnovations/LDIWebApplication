<?php
	$name=$_GET['name'];
	$eid=$_GET['eid'];
	$email=$_GET['email'];
	$location=$_GET['location'];
	
	include('../in/connect.php');
	mysql_query("insert into susers values('','$eid','$name','$email','$location')");
	
	echo $eid;
?>