<!DOCTYPE html>
<html>
<body>

    <form action="Rechnung_form.php" method="POST">
    <h2>Mietvertrag erfassen</h2>
    <table border="0" cellspacing="0" cellpadding="2">
    <tbody>
    <tr>
        <td>Rechnungstyp:</td>
        <td>
    <select name="top5">
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
            <input type="date" name="rechnungsdatum" value="" />
        </td>
    </tr>
    
    <tr>
        <td>Rechnungsnummer:*</td>
        <td>
           <input type="number" name="rechnungsnummer" value="" /> 
        </td>
    </tr>
    
    <tr>
        <td>Betrag:*</td>
        <td>
           <input type="number" name="betrag" value="" />
        </td>
    </tr>
    
    <tr>
        <td>Mieter:</td>
        <td>
           <select name="top5">
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
        <td><input type="submit" name="erfassen" value="erfassen" /></td>
        <td><input type="reset" value="nochmals" /></td>
    </tr>
    </tbody>
    </table>
</form>
</body>
</html>