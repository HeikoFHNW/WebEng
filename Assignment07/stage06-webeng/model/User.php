<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.11.2016
 * Time: 15:29
 */
class User
{
    private $id;
    private $firstname;
    private $lastname;
    private $username;
    private $password;
    private $email;
    private $banned;
    private $admin;

    /**
     * Customer constructor.
     * @param $id
     * @param $firstname
     * @param $lastname
     * @param $username
     * @param $password
     * @param $email
     * @param $banned
     * @param $admin
     */
    public function __construct($id=null, $firstname=null, $lastname=null, $username=null, $password=null, $email=null, $banned =null, $admin=null)
    {
        if (isset($id))
            $this->id = $id;
        if (isset($firstname))
            $this->firstname = $firstname;
        if (isset($lastname))
            $this->lastname = $lastname;
        if (isset($username))
            $this->username = $username;
        if (isset($password))
            $this->password = $password;
        if (isset($email))
            $this->email = $email;
        if (isset($banned))
            $this->banned = $banned;
        if (isset($admin))
            $this->admin = $admin;        
    }

    function getId() {
        return $this->id;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getBanned() {
        return $this->banned;
    }

    function getAdmin() {
        return $this->admin;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setBanned($banned) {
        $this->banned = $banned;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
    }

}
