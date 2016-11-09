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
        function validateLiegenschaftForm(){
            var a = (notEmpty(fLi_strasse)&&isText(fLi_strasse));
            var b = notEmpty(fLi_hausnummer);
            var c = (notEmpty(fLi_ort)&&isText(fLi_ort));
            var d = isNumber(fLi_plz);
            
            
            if (a){
                isNotTextMessageStreet.innerHTML = "";
            }else{
                isNotTextMessageStreet.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (c){
                isNotTextMessageOrt.innerHTML = "";
            }else{
                isNotTextMessageOrt.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (d){
                plzMessage.innerHTML = "";
            }else{
                plzMessage.innerHTML = "Bitte keine Buchstaben.";
            }
            
            if(a && b && c && d){
                return true;
            }else{
                return false;
            }  
        }
    
    </script>
        
        
    </head>
<body>

   <div id="container">
       <form name="liegenschaft_form" action="Liegenschaft_form.php"
    accept-charset="" onsubmit="return validateLiegenschaftForm()" method="post">
           
    <h2>Liegenschaft erfassen</h2>
    <table border="0" cellspacing="0" cellpadding="2">
    <tbody>
    <tr>
        <td>Strasse:*</td>
        <td>
            <input type="text" id="fLi_strasse" name="strasse" value="" />
        </td>
         <td>
             <p name="street" id="isNotTextMessageStreet"></p>
         </td>
    </tr>
    
    <tr>
        <td>Hausnummer:*</td>
        <td>
            <input type="text" id="fLi_hausnummer" name="Hausnummer" value="" />
        </td>
    </tr>
    
    <tr>
        <td>Ort:*</td>
        <td>
            <input type="text" id="fLi_ort" name="ort" value="" /> 
        </td>
        <td>
            <p name="ort" id="isNotTextMessageOrt"></p>
        </td>
    </tr>
    
    <tr>
        <td>PLZ:*</td>
        <td>
            <input type="text" id="fLi_plz" name="plz" value="" />
        </td>
        <td>
           <p name="plz" id="plzMessage"></p>
        </td>
    </tr>
    
    </tr>
        <td><input type="submit" name="Speichern und zur Übersicht" value="erfassen" /></td>
        <td><input type="submit" value="Speichern und neue Wohnung anlegen" /></td>
        <td><input type="reset" value="Zurücksetzten" /></td>
    </tr>
    </tbody>
    </table>
</form>
</div>
</body>
</html>