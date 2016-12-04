<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:34
 */
include("../model/Customer.php");

interface CustomerDAOInterface
{

    public function createCustomer(Customer $customer);

    public function readCustomer($id);

    public function updateCustomer(Customer $customer);

    public function deleteCustomer(Customer $customer);

    public function findAll();
}