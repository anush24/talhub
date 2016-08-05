<?php session_start();
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
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
<?php
include "init.php";
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
<form method="post" action="view_profile.php" enctype="multipart/form-data" name="login_form" id="login_form">
  <div align="center" class="login_table">
    <table width="400" border="0">
      <tbody>
        <tr>
          <td class="styleTxt">COMPANY NAME</td>
          <td class="styleTxt"><label for="company_name"></label>
            <div align="right">
              <input name="comp_name" type="text" class="StyleTxtField" id="company_name"   value="<?php echo $info['comp_name'];?>">
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
              <input name="email" type="email" class="StyleTxtField"  id="email" value="<?php echo $info['c_email'];?>"readonly>
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
              <input name="location" type="text" class="StyleTxtField" value="<?php echo $info['c_loc'];?>"  id="location" >
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
              <input name="tel" type="text" class="StyleTxtField"  value="<?php echo $info['c_phone'];?>" id="phone" >
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
              <textarea name="desc" class="desc_style" id="desc"  cols="24" rows="7" ><?php echo $info['comp_desc'];?></textarea>
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
              <input name="ed_prof" type="submit" value="Update Profile" class="btn" style="height:30px;" onClick="MM_validateForm('company_name','','R','location','','R','phone','','RisNum','desc','','R');return document.MM_returnValue" />
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
