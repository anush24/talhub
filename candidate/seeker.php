<?php 
if (session_status() == PHP_SESSION_NONE) 
    session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Employer Create Profile</title>
<link rel="stylesheet" type="text/css" href="jobseeker.css" >
</head>

<body>
<div class="container">
<div class="Header_Section">
<div class="logo">Talhub</div>
<div class="menu">
<ul>
<li><span><a href="Index1.html">HOME</a></span></li>
<li><span><a href="About.html">ABOUT</a></span></li>
<li><span><a href="Home.php">CANDIDATES</a></span></li>
<li><span><a href="contact.php">CONTACT</a></span></li>
<li><span><a href="Index1.html">SIGN OUT</a></span></li>
</ul>
</ul>
</div>
</div>
<div class="Main_Section">
<div id="client_credentials">
<form method="post" action="validate.php" enctype="multipart/form-data" name="login_form" id="login_form">
  <div align="center" class="login_table">
    <table width="400" border="0">
      <tbody>
        <?php
        if($_SESSION['run'] == '1')
        {
          echo "<div id='res'>".$_SESSION['res']."</div>\n";
        }
        ?>
        <tr>
          <td colspan="2" class="styleTxt">USER PROFILE</td>
          </tr>
        <tr>
          <td colspan="2" class="styleTxt">&nbsp;</td>
        </tr>
        <tr>
          <td class="styleTxt">FIRST NAME</td>
          <td class="styleTxt"><label for="username"></label>
            <div align="right">
              <input name="username" type="text" class="StyleTxtField" id="username">
            </div></td>
        </tr>
        <tr>
          <td class="styleTxt">&nbsp;</td>
          <td class="styleTxt">&nbsp;</td>
        </tr>
        <tr>
          <td class="styleTxt">LAST NAME</td>
          <td class="styleTxt"><label for="company_name"></label>
            <div align="right">
              <input name="lastname" type="text" class="StyleTxtField" id="company_name">
            </div></td>
        </tr>
        <tr>
          <td class="styleTxt">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="styleTxt">E-MAIL</td>
          <td><label for="email"></label>
            <div align="right">
              <input name="email" type="email" class="StyleTxtField" id="email">
            </div></td>
          </tr>
        <tr>
          <td class="styleTxt">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="styleTxt">PASSWORD</td>
          <td><label for="password"></label>
            <div align="right">
              <input name="password" type="password" class="StyleTxtField" id="password">
            </div></td>
        </tr>

        <tr>
          <td class="styleTxt">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="styleTxt">CONFIRM PASSWORD</td>
          <td><label for="password2"></label>
            <div align="right">
              <input name="password2" type="password" class="StyleTxtField" id="password2">
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
              <input name="phone" type="text" class="StyleTxtField" id="phone">
            </div></td>
        </tr>
        <tr>
          <td class="styleTxt">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="styleTxt"> SKILL SETS</td>
          <td><select multiple="multiple" name="sets[]" class="skills">
          <!--<option name="front">Front End Development</option>
          <option name="mobile">Mobile Development</option>
          <option name="php">PHP</option>

          <option name="cloud">Cloud Computing</option>-->
            <?php
        $xml=simplexml_load_file("skills.xml") or die("Error: Cannot create object");
        foreach($xml->children() as $point) 
        echo "<option>".$point . "</option>";
      ?>
        </select>
          </td>
        </tr>
        <tr>
        <br/>
          <td class="styleTxt">RESUME UPLOAD</td>
          <td><label for='file'></label>
          <div align="center">
          <input type='file' name='file' id='file' />
          </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="right">
            <input name="submit_button" type="submit" class="button_style" id="submit_button" value="Save Profile">
          </div></td>
        </tr>
        </tbody>
    </table>
  </div>
</form></div>
</div>
</div>
<div class="Footer"><span id="footer_left">Copyright &#169; 2015 talHub | All Rights Reserved</span></div>
</body>
</html>
