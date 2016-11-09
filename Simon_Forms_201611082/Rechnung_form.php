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
    $( "#datepicker" ).datepicker();
    } );
    </script>
        
        <script>
         function validateRechnungForm(){
            var a = notEmpty(datepicker);
            var b = notEmpty(fR_rechnungsnummer);
            var c = notEmpty(fR_betrag);
            
            
            if(a==true&&b==true&&c==true){
                return true;
            }else{
                return false;
            }
         }
        </script>
  
    </head>
<body onload="settopic();">
    <div id="container">
    <form name="rechnung_form" id="form_Rechnung" action="Rechnung_form.php"
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
            <input type="text" name="rechnungsdatum" id="datepicker" value="" required/>
        </td>
        <td>
            <p name="date" id="dateMessage">(tt/mm/yyyy)</p>
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
           <input type="number" id="fR_betrag" name="betrag" value="" required/>
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
           <input type="number" id="fR_zahlungVermieter" name="zahlungVermieter" value="" />
        </td>
    </tr>
    
    <tr>
        <td>Bemerkung:</td>
        <td>
           <textarea type="text" name="bemerkung" id="fR_bemerkung" value=""> </textarea>
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