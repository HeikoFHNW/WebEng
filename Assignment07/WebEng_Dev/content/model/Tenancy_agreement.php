<?php

/** CREATION 06.12.16 14:30 Alex Noever**/


class Tenancy_Agreement
{
    private $id_tenancy_agreement;
    private $start_of_tenancy;
    private $end_of_tenancy;
    private $netrent;
    private $cancellationterms;
    private $id_apartment;
    private $id_tenant;



    public function __construct($id_tenancy_agreement=null, $start_of_tenancy=null, $end_of_tenancy=null, $netrent=null, $cancellationterms=null, $id_apartment=null, $id_tenant=null)
    {
        if (isset($id_tenancy_agreement)) {
            $this->id_tenancy_agreement = $id_tenancy_agreement;
        }
        if (isset($start_of_tenancy)){
            $this->start_of_tenancy = $start_of_tenancy;
        }
        if (isset($end_of_tenancy)){
            $this->end_of_tenancy = $end_of_tenancy;
        }
        if (isset($netrent)){
            $this->netrent = $netrent;
        }
        if (isset($cancellationterms)){
            $this->cancellationterms = $cancellationterms;
        }
        if (isset($id_apartment)){
            $this->id_apartment = $id_apartment;
        }
        if (isset($id_tenant)){
            $this->id_tenant = $id_tenant;
        }
    }
    function getId_tenancy_agreement() {
        return $this->id_tenancy_agreement;
    }

    function getStart_of_tenancy() {
        return $this->start_of_tenancy;
    }

    function getEnd_of_tenancy() {
        return $this->end_of_tenancy;
    }

    function getNetrent() {
        return $this->netrent;
    }

    function getCancellationterms() {
        return $this->cancellationterms;
    }

    function getId_apartment() {
        return $this->id_apartment;
    }

    function getId_tenant() {
        return $this->id_tenant;
    }
}


