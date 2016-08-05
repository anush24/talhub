<?php session_start();
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
<link rel="stylesheet" type="text/css" href="Main_template.css" >
</head>

<body>
<?php
include "init.php";
$status="";
if(isset($_POST['ed_prof']))
{
		$sql="update tal_comp set comp_name='".$_POST['comp_name']."',c_email='".$_POST['email']."',c_loc='".$_POST['location']."',c_phone='".$_POST['tel']."',comp_desc='".$_POST['desc']."' where comp_id='".$_SESSION['uid']."'"; 
		if ($link->query($sql) === TRUE) 
		{
			$status= "Profile Updated successfully";
		} 
}
	$data=$link->query("SELECT * FROM `tal_comp` where comp_id='".$_SESSION['uid']."'");
	$info = $data->fetch_assoc();
	  
	 $link->close(); 

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
<div class="side_panel"><ul class="styleTxt">
<li ><span><a href="comp_dashboard.php">DASHBOARD</a></span></li>
<li ><span><a href="view_profile.php">PROFILE</a></span></li>
<li><span><a href="quiz_create.php">QUESTION BANK</a></span></li>

</ul></div>
<div class="profile">
<div class="greetings">Welcome <?php echo $_SESSION['uid']; ?><form method="post" action="login.php"><input class="btn" type="submit" name="logout" value="Logout"/></form></div>
<p class="header">PROFILE INFORMATION</p>
<form method="post" action="edit_profile.php" enctype="multipart/form-data" name="login_form" id="login_form">
  <div align="center" class="login_table">
    <table width="400" border="0">
      <tbody>
        <tr>
          <td class="styleTxt">COMPANY NAME</td>
          <td class="styleTxt"><label for="company_name"></label>
            <div align="right">
              <input name="comp_name" type="text" class="StyleTxtField" style="background-color:black; color:white;" id="company_name" readonly  value="<?php echo $info['comp_name'];?>">
            </div></td>
        </tr>
        <tr>
          <td class="styleTxt">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="styleTxt">E-MAIL</td>
          <td><label for="username"></label>
            <label for="email"></label>
            <div align="right">
              <input name="email" type="email" class="StyleTxtField" style="background-color:black; color:white;" id="email" value="<?php echo $info['c_email'];?>"readonly>
            </div></td>
          </tr>       
        <tr>
          <td class="styleTxt">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="styleTxt">LOCATION</td>
          <td><label for="location"></label>
            <div align="right">
              <input name="location" type="text" class="StyleTxtField" value="<?php echo $info['c_loc'];?>" style="background-color:black; color:white;" id="location" readonly>
            </div></td>
        </tr>
        <tr>
          <td class="styleTxt">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="styleTxt">PHONE NUMBER</td>
          <td><label for="phone"></label>
            <div align="right">
              <input name="tel" type="tel" class="StyleTxtField" style="background-color:black; color:white;" value="<?php echo $info['c_phone'];?>" id="phone" readonly>
            </div></td>
        </tr>
        <tr>
          <td class="styleTxt">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="styleTxt">DESCRIPTION</td>
          <td><label for="desc"></label>
            <div align="right">
              <textarea name="desc" class="desc_style" id="desc" style="background-color:black; color:white;" cols="24" rows="7" readonly><?php echo $info['comp_desc'];?></textarea>
            </div></td>
        </tr>
         <tr>
          <td class="styleTxt">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
         <tr>
          <td ></td>
          <td><label for="desc"></label>
            <div align="right">
              <input class="btn" name="" style="height:30px;" type="submit" value="Edit Profile"/>
            </div></td>
        </tr>
        </tbody>
    </table>
  </div>
</form>

</div>
</div>
<div class="Footer"><span id="footer_left">Copyright &#169; 2015 talHub | All Rights Reserved</span> </div></div>
</div>
</body>
</html>
