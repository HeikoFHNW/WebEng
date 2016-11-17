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
    private $admin;


    public function __construct($id=null, $username=null, $firstname=null, $lastname=null, $password=null, $email=null)
    {
        if (isset($id))
            $this->id = $id;
        if (isset($username))
            $this->name = $username;
        if (isset($firstname))
            $this->email = $firstname;
        if (isset($lastname))
            $this->mobile = $lastname;
        if (isset($password))
            $this->mobile = $password;
        if (isset($email))
            $this->mobile = $email;
        
        
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

    function getAdmin() {
        return $this->admin;
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

    function setAdmin($admin) {
        $this->admin = $admin;
    }

}
