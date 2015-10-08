<?php
include('in/header.php');
include('in/authentication.php');
include('in/connect.php');

$count=mysql_result(mysql_query("select count(uid) x from susers"),0,'x');
?>
<style>
table th{
	background:#007acc;
	color:#fff;
	padding:5px;
}
table td{
	padding:5px;
}
table tr:nth-child(even){
	background:#e1e1e1;
}
table{
	margin:0px auto;
	padding:20px 0;
}
</style>

<div id="nav">
	<ul>
	<?php
		include('in/nav.php');
	?>
		
	</ul>
	<div style="clear:both"></div>
</div>

<hr/>
<table>
<tr>
	<th>Employee id</th>
	<th>Name</th>
	<th>Email</th>
</tr>
<?php
for($i=0;$i<$count;$i++){
	echo '<tr>';
	echo '<td>'.mysql_result(mysql_query("select eid x from susers order by uid"),$i,'x').'</td>';
	echo '<td>'.mysql_result(mysql_query("select name x from susers"),$i,'x').'</td>';
	echo '<td>'.mysql_result(mysql_query("select email x from susers"),$i,'x').'</td>';
	echo '</tr>';
}
?>
	</table>
<?php
include('in/footer.php');
?>