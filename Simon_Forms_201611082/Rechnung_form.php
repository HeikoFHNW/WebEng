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
         function validateRechnungForm(){
            var a = notEmpty(fR_rechnungsnummer);
            if(a==true){
                return true;
            }else{
                return false;
            }
         }
        </script>
  
    </head>
<body onload="settopic();">
    <div id="container">
    <form name="rechnung_form" action="Rechnung_form.php"
    onsubmit="return validateRechnungForm()" method="post">
    <h2>Rechnung erfassen</h2>
    <table border="0" cellspacing="0" cellpadding="2">
    <tbody>
    <tr>
        <td>Rechnungstyp:</td>
        <td>
            <select name="rechnunstyp" id="fR_rechnungstyp" onchange="settopic();">
        <option>Reperatur Allgemein</option>
        <option>Reperatur individuell</option>
        <option>Hauswart</option>
        <option>Heizkosten</option>
        <option>Strom Allgemein</option>
        <option>Strom Individuell</option>
        <option>Wasser</option>
        <option>Andere</option>
    </select>
        </td>
    </tr>
    
    <tr>
        <td>Rechnungsdatum:*</td>
        <td>
            <input type="date" name="rechnungsdatum" value="" required/>
        </td>
    </tr>
    
    <tr>
        <td>Rechnungsnummer:*</td>
        <td>
           <input type="number" id="fR_rechnungsnummer" name="rechnungsnummer" value="" required/> 
        </td>
    </tr>
    
    <tr>
        <td>Betrag:*</td>
        <td>
           <input type="number" name="betrag" value="" required/>
        </td>
    </tr>
    
    <tr>
        <td>Mieter:</td>
        <td>
           <select name="mieter" id="fR_mieter">
            <option> </option>
            </select>
        </td>
    </tr>
    
    <tr>
        <td>Zahlung Vermieter:</td>
        <td>
           <input type="number" name="zahlungVermieter" value="" />
        </td>
    </tr>
    
    <tr>
        <td>Bemerkung:</td>
        <td>
           <textarea type="text" name="bemerkung" value=""> </textarea>
        </td>
    </tr>
    
    <tr>
        <td>
        <p id="requiredMessage"></p>
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