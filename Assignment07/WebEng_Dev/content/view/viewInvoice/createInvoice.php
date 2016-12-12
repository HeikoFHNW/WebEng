<link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'> 
<link rel='stylesheet' href='/resources/demos/style.css'>

<script>
    
    $( function() {
    $( "#datepicker" ).datepicker({ 
    dateFormat: 'yy-mm-dd',
    maxDate: '0',
    changeMonth: true,
    changeYear: true,
    onClose: function(){ this.focus()}
       }).val();
    });
    </script>
    
<script>  
 window.onload = function setReady() {
 document.getElementById("datepicker").readOnly = true;
} 
</script>

<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a Invoice</h3>
        </div>

        <form class="form-horizontal" action="?controller=Invoice&action=create" method="post">
            <?php include_once("formInvoice.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="?controller=Invoice&action=show">Back</a>
            </div>
        </form>
    </div>

</div>

<script>
        function validateInvoiceForm(){
  
                var a = (notEmpty(fI_amount) && isNumber(fI_amount));
                var b = dateCorrect(datepicker);
                var c = (notEmpty(fI_id_tenancy_agreement)&& isNumber(fI_id_tenancy_agreement));
                var d = (notEmpty(fI_invoice_type)&&isText(fI_invoice_type));
                var e = (notEmpty(fI_invoicenr)&&isNumber(fI_invoicenr));
                
               
            if (a){
                amountMessage.innerHTML = "";
            }else{
                amountMessage.innerHTML = "Bitte keine Buchstaben verwenden.";
            }
            
            if (b){
                isNotaValidDate.innerHTML ="";
            }else{
                isNotaValidDate.innerHTML="Bitte eine Zahl in der Vergangenheit eingeben.";
            }
            
            if (c){
                id_tenancy_agreementMessage.innerHTML = "";
            }else{
                id_tenancy_agreementMessage.innerHTML = "Bitte keine Buchstaben verwenden.";
            }
            
            if (d){
                invoice_typeMessage.innerHTML = "";
            }else{
                invoice_typeMessage.innerHTML = "Bitte keine Zahlen verwenden.";
            }
           
            if (e){
                invoicenrMessage.innerHTML = "";
            }else{
                invoicenrMessage.innerHTML = "Bitte keine Buchstaben verwenden.";
            }
            
            
            
            if (a&&b&&c&&d&&e){
                return true;
            }else{
                return false;
            }  
        }
        </script>
        
<script src='https://code.jquery.com/jquery-1.12.4.js'></script> 
<script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>