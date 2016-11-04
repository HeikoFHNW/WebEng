<!DOCTYPE html>
<html>
<body>

    <form action="Liegenschaft_form.php" method="POST">
    <h2>Liegenschaft erfassen</h2>
    <table border="0" cellspacing="0" cellpadding="2">
    <tbody>
    <tr>
        <td>Strasse:*</td>
        <td>
            <input type="text" name="strasse" value="" />
        </td>
    </tr>
    
    <tr>
        <td>Hausnummer:*</td>
        <td>
            <input type="number" name="Hausnummer" value="" />
        </td>
    </tr>
    
    <tr>
        <td>Ort:*</td>
        <td>
            <input type="text" name="ort" value="" /> 
        </td>
    </tr>
    
    <tr>
        <td>PLZ:*</td>
        <td>
           <input type="number" name="plz" value="" />
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
</body>
</html>