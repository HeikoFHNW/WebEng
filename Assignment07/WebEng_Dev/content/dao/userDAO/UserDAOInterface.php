<?php


include("../model/User.php");

interface UserDAOInterface
{

    public function createUser(User $user);

    public function readUser($id);

    public function updateUser(User $user);

    public function deleteUser(User $User);

    public function findAll();
}