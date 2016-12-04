<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.11.2016
 * Time: 15:29
 */
class Customer
{
    private $id;
    private $name;
    private $email;
    private $mobile;

    /**
     * Customer constructor.
     * @param $id
     * @param $name
     * @param $email
     * @param $mobile
     */
    public function __construct($id=null, $name=null, $email=null, $mobile=null)
    {
        if (isset($id))
            $this->id = $id;
        if (isset($name))
            $this->name = $name;
        if (isset($email))
            $this->email = $email;
        if (isset($mobile))
            $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }


}