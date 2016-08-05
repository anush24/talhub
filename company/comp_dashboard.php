<?php session_start();?>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="Main_template.css" >
<style>
#edit_job {
width:100%;
height:100%;
opacity:.95;
top:0;
left:0;
display:none;
position:fixed;
background-color:#313131;
overflow:auto
}
div#popupContact {
position:absolute;
left:30%;
top:20%;
margin:auto;
font-family:'Raleway',sans-serif
}
img#close {
position:absolute;
right:-14px;
top:-14px;
cursor:pointer
}

#form {
height:600px;
width:80%;
padding:10px 50px;
border:2px solid gray;
border-radius:10px;
font-family:raleway;
background-color:#fff
}

</style>
<script>
// Validating Empty Field
function check_empty() 
{
if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") 
{
alert("Fill All Fields !");
}else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}
//Function To Display Popup
function div_show() {
document.getElementById('edit_job').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('edit_job').style.display = "none";
}
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>

</head>

<body>
<?php
include "init.php";
$status="";
if(isset($_POST['edit_page']))
{
	/*foreach ($_POST['ejskills'] as $skills)
		$s.=$skills+",";*/
		
	$sql="update jobs set job_name='".$_POST['ejname']."',job_skills='".$_POST['ejskills']."',job_desc='".$_POST['ejdesc']."',loc_pref='".$_POST['elocation']."',exp_req='".$_POST['eexperience']."',job_status='".$_POST['ejstatus']."' where comp_id='".$_SESSION['uid']."' and job_id='".$_POST['ejid']."'"; 
		if ($link->query($sql) === TRUE) 
		{
			$status="updated successfully";
		} else 
		{
			echo "Error: " . $sql . "<br>" . $link->error;
			echo "Database updated";
		}
		$link->close(); 
}
if(isset($_POST['update_prof']))//After register update
{
	include 'init.php';
	$sql="UPDATE tal_comp set c_loc='".$_POST['location']."', c_phone='".$_POST['tel']."',comp_name='".$_POST['comp_name']."',comp_desc='".$_POST['desc']."',comp_level='".$_POST['size']."',c_email='".$_POST['email']."'"; 
		if ($link->query($sql) === TRUE) 
		{
			$status= "Profile updated";
		} else 
		{
			echo "Error: ".$sql."<br>".$link->error;			
		}
		$link->close(); 
	
}
if (isset($_POST['set']))// from create_quiz page
{
insert_values();
}

function insert_values()
{
	include 'init.php';
	$status="";
	$time=$_POST['jhours'].":".$_POST['mins'].":00";
	$data=$link->query("SELECT * FROM test where c_id='".$_SESSION['uid']."' and job_id='".$_POST['jname']."'");
	$info = $data->fetch_all();
	if(count($info)>0)
	{
		$result1 = $link->query("SELECT distinct(test_id) FROM test where c_id='".$_SESSION['uid']."' and job_id='".$_POST['jname']."'");
	$testid=$result1->fetch_array();
	$id1=$testid[0];
	$sql="UPDATE test set start_date='".$_POST['quiz_date']."', start_time='".$time."', cut_off='".$_POST['cut-off']."' where c_id='".$_SESSION['uid']."' and job_id='".$_POST['jname']."'"; 
	}
	else
	{
		$result1 = $link->query("SELECT max(test_id) FROM test where c_id='".$_SESSION['uid']."'");
	$testid=$result1->fetch_array();
	$id1=$testid[0];
	$sql="INSERT INTO test(job_id,start_date,start_time,c_id,cut_off) VALUES ('".$_POST['jname']."','".$_POST['quiz_date']."','".$time."','".$_SESSION['uid']."','".$_POST['cut-off']."')"; 
	}
		if ($link->query($sql) === TRUE) 
		{
			$status= "Quiz updated";
		} else 
		{
			echo "Error: ".$sql."<br>".$link->error;			
		} 
		$idgen = $_SESSION['ques'];
	
	$xml="<quiz>\n";
	for ($x = 0; $x < count($idgen); $x++)
	{
		//$val = $_SESSION['data'][$x];
		$result = $link->query("SELECT ques_id,c_id,questions,choice1,choice2,choice3, choice4,answer FROM quiz_table where ques_id='". $idgen[$x] ."' and c_id='".$_SESSION['uid']."'");
		while ($row = $result->fetch_assoc())
		{
			$xml .="\t<questions>\n\t\t";
    		$xml .= "<id>".$row["ques_id"]."</id>\n\t\t";
    		$xml .= "<quesno>".$row["questions"]."</quesno>\n\t\t";
    		$xml .= "<choicea>".$row["choice1"]."</choicea>\n\t\t";
    		$xml .= "<choiceb>".$row["choice2"]."</choiceb>\n\t\t";
    		$xml .= "<choicec>".$row["choice3"]."</choicec>\n\t\t";
    		$xml .= "<choiced>".$row["choice4"]."</choiced>\n\t\t";
    		$xml .= "<ans>".$row["answer"]."</ans>\n\t";
    		$xml .="</questions>\n";
		}
	}

	$xml.="</quiz>\n\r";
	$xmlobj=new SimpleXMLElement($xml);
	$parent= $_SERVER['DOCUMENT_ROOT'] ;
	$cid=$parent."final project/talhub/candidate/test".$id1.".xml";
	$xmlobj->asXML($cid);
	$link->close();
	$status= "Quiz updated";
}
?>
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
<div class="side_panel">
<ul class="styleTxt">
<li ><span><a href="comp_dashboard.php">DASHBOARD</a></span></li>
<li ><span><a href="view_profile.php">PROFILE</a></span></li>
<li><span><a href="quiz_create.php">QUESTION BANK</a></span></li>

</ul>
</div>
<div class="dashboard">
<div class="greetings">Welcome <?php echo $_SESSION['uid'];?><form method="post" action="login.php"><input class="btn" type="submit" name="logout" value="Logout"/></form>
</div>
<p id="status"><?php echo $status; ?></p>
<p class="header">Recent Job Listing
	<button id="popup" class="btn" onclick="div_show()">New</button></p>
      <div style="max-height: 200px; width:100%; display: inline-block;overflow: auto;">
<table class="db_tab"  cellspacing="10" width="100%" >
	<tr><th align="center">Job ID</th><th align="center">Dated</th><th align="center">Job Name</th><th align="center">Experience</th><th align="center">Location</th><th align="center">Job Status</th><th align="center"></th></tr>
 
<?php 
	$compid=$_SESSION["uid"];
	include "init.php";
	$data=$link->query("SELECT * FROM `jobs` where comp_id='".$compid."' and job_status!='Closed' order by job_id desc");
	while($info = $data->fetch_assoc()) 
	 { 
		 $i=$info['job_id'];
		 echo '<tr><td align="center">'.$info['job_id'].'</td><td align="center">'.$info['post_date'].'</td><td align="center">'.$info['job_name'].'</td><td align="center">'.$info['exp_req'].'</td><td align="center">'.$info['loc_pref'].'</td><td align="center">'.$info['job_status'].'</td><td align="center"><form method="post" action="edit_job.php">';
		  echo '<button id="edit" class="btn" name="'.$info['job_id'].'">Edit</button></form></td></tr>'; 
	 } 
	 $link->close(); 
	 echo "</table>";
?>
</div>
<p class="header">Recent Quiz Listing</p><form method="post" action="quiz_create.php"><input type="submit" id="popup" class="btn" value="Edit"/></form>
 <div style="max-height: 175px; width:100%; display: inline-block;overflow: auto;">
<table class="db_tab"  cellspacing="10" width="100%" >
	<tr><th align="center">Job ID</th><th align="center">Job Name</th><th align="center">Quiz ID</th><th align="center">Start Date</th><th align="center">Time</th></tr>
   
<?php 
	$compid=$_SESSION["uid"];
	include "init.php";
	$data=$link->query("SELECT a.job_id,a.job_name,b.test_id,b.start_date,b.start_time FROM jobs a, test b where a.job_id=b.job_id and a.comp_id='".$compid."' and a.job_status!='Closed' order by a.job_id desc");
	while($info = $data->fetch_assoc()) 
	 { 
		 echo '<tr><td align="center">'.$info['job_id'].'</td><td align="center">'.$info['job_name'].'</td><td align="center">'.$info['test_id'].'</td><td align="center">'.$info['start_date'].'</td><td align="center">'.$info['start_time'].'</td></tr>';
	 } 
	 $link->close(); 
	 echo "</table>";
?>
</div>



</div>
<div id="edit_job" >
<!-- Popup Edit div Starts Here -->
<div id="popupContact">
<form action="quiz_create.php" id="form" method="post" name="form">
<img id="close" src="images/3.png" onclick ="div_hide()">
<h2>Add New Job</h2>
Job Name <br/><input name="jname" type="text" id="jname" placeholder="Job Name" size="50"/><br/>
 <br/>Choose a Skill Set<br/>
 <select multiple  name="jskills">
    <?php
		$xml=simplexml_load_file("xml/skills.xml") or die("Error: Cannot create object");
		foreach($xml->children() as $point) 
		echo "<option>".$point . "</option>";
	?>
   </select><br/><br/>
 Job Description<br/><textarea name="jdesc" cols="60" rows="5" id="jdesc" placeholder="Job Description.."></textarea><br/><br/>
 Location<br/><input name="location" type="text" id="location" placeholder="location" size="50"/><br/><br/>
 Experience<br/><input name="experience" type="text" id="experience" placeholder="experience" size="50"/><br/><br/>
 Job Status<br/>
 <select name="jstatus"><br/>
     <option name="ejstatus" value="Open">Open</option>
     <option name="ejstatus" value="In Process">In Process</option>
     <option name="ejstatus" value="Closed">Closed</option> 
  </select>
 <br/>
 <br/>
    <input type="submit" class="btn" name="add" onclick="check_empty();MM_validateForm('jname','','R','location','','R','experience','','R','jdesc','','R');return document.MM_returnValue" value="Step 2->Set Quiz Questions" />
</form>
</div>
<!-- Popup Div Ends Here -->
</div>

</div>
<div class="Footer"><span id="footer_left">Copyright &#169; 2015 talHub | All Rights Reserved</span> </div>
</div>
</body>
</html>
