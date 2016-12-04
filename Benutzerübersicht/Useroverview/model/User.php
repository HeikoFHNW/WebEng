<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.11.2016
 * Time: 15:29
 */
class User{    
    
    private $id;
    private $username;
    private $firstname;
    private $lastname;
    private $password;
    private $email;
   


    public function __construct($id=null, $username=null, $firstname=null, $lastname=null, $password=null, $email=null)
    {
        if (isset($id))
            $this->id = $id;
        if (isset($username))
            $this->username = $username;
        if (isset($firstname))
            $this->firstname = $firstname;
        if (isset($lastname))
            $this->lastname = $lastname;
        if (isset($password))
            $this->password = $password;
        if (isset($email))
            $this->email = $email;
        
        
    }
    
    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    

}
