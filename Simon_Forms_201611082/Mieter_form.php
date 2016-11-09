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
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    } );
    </script>
    
    <script>
        function validateMieterForm(){
            var a = notEmpty(datepicker);
            var b = (notEmpty(fM_vorname)&&isText(fM_vorname));
            var c = (notEmpty(fM_nachname)&&isText(fM_nachname));
            var d = isText(fM_strasse);
            var e = isText(fM_ort);
            var f = validateEmail(fM_email);
            
            if(a && b && c && d && e && f){
                return true;
            }else{
                return false;
            }
           /* var a = notEmpty(datepicker);
            var b = notEmpty(fM_vorname);
            var c = notEmpty(fM_nachname);
          
      
            var d = checkTel(fM_telefon);
            var e = checkTel(fM_mobile);
            var f = !isNumber(fM_strasse);
            var g = !isNumber(fM_ort);
            
            if(f == true){
                isNotTextMessage.innerHTML("Bitte keine Zahlen eingeben");
            }
            
            
            if(a && b && c && d && e && f && g){
                return true;
            }else{
                return false;
            }*/
            
            
        }
    
    </script>
        
    </head>
        <body>
        <div id="container">
            <form name="mieter_form" action="Mieter_form.php"
              accept-charset=""onsubmit="return validateMieterForm()" method="post">
        <h2>Mieter erfassen</h2>
        <table border="0" cellspacing="0" cellpadding="2">
         <tbody>
            <tr>
                <td>Anrede:</td>
                    <td>
                    <select name="top5">
                        <option>Herr</option>
                        <option>Frau</option>
                    </select>
                </td>
            </tr>
    
            <tr>
                <td>Vorname:*</td>
                <td>
                    <input type="text" id="fM_vorname" name="vorname"  value="" />
                </td>
                <td>
                    <p name="firstname" id="isNotTextMessage"></p>
                </td>
            </tr>
    
            <tr>
                <td>Nachname:*</td>
                <td>
                    <input type="text" id="fM_nachname" name="nachname" value="" /> 
                </td>
                <td>
                    <p name="surname" id="isNotTextMessageToo"></p>
                </td>
            </tr>
    
            <tr>
                <td>Geburtsdatum:*</td>
                <td>
                    <input type="text" id="datepicker" name="geburtsdatum" value="" required/>
                </td>
                <td>
                    <p name="date" id="dateMessage">(yyyy-mm-dd)</p>
                </td>
            </tr>
    
            <tr>
                <td>Zivilstand:</td>
                <td>
                    <select name="top5">
                        <option>ledig</option>
                        <option>verheiratet</option>
                    </select>
                </td>
            </tr>
    
            <tr>
                <td>Telefon:</td>
                <td>
                    <input type="tel" id="fM_telefon" name="telefon" value="" />
                </td>
            </tr>
    
            <tr>
                <td>Mobile:</td>
                 <td>
                     <input type="tel" id="fM_mobile" name="mobile" value=""> </input>
                </td>
            </tr>
    
            <tr>
                <td>EMail:</td>
                <td>
                    <input type="email" id="fM_email" name="email" value=""> </input>
                </td>
                <td>
                    <p name= "emailMessag" id="emailValidationMessage"></p>
                </td>
            </tr>
    
            <tr>
                <td>Strasse:</td>
                <td>
                <input type="text" id="fM_strasse" name="strasse" value=""> </input>
                </td>
                <td>Hausnummer:</td>
                <td>
                    <input type="text" id="fM_hausnummer" name="strasse" value=""> </input>
                </td>
           
            </tr>
    
            <tr>
                <td>Ort:</td>
                <td>
                    <input type="text" id="fM_ort" name="ort" value=""> </input>
                </td>
            </tr>
    
            <tr>
                <td>PLZ:</td>
                <td>
                    <input type="text" id="fM_plz" name="plz" value=""> </input>
                </td>
            </tr>
    
             <tr>
                <td>
                       <p id= "requiredMessage"> </p>
                </td>
            </tr>
            
            <tr>
                <td><input type="submit" name="erfassen" value="erfassen" /></td>
                <td><input type="reset" value="nochmals" /></td>
            </tr>
        </tbody>
        </table>
</form>
</body>
</html>
