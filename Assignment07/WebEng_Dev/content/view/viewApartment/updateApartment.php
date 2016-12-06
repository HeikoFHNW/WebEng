<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Update a Apartment</h3>
        </div>

        <form class="form-horizontal" action="?controller=Apartment&action=update&id_apartment=<?php echo $apartment->getId_apartment() ?>" onkeyup="return validateApartmentForm()" method="post">
            <?php include_once("formApartment.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="?controller=Apartment&action=show">Back</a>
            </div>
        </form>
    </div>

</div>

<script>
        function validateApartmentForm(){
  
                var a = notEmpty(fA_apartment_type);
                var b = (notEmpty(fA_rooms) && isNumber(fA_rooms));
                var c = (notEmpty(fA_squaremeter)&& isNumber(fA_squaremeter));
                var d = (notEmpty(fA_id_property)&& isNumber(fA_id_property));
                
               

            
            if (b){
                roomsMessage.innerHTML = "";
            }else{
                roomsMessage.innerHTML = "Bitte keine Buchstaben.";
            }
            
            if (c){
                squarmeterMessage.innerHTML = "";
            }else{
                squarmeterMessage.innerHTML = "Bitte keine Buchstaben.";
            }
            
            if (d){
                id_propertyMessage.innerHTML = "";
            }else{
                id_propertyMessage.innerHTML = "Bitte keine Buchstaben.";
            }
            
            
            
            
            if (a&&b&&c&&d){
                return true;
            }else{
                return false;
            }  
        }
        </script>
