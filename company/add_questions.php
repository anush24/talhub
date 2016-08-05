<?php session_start(); ?>
<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="Main_template.css" >
<script type="text/javascript">
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

</ul></div>
<div class="dashboard">
<div class="greetings">Welcome <?php echo $_SESSION['uid']; ?><form method="post" action="login.php"><input class="btn" type="submit" name="logout" value="Logout"/></form></div>
	<p class="header">Add Questions</p>
	
   
    <form  action="quiz_create.php"  method="POST" style="margin-left:30px" >
    Question<br/><textarea name="questions" cols="60" rows="5" id="questions" placeholder="Please type your Question here.."></textarea><br/>
    Choice 1<br/><input name="choice1" type="text" id="choice1" size="50"/><br/>
    Choice 2<br/><input name="choice2" type="text" id="choice2" size="50"/><br/>
   Choice 3<br/><input name="choice3" type="text" id="choice3" size="50"/><br/>
   Choice 4<br/><input name="choice4" type="text" id="choice4" size="50"/><br/>
   Answer<br/><input name="answer" type="text" id="answer" size="50"/><br/>
   Choose question topic<br/>
    <select name="topic">
    <?php
	$xml=simplexml_load_file("xml/qtopics.xml") or die("Error: Cannot create object");
	foreach($xml->children() as $point) 
	echo "<option>".$point . "</option>";
	?>
    <input class="btn" type="submit" name="add_ques"  value="Update Quiz" onClick="MM_validateForm('choice1','','R','choice2','','R','choice3','','R','choice4','','R','answer','','R','questions','','R');return document.MM_returnValue" />
    <input class="btn" type="submit" name="back"  value="Back" />
    </form>
<?php
	include "init.php";
	if(isset($_POST['add']))
	{
		$sql="INSERT INTO quiz_table(c_id,quiz_name,ques_topic,questions,choice1,choice2,choice3,choice4,answer) VALUES (1,'NULL','".$_POST['topic']."','".$_POST['questions']."','".$_POST['choice1']."','".$_POST['choice2']."','".$_POST['choice3']."','".$_POST['choice4']."','".$_POST['answer']."')"; 
		if ($link->query($sql) === TRUE) 
		{
			echo "New record created successfully";
		} else 
		{
			echo "Error: " . $sql . "<br>" . $link->error;
			echo "Database updated";
			$link->close(); 
		}
	}
	
	?>
</div>
</div>
<div class="Footer"><span id="footer_left">Copyright &#169; 2015 talHub | All Rights Reserved</span> </div></div>
</div>
</body>
</html>
