<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:34
 */
include("../model/User.php");

interface UserDAOInterface
{

    public function createUser(User $user);

    public function readUser($id);

    public function updateUser(User $user);

    public function deleteUser(User $user);

    public function findAll();
}