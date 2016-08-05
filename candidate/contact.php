<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="Main_template.css" >
</head>
<?php 
if(isset($_POST['contact']))
{
	sendmail();
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
$mail->addAddress('talhubservices@gmail.com', 'Talhub');  // Add a recipient    // Name is optional

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
// Optional name
$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = 'Here is the subject';
$mail->Body    ="From:". $_POST['email']."<br/>".$_POST['textarea'];
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
<body>
<div class="container">
<div class="Header_Section">
<div class="logo">TALHUB</div>
<div class="menu">
<ul>
<li><span><a href="Home_Page.html">HOME</a></span></li>
<li><span><a href="About.html">ABOUT</a></span></li>
<li><span><a href="contact.php">CONTACT US</a></span></li>

</ul>
</ul>
</div>
</div>
<div class="Main_Section">
<div class="side_panel"></div>
<div class="dashboard">
<form action="contact.php" method="post">
  <table width="700" border="0" align="center" id="feedback_table">
    <tbody>
    <tr><td class="styleTxt">CONTACT US</td></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
      <tr>
        <td class="">Firstname</td>
        <td><input name="textfield" type="text" class="StyleTxtField" id="textfield"></td>
      </tr>
      <tr>
        <td class="">Lastname</td>
        <td><label for="textfield2"></label>
          <input name="textfield2" type="text" class="StyleTxtField" id="textfield2"></td>
      </tr>
      <tr>
        <td class="">Email</td>
        <td><label for="email"></label>
          <input name="email" type="email" class="StyleTxtField" id="email"></td>
      </tr>
      <tr>
        <td class="">Comments</td>
        <td><label for="textarea"></label>
          <textarea name="textarea" cols="35" rows="5" id="textarea"></textarea></td>
      </tr>
      <tr>
        <td class=""></td>
        <td><label for="email"></label>
          <input type="submit" class="btn" name="contact" value="Send"/></td>
      </tr>
    </tbody>
  </table>
</form>
</div>
</div>
<div class="Footer"><span id="footer_left">Copyright &#169; 2015 talHub | All Rights Reserved</span> </div></div>
</div>
</body>
</html>
