<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" href="css/style.css" rel="stylesheet" />
<noscript> 
<div id="noscript-warning">
Bitte aktivieren Sie JavaScript
</div>
</noscript>
    <script type="text/javascript" src="js/form_val_inc.js">
    </script>
    
    <script>
      function validateLoginForm(){
        var a = notEmpty(fL_benutzername);
        var b = notEmpty(fL_passwort);
          
        if(a && b == true){
        return true;
        }else{
        return false;
        }
    } 
           
    </script>
    
        
    </head>
    
<body>
<div id="container">
    <form name="login_form" action="Login_form.php"
    onsubmit="return validateLoginForm()" method="post">
    <h2>Login</h2>
    <table border="0" cellspacing="0" cellpadding="2">
    <tbody>
    <tr>
        <td>Benutzername:*</td>
        <td>
            <input type="text" name="benutzername" id='fL_benutzername' value="" required>
        </td>
    </tr>
    
    <tr>
        <td>Passwort:*</td>
        <td>
            <input type="password" name="password" id='fL_passwort' value="" required>
        </td>
    </tr>
    
    <tr>
        <td>
    <p id="requiredMessage"></p>
        </td>
    </tr>
    
        <td><input type="submit" name="Anmelden" value="erfassen" /></td>
        <td><input type="reset" value="Zurücksetzen" /></td>
    </tr>
    </tbody>
    </table>
</form>
</div>
</body>
</html>

