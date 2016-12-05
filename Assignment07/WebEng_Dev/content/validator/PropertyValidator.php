<?php

/**
 * Created by PhpStorm.
 * Property: andreas.martin
 * Date: 15.11.2016
 * Time: 09:04
 */

include_once "../model/Property.php";

class PropertyValidator
{


    /**
     * @var Property
     */
    private $property;

    /**
     * @var bool
     */
    private $valid = true;
    private $streetError = null;
    private $postcodeError = null;

    /**
     * PropertyValidator constructor.
     * @param Property $property
     */
    public function __construct(Property $property = null)
    {
        $this->property = $property;
        $this->validate();
    }

    public function validate(){

        if(!is_null($this->property)) {
            if (empty($this->property->getStreet())) {
                $this->StreetError = 'Please enter Street';
                $this->valid = false;
            }
            
            if (empty($this->property->getPostcode())) {
                $this->postcodeError = 'Please enter Postcode';
                $this->valid = false;
            }

        }
        else {
            $this->valid = false;
        }
        return $this->valid;

    }

    /**
     * @return Property
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }
    function getStreetError() {
        return $this->streetError;
    }

    function getPostcodeError() {
        return $this->postcodeError;
    }
}