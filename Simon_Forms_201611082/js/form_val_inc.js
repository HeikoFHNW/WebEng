function notEmpty(fld){
    
     if (fld.value == "") {
        fld.style.background = 'Yellow';
        requiredMessage.innerHTML = "Bitte alle Pflichtfelder* ausfüllen.";
        return false;
    }else{
        fld.style.background = 'White';  
    }
    return true;
    requiredMessage.innerHTML = "";
}

function isName(fld) {
    var error = "";
    var illegalChars = /\W/; // allow letters, numbers, and underscores
 
    if ((fld.value.length < 2) || (fld.value.length > 30)) {
        fld.style.background = 'Yellow';
        error = "The username is the wrong length.\n";
		return false;
 
    } else if (illegalChars.test(fld.value)) {
        fld.style.background = 'Yellow';
        error = "The username contains illegal characters.\n";
		return false;
 
    } else {
        fld.style.background = 'White';
    }
    return true;
}

function passwordEquals(fld1,fld2){
    if(fld1.value!=fld2.value){
    fld2.style.background = 'Yellow';
    passwortBestätigungMessage.innerHTML = "Das Passwort stimmt nicht mit der Bestätigung überein";
    return false;
    }else{
    passwortBestätigungMessage.innerHTML = "";
    fld2.style.background = 'White';
        return true;
    }
}

function validateEmail(fld){  
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
    if(fld.value.match(mailformat)){
    fld.style.background = 'White';
    return true;
    emailValidationMessage.innerHTML ="";  
    }else{
    fld.style.background = 'Yellow';
    emailValidationMessage.innerHTML ="Bitte eine gültige E-Mail-Adresse eingeben!";    
    return false;
    }  
} 

function initialize(){
    var selectedRTyp = document.rechnung_form.rechnunstyp;
    
    inputCheck(selectedRTyp);
}

function inputCheck(type){
    if(selectedRTyp == "Reperatur Allgemein"){
        fR_mieter.disabled()=true;
    }else{
        fR_mieter.disabled()=false;
    }
}