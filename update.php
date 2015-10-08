<?php
include('in/header.php');
include('in/authentication.php');
include('in/connect.php');
?>
<?php
	if(isset($_POST['numOfEntries'])){
		$num=$_POST['numOfEntries'];
		for($i=0;$i<$num;$i++){
			$json="";
			if(isset($_FILES['attachment'.$i])){
				$target_dir = "attachments/";
				$target_file = $target_dir . basename($_FILES["attachment".$i]["name"]);
				if (move_uploaded_file($_FILES["attachment".$i]["tmp_name"], $target_file)) {
					$date=$_POST["date".$i];
					$title=$_POST["title".$i];
					$stime=$_POST["stime".$i];
					$etime=$_POST["etime".$i];
					if($title=="Lunch" || $title=="Tea/Coffee"){
						$id=mysql_result(mysql_query("select count('sid') x from session_details"),0,'x');
						mysql_query("insert into session_details values('',2,'$title','$date','$stime','$etime','none','none','none')");
					}else{
						$speaker=$_POST["speaker".$i];
						$venue=$_POST["venue".$i];
						$desc=$_POST["desc".$i];
						$attachment=$target_file;
						$id=mysql_result(mysql_query("select count('sid') x from session_details"),0,'x');
						mysql_query("insert into session_details values('',1,'$title','$date','$stime','$etime','$speaker','$venue','$desc')");
					}
					
				}else{
						$date=$_POST["date".$i];
					$title=$_POST["title".$i];
					$stime=$_POST["stime".$i];
					$etime=$_POST["etime".$i];
					if($title=="lunch" || $title=="tea/Coffee"){
						$id=mysql_result(mysql_query("select count('sid') x from session_details"),0,'x');
						mysql_query("insert into session_details values('',2,'$title','$date','$stime','$etime','none','none','none')");
					}else{
						$speaker=$_POST["speaker".$i];
						$venue=$_POST["venue".$i];
						$desc=$_POST["desc".$i];
						$attachment=$target_file;
						mysql_query("insert into session_details values('',1,'$title','$date','$stime','$etime','$speaker','$venue','$desc')");
					}
				
				}
			}else{
				$date=$_POST["date".$i];
					$title=$_POST["title".$i];
					$stime=$_POST["stime".$i];
					$etime=$_POST["etime".$i];
					if($title=="lunch" || $title=="tea/Coffee"){
						$id=mysql_result(mysql_query("select count('sid') x from session_details"),0,'x');
						mysql_query("insert into session_details values('',2,'$title','$date','$stime','$etime','none','none','none')");
					}else{
						echo 'session';
						$speaker=$_POST["speaker".$i];
						$venue=$_POST["venue".$i];
						$desc=$_POST["desc".$i];
						$attachment=$target_file;
						mysql_query("insert into session_details values('',1,'$title','$date','$stime','$etime','$speaker','$venue','$desc')");
					}
				
			}
		}
		
		
		echo '<p style="color:green">Schedule added successfully</p>';
	}else{
		mysql_connect('localhost','root','');
		mysql_select_db('schedulerdb');
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
		$json=$json.',{"tid":"'.$sid.'","typ":"'.$typ.'","title":"'.$title.'","date":"'.$date.'","stime":"'.$stime.'","etime":"'.$etime.'","speaker":"'.$speaker.'","venue":"'.$location.'","desc":"'.$desc.'"}';
}
$json=$json.']}';
$json=substr($json,0,13).substr($json,14,strlen($json));
$json=trim(preg_replace('/\s+/',' ',$json));
			
	
?>
<style>
#day_content tr{
 background:#e3e3e3;
}

#day_content td:nth-child(1){
	width:15px;
}

#day_content td:nth-child(2) input{
	
}

.file{
width:95px;
height:35px;
overflow:hidden;
}

.file::-webkit-file-upload-button{
	visibility:hidden;
}
.file::before{
	content:'Select a file';
	display:inline-block;
	background:-webkit-linear-gradient(top,#f9f9f9,#e3e3e3);
	border:1px solid #999;
	border-radius:3px;
	padding:5px;
	outline:none;
	white-space:nowrap;
	-webkit-user-select:none;
	cursor:pointer;
	text-shadow:1px 1px #fff;

}

#day_content input{
	padding:3px;
}
#day_content th{
	color:#fff;
	background:#007acc;
	padding:5px;
}

.break td{
	background:#777;
	padding:2px 5px;
	color:#fff;
}
.break select{
padding:5px;
}
button{
	padding:3px 10px;
	background:#007acc;
	border:none;
	color:#fff;
	margin:5px;
}
button:hover{
	background:#0058aa;
	cursor:pointer;
}

</style>
<div id="nav">
	<ul>
	<?php
		include('in/nav.php');
	?>
		
	</ul>
</div>
<br/>
	<div class="clr"></div>
	<hr/>
<form action="home.php" method="post" id="mainform" enctype="multipart/form-data">
		<input type="number" style="display:none" name="numOfEntries" value="0" id="numOfEntries"/>
	
		<div id="content">
			<table id="day_holder">
				<tr>
					<td>
						<p>Schedule</p>
					</td>
				</tr>
				<tr id="day_content_tr">
					<td>
						<table id="day_content">
							<tr>
								<th colspan="7">Date : <input type="date" name="date"/></th>
							</tr>
							<tr>
								<th>Title</th>
								<th>Speaker</th>
								<th>Start time</th>
								<th>End time</th>
								<th>Venue</th>
								<th>Description</th>
								<th>Attachment</th>
							</tr>
							<tr id="session_content_tr">
								<td><input type="text" name="title"/></td>
								<td><input type="text" name="speaker"/></td>
								<td><input type="time" name="stime"/></td>
								<td><input type="time" name="etime"/></td>
								<td><input type="text" name="venue"/></td>
								<td><textarea name="desc"></textarea></td>
								<td><input type="file" name="attachment" class="file"/></td>
								<td style="display:none"><input class="hidden" type="date" name="date"/></td>
							</tr>
							
							<tr>
								<td colspan="7">
								<button type="button"  onclick="addSession(this)">Add Session</button>
								<button type="button"  onclick="addBreak(this)">Add Break</button>
								<button type="button"  onclick="removeEntry(this)">Remove Entry</button>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<button type="button" onclick="addDay(this)">Add Day</button>
						<button type="button"  onclick="removeDay(this)">Remove Day</button>
						<button type="button"  onclick="validate()">Submit</button>
					</td>
				</tr>
			</table>
		</div>
			
	</form>
<script type="text/javascript">
	function _(e){
		return document.getElementById(e);
	}
	
	function addSession(el){
		var tr=document.createElement('tr');
		tr.innerHTML='<td><input type="text" name="title"/></td><td><input type="text" name="speaker"/></td><td><input type="time" name="stime"/></td><td><input type="time" name="etime"/></td><td><input type="text" name="venue"/></td><td><textarea name="desc"></textarea></td><td><input type="file" name="attachment" class="file"/></td><td style="display:none"><input type="date" class="hidden" name="date"/></td>';
		el.parentNode.parentNode.parentNode.insertBefore(tr,el.parentNode.parentNode);
	}
	function addBreak(el){
		var tr=document.createElement('tr');
		tr.setAttribute('class','break');
		tr.innerHTML='<td ><select><option value="Tea/Coffee">Tea/Coffee</option><option value="lunch">Lunch</option></select></td><td colspan="2">Start Time: <input type="time" name="stime"/></td><td colspan="2">End Time:<input type="time" name="etime"/></td><td colspan="2"><input class="hidden" type="date" name="date" style="display:none"/></td>';
		el.parentNode.parentNode.parentNode.insertBefore(tr,el.parentNode.parentNode);
	}
	function addDay(el){
		var tr=document.createElement('tr');
		tr.innerHTML='<table><tr><th colspan="7">Date : <input type="date" name="date"/></th></tr><tr><th>Title</th><th>Speaker</th><th>Start time</th><th>End time</th><th>Venue</th><th>Description</th><th>Attachment</th></tr><tr id="session_content_tr"><td><input type="text" name="title"/></td><td><input type="text" name="speaker"/></td><td><input type="time" name="stime"/></td><td><input type="time" name="etime"/></td><td><input type="text" name="venue"/></td><td><textarea name="desc"></textarea></td><td><input type="file" name="attachment" class="file"/></td><td style="display:none"><input type="date" name="date"/></td></tr><tr><td colspan="7"><button type="button"  onclick="addSession(this)">Add Session</button><button type="button"  onclick="addBreak(this)">Add Break</button><button type="button"  onclick="removeEntry(this)">Remove Entry</button></td></tr></table>';
		el.parentNode.parentNode.parentNode.insertBefore(tr,el.parentNode.parentNode);		
	}
	
	function removeEntry(el){
		var parent=el.parentNode.parentNode.parentNode;
		if(parent.getElementsByTagName('tr').length>4){
			parent.removeChild(parent.getElementsByTagName('tr')[parent.getElementsByTagName('tr').length-2]);
		}else{
			alert('Schedule of a day cannot be empty');
		}
		
	}
	
	function removeDay(el){
		var parent=el.parentNode.parentNode.parentNode;
		if(parent.childNodes.length>6){
			parent.removeChild(parent.childNodes[parent.childNodes.length-3]);
		}else{
			alert('Schedule cannot be empty');
		}
	}
	
	function validate(){
		var flag_title=true;
		var flag_speaker=true;
		var flag_stime=true;
		var flag_etime=true;
		var flag_venue=true;
		var flag_desc=true;
		var flag_date=true;
		
		//checking for empty title
		for(var i=0;i<document.getElementsByName('title').length;i++){
			if(document.getElementsByName('title')[i].value.length<1){
				document.getElementsByName('title')[i].style.border="1px solid #f00";
				flag_title=false;
			}
		}
		
		//checking for empty speaker
		for(var i=0;i<document.getElementsByName('speaker').length;i++){
			if(document.getElementsByName('speaker')[i].value.length<1){
				document.getElementsByName('speaker')[i].style.border="1px solid #f00";
				flag_speaker=false;
			}
		}
		
		//checking for empty start time
		for(var i=0;i<document.getElementsByName('stime').length;i++){
			if(document.getElementsByName('stime')[i].value.length<1){
				document.getElementsByName('stime')[i].style.border="1px solid #f00";
				flag_stime=false;
			}
		}
		
		//checking for empty end time
		for(var i=0;i<document.getElementsByName('etime').length;i++){
			if(document.getElementsByName('etime')[i].value.length<1){
				document.getElementsByName('etime')[i].style.border="1px solid #f00";
				flag_etime=false;
			}
		}
		
		
		//checking for empty venue
		for(var i=0;i<document.getElementsByName('venue').length;i++){
			if(document.getElementsByName('venue')[i].value.length<1){
				document.getElementsByName('venue')[i].style.border="1px solid #f00";
				flag_venue=false;
			}
		}
		
		//checking for empty description
		for(var i=0;i<document.getElementsByName('desc').length;i++){
			if(document.getElementsByName('desc')[i].value.length<1){
				document.getElementsByName('desc')[i].style.border="1px solid #f00";
				flag_desc=false;
			}
		}
		
		//checking for empty date
		for(var i=0;i<document.getElementsByName('date').length;i++){
			if(document.getElementsByName('date')[i].getAttribute("class")!="hidden"){
					if(document.getElementsByName('date')[i].value.length<1){
						document.getElementsByName('date')[i].style.border="1px solid #f00";
						flag_date=false;
					}
			}
		}
		
		
		if(flag_date==false || flag_title==false || flag_speaker==false || flag_stime==false || flag_etime==false || flag_venue==false || flag_desc==false){
			alert('You missed some fields.');
		}else{
			alert('submit');
			//submitcheck();
		}
		
			//submitcheck();
			
	}
	function submitcheck(){
			var pointer=-1;
			var max=(_('day_holder').childNodes[0].childNodes.length-2);
			for(var i=1;i<max;i++){
				if(_('day_holder').childNodes[0].childNodes[i].innerHTML!=null){
					alert(_('day_holder').childNodes[0].childNodes[i].childNodes[0].childNodes[0].childNodes[0].innerHTML);
					var table=_('day_holder').childNodes[0].childNodes[i].childNodes[0].childNodes[0].childNodes[0];
					var date=_('day_holder').childNodes[0].childNodes[i].childNodes[0].childNodes[0].childNodes[0].childNodes[0].childNodes[0].getElementsByTagName('input')[0].value;
					
					var dayTable=_('day_holder').childNodes[0].childNodes[i].childNodes[0].childNodes[0].childNodes[0];
					for(var j=3;j<dayTable.childNodes.length-2;j++){
						if(dayTable.childNodes[j].innerHTML!=null){
							pointer++;
							
							var tr=dayTable.childNodes[j];
							
							if(tr.getAttribute('class')=="break"){
								typ=2;
								tr.childNodes[0].childNodes[0].setAttribute('name',"title"+pointer);
								tr.childNodes[1].getElementsByTagName('input')[0].setAttribute('name',"stime"+pointer);
								tr.childNodes[2].getElementsByTagName('input')[0].setAttribute('name',"etime"+pointer);
								tr.childNodes[3].getElementsByTagName('input')[0].setAttribute('name',"date"+pointer);
								tr.childNodes[3].getElementsByTagName('input')[0].setAttribute('value',date);
							}else{
								typ=1;
								tr.childNodes[1].childNodes[0].setAttribute('name',"title"+pointer);
								tr.childNodes[3].childNodes[0].setAttribute('name',"speaker"+pointer);
								tr.childNodes[5].childNodes[0].setAttribute('name',"stime"+pointer);
								tr.childNodes[7].childNodes[0].setAttribute('name',"etime"+pointer);
								tr.childNodes[9].childNodes[0].setAttribute('name',"venue"+pointer);
								tr.childNodes[11].childNodes[0].setAttribute('name',"desc"+pointer);
								tr.childNodes[13].childNodes[0].setAttribute('name',"attachment"+pointer);
								tr.childNodes[15].childNodes[0].setAttribute('name',"date"+pointer);
								tr.childNodes[15].childNodes[0].setAttribute('value',date);
							}
							
						}
					}		
				}			
			}
			
		_('numOfEntries').value=pointer+1;
			
		_('mainform').submit();
	}

	function initialLoad(json){
		
		var obj=JSON.parse(json);
		var dates=new Array();
		for(var i=0;i<obj.schedule.length;i++){
			var date=obj.schedule[i].date;
			if(dates.indexOf(date)==-1){
				dates.push(date);
			}
		}
		var str='';
		for(var i=0;i<dates.length;i++){
			str=str+'<td><table id="day_content"><tr><th colspan="7">Date : <input type="date" name="date" value="'+dates[i]+'"/></th></tr><tr><th>Title</th><th>Speaker</th><th>Start time</th><th>End time</th><th>Venue</th><th>Description</th><th>Attachment</th></tr>';
			for(var j=0;j<obj.schedule.length;j++){
				if(obj.schedule[j].date==dates[i]){
					if(obj.schedule[j].typ==1){
							str=str+'<tr><td><input type="text" name="title" value="'+obj.schedule[j].title+'"/></td><td><input type="text" name="speaker"  value="'+obj.schedule[j].speaker+'"/></td><td><input type="time" name="stime"  value="'+obj.schedule[j].stime+'"/></td><td><input type="time" name="etime"  value="'+obj.schedule[j].etime+'"/></td><td><input type="text" name="venue"  value="'+obj.schedule[j].venue+'"/></td><td><textarea name="desc"  >'+obj.schedule[j].desc+'</textarea></td><td><input type="file" name="attachment" class="file"/></td><td style="display:none"><input class="hidden" type="date" name="date"/></td></tr>';
					}else{
						str=str+'<tr><td >';
						if(obj.schedule[j].title=="lunch"){
							str=str+'<select><option value="lunch" selected >Lunch</option><option value="Tea/Coffee">Tea/Coffee</option></select>';
						}else{
							str=str+'<select><option value="lunch" >Lunch</option><option value="Tea/Coffee" selected>Tea/Coffee</option></select>';
						}
						str=str+'</td><td colspan="2" >Start Time: <input type="time"  value="'+obj.schedule[j].stime+'"/></td><td colspan="2">End Time:<input type="time"  value="'+obj.schedule[j].etime+'"/></td><td colspan="2"><input type="date" class="hidden" name="date" style="display:none"/></td></tr>';
					}
					
				}
			}
			str=str+'<tr><td colspan="7"><button type="button"  onclick="addSession(this)">Add Session</button><button type="button"  onclick="addBreak(this)">Add Break</button><button type="button"  onclick="removeEntry(this)">Remove Entry</button></td></tr></table></td></tr>';
		}
		str=str+'<tr><td><button type="button" onclick="addDay(this)">Add Day</button><button type="button"  onclick="removeDay(this)">Remove Day</button><button type="button"  onclick="validate()">Submit</button></td></tr>';_('day_holder').innerHTML=str;
	}
	initialLoad('<?php echo $json ?>');
	
	
</script>
<?php
	}
include('in/footer.php');
?>
