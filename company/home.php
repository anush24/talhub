<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="Home_Style.css" >
</head>

<body>
<div class="container">
<div class="Header_Section">
<div class="logo">TALHUB</div>
<div class="menu">
<ul>
<li><span><a href="home.php">HOME</a></span></li>
<li><span><a href="about.php">ABOUT</a></span></li>

<li><span><a href="contact.php">CONTACT</a></span></li>
</ul>
</ul>
</div>
</div>
<div class="Main_Section">
<div id="client_credentials">
<form id="login_form" name="login_form" method="post">
  <div align="center" class="login_table">
    <table width="400" border="0">
      <tbody>
        
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="username"></label>
            
              <div align="center">
                <input name="username" type="text" class="StyleTxtField" id="username" placeholder="Username">
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
              <input name="password" type="password" class="StyleTxtField" id="password" placeholder="Password">
            </div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">
            <input name="submit_button" type="button" class="button_style" id="submit_button" value="SIGN IN">
          </div></td>
        </tr>
        </tbody>
    </table>
  </div>
</form></div>
</div>
<div class="Footer"></div>
</div>
</body>
</html>
