<?php include ("../../content/includes/head.inc.php");?>



 <script>
    
    $( function() {
    $( "#datepicker" ).datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    onClose: function(){ this.focus()}
       }).val();
    });
    $( function() {
    $( "#datepicker2" ).datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    onClose: function(){ this.focus()}
       }).val();
    });
    </script>
    
<script>  
 window.onload = function setReady() {
 document.getElementById("datepicker").readOnly = true;
 document.getElementById("datepicker2").readOnly = true;
} 
</script>

   
       
   

<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a Tenancy_agreement</h3>
        </div>

        <form class="form-horizontal" action="?controller=Tenancy_agreement&action=create"   onkeyup="return validateMieterForm()" method="post">
            <?php include_once("formTenancy_agreement.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="?controller=Tenancy_agreement&action=show">Back</a>
            </div>
        </form>
    </div>

</div>

    
  
       <script>
        function validateMieterForm(){
  
                var a = dateCorrect(datepicker);
                var b = (notEmpty(fM_vorname) &&isText(fM_vorname));
                var c = (notEmpty(fM_nachname)&&isText(fM_nachname));
                var d = isText(fM_strasse);
                var e = isText(fM_ort);
                var g = isNumber(fM_plz);
                var h = checkTel(fM_telefon);
                var i = checkTel(fM_mobile);
                var f = validateEmail(fM_email);
               
            if (a){
                isNotaValidDate.innerHTML ="";
            }else{
                isNotaValidDate.innerHTML="Bitte eine Zahl in der Vergangenheit eingeben.";
            } 
            
            if (b){
                isNotTextMessage.innerHTML = "";
            }else{
                isNotTextMessage.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (c){
                isNotTextMessageToo.innerHTML = "";
            }else{
                isNotTextMessageToo.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
           if (d){
                isNotTextMessageStreet.innerHTML = "";
            }else{
                isNotTextMessageStreet.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (e){
                isNotTextMessageOrt.innerHTML = "";
            }else{
                isNotTextMessageOrt.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (g){
                plzMessage.innerHTML = "";
            }else{
                plzMessage.innerHTML = "Bitte keine Buchstaben.";
            }
            
            if (h){
                telMessage.innerHTML = "";
            }else{
                telMessage.innerHTML = "Bitte gültige Telefonnummer eingeben.";
            }
            
            if (i){
                mobileMessage.innerHTML = "";
            }else{
                mobileMessage.innerHTML = "Bitte gültige Telefonnummer eingeben.";
            }
            
            
            
            
            if (a&&b&&c&&d&&e&&g&&h&&i&&f){ //
                return true;
            }else{
                return false;
            }  
        }
        </script>