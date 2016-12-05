<?php


/** CREATION 05.12.16 14:30 Alex Noever**/



include_once "../model/Apartment.php";

class ApartmentValidator
{


    /**
     * @var Apartment
     */
    private $apartment;

    /**
     * @var bool
     */
    private $valid = true;
    private $id_propertyError = null;
    private $apartment_typeError = null;

    /**
     * ApartmentValidator constructor.
     * @param Apartment $apartment
     */
    public function __construct(Apartment $apartment = null)
    {
        $this->apartment = $apartment;
        $this->validate();
    }

    public function validate(){

        if(!is_null($this->apartment)) {
            if (empty($this->apartment->getApartment_type())) {
                $this->StreetError = 'Please enter a type';
                $this->valid = false;
            }
            
            if (empty($this->apartment->getId_property())) {
                $this->postcodeError = 'Please enter Property ID';
                $this->valid = false;
            }

        }
        else {
            $this->valid = false;
        }
        return $this->valid;

    }

    /**
     * @return Apartment
     */
    public function getApartment()
    {
        return $this->apartment;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }
    function getValid() {
        return $this->valid;
    }

    function getId_propertyError() {
        return $this->id_propertyError;
    }

    function getApartment_typeError() {
        return $this->apartment_typeError;
    }

    function setValid($valid) {
        $this->valid = $valid;
    }

    function setId_propertyError($id_propertyError) {
        $this->id_propertyError = $id_propertyError;
    }

    function setApartment_typeError($apartment_typeError) {
        $this->apartment_typeError = $apartment_typeError;
    }


}