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


    /**
     * @var User
     */
    private $user;

    /**
     * @var bool
     */
    private $valid = true;
    private $firstnameError = null;
    private $lastnameError = null;
    private $usernameError = null;
    private $passwordError = null;
    private $emailError = null;

    /**
     * UserValidator constructor.
     * @param User $user
     */
    public function __construct(User $user = null)
    {
        $this->user = $user;
        $this->validate();
    }

    public function validate(){

        if(!is_null($this->user)) {
            if (empty($this->user->getFirstname())) {
                $this->nameError = 'Please enter Firstname';
                $this->valid = false;
            }
            
            if (empty($this->user->getLastname())) {
                $this->nameError = 'Please enter Lastname';
                $this->valid = false;
            }
            
            if (empty($this->user->getUsername())) {
                $this->nameError = 'Please enter Username';
                $this->valid = false;
            }
            
            if (empty($this->user->getPassword())) {
                $this->nameError = 'Please enter Password';
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

    /**
     * @return User
     */
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
    public function getNameError()
    {
        return $this->nameError;
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
    public function getMobileError()
    {
        return $this->mobileError;
    }
}