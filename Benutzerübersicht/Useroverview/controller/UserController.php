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

            $user = new User(null, $_POST['firstname'],$_POST['lastname'],$_POST['username'] ,$_POST['password'], $_POST['email']);
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
        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        }else{
            $id = $_GET['id'];
        }
        if ($id==="")
            return Route::call('Error', 'error');

        $user = (new UserDAOImpl(Database::connect()))->readUser($id);
        require_once('../view/readUser.php');
    }

    public function update()
    {
        $user = new User();
        $userValidator = new UserValidator();

        $id = null;
        if (!empty($_GET['ID_Benutzer'])) {
            $id = $_REQUEST['ID_Benutzer'];
        }

        if (null == $id) {
            return Route::call('User', 'show');
        }

        if (!empty($_POST)) {
            $user = new User(null, $_POST['firstname'],$_POST['lastname'],$_POST['username'] ,$_POST['password'], $_POST['email']);
            $userValidator = new UserValidator($user);

            if ($userValidator->isValid()) {
                $user = (new UserDAOImpl(Database::connect()))->updateUser($user);
                return Route::call('User', 'show');
            }
        } else {
            $user = (new UserDAOImpl(Database::connect()))->readUser($id);
        }
        require_once('../view/updateUser.php');
    }

    public function deleteAsk()
    {
        if (!empty($_GET['ID_Benutzer'])) {
            $id = $_REQUEST['ID_Benutzer'];
        }else{
            $id = $_GET['ID_Benutzer'];
        }
        if ($id==="")
            return Route::call('Error', 'error');

        $user = (new UserDAOImpl(Database::connect()))->readUser($id);
        require_once('../view/deleteUser.php');
    }

    public function delete()
    {
        if (!empty($_POST)) {
            // keep track post values
            $id = $_POST['ID_Benutzer'];
            if ($id==="")
                return Route::call('Error', 'error');
            // delete data
            (new UserDAOImpl(Database::connect()))->deleteUser(new User($id));
        }else{
            return Route::call('Error', 'error');
        }
        return Route::call('User', 'show');
    }

}
