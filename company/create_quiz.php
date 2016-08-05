<?php session_start();?>
<!doctype html>
<html>
<head><title>Set Quiz</title>
<script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n') 
    } 
</script>
<script>
if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
    jQuery(function($){ //on document.ready
        $('#quiz_date').datepicker({
  dateFormat: "yy-mm-dd"
});
    })
}
</script>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="Main_template.css" >
</head>

<body>
<div class="container">
<div class="Header_Section">
<div class="logo">TALHUB</div>
<div class="menu">
<ul>
<li><span><a href="Home_Page.html">HOME</a></span></li>
<li><span><a href="About.html">ABOUT</a></span></li>

<li><span><a href="contact.php">CONTACT</a></span></li>
</ul>
</ul>
</div>
</div>
<div class="Main_Section">
<div class="side_pane">
<form  action="comp_dashboard.php"  method="POST">
 Job Name<br/><select name="jname">
    <?php
	include "init.php";
$data=$link->query("SELECT job_id,job_name FROM jobs where comp_id='".$_SESSION['uid']."' and job_status!='Closed'")or die(mysql_error());  
while($info = $data->fetch_assoc())
{
	if($info['job_id']==$_SESSION['jid'])
		echo '<option name="jname" selected="selected" value="'.$info['job_id'].'">' . $info['job_id'].".".$info['job_name'].'</option>';
	else
        echo '<option name="jname" value="'.$info['job_id'].'">' . $info['job_id'].".".$info['job_name'].'</option>';   
		
}
echo '</select>';
$link->close(); 
	?>
    <br/><br/>Quiz Date<input type="date" id="quiz_date" name="quiz_date" size="20" />
    <br/><br/>Hrs<select name="jhours">
    <?php
	for ($i=1;$i<=23;$i++)
		echo '<option name="jhours" value="'.$i.'">'.$i.'</option>';
	echo '</select>';
	?>
	Min<select name="mins">
    <?php
	for ($i=1;$i<=60;$i++)
		echo '<option name="mins" value="'.$i.'">'.$i.'</option>';
	echo '</select>';
	?><br/><br/>
    Cut-off<select name="cut-off">
    <?php
	for ($i=100;$i>=5;$i=$i-5)
	{
		echo '<option name="cut_off" value="'.$i.'">'.$i.'%</option>';
	}
	echo '</select>';
	?><br/><br/>
    <input type="submit" class="btn" name="set"  value="Set Quiz" />
    </form></div>
<div class="dashboard">
<div class="greetings">Welcome <?php echo $_SESSION['uid']; ?><form method="post" action="login.php"><input class="btn" type="submit" name="logout" value="Logout"/></form></div>
  <form action="update_quiz.php" method="post">
  <p class="header">Quiz Preview</p><BR/><BR/>
<?php 
	include "init.php";
	$ques_choice= $_SESSION['ques'];
	if(count($ques_choice))
	{
		foreach($ques_choice as $qu)
		{
			$data=$link->query("SELECT * FROM `quiz_table` where `ques_id`=".$qu); 
			$info = $data->fetch_assoc();
			echo $info['questions'];
			echo '<br/><label for="'.$qu.'"><input type="radio" name="'.$qu.'" value="'.$info['choice1'].'"/>'.$info['choice1'].'</label><br/><label for="'.$qu.'"><input type="radio" name="'.$qu.'" value="'.$info['choice2'].'"/>'.$info['choice2'].'</label><br/><label for="'.$qu.'"><input type="radio" name="'.$qu.'" value="'.$info['choice3'].'"/>'.$info['choice3'].'</label><br/><label for="'.$qu.'"><input type="radio" name="'.$qu.'" value="'.$info['choice4'].'"/>'.$info['choice4'].'</label><br/><br/><br/>';  	
		}
		$link->close();
	}
	else
	echo "Please choose anything";
?>
</div>
</form>
</div>
<div class="Footer"><span id="footer_left">Copyright &#169; 2015 talHub | All Rights Reserved</span><span id="footer_right">Design | talHub</span> </div>
</div>

</div>
</body>
</html>
