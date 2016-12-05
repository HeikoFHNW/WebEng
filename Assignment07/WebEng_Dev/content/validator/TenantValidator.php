<?php

/**
 * Created by PhpStorm.
 * Tenant: andreas.martin
 * Date: 15.11.2016
 * Time: 09:04
 */

include_once "../model/Tenant.php";

class TenantValidator
{


    /**
     * @var Tenant
     */
    private $tenant;

    /**
     * @var bool
     */
    private $valid = true;
    private $firstnameError = null;
    private $lastnameError = null;
    private $emailError = null;
    private $birthdayError = null;

    /**
     * TenantValidator constructor.
     * @param Tenant $tenant
     */
    public function __construct(Tenant $tenant = null)
    {
        $this->tenant = $tenant;
        $this->validate();
    }

    public function validate(){

        if(!is_null($this->tenant)) {
            if (empty($this->tenant->getFirstname())) {
                $this->firstnameError = 'Please enter Firstname';
                $this->valid = false;
            }
            
            if (empty($this->tenant->getLastname())) {
                $this->lastnameError = 'Please enter Lastname';
                $this->valid = false;
            }

            if (empty($this->tenant->getEmail())) {
                $this->emailError = 'Please enter Email Address';
                $this->valid = false;
            } else if (!filter_var($this->tenant->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $this->emailError = 'Please enter a valid Email Address';
                $this->valid = false;
            }
            
            if (!empty($this->tenant->getBirthday())){
              if(!$this->validateDate($this->tenant->getBirthday())){
                $this->birthdayError = 'Falsches Datumsformat (yyyy-mm-dd)';
                $this->valid = false;
            }
            }
            
        }
        else {
            $this->valid = false;
        }
        return $this->valid;

    }

    /**
     * @return Tenant
     */
    public function getTenant()
    {
        return $this->tenant;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }

    function getFirstnameError() {
        return $this->firstnameError;
    }

    function getLastnameError() {
        return $this->lastnameError;
    }
    
    function getEmailError() {
        return $this->emailError;
    }
    
    function getBirthdayError(){
    return $this->birthdayError;
    }
    
    function validateDate($date)
    {
    $format = 'Y-m-d';
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
     }

}