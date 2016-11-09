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
                <input type="text" name="vorname" value="" />
                </td>
            </tr>
    
            <tr>
                <td>Nachname:*</td>
                <td>
                    <input type="text" name="nachname" value="" /> 
                </td>
            </tr>
    
            <tr>
                <td>Geburtsdatum:*</td>
                <td>
                    <input type="date" name="geburtsdatum" value="" />
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
                    <input type="tel" name="telefon" value="" />
                </td>
            </tr>
    
            <tr>
                <td>Mobile:</td>
                 <td>
                    <input type="tel" name="mobile" value=""> </input>
                </td>
            </tr>
    
            <tr>
                <td>EMail:</td>
                <td>
                    <input type="email" name="email" value=""> </input>
                </td>
            </tr>
    
            <tr>
                <td>Strasse:</td>
                <td>
                <input type="text" name="strasse" value=""> </input>
                </td>
                <td>Hausnummer:</td>
                <td>
                    <input type="text" name="strasse" value=""> </input>
                </td>
           
            </tr>
    
            <tr>
                <td>Ort:</td>
                <td>
                    <input type="text" name="ort" value=""> </input>
                </td>
            </tr>
    
            <tr>
                <td>PLZ:</td>
                <td>
                    <input type="number" name="plz" value=""> </input>
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