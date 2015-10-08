<?php
include('in/header.php');
include('in/authentication.php');
mysql_connect('localhost','root','');
mysql_select_db('schedulerdb');
if(isset($_POST['title']) && isset($_POST['body']) ){
	$title=$_POST['title'];
	$body=$_POST['body'];
	mysql_query("insert into notifications values('','$title','$body')");
	echo 'notification added';
}
?>
<style>
	table{
		margin:auto;
	}
</style>
	<form id="notify" method="post" action="notify.php">
		<table>
			<tr>
				<td>Title:</td>
				<td><input type="text" name="title"/></td>
			</tr>
			<tr>
				<td>Body:</td>
				<td><input type="text" name="body"/></td>
			</tr>
			<tr>
				<td><input type="submit"/></td>
			</tr>
		</table>
		
	</form>
<?php
include('in/footer.php');
?>