<!DOCTYPE html>
<html>
    <head>
    <?php include ("../include/head.inc.php");?>
        
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
            var g = isNumber(fM_plz);
            var h = checkTel(fM_telefon);
            var i = checkTel(fM_mobile);
            
           if (b){
                isNotTextMessage.innerHTML = "";
            }else{
                isNotTextMessage.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (c){
                isNotTextMessageToo.innerHTML = "";
            }else{
                isNotTextMessageToo.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
           if (d){
                isNotTextMessageStreet.innerHTML = "";
            }else{
                isNotTextMessageStreet.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (e){
                isNotTextMessageOrt.innerHTML = "";
            }else{
                isNotTextMessageOrt.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (g){
                plzMessage.innerHTML = "";
            }else{
                plzMessage.innerHTML = "Bitte keine Buchstaben.";
            }
            
            if (h){
                telMessage.innerHTML = "";
            }else{
                telMessage.innerHTML = "Bitte gültige Telefonnummer eingeben.";
            }
            
            if (i){
                mobileMessage.innerHTML = "";
            }else{
                mobileMessage.innerHTML = "Bitte gültige Telefonnummer eingeben.";
            }
            
            
            
            if(a&&b&&c&&d&&e&&f&&g&&h&&i){
                return true;
            }else{
                return false;
            }  
        }
    
    </script>
        
    </head>
        <body>
            
        <?php include("../include/navigation.inc.php"); ?>
            
            
        <div class="container" id="mieter">
       
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
                <td>
                    <p name= "telMessage" id="telMessage"></p>
                </td>
            </tr>
    
            <tr>
                <td>Mobile:</td>
                 <td>
                     <input type="tel" id="fM_mobile" name="mobile" value=""> </input>
                </td>
                <td>
                    <p name= "mobileMessage" id="mobileMessage"></p>
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
                    <input type="text" id="fM_hausnummer" name="hausnummer" value=""> </input>
                </td>
                <td>
                    <p name="street" id="isNotTextMessageStreet"></p>
                </td>
           
            </tr>
    
            <tr>
                <td>Ort:</td>
                <td>
                    <input type="text" id="fM_ort" name="ort" value=""> </input>
                </td>
                <td>
                    <p name="ort" id="isNotTextMessageOrt"></p>
                </td>
            </tr>
    
            <tr>
                <td>PLZ:</td>
                <td>
                    <input type="text" id="fM_plz" name="plz" value=""> </input>
                </td>
                <td>
                    <p name="plz" id="plzMessage"></p>
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
</div>
</body>
</html>













