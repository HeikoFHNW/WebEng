<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php include ("../include/head.inc.php");?>
        
        <script>
        $( function() {
        $( "#datepicker1, #datepicker2" ).addClass('datepicker');
        $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' }).val();
        } );
        </script>
    
        <script>
           function validateMietvertragForm(){ 
           var a = validateChoice(fMv_vertragspartner);
           var b = compareDate(datepicker1, datepicker2);
           var c = validateChoice(fMv_mietobjekt);
           var d = (notEmpty(fMv_nettomietzins)&&isNumber(fMv_nettomietzins));
           var e = (notEmpty(fMv_akontozahlung)&&isNumber(fMv_akontozahlung));
           
           if (b){
                fMv_dateMessage.innerHTML = "";
            }else{
                fMv_dateMessage.innerHTML = "Mietende muss in der Zukunft liegen.";
            }
            
            if(d){
                fMv_nettomietzinsMessage.innerHTML = "";
            }else{
                fMv_nettomietzinsMessage.innerHTML = "Bitte einen nummerischen Wert grösser 0 eintragen.";
            }
            
            if(e){
                fMv_nebenkosten.innerHTML = "";
            }else{
                fMv_nebenkosten.innerHTML = "Bitte einen nummerischen Wert grösser 0 eintragen.";
            }
           
                
        if(a&&b&&c&&d&&e){
                return true;
                
                }else{
                return false;
                }    
            }
  
        </script>
        
    </head>
    
<body>
    <?php include("../include/navigation.inc.php"); ?>
    <div class="container" id="mietvertrag">
        <form name="mietvertrag_form" action="Mietvertrag_form.php"
     accept-charset=""onsubmit="return validateMietvertragForm()" method="post">
    <h2>Mietvertrag erfassen</h2>
    <table border="0" cellspacing="0" cellpadding="2">
    <tbody>
    <tr>
        <td>Vertragspartner*:</td>
        <td>
    <select  id = "fMv_vertragspartner" name="top5">
        <option value="notselected" selected>Bitte auswählen</option>
        <option> Thomas Müller</option>
    </select>
        </td>
    </tr>
    
    <tr>
        <td>Mietbeginn:*</td>
        <td>
            <input type="date" id="datepicker1" name="mietbeginn" value="" />
        </td>
        
        <td>Mietende:*</td>
        <td>
            <input type="date" id="datepicker2" name="mietende" value="" />
        </td>
        
        <td>
            <p name="date" id="fMv_dateMessage">(yyyy-mm-dd)</p>
        </td>
    </tr>
    
    <tr>
        <td>Mietobjekt:</td>
        <td>
    <select id = "fMv_mietobjekt" name="top5">
        <option value="notselected" selected>Bitte auswählen</option>
        <option></option>
    </select>
        </td>
    </tr>
   
    <tr>
        <td>Nettomietzins:*</td>
        <td>
            <input type="text" id="fMv_nettomietzins" name="nettomietzins" value="" /> 
        </td>
        
        <td>
            <p name="nettomietzins" id="fMv_nettomietzinsMessage">(yyyy-mm-dd)</p>
        </td>
    </tr>
    
    <tr>
        <td>Akontozahlung Nebenkosten:*</td>
        <td>
            <input type="text" id="fMv_akontozahlung" name="akontozahlung" value="" /> 
        </td>
        
        <td>
            <p name="nebenkosten" id="fMv_nebenkosten">(yyyy-mm-dd)</p>
        </td>
    </tr>
    
    <tr>
        <td>Kündigungsbestimmungen:</td>
        <td>
            <textarea type="text" id="fMv_kündigungsbestimmungen" name="bemerkung" value=""> </textarea>
        </td>
    </tr>
    
    <tr>
        <td>
            <p id= "requiredMessage"> </p>
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
</body>
</html>