<?php
include('in/header.php');
include('in/connect.php');
if(isset($_SESSION['id'])){
		header("Location: home.php");
		die();
}
?>
<style>
#banner{
	background:url('vectors/banner.jpg');
	background-size:banner;
}
#container{
	padding-top:1px;
	padding-bottom:1px;
		background:none;
		box-shadow:none;
}
#contentlog{
	color:#fff;
	background:rgba(0,0,0,0.6);
	width:250px;
	padding:20px;
	box-shadow:0 0 15px rgba(0,0,0,0.7);
	margin:50px;
	float:right;
}
input{
	border:1px solid #555;
	border-left:5px solid #007acc;
	width:250px;
	padding:5px;
	margin:2px 0 5px 0;
}
#login{
	border:1px solid #000;
	background:#007acc;
	color:#fff;
	text-shadow:0 0 2px rgb(0,0,0);
}
#login:hover{
	background:#118bdd;
	cursor:pointer;
}
h2{
	text-align:center;
}
hr{
	margin:10px 0;
}
</style>
		
<?php
	
	if(isset($_POST['username'])){
		$name=mysql_escape_string($_POST['username']);
		$pass=mysql_escape_string($_POST['password']);
		
		$q=mysql_query("select count(uid) x from users where uname='$name' and upass='$pass'");
		$r=mysql_result($q,0,'x');
		echo $r;
		if($r>0){
			$q=mysql_query("select uid x from users where uname='$name' and upass='$pass'");
			$r=mysql_result($q,0,'x');
			$_SESSION['id']=$r;
			header("Location: home.php");
			die();
		}
?>
		<div id="contentlog">
		<form action="index.php" method="post">
			<h2>LOG IN</h2>
			<hr/>
			<p>Username</p>
			<input type="text" name="username" />
			<p>Password</p>
			<input type="password" name="password"/>
			<br/>
			<p style="color:red;text-shadow:0 0 2px #000;">Wrong credentials</p>
			<input id="login" type="submit" value="LOG IN"/>
		</form>
		</div>
		
<?php	
	}else{
?>
		<div id="contentlog">
		<form action="index.php" method="post">
			<h2>LOG IN</h2>
			<hr/>
			<p>Username</p>
			<input type="text" name="username" />
			<p>Password</p>
			<input type="password" name="password"/>
			<br/>
			<input id="login" type="submit" value="LOG IN"/>
		</form>
		</div>
		
<?php
	}
?>
<script type="text/javascript">
		function fullPageForm(){
			var ht=window.innerHeight;
			ht=ht-_('header_hld').offsetHeight-29;
			
			//_('container').style.height=ht+"px";
			_('banner').style.minHeight=(ht-10)+"px";
		}
		fullPageForm();
		
	</script>
		
<?php
		include('in/footer.php');
?>