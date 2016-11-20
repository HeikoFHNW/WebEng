<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 15.11.2016
 * Time: 09:04
 */

include_once "../model/Customer.php";

class CustomerValidator
{


    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var bool
     */
    private $valid = true;
    private $nameError = null;
    private $emailError = null;
    private $mobileError = null;

    /**
     * CustomerValidator constructor.
     * @param Customer $customer
     */
    public function __construct(Customer $customer = null)
    {
        $this->customer = $customer;
        $this->validate();
    }

    public function validate(){

        if(!is_null($this->customer)) {
            if (empty($this->customer->getName())) {
                $this->nameError = 'Please enter Name';
                $this->valid = false;
            }

            if (empty($this->customer->getEmail())) {
                $this->emailError = 'Please enter Email Address';
                $this->valid = false;
            } else if (!filter_var($this->customer->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $this->emailError = 'Please enter a valid Email Address';
                $this->valid = false;
            }

            if (empty($this->customer->getMobile())) {
                $this->mobileError = 'Please enter Mobile Number';
                $this->valid = false;
            }
        }
        else {
            $this->valid = false;
        }
        return $this->valid;

    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
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