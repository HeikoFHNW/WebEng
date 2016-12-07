<?php include ("../../content/includes/head.inc.php");?>



 <script>
    
    $( function() {
    $( "#datepicker" ).datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    onSelect: function (selected){
        $("#datepicker2").datepicker("option", "minDate", selected);
    }
    ,
    onClose: function(){ this.focus()}
       }).val();
    });
    $( function() {
    $( "#datepicker2" ).datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    onSelect: function (selected){
        $("#datepicker").datepicker("option", "maxDate", selected);
    }
    ,
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

        <form class="form-horizontal" action="?controller=Tenancy_agreement&action=create"  onsubmit="return validateVertragForm()" onkeyup="return validateVertragForm()" method="post">
            <?php include_once("formTenancy_agreement.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="?controller=Tenancy_agreement&action=show">Back</a>
            </div>
        </form>
    </div>

</div>

    
  
       <script>
        function validateVertragForm(){
            
                var a = notEmpty(datepicker);
                var c = (notEmpty(fTA_netrent) && isNumber(fTA_netrent));
                var d = (notEmpty(fTA_id_apartment) && isNumber(fTA_id_apartment));
                var e = (notEmpty(fTA_id_tenant) && isNumber(fTA_id_tenant));
                
            
            if (c){
                netrentMessage.innerHTML = "";
            }else{
                netrentMessage.innerHTML = "Bitte keine Buchstaben verwenden.";
            }
            
           if (d){
                id_apartmentMessage.innerHTML = "";
            }else{
                id_apartmentMessage.innerHTML = "Bitte keine Buchstaben verwenden.";
            }
            
            if (e){
                id_tenantMessage.innerHTML = "";
            }else{
                id_tenantMessage.innerHTML = "Bitte keine Buchstaben verwenden.";
            }
            
   
            
            if (a&&c&&d&&e){ //
                return true;
            }else{
                return false;
            }  
        }
        </script>
     
    
    
- 