<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.11.2016
 * Time: 15:29
 */
class User
{
    private $id_user;
    private $firstname;
    private $lastname;
    private $username;
    private $password;
    private $email;
    private $locked;
    private $admin;

    /**
     * User constructor.
     * @param $id_user
     * @param $firstname
     * @param $lastname
     * @param $username
     * @param $password
     * @param $email
     * @param $locked
     * @param $admin
     */
    public function __construct($id_user=null, $firstname=null, $lastname=null, $username=null, $password=null, $email=null, $locked =null, $admin=null)
    {
        if (isset($id_user))
            $this->id_user = $id_user;
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
        if (isset($locked))
            $this->locked = $locked;
        if (isset($admin))
            $this->admin = $admin;        
    }

    function getId_user() {
        return $this->id_user;
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

    function getLocked() {
        return $this->locked;
    }

    function getAdmin() {
        return $this->admin;
    }

    function setId_user($id_user) {
        $this->id_user = $id_user;
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

    function setLocked($locked) {
        $this->locked = $locked;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
    }

}
