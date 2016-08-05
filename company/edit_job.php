<?php session_start();?>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="Main_template.css" >
<style>
#edit_job {
width:100%;
height:100%;
opacity:.95;
top:0;
left:0;
display:block;
position:fixed;
background-color:#313131;
overflow:auto
}
img#close {
position:absolute;
right:-14px;
top:-14px;
cursor:pointer
}
div#popupContact {
position:absolute;
left:30%;
top:5%;
margin:auto;
font-family:'Raleway',sans-serif;
color:#000000;
}
#form {
height:650px;
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
window.location.href = './comp_dashboard.php'; 
}

</script>
</head>

<body>
<?php
include "init.php";
if(isset($_POST['edit_page']))
{
	/*foreach ($_POST['ejskills'] as $skills)
		$s.=$skills+",";*/
		
	$sql="update jobs set job_name='".$_POST['ejname']."',job_skills='".$_POST['ejskills']."',job_desc='".$_POST['ejdesc']."',loc_pref='".$_POST['elocation']."',exp_req='".$_POST['eexperience']."',job_status='".$_POST['ejstatus']."' where comp_id='".$_SESSION['uid']."' and job_id='".$_POST['ejid']."'"; 
		if ($link->query($sql) === TRUE) 
		{
			echo "updated successfully";
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
			echo "Profile updated";
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
	$time=$_POST['jhours'].":".$_POST['mins'].":00";
	$data=$link->query("SELECT * FROM test where c_id='".$_SESSION['uid']."' and job_id='".$_POST['jname']."'");
	$info = $data->fetch_all();
	if(count($info)>0)
	$sql="UPDATE test set start_date='".$_POST['quiz_date']."', start_time='".$time."', cut_off='".$_POST['cut-off']."' where c_id='".$_SESSION['uid']."' and job_id='".$_POST['jname']."'"; 
	else
	{
	$sql="INSERT INTO test(job_id,start_date,start_time,c_id) VALUES ('".$_POST['jname']."','".$_POST['quiz_date']."','".$time."','".$_SESSION['uid']."','".$_POST['cut-off']."')"; 
	}
		if ($link->query($sql) === TRUE) 
		{
			echo "Quiz updated";
			sendmail();
		} else 
		{
			echo "Error: ".$sql."<br>".$link->error;			
		}
		$link->close(); 
}
function sendmail()
{
	require 'PHPMailer-master/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->SMTPDebug = 4;
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'talhubservices@gmail.com';                   // SMTP username
	$mail->Password = 'talhubserv';               // SMTP password
	$mail->SMTPSecure = 'tls/ssl';                            // Enable encryption, 'ssl' also accepted
	$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
	$mail->setFrom('talhubservices@gmail.com', 'Talhub');     //Set who the message is to be sent from
	 //Set an alternative reply-to address
	$mail->addAddress('sharadha7290@gmail.com', 'Talhub');  // Add a recipient    // Name is optional
	
	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
	// Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	 
	$mail->Subject = 'Here is the subject';
	$mail->Body    = 'A test has been created';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	 
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->msgHTML(file_get_contents('talhub(2).sql'), dirname(__FILE__));
	 
	if(!$mail->send()) {
	   echo 'Message could not be sent.';
	   echo 'Mailer Error: ' . $mail->ErrorInfo;
	   exit;
	}
	echo 'Message has been sent';

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
<div class="side_panel"></div>
<div class="main_panel">
<div class="greetings">Welcome <?php echo $_SESSION['uid'];?></div>
<div class="styleTxt">
<	<h1>Recent Job Listing</h1>
	<button id="popup" onclick="div_show()">New</button>
<table cellpadding="10" cellspacing="10" width="99%" class="db_tab">
	<tr><th>Job ID</th><th>Dated</th><th>Job Name</th><th>Experience</th><th>Location</th><th>Job Status</th></tr></table>
    <div style="max-height: 550px; width:99%; display: inline-block;overflow: auto; border: 1px solid red;">
<?php 
	echo '<table cellpadding="10" cellspacing="10" width="100%" class="db_tab">';
	$compid=$_SESSION["uid"];
	include "init.php";
	$data=$link->query("SELECT * FROM `jobs` where comp_id='".$compid."' order by post_date");
	while($info = $data->fetch_assoc()) 
	 { 
	 $i=$info['job_id'];
	 echo '<tr><td>'.$info['job_id'].'</td><td>'.$info['post_date'].'</td><td>'.$info['job_name'].'</td><td>'.$info['exp_req'].'</td><td>'.$info['loc_pref'].'</td><td>'.$info['job_status'].'</td><td><form method="post" action="edit_job.php">';
	  echo '<label name="">'.$info['job_id'].'</label><button id="edit" name="'.$info['job_id'].'">Edit</button></form></td></tr>'; 
	 } 
	 $link->close(); 
	 echo "</table>";
?>
</div>
<div id="edit_job">
<!-- Popup Edit div Starts Here -->
<div id="popupContact">
<form action="comp_dashboard.php" id="form" method="post" name="form">
<img id="close" src="images/3.png" onclick ="div_hide()">
<h2>Edit Job</h2>
<?php
include "init.php";
$data=$link->query("SELECT * from jobs where comp_id='".$_SESSION['uid']."'");
while($info = $data->fetch_assoc())
{
	$id=$info['job_id'];
if(isset($_POST[$id]))
$data1=$link->query("SELECT * from jobs where comp_id='".$_SESSION['uid']."' and job_id=".$id);
}
$info1=$data1->fetch_assoc();
echo 'Job ID:<br/><input type="text" name="ejid" size="50" value="'.$info1['job_id'].'" readonly/><br/><br/>Job Name<br/><input type="text" name="ejname" size="50" value="'.$info1['job_name'].'"/><br/><br/>Choose multiple skills<br/><select multiple  name="ejskills">';
	$xml=simplexml_load_file("xml/skills.xml") or die("Error: Cannot create object");
	foreach($xml->children() as $point) 
	{
		$sel=" ";
		if($point==$info1['job_skills'])
		$sel="selected='selected'";
		echo "<option value='".$point."'".$sel.">".$point."</option>";
	}
	echo '</select><br/><br/>
 Job Description<br/><textarea name="ejdesc" rows="5" cols="60" value="'.$info1['job_desc'].'">'.$info1['job_desc'].'</textarea><br/><br/>
 Location<br/><input type="text" name="elocation" size="50" value="'.$info1['loc_pref'].'"/><br/><br/>
 Experience<br/><input type="text" name="eexperience" size="50"  value="'.$info1['exp_req'].'"/><br/><br/>
 Job Status<br/><select name="ejstatus">';
 $sel="";
 if ($info1['job_status']=="Open")
 	$open="selected='selected'";
 if ($info1['job_status']=="In Process")
 	$ip="selected='selected'";
 if ($info1['job_status']=="Closed")
 	$closed="selected='selected'";
	
		echo "<option value='Open' ".$open.">Open</option>";
		echo "<option value='In Process' ".$ip.">In Process</option>";
		echo "<option value='Closed' ".$closed.">Closed</option>";
	echo '</select><br/>';
	?>
 
 <br/>
    <input type="submit" name="edit_page" onclick="check_empty()" value="Update Quiz" />
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
<h1>Click Button To Popup Form Using Javascript</h1>
</div>
</div>
</div>
<div class="Footer"><span id="footer_left">Copyright &#169; 2015 talHub | All Rights Reserved</span><span id="footer_right">Design | talHub</span> </div></div>
</div>
</body>
</html>
