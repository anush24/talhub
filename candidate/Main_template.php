<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if(isset($_POST['username']))
    	$_SESSION['name'] = $_POST['username'];
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="Main_template.css" >
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">
function setdate(){
	//alert(document.getElementById('starttime').value);
	var s = document.getElementById('starttime').value;
	var s1 = document.getElementById('endtime').value;
	document.getElementById('starttime').value = s;
    document.getElementById('endtime').value = s1;
    return document.getElementById('starttime').value;
    //window.location.href="new22.php?date=" + s;
}
function myFunction() {

	var dateObj = new Date();
	var month = dateObj.getUTCMonth() + 1;
	var month1 = dateObj.getUTCMonth() + 2; //months from 1-12
	var day = dateObj.getUTCDate();
	var year = dateObj.getUTCFullYear();
	if(month < 10)
	{
		month = "0"+ month;
	}
	if(month1 < 10)
	{
		month1 = "0"+ month1;
	}
	if(day < 10)
	{
		day = "0"+day;
	}
	newdate = year + "-" + month + "-" + day;
	

	new1date = year + "-" + month1 + "-" + day;

    document.getElementById('starttime').value = newdate;
    document.getElementById('endtime').value = new1date;

}

$(function() {
$('#SubmitForm').submit(function( event ) {

	
	var s = document.getElementById('starttime').value;
	var s1 = document.getElementById('endtime').value;
	document.getElementById('starttime').value = s;
    document.getElementById('endtime').value = s1;
    x =  document.getElementById('starttime').value;
    y =  document.getElementById('endtime').value;
	
    $.ajax({
            url: 'new22.php',
            type: 'POST',
            dataType: 'html',
            data: {start: x, end: y},
            success: function(content)
            {
                $("#DisplayDiv").html(content);
            }  
    });

    event.preventDefault();
});

});
</script>
</head>
<body onload='myFunction()'>
<div class="container">
<div class="Header_Section">
<div class="logo">TALHUB</div>
<div class="menu">
<ul>
<li><span><a href="Index1.html">HOME</a></span></li>
<li><span><a href="About.html">ABOUT</a></span></li>
<li><span><a href="contact.php">CONTACT</a></span></li>
<li><span><a href="Index1.html">SIGN OUT</a></span></li>
</ul>
</ul>
</div>
</div>
<div class="Main_Section">
<div class="side_panel"></div>
<div class="main_panel">
<!--<div class="greetings"></div>-->
<div id="events"><span>Upcoming TalHub Events</span></div>
<div id="choosedate">
	<form method="post" id="SubmitForm">
		<input type="date" name="starttime" id="starttime"/>
		<input type="date" name="endtime" id="endtime"/>
		<input type="submit" name="set" value="Show Tests" id="buts">
	</form>
</div>
<div id="DisplayDiv">
	<?php
		include "init.php";
		$data=$link->query("SELECT skillset FROM usertable where email='".$_SESSION['name']."'");
		$rows = $data->fetch_array();
		$userskill = $rows[0];
		$skillsplit = explode (",", $userskill); 
	
		for($t=0;$t<count($skillsplit);$t++)
		{
			if($t == (count($skillsplit) - 1))
				$d1 = "'" .$skillsplit[$t]. "'";
			else{
				$d1 = "'" .$skillsplit[$t].  "'".",";
			}
			if($t == 0)
				$d2 = $d1;
			else{
				$d2 = $d2 . $d1;
			}
		}

		$data=$link->query("select job_id from jobs where job_skills in (".$d2.")");
		$jobs = $data->fetch_all();
	
		for($i=0;$i<count($jobs);$i++)
		{
			date_default_timezone_set('America/Los_Angeles');
					$current_date = date('Y-m-d');
					$current_time = date('H:i:s');
			$data1=$link->query("SELECT * FROM test join tal_comp on test.c_id=tal_comp.comp_id join jobs on jobs.job_id=test.job_id where jobs.job_status!='closed' and jobs.job_id='".$jobs[$i][0]."' and test.start_date >= '".$current_date."'");
			$tests = $data1->fetch_all();
			$_SESSION['num'] = count($tests);
			for($x=0;$x<count($tests);$x++)
			{
				echo "<div class='testdata1'>\n";
				echo "<span>".$tests[$x][18]." test on ".$tests[$x][1]." </span>\n";
				echo "</div>\n";
	 			echo "<div class='testinfo1'>\n";
	  			echo "<span>This test is conducted by ".$tests[$x][9]. ". It is scheduled after ".$tests[$x][2]." </span>\n";
				$testname = 'test'.$tests[$x][0];
				$data2=$link->query("SELECT * FROM qui_register where test_id='".$tests[$x][0]."' and s_email='".$_SESSION['name']."'");
				$testdetail = $data2->fetch_all();
				if(!$testdetail)
				{
					echo "<form method='post' action='register.php'>\n";
					echo "<input type='submit' name='".$testname."' value='Register' id='testing1'>\n";
					echo "</form>\n";
				}
				else{
					date_default_timezone_set('America/Los_Angeles');
					$current_date = date('Y-m-d');
					$current_time = date('H:i:s');
					$time = strtotime($tests[0][2]);
					$tu = date("H:i", strtotime('+15 minutes', $time));
					
//if(($current_date == $tests[0][1]) and ($current_time >= $tests[0][2])){
					if($current_date >= $tests[0][1]){
						//if($tests[0][2] < $tu)
						//{
						$data3=$link->query("select * from testtaken where s_email='".$_SESSION['name']."' and test_id='".$tests[$x][0]."'");
						$teststatus = $data3->fetch_all();
						if(count($teststatus)==0)
						{
						//		echo $tu;
								echo "<form method='post' action='check.php'>\n";
								echo "<input type='submit' name='".$testname."' value='taketest' id='testing1'>\n";
								echo "</form>\n";
						}
						else{
								echo "<form method='post' action='check.php'>\n";
								echo "<input type='submit' name='".$testname."' value='taketest' id='testing1'  disabled='disabled'>\n";
								echo "</form>\n";
							}
						//}
						//else
						//{
						//	echo "<form method='post' action='check.php'>\n";
						//	echo "<input type='submit' name='".$testname."' value='taketest' id='testing1'  disabled='disabled'>\n";
						//	echo "</form>\n";
						//}
					}
					else{
						echo "<form method='post' action='register.php'>\n";
						echo "<input type='submit' name='".$testname."' value='Registered' id='testing1' disabled='disabled'>\n";
						echo "</form>\n";
				}
			}
	  		echo "</div>\n";
	  	}	
	  }
	?>
	</div>
</div>
</div>
<div class="Footer"><span id="footer_left">Copyright &#169; 2015 talHub | All Rights Reserved</span> </div></div>
</div>
</body>
</html>
