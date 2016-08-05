<?php session_start();
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="Main_template.css" >
</head>

<body>
<?php
	include "init.php";
	if(isset($_POST['add_ques']))
	{
		$sql="INSERT INTO quiz_table(c_id,quiz_name,ques_topic,questions,choice1,choice2,choice3,choice4,answer) VALUES ('".$_SESSION['uid']."','NULL','".$_POST['topic']."','".$_POST['questions']."','".$_POST['choice1']."','".$_POST['choice2']."','".$_POST['choice3']."','".$_POST['choice4']."','".$_POST['answer']."')"; 
		if ($link->query($sql) === TRUE) 
		{
		} else 
		{
			echo "Error: " . $sql . "<br>" . $link->error;
			echo "Database updated";
		}
		$link->close(); 
	}
	
	?>
<?php
include "init.php";
if(isset($_POST['delete']))
{
    	$data=$link->query("SELECT ques_id,ques_topic,questions,choice1,choice2,choice3,choice4,answer FROM quiz_table");
		$p=$_POST['q'];
		foreach($p as $qu)
		{
			$data=$link->query("DELETE FROM `quiz_table` WHERE `ques_id`=".$qu); 
			echo "Database updated";
		}
		$link->close();
}
if(isset($_POST['create']))
{
	$_SESSION['ques'] =$_POST['q'];
	header("Location:create_quiz.php");
}
if(isset($_POST['add']))
{
	/*foreach ($_POST['ejskills'] as $skills)
		$s.=$skills+",";*/
		
	$sql="INSERT INTO `jobs`(`comp_id`, `post_date`, `job_name`, `job_skills`, `job_desc`, `job_status`, `loc_pref`, `exp_req`) VALUES ('".$_SESSION['uid']."',CURDATE( ),'".$_POST['jname']."','".$_POST['jskills']."','".$_POST['jdesc']."','".$_POST['jstatus']."','".$_POST['location']."','".$_POST['experience']."')"; 
		if ($link->query($sql) === TRUE) 
		{
			$id=$link->insert_id;
			$_SESSION['jid']=$id;
			
		} else 
		{
			echo "Error: " . $sql . "<br>" . $link->error;
			echo "Database updated";
		}
		$link->close(); 
}
?>
<div class="container">
<div class="Header_Section">
<div class="logo">TALHUB</div>
<div class="menu">
<ul>
<li><span><a href="Home_Page.html">HOME</a></span></li>
<li><span><a href="About.html">ABOUT</a></span></li>

<li><span><a href="#">CONTACT</a></span></li>
</ul>
</ul>
</div>
</div>
<div class="Main_Section">
<div class="side_panel"><ul class="styleTxt">
<li ><span><a href="comp_dashboard.php">DASHBOARD</a></span></li>
<li ><span><a href="view_profile.php">PROFILE</a></span></li>
<li><span><a href="quiz_create.php">QUESTION BANK</a></span></li>

</ul></div>
<div class="main_panel">
<div class="greetings">Welcome <?php echo $_SESSION['uid']; ?></div>
<p class="header">Create Quiz For the Job: <?php if($_SESSION['jid']!="")echo $_SESSION['jid']; ?></p>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div style="max-height: 425px; width:99%; display: inline-block;overflow: auto;">
    <table cellpadding="10" cellspacing="10" class="db_tab">
	<tr><th>Check Box</th><th>Topic</th><th>Questions</th><th>choice1</th><th>choice2</th><th>choice3</th><th>choice4</th><th>Answer</th></tr>
    
      <?php 
	include "init.php";
	$data=$link->query("SELECT ques_id,ques_topic,questions,choice1,choice2,choice3,choice4,answer FROM quiz_table WHERE c_id='".$_SESSION['uid']."'");
	while($info = $data->fetch_assoc()) 
	 { 
	 echo '<tr><td><input type="checkbox" name="q[]" value="'.$info['ques_id'].'" /></td><td>'.$info['ques_topic'].'</td><td>'.$info['questions'].'</td><td>'.$info['choice1'].'</td><td>'.$info['choice2'].'</td><td>'.$info['choice3'].'</td><td>'.$info['choice4'].'</td><td>'.$info['answer'].'</td></tr>'; 
	 } 
	 $link->close(); 
?>
</table>
</div>
<p><input type="submit" name="create" class="btn" value="Create Quiz"/><input type="submit" name="delete" value="Delete Selected Questions"/></p>
</form>
</div>
</div>
<div class="Footer"><span id="footer_left">Copyright &#169; 2015 talHub | All Rights Reserved</span> </div></div>
</div>
</body>
</html>
