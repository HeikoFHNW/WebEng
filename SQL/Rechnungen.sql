/*Join zur Auswahl der Mieter*/
SELECT mieter.Nachname, mieter.Vorname, mietvertrag.ID_Mietvertrag 
FROM mieter, mietvertrag
WHERE mieter.ID_Mieter = mietvertrag.ID_Mieter;

/*Einfügen der neuen Rechnung*/
INSERT INTO rechnung (Betrag, Datum, ID_Mietvertrag, Rechnungstyp, Bemerkung)
VALUES (?, ?, ?, ?, ?);