<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Update a Invoice</h3>
        </div>

        <form class="form-horizontal" action="?controller=Invoice&action=update&id_invoice=<?php echo $invoice->getId_invoice() ?>" onkeyup="return validateInvoiceForm()" method="post">
            <?php include_once("formInvoice.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="?controller=Invoice&action=show">Back</a>
            </div>
        </form>
    </div>

</div>

<script>
        function validateInvoiceForm(){
  
                
                var a = (notEmpty(fP_strasse)&&isText(fP_strasse));
                var b = (notEmpty(fP_ort)&&isText(fP_ort));
                var c = (notEmpty(fP_plz)&&isNumber(fP_plz));
                var d = notEmpty(fP_strassennummer);
               
            
            
           if (a){
                isNotTextMessageStreet.innerHTML = "";
            }else{
                isNotTextMessageStreet.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (b){
                isNotTextMessageOrt.innerHTML = "";
            }else{
                isNotTextMessageOrt.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (c){
                plzMessage.innerHTML = "";
            }else{
                plzMessage.innerHTML = "Bitte keine Buchstaben.";
            }
           
            if (a&&b&&c&&d){
                return true;
            }else{
                return false;
            }  
        }
        </script>