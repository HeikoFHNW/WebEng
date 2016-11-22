<?php

include '../dao/Database.php';
include '../dao/UserDAOImpl.php';
include '../validator/UserValidator.php';

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 15.11.2016
 * Time: 10:06
 */
class UserController
{

    public function show()
    {
        $users = (new UserDAOImpl(Database::connect()))->findAll();
        require_once('../view/showUser.php');
    }

    public function create()
    {
        $user = new User();
        $userValidator = new UserValidator();

        if (!empty($_POST)) {

            $user = new User(null, $_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['password'],$_POST['email'],$_POST['locked'],$_POST['admin']);
            $userValidator = new UserValidator($user);

            if ($userValidator->isValid()) {
                $user = (new UserDAOImpl(Database::connect()))->createUser($user);
                return Route::call('User', 'show');
            }
        }
        require_once('../view/createUser.php');
    }

    public function read()
    {
        if (!empty($_GET['id_user'])) {
            $id_user = $_REQUEST['id_user'];
        }else{
            $id_user = $_GET['id_user'];
        }
        if ($id_user==="")
            return Route::call('Error', 'error');

        $user = (new UserDAOImpl(Database::connect()))->readUser($id_user);
        require_once('../view/readUser.php');
    }

    public function update()
    {
        $user = new user();
        $userValidator = new UserValidator();

        $id_user = null;
        if (!empty($_GET['id_user'])) {
            $id_user = $_REQUEST['id_user'];
        }

        if (null == $id_user) {
            return Route::call('User', 'show');
        }

        if (!empty($_POST)) {
            $user = new User($id_user, $_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['password'],$_POST['email'],$_POST['locked'],$_POST['admin']);
            $userValidator = new UserValidator($user);

            if ($userValidator->isValid()) {
                $user = (new UserDAOImpl(Database::connect()))->updateUser($user);
                return Route::call('User', 'show');
            }
        } else {
            $user = (new UserDAOImpl(Database::connect()))->readUser($id_user);
        }
        require_once('../view/updateUser.php');
    }

    public function deleteAsk()
    {
        if (!empty($_GET['id_user'])) {
            $id_user = $_REQUEST['id_user'];
        }else{
            $id_user = $_GET['id_user'];
        }
        if ($id_user==="")
            return Route::call('Error', 'error');

        $user = (new UserDAOImpl(Database::connect()))->readUser($id_user);
        require_once('../view/deleteUser.php');
    }

    public function delete()
    {
        if (!empty($_POST)) {
            // keep track post values
            $id_user = $_POST['id_user'];
            if ($id_user==="")
                return Route::call('Error', 'error');
            // delete data
            (new UserDAOImpl(Database::connect()))->deleteUser(new User($id_user));
        }else{
            return Route::call('Error', 'error');
        }
        return Route::call('User', 'show');
    }
    
    public function loginShow() 
    {
        require_once('../view/login.php');
    }
    public function login()
    {
        $user = new User();
        $userValidator = new UserValidator();
        if (!empty($_POST)) {
            // keep track post values
            $username = $_POST['username'];
            $password = $_POST['password'];
            $login = (new UserDAOImpl(Database::connect()))->checkUser($username, $password);
            if($login == true){
                return Route::call('User', 'show');
            } else {
                return Route::call('User', 'login');
            }
        }
        
    }

}

