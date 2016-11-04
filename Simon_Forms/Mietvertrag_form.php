<!DOCTYPE html>
<html>
<body>

    <form action="Mietvertrag_form.php" method="POST">
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
            <input type="date" name="mietbeginn" value="" />
        </td>
        
        <td>Mietende:*</td>
        <td>
            <input type="date" name="mietende" value="" />
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
           <input type="number" name="nettomietzins" value="" /> 
        </td>
    </tr>
    
    <tr>
        <td>Akontozahlung Nebenkosten:*</td>
        <td>
           <input type="number" name="akontozahlung" value="" /> 
        </td>
    </tr>
    
    <tr>
        <td>Kündigungsbestimmungen:*</td>
        <td>
           <textarea type="text" name="bemerkung" value=""> </textarea>
        </td>
    </tr>
    
    <tr>
        <td><input type="submit" name="Speichern" value="erfassen" /></td>
        <td><input type="reset" value="Zurücksetzen" /></td>
    </tr>
    </tbody>
    </table>
</form>
</body>
</html>