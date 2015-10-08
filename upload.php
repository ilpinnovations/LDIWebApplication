<?php
include('in/header.php');
include('in/authentication.php');

?>
<style>
 

.tasktable tr:nth-child(odd){
	background:#e5e5e5;
}
.tasktable tr:nth-child(even){
	background:#eee;
}
.tasktable tr:nth-child(1){
	 background:#555;
	color:#fff;
}
.tasktable tr:last-child{
	background:#fff;
}

 .tasktable .datetitletr{
	 background:#555;
	color:#fff;
}
 .tasktable .datetitletd{
	 height:35px;
	 padding-left:5px;
 }
.tasktable th{
	background:#007acc;
	color:#fff;
	padding:5px;
	font-size:12px;
}
.tasktable td{
	text-align:center;
	padding:5px;
	border:none;
}
.tasktable tr td:nth-child(2) input{
	width:150px;
}
.tasktable tr td:nth-child(5) input{
	width:150px;
}
.tasktable tr td:nth-child(6){
	width:350px;
}
.tasktable tr td:nth-child(6) textarea{
	width:350px;
}
.tasktable tr td:nth-child(3) input{
	width:105px;
}
.tasktable tr td:nth-child(4) input{
	width:105px;
}
.tasktable input,.tasktable textarea{padding:5px;}
.tasktable textarea{
	resize:none;
}

button{
	padding:5px 10px;
	margin:2px 5px;
	background:#007acc;
	border:1px solid #888;
	color:#fff;
	min-width:150px;
}
#nav li{
	display:block;
	float:left;
	padding:5px;
	margin:0 5px;
}
</style>
<?php
	if(isset($_FILES['fileToUpload'])){
		//$file=$_POST['file'];
		$target_dir = "sheets/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "<script type='text/javascript'>alert('The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.');</script>";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
		include 'in/reader.php';
    	$excel = new Spreadsheet_Excel_Reader();
		 $excel->read('sheets/'.basename($_FILES["fileToUpload"]["name"])); // set the excel file name here   
        $rows=$excel->sheets[0]['numRows'];
		$cols=$excel->sheets[0]['numCols'];
		if($rows>1 && $cols==8){
				$str='{"schedule":[';
				for($x=2;$x<=$rows;$x++){
					$type=isset($excel->sheets[0]['cells'][$x][1]) ? $excel->sheets[0]['cells'][$x][1] : '';
					$title = isset($excel->sheets[0]['cells'][$x][2]) ? $excel->sheets[0]['cells'][$x][2] : '';
					
					$date = isset($excel->sheets[0]['cells'][$x][3]) ? $excel->sheets[0]['cells'][$x][3] : '';
					
					$stime = isset($excel->sheets[0]['cells'][$x][4]) ? $excel->sheets[0]['cells'][$x][4] : '';
					
					$etime = isset($excel->sheets[0]['cells'][$x][5]) ? $excel->sheets[0]['cells'][$x][5] : '';
					
					$speaker = isset($excel->sheets[0]['cells'][$x][6]) ? $excel->sheets[0]['cells'][$x][6] : '';
					
					$venue = isset($excel->sheets[0]['cells'][$x][7]) ? $excel->sheets[0]['cells'][$x][7] : '';
					
					$desc = isset($excel->sheets[0]['cells'][$x][8]) ? $excel->sheets[0]['cells'][$x][8] : '';
					
					$str=$str.',{"typ":"'.$type.'","title":"'.$title.'","date":"'.$date.'","stime":"'.$stime.'","etime":"'.$etime.'","venue":"'.$venue.'","speaker":"'.$speaker.'","desc":"'.$desc.'"}';
					
				}
				$str=$str.']}';
				$str=substr($str,0,13).substr($str,14,strlen($str));
				
		}else{
			echo 'wrong format.';
		}
		
		  unlink('sheets/'.basename($_FILES["fileToUpload"]["name"]));
        }else if(isset($_POST['schedulestring'])){
			$json=$_POST['schedulestring'];
			mysql_query("insert into schedules value('','$json')");
			echo "<script type='text/javascript'>alert('Schedule added.');</script>";
		}
       
		//mysql_query("insert into schedules value('','$json')");
	
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
<div id="content">
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
	<h2 style="clear:both;">Upload Excel sheet</h2>
	
	<hr style="margin:20px 0;"/>
	<style>
		#uploadform input{
			width:200px;
			padding:5px;
			border:1px solid #666;
		}
	</style>
	<form action="upload.php" method="post" enctype="multipart/form-data" id="uploadform">
		Select a sheet to upload:
		<input type="file" name="fileToUpload" id="fileToUpload"  accept="application/vnd.ms-excel">
		<input type="submit" value="Upload" name="submit">
		<a href="in/Template.xls">Sample excel sheet</a>
	</form>
	<hr style="margin:20px 0;"/>
		<table id="maintable">
	</table>
	
	<form action="upload.php" method="post" id="mainform">
			<textarea id="result" style="display:none;" name="schedulestring"></textarea>

	<table id="day_holder">
	
	</table>
	
	</form>

</div>
<script type="text/javascript">
	
	
		function validate(){
		var validator=true;
		var json='{"schedule":[';
		for(var i=0; i<document.getElementsByClassName('tasktable').length;i++){
			var table=document.getElementsByClassName('tasktable')[i];
			var date=table.childNodes[0].childNodes[0].childNodes[1].childNodes[0].value;
			if(date.length==0){
				validator=false;
			}
			emptyFields(table.childNodes[0].childNodes[0].childNodes[1].childNodes[0]);
			for(var j=2;j<table.childNodes[0].childNodes.length-1;j++){
					for(var k=1;k<6;k++){
						var flag=emptyFields(table.childNodes[0].childNodes[j].childNodes[k].childNodes[0]);
						if(validator==true){
							if(flag==false){
								validator=false;
							}
						}
					}
					var name=table.childNodes[0].childNodes[2].childNodes[1].childNodes[0].value;
					var start=table.childNodes[0].childNodes[2].childNodes[2].childNodes[0].value;
					var end=table.childNodes[0].childNodes[2].childNodes[3].childNodes[0].value;
					var loc=table.childNodes[0].childNodes[2].childNodes[4].childNodes[0].value;
					var desc=table.childNodes[0].childNodes[2].childNodes[5].childNodes[0].value;
					json=json+',{"name":"'+name+'","start":"'+start+'","end":"'+end+'","date":"'+date+'","loc":"'+loc+'","desc":"'+desc+'"}';
			}
			
		}
		json=json+']}';
		json=json.substring(0,13)+json.substring(14,json.length);
		if(validator==true){
			_('result').value=json;
			_('mainform').submit();
		}else{
			alert('You missed some fields.');
		}
	}
	
	function emptyFields(el){
		if(el.value==0){
			el.style.border="1px solid #f00";
			return false;
		}else{
			el.style.border="1px solid #000";
			return true;
		}
	}
	
	function replaceAll(find, replace, str) {
  return str.replace(new RegExp(find, 'g'), replace);
}

function addSession(el){
		var tr=document.createElement('tr');
		tr.innerHTML='<td><input type="text" name="title"/></td><td><input type="text" name="speaker"/></td><td><input type="time" name="stime"/></td><td><input type="time" name="etime"/></td><td><input type="text" name="venue"/></td><td><textarea name="desc"></textarea></td><td><input type="file" name="attachment" class="file"/></td><td style="display:none"><input type="date" name="date"/></td>';
		el.parentNode.parentNode.parentNode.insertBefore(tr,el.parentNode.parentNode);
	}
	function addBreak(el){
		var tr=document.createElement('tr');
		tr.setAttribute('class','break');
		tr.innerHTML='<td ><select><option value="Tea/Coffee">Tea/Coffee</option><option value="lunch">Lunch</option></select></td><td colspan="2">Start Time: <input type="time"/></td><td colspan="2">End Time:<input type="time"/></td><td colspan="2"><input type="date" name="date" style="display:none"/></td>';
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
			var dd=dates[i].substring(0,dates[i].indexOf('/'));
			dd--;
			if(dd<10){
				dd="0"+dd;
			}
			var mm=dates[i].substring(dates[i].indexOf('/')+1,dates[i].lastIndexOf('/'));
			var yy=dates[i].substring(dates[i].lastIndexOf('/')+1,dates[i].length);
			var dat=yy+"-"+mm+"-"+dd;
			str=str+'<td><table id="day_content"><tr><th colspan="7">Date : <input type="date" name="date" value="'+dat+'"/></th></tr><tr><th>Title</th><th>Speaker</th><th>Start time</th><th>End time</th><th>Venue</th><th>Description</th><th>Attachment</th></tr>';
			for(var j=0;j<obj.schedule.length;j++){
				if(obj.schedule[j].date==dates[i]){
					if(obj.schedule[j].typ==1){
							str=str+'<tr><td><input type="text" name="title" value="'+obj.schedule[j].title+'"/></td><td><input type="text" name="speaker"  value="'+obj.schedule[j].speaker+'"/></td><td><input type="time" name="stime"  value="'+obj.schedule[j].stime+'"/></td><td><input type="time" name="etime"  value="'+obj.schedule[j].etime+'"/></td><td><input type="text" name="venue"  value="'+obj.schedule[j].venue+'"/></td><td><textarea name="desc"  >'+obj.schedule[j].desc+'</textarea></td><td><input type="file" name="attachment" class="file"/></td><td style="display:none"><input type="date" name="date"/></td></tr>';
					}else{
						str=str+'<tr><td >';
						if(obj.schedule[j].title=="lunch"){
							str=str+'<select><option value="lunch" selected >Lunch</option><option value="Tea/Coffee">Tea/Coffee</option></select>';
						}else{
							str=str+'<select><option value="lunch" >Lunch</option><option value="Tea/Coffee" selected>Tea/Coffee</option></select>';
						}
						str=str+'</td><td colspan="2" >Start Time: <input type="time"  value="'+obj.schedule[j].stime+'"/></td><td colspan="2">End Time:<input type="time"  value="'+obj.schedule[j].etime+'"/></td><td colspan="2"><input type="date" name="date" style="display:none"/></td></tr>';
					}
					
				}
			}
			str=str+'<tr><td colspan="7"><button type="button"  onclick="addSession(this)">Add Session</button><button type="button"  onclick="addBreak(this)">Add Break</button><button type="button"  onclick="removeEntry(this)">Remove Entry</button></td></tr></table></td></tr>';
		}
		str=str+'<tr><td><button type="button" onclick="addDay(this)">Add Day</button><button type="button"  onclick="removeDay(this)">Remove Day</button><button type="button"  onclick="validate()">Submit</button></td></tr>';
		_('day_holder').innerHTML=str;
	}

	<?php
		if(isset($_FILES['fileToUpload'])){
	?>
			initialLoad('<?php echo $str ?>');
	<?php
		}
	?>	
</script>
<?php
include('in/footer.php');
?>