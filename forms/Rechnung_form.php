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
         function validateRechnungForm(){
            var a = notEmpty(datepicker);
            var b = notEmpty(fR_rechnungsnummer);
            var c = (notEmpty(fR_betrag)&&isNumber(fR_betrag));
            var d = isNumber(fR_zahlungVermieter);
            
            if(c==false){
                fR_betragMessag.innerHTML = "Bitte einen nummerischen Wert grösser 0 eintragen.";
            }else{
                fR_betragMessag.innerHTML = "";
            }
            
            if(d==false){
                fR_zahlungVermieterMessag.innerHTML = "Bitte einen nummerischen Wert grösser 0 eintragen.";
            }else{
                fR_zahlungVermieterMessag.innerHTML = "";
            }
            
            if((document.getElementById("fR_mieter").disabled)==false){
                e = validateChoice(fR_mieter);
            }else{
                fR_mieter.value.innerHTML = notselected;
                e = true;
            }

            if(a && b && c&& d && e){
                return true;
            }else{
                return false;
            }
         }
        </script>
  
    </head>
<body onload="settopic();">
    
    <?php include("../include/navigation.inc.php"); ?>
    
    
    <div class="container" id="rechnung">
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
            <p name="date" id="dateMessage">(yyyy-mm-dd)</p>
        </td>
    </tr>
    
    <tr>
        <td>Rechnungsnummer:*</td>
        <td>
           <input type="text"  id="fR_rechnungsnummer" name="rechnungsnummer" value="" required/> 
        </td>
     
    </tr>
    
    <tr>
        <td>Betrag:*</td>
        <td>
           <input type="text" id="fR_betrag" name="betrag" value="" required/>
        </td>
        <td>
            <p name="betragMessag" id="fR_betragMessag"></p>
        </td>
        
    </tr>
    
    <tr>
        <td>Mieter:</td>
        <td>
           <select name="mieter" id="fR_mieter">
            <option value="notselected" selected>Bitte auswählen</option>
            <option> Thomas Müller</option>
            </select>
        </td>
    </tr>
    
    <tr>
        <td>Zahlung Vermieter:</td>
        <td>
           <input type="text" id="fR_zahlungVermieter" name="zahlungVermieter" value="" />
        </td>
         <td>
            <p name="zahlungVermieterMessage" id="fR_zahlungVermieterMessag"></p>
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