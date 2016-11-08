<!DOCTYPE html>
<html lang="en-GB">
<head>
<link type="text/css" href="css/style.css" rel="stylesheet" />
<noscript> 
<div id="noscript-warning">
Bitte aktivieren Sie JavaScript
</div>
</noscript>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/mocha.js"></script>
<script type="text/javascript" src="js/form_val_inc.js"> </script>
<script>
         function validateBenutzerForm() {
        var a = notEmpty(fB_vorname);
        var b = notEmpty(fB_nachname);
        var c = notEmpty(fB_benutzername);
        var d = notEmpty(fB_passwort1);
        var e = notEmpty(fB_passwort2);
        var f = notEmpty(fB_email);
        var g = validateEmail(fB_email);
        var h = passwordEquals(fB_passwort1, fB_passwort2);
        
        if(a && b && c && d && e && f && g && h == true){
            return true;
        }else{
            return false;
        }
        }
           
        </script>
</head>
<body>

<div id="container">
<div class="block">
    <form id="benutzer_form" action="Login_form.php"
    onsubmit="return validateBenutzerForm()" method="post">
    <h2>Benutzer erfassen</h2>
    <table border="0" cellspacing="0" cellpadding="2">
    <tbody>
    <tr>
        <td>Vorname:*</td>
        <td>
            <input type="text" name="vorname" id="fB_vorname"  value="" required/>
        </td>
    </tr>
    
    <tr>
        <td>Nachname:*</td>
        <td>
            <input type="text" name="nachname" id="fB_nachname" value="" required/>
        </td>
    </tr>
    
    <tr>
        <td>Benutzername:*</td>
        <td>
            <input type="text" name="benutzername" id="fB_benutzername" value="" required/> 
        </td>
    </tr>
    
    <tr>
        <td>Passwort:*</td>
        <td>
        <input type="password" id="fB_passwort1" required/>
        <div id="complexity" class="default">Enter a random value</div>
        <td>
            <p>Für ein sicheres Passwort verwenden Sie mind. 8 Zeichen, Ziffern und Sonderzeichen.</p>
        </td>
        </td>
    </tr>
    
    <tr>
        <td>Passwort bestätigen:*</td>
        <td>
            <input type="password" name="passwort2" id="fB_passwort2" value="" required/>
        </td>
        <td>
            <p id="passwortBestätigungMessage"/>
        </td>
    </tr>
    
    <tr>
        <td>E-Mail:*</td>
        <td>
            <input type="email" name="email" id="fB_email" value="" required/>
        </td>
         <td>
             <p id="emailValidationMessage"/>
        </td>
    </tr>
    
    <tr>
        <td>Adminrechte:</td>
        <td>
            <input name="Admin" id="fB_admin" type="checkbox"/>
        </td>
    </tr>
    
    <tr>
        <td>
        <p id="requiredMessage"></p>
        </td>
    </tr>
    
    <tr>
        <td><input type="submit" name="Speichern" value="erfassen" /></td>
        <td><input type="reset" value="Zurücksetzen" /></td>
    </tr>
    </tbody>
    </table>
</form>

</div>
</div>
</body>
</html>
