<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<script type="text/javascript">
function checkForm(form)
  {
    if(form.username.value == "") {
      alert("Error: Username cannot be blank!");
      form.username.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.username.focus();
      return false;
    }
if(form.comp_name.value == "") {
      alert("Error: Username cannot be blank!");
      form.username.focus();
      return false;
    }
    if(form.password.value != "" && form.password.value == form.confirm_password.value) {
      if(form.password.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.password.focus();
        return false;
      }
      if(form.password.value == form.username.value) {
        alert("Error: Password must be different from Username!");
        form.password.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.password.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.password.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.password.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.password.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.password.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.password.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.password.focus();
      return false;
    }

    alert("You entered a valid password: " + form.password.value);
    return true;
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
<link rel="stylesheet" type="text/css" href="Client_prof.css" >
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
        <div id="client_credentials">
            <form method="post" action="login.php" enctype="multipart/form-data" name="login_form" id="login_form">
              <div align="center" class="login_table">
                <table width="400" border="0">
                  <tbody>
                    
                    <tr>
                      <td colspan="2" class="styleTxt">COMPANY PROFILE</td>
                      </tr>
                    <tr>
                      <td colspan="2" class="styleTxt">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="styleTxt">NAME</td>
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
                      <td class="styleTxt">COMPANY NAME</td>
                      <td class="styleTxt"><label for="company_name"></label>
                        <div align="right">
                          <input name="comp_name" type="text" class="StyleTxtField" id="company_name">
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
                          <input name="confirm_password" type="password" class="StyleTxtField" id="password2">
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
                          <input name="location" type="text" class="StyleTxtField" id="location">
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
                          <input name="tel" type="text" class="StyleTxtField" id="phone">
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
                          <textarea name="desc" class="desc_style" id="desc"></textarea>
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
                        <input name="clientProf_submit" type="submit" class="button_style"  onClick="MM_validateForm('username','','R','password','','R','password2','','R','location','','R','phone','','NisNum');return document.MM_returnValue" id="submit_button" value="Save Profile">
                      </div></td>
                    </tr>
                    </tbody>
                </table>
              </div>
            </form>
        </div>
    </div>
    <div class="Footer"><span id="footer_left">Copyright &#169; 2015 talHub | All Rights Reserved</span><span id="footer_right">Design | talHub</span> </div>
</div>
</body>
</html>
