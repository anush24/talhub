<?php session_start();?>
<html>
<head>
<meta charset="utf-8">
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="Home_Style.css" >
</head>

<body>
<?php 
$status="";
if(isset($_POST['clientProf_submit']))
{
include 'init.php';
	$data=$link->query("SELECT * FROM tal_comp where comp_id='".$_POST['username']."'");
	$info = $data->fetch_all();
	if(count($info)>0){
	$status= "Username Exists.Please use a different user name";
	}
	else
	{
	$sql="INSERT INTO `tal_comp`(`comp_id`, `c_loc`, `c_phone`, `comp_name`, `comp_pass`, `comp_desc`, `c_email`) VALUES ('".$_POST['username']."','".$_POST['location']."','".$_POST['tel']."','".$_POST['comp_name']."','".$_POST['password']."','".$_POST['desc']."','".$_POST['email']."')"; 
	
		if ($link->query($sql) === TRUE) 
		{
			$status= "Registration Successful.An email has been sent. Login with your credentials.";
			sendmail(); 
		} else 
		{
			echo "Error: ".$sql."<br>".$link->error;			
		}
	}
		$link->close();
}
function sendmail()
{
require 'PHPMailer-master/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'talhubservices@gmail.com';                   // SMTP username
$mail->Password = 'talhubserv';               // SMTP password
$mail->SMTPSecure = 'tls/ssl';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('talhubservices@gmail.com', 'Talhub');     //Set who the message is to be sent from
 //Set an alternative reply-to address
$mail->addAddress($_POST['email'], 'Talhub');  // Add a recipient    // Name is optional

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
// Optional name
$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = 'Here is the subject';
$mail->Body    = 'Welcome to TalHub,'.$_POST['username'].'!Your Current account details are <br> Username:'.$_POST['username'].'<br/>Password:'.$_POST['password'];
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('PHPMailer-master\examples\contents.html'), dirname(__FILE__));
 
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
}
?>
<?php
if(isset($_POST['logout']))
{
session_destroy();
}
  if(isset($_POST['go']))
  {
	include "init.php";
	$data=$link->query("SELECT * FROM `tal_comp`  where comp_id='".$_POST['uid']."'"); 
	$info = $data->fetch_assoc();
	if($info["comp_pass"]==$_POST['pass'])
	{
		echo $_POST['pass'];
		$_SESSION['uid']=$_POST['uid'];
		#echo "<table><tr><td></td><td><td>Welcome ".$_SESSION['uid'].",</td></tr></table>";
		header( 'Location: comp_dashboard.php' ) ;
	}
		  else
	{
		$status="Sorry, your credentials are not valid, Please try again.";
	}
  }
  ?>
<div class="container">
<div class="Header_Section">
<div class="logo">TALHUB</div>
<div class="menu">
<ul>
<li><span><a href="Home_Page.html">HOME</a></span></li>
<li><span><a href="About.html">ABOUT</a></span></li>
<li><span><a href="register.php">REGISTER</a></span></li>
<li><span><a href="contact.php">CONTACT</a></span></li>
</ul>
</ul>
</div>
</div>
<div class="Main_Section">
<div id="client_credentials">

<form id="login_form" name="login_form" method="post">
  <div align="center" class="login_table">
    <table id="tab" border="0">
      <tbody>
        
        <tr>
          <td>
  </td>
        </tr>
        <tr>
          <td style="color:white;"><?php echo $status; ?></td>
        </tr>
        <tr>
          <td><label for="username"></label>
            
              <div align="center">
                <input name="uid" type="text" class="StyleTxtField" id="username" placeholder="Username">
              </div>
              </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="password"></label>
            <div align="center">
              <input name="pass" type="password" class="StyleTxtField" id="password" placeholder="Password">
            </div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">
            <input name="go" type="submit" class="button_style" id="submit_button" value="SIGN IN">
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
            <p>&nbsp;</p>
            <p><span><a href="register.php">New User?</a></span></p>
          </div></td>
        </tr>
        </tbody>
    </table>
  </div>
</form></div>
</div>
<div class="Footer"><span id="footer_left">Copyright &#169; 2015 talHub | All Rights Reserved</span></div>
</div>

</div>

</body>
</html>
