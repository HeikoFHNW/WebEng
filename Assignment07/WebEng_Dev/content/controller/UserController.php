<?php

include '../dao/Database.php';
include '../dao/userDAO/UserDAOImpl.php';
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
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $users = (new UserDAOImpl(Database::connect()))->findAll();
        require_once('../view/viewUser/showUser.php');
    }

    public function create()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $user = new User();
        $userValidator = new UserValidator();

        if (!empty($_POST)) {

            $user = new User(null, $_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['password'],$_POST['password2'],$_POST['email'],$_POST['locked'],$_POST['admin']);
            $userValidator = new UserValidator($user);

            if ($userValidator->isValid()) {
                $user = (new UserDAOImpl(Database::connect()))->createUser($user);
                return Route::call('User', 'show');
            }
        }
        require_once('../view/viewUser/createUser.php');
    }

    public function read()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if (!empty($_GET['id_user'])) {
            $id_user = $_REQUEST['id_user'];
        }else{
            $id_user = $_GET['id_user'];
        }
        if ($id_user==="")
            return Route::call('Error', 'error');

        $user = (new UserDAOImpl(Database::connect()))->readUser($id_user);
        require_once('../view/viewUser/readUser.php');
    }

    public function update()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
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
        require_once('../view/viewUser/updateUser.php');
    }

    public function deleteAsk()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if (!empty($_GET['id_user'])) {
            $id_user = $_REQUEST['id_user'];
        }else{
            $id_user = $_GET['id_user'];
        }
        if ($id_user==="")
            return Route::call('Error', 'error');

        $user = (new UserDAOImpl(Database::connect()))->readUser($id_user);
        require_once('../view/viewUser/deleteUser.php');
    }

    public function delete()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
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
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        require_once('../view/viewLogin/login.php');
    }
    public function login()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if (!empty($_POST)) {
            // keep track post values
            $username = $_POST['username'];
            $password = $_POST['password'];
            $login = (new UserDAOImpl(Database::connect()))->checkUser($username, $password);
            if($login == true){
                $_SESSION['login'] = true;
                $_SESSION['login_user'] = $username;
                return Route::call('Homepage', 'show');
            } else {
                $_SESSION['login'] = false;
                return Route::call('User', 'loginShow');
            }
        }   
    }
    
    public function logout(){
        session_start();
        if(session_destroy()){
            return Route::call('User', 'loginShow');
        }
    }

}

