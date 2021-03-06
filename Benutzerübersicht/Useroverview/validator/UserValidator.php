<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 15.11.2016
 * Time: 09:04
 */

include_once "../model/User.php";

class UserValidator
{


    
    private $user;

 
    private $valid = true;
    private $firstnameError = null;
    private $lastnameError = null;
    private $usernameError = null;
    private $passwordError = null;
    private $emailError = null;

    
    public function __construct(User $user = null)
    {
        $this->user = $user;
        $this->validate();
    }

    public function validate(){

        if(!is_null($this->user)) {
            if (empty($this->user->getFirstname())) {
                $this->firstnameError = 'Please enter a Firstname';
                $this->valid = false;
            }
            if (empty($this->user->getLastname())) {
                $this->lastnameError = 'Please enter Lastname';
                $this->valid = false;
            }
            if (empty($this->user->getUsername())) {
                $this->usernameError = 'Please enter Username';
                $this->valid = false;
            }
            
            if (empty($this->user->getPassword())) {
                $this->passwordError = 'Please enter Password';
                $this->valid = false;
            }

            if (empty($this->user->getEmail())) {
                $this->emailError = 'Please enter Email Address';
                $this->valid = false;
            } else if (!filter_var($this->user->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $this->emailError = 'Please enter a valid Email Address';
                $this->valid = false;
            }
        }
        else {
            $this->valid = false;
        }
        return $this->valid;

    }

    
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @return String
     */
    public function getFirstnameError()
    {
        return $this->firstnameError;
    }
    
    public function getLastnameError()
    {
        return $this->lastnameError;
    }
    
    public function getUsernameError()
    {
        return $this->usernameError;
    }
    
    
    public function getPasswordError()
    {
        return $this->passwordError;
    }

    /**
     * @return String
     */
    public function getEmailError()
    {
        return $this->emailError;
    }

    /**
     * @return String
     */
}
