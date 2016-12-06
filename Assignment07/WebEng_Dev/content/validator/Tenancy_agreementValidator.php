<?php


/** CREATION 06.12.16 14:30 Alex Noever**/



include_once "../model/Tenancy_agreement.php";

class Tenancy_agreementValidator
{


    /**
     * @var Tenancy_agreement
     */
    private $tenancy_agreement;

    /**
     * @var bool
     */
    private $valid = true;
    private $firstnameError = null;
    private $lastnameError = null;
    private $emailError = null;
    private $birthdayError = null;
    private $phoneError = null;
    private $mobileError = null;
    private $streetError = null;
    private $postcodeError = null;
    private $cityError = null;

    /**
     * Tenancy_agreementValidator constructor.
     * @param Tenancy_agreement $tenancy_agreement
     */
    public function __construct(Tenancy_agreement $tenancy_agreement = null)
    {
        $this->tenancy_agreement = $tenancy_agreement;
        $this->validate();
    }

    public function validate(){

        /** if(!is_null($this->tenancy_agreement)) {
            if (empty($this->tenancy_agreement->getFirstname())) {
                $this->firstnameError = 'Bitte gib einen Vornamen ein.';
                $this->valid = false;
            }
            
            if (empty($this->tenancy_agreement->getLastname())) {
                $this->lastnameError = 'Bitte gib einen Nachnamen ein.';
                $this->valid = false;
            }

            if (empty($this->tenancy_agreement->getEmail())) {
                $this->emailError = 'Bitte tippe eine gültige EMail Adresse ein.';
                $this->valid = false;
            } else if (!filter_var($this->tenancy_agreement->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $this->emailError = 'Bitte tippe eine gültige EMail Adresse ein.';
                $this->valid = false;
            }
            
            if (!empty($this->tenancy_agreement->getBirthday())){
              if(!$this->validateDate($this->tenancy_agreement->getBirthday())){
                $this->birthdayError = 'Falsches Datumsformat (yyyy-mm-dd)';
                $this->valid = false;
            }
            }
            if((preg_match("/^(\+[0-9]{2,3}|0+[0-9]{2,5}).+[\d\s\/\(\)-]/", $this->tenancy_agreement->getPhone())) || $this->tenancy_agreement->getPhone()==""){
                
            }else{
                $this->phoneError = 'Bitte tippe eine gültige Telefonnummer ein.';
                $this->valid = false;
            }
            
            if((preg_match("/^(\+[0-9]{2,3}|0+[0-9]{2,5}).+[\d\s\/\(\)-]/", $this->tenancy_agreement->getMobile())) || $this->tenancy_agreement->getMobile()==""){
                
            }else{
                $this->mobileError = 'Bitte tippe eine gültige Telefonnummer ein.';
                $this->valid = false;
            }
            
            if(is_numeric($this->tenancy_agreement->getStreet())){
                $this->streetError = 'Bitte keine Nummern';
                $this->valid = false;
            }
            
            if(!($this->tenancy_agreement->getPostcode()=="")){
            if(!(is_numeric($this->tenancy_agreement->getPostcode()))){
                $this->postcodeError = 'Bitte keine Buchstaben';
                $this->valid = false;
            }
            }
            
            if(is_numeric($this->tenancy_agreement->getCity())){
                $this->cityError = 'Bitte keine Nummern';
                $this->valid = false;
            }
            
        }
        else {
            $this->valid = false;
        } **/
        return $this->valid;

    }

    /**
     * @return Tenancy_agreement
     */
    public function getTenancy_agreement()
    {
        return $this->tenancy_agreement;
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
     
     function getPhoneError(){
         return $this->phoneError;
     }
     
     function getMobileError(){
         return $this->mobileError;
     }
     
     function getStreetError(){
         return $this->streetError;
     }
     
     function getPostcodeError(){
         return $this->postcodeError;
     }
     
     function getCityError(){
         return $this->cityError;
     }

}

