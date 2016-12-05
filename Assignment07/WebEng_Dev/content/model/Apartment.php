<?php

/** CREATION 05.12.16 14:30 Alex Noever**/


class Apartment
{
    private $id_apartment;
    private $apartment_type;
    private $rooms;
    private $squaremeter;
    private $id_property;



    public function __construct($id_apartment=null, $apartment_type=null, $rooms=null, $squaremeter=null, $id_property=null)
    {
        if (isset($id_apartment)) {
            $this->id_apartment = $id_apartment;
        }
        if (isset($apartment_type)){
            $this->apartment_type = $apartment_type;
        }
        if (isset($rooms)){
            $this->rooms = $rooms;
        }
        if (isset($squaremeter)){
            $this->squaremeter = $squaremeter;
        }
        if (isset($id_property)){
            $this->id_property = $id_property;
        }
    }
    function getId_apartment() {
        return $this->id_apartment;
    }

    function getApartment_type() {
        return $this->apartment_type;
    }

    function getRooms() {
        return $this->rooms;
    }

    function getSquaremeter() {
        return $this->squaremeter;
    }

    function getId_property() {
        return $this->id_property;
    }

    function setId_apartment($id_apartment) {
        $this->id_apartment = $id_apartment;
    }

    function setApartment_type($apartment_type) {
        $this->apartment_type = $apartment_type;
    }

    function setRooms($rooms) {
        $this->rooms = $rooms;
    }

    function setSquaremeter($squaremeter) {
        $this->squaremeter = $squaremeter;
    }

    function setId_property($id_property) {
        $this->id_property = $id_property;
    }
}


