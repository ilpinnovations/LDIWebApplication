<?php
	include('in/header.php');
	include('in/authentication.php');
	include('in/connect.php');
	
	
?>
<div id="nav">
	<ul>
	<?php
		include('in/nav.php');
	?>
		
	</ul>
	<div style="clear:both"></div>
</div>

<hr/>
<style>
@media print{
	#sidebar{
		display:none;
	}
	#nav{
		display:none;
	}
	#printbtn{
		display:none;
	}
	#logoutbtn{
		display:none;
	}
	body{background:#fff;}
	*{
	font-size:25px;	
	}
	table{
		width:100%;
	}
}

#sidebar{
	width:250px;
	float:left;
	background:#666;
	padding:10px;
}
#sidebar a{
	padding:5px;
	color:#fff;
	
}
td{
	padding:3px 5px;
}
tr:nth-child(even){
	background:#f1f1f1;
}
tr:nth-child(odd){
	background:#ddd;
}
#feedback_hld{
	padding:10px 20px;
	float:left;
}
</style>
<div id="sidebar">
<?php

	$query=mysql_query("select speaker x from feedbacks group by speaker");
	while($row=mysql_fetch_array($query)){
		echo '<a href="viewfeedback.php?speaker='.$row['x'].'">'.$row['x'].'</a><br/>';
	}
?>
</div>
<div id="feedback_hld">
	<?php
		if(isset($_GET['speaker'])){
			$speaker=$_GET['speaker'];
			$count=mysql_result(mysql_query("select count(speaker) x from feedbacks where speaker='$speaker'"),0,'x');
			echo '<h2>'.$speaker.'</h2><hr/>Total number of feedbacks:<b>'.$count.'</b>';
			if($count<1){
				?>
				<p>No results found</p>
				<?php
			}else{
				?>
				<button id="printbtn" title="print" style="float:right;background:none;border:none;cursor:pointer;" onclick="window.print()"><img src="vectors/print.png" width="25" alt="Print"/></button>
				<p style="clear:both"></p>
				<table>
					<tr>
						<td colspan="3" style="background:#007acc;color:#fff;">About the Program</td>
					</tr>
					<tr>
						<td>1</td>
						<td>The session met my expectations</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q1) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td>2</td>
						<td>The session content was organized and easy to follow</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q2) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td>3</td>
						<td>The materials distributed were pertinent and useful</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q3) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td>4</td>
						<td>Appropriateness of the session duration</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q4) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td>5</td>
						<td>Quality of the course content and design</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q5) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td>6</td>
						<td>I will be able to apply the knowledge learned</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q6) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td>7</td>
						<td>Overall I liked the session</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q7) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td colspan="3" style="background:#007acc;color:#fff;">About the Facilitator</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Made the session interactive</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q8) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Had adequate knowledge on the subject</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q9) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Able to answer questions and queries effectively</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q10) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td>4</td>
						<td>The facilitator delivered the session effectively using right methodology</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q11) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td>5</td>
						<td>Time management</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q12) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td>6</td>
						<td>The subject content was interesting and relevant</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q13) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td>7</td>
						<td>Good training aids and audio-visual aids were used</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q14) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td>8</td>
						<td>Adequate time was provided for attendee questions</td>
						<td><?php echo number_format(mysql_result(mysql_query("select avg(q15) x from feedbacks where speaker='$speaker'"),0,'x'),1).'/5' ?></td>
					</tr>
					<tr>
						<td colspan="3" style="background:#007acc;color:#fff;">Something that I liked in this session and can implement at my work</td>
					</tr>
					<?php
						for($i=0;$i<$count;$i++){
							?>
								<tr>
									<td><?php echo ($i+1);?></td>
									<td colspan="2"><?php echo mysql_result(mysql_query("select s1 x from feedbacks where speaker='$speaker'"),$i,'x');?></td>
								</tr>
							<?php
						}
					?>
					<tr>
						<td colspan="3" style="background:#007acc;color:#fff;">Opportunity for improvement on content</td>
					</tr>
					<?php
						for($i=0;$i<$count;$i++){
							?>
								<tr>
									<td><?php echo ($i+1);?></td>
									<td colspan="2"><?php echo mysql_result(mysql_query("select s2 x from feedbacks where speaker='$speaker'"),$i,'x');?></td>
								</tr>
							<?php
						}
					?>
					<tr>
						<td colspan="3" style="background:#007acc;color:#fff;">Opportunity for improvement for faculty</td>
					</tr>
					<?php
						for($i=0;$i<$count;$i++){
							?>
								<tr>
									<td><?php echo ($i+1);?></td>
									<td colspan="2"><?php echo mysql_result(mysql_query("select s3 x from feedbacks where speaker='$speaker'"),$i,'x');?></td>
								</tr>
							<?php
						}
					?>
					<tr>
						<td colspan="3" style="background:#007acc;color:#fff;">Other comments / suggestions</td>
					</tr>
					<?php
						for($i=0;$i<$count;$i++){
							?>
								<tr>
									<td><?php echo ($i+1);?></td>
									<td colspan="2"><?php echo mysql_result(mysql_query("select s4 x from feedbacks where speaker='$speaker'"),$i,'x');?></td>
								</tr>
							<?php
						}
					?>
				</table>
				
				<?php
			}
		}else{
			?>
			<p>Select a speaker</p>
			<?php
		}
	?>
</div>
<div style="clear:both"></div>
	<script type="text/javascript">
		_('sidebar').style.height=_('container').offsetHeight-_('nav').offsetHeight-20;
	</script>
<?php
	include('in/footer.php');
?>