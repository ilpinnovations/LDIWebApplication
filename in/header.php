<?php
//error_reporting(0);

session_start();
		
?>
<html>
<head>
	<link href="css/main.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript">
		function _(e){return document.getElementById(e);}
	</script>
</head>
<body>
	<div id="header_hld">
		<div id="header">
			<h1>TCS emerging Leadership Seminar</h1>
			<?php
				if(isset($_SESSION['id'])){
					?>
					
					<a id="logoutbtn" href="logout.php">Log out</a>
					<div class="clr"></div>
					<?php
				}
			?>
		</div>
	</div>
	
		<div id="banner">
<div id="container">