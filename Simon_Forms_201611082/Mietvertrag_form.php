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
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    } );
    </script>
    
    <script>
        function validateMietvertragForm(){
            
            
            
            
            if(a && b && c && d && e && f && g && h && i){
                return true;
            }else{
                return false;
            }  
        }
    
    </script>
        
    </head>
    
<body>
    <div id="container">
        <form name="mietvertrag_form" action="Mietvertrag_form.php"
     accept-charset=""onsubmit="return validateMietvertragForm()" method="post">
    <h2>Mietvertrag erfassen</h2>
    <table border="0" cellspacing="0" cellpadding="2">
    <tbody>
    <tr>
        <td>Vertragspartner:</td>
        <td>
    <select name="top5">
        <option></option>
    </select>
        </td>
    </tr>
    
    <tr>
        <td>Mietbeginn:*</td>
        <td>
            <input type="date" class="datepicker" name="mietbeginn" value="" />
        </td>
        
        <td>Mietende:*</td>
        <td>
            <input type="date" class="datepicker" name="mietende" value="" />
        </td>
    </tr>
    
    <tr>
        <td>Mietobjekt:</td>
        <td>
    <select name="top5">
        <option></option>
    </select>
        </td>
    </tr>
   
    <tr>
        <td>Nettomietzins:*</td>
        <td>
            <input type="text" id="fMv_nettomietzins" name="nettomietzins" value="" /> 
        </td>
    </tr>
    
    <tr>
        <td>Akontozahlung Nebenkosten:*</td>
        <td>
            <input type="text" id="fMv_akontozahlung" name="akontozahlung" value="" /> 
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
            <p class= "requiredMessage"> </p>
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