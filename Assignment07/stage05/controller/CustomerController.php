<?php

include '../dao/Database.php';
include '../dao/CustomerDAOImpl.php';
include '../validator/CustomerValidator.php';

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 15.11.2016
 * Time: 10:06
 */
class CustomerController
{

    public function show()
    {
        $customers = (new CustomerDAOImpl(Database::connect()))->findAll();
        require_once('../view/showCustomer.php');
    }

    public function create()
    {
        $customer = new Customer();
        $customerValidator = new CustomerValidator();

        if (!empty($_POST)) {

            $customer = new Customer(null, $_POST['name'],$_POST['email'],$_POST['mobile']);
            $customerValidator = new CustomerValidator($customer);

            if ($customerValidator->isValid()) {
                $customer = (new CustomerDAOImpl(Database::connect()))->createCustomer($customer);
                return Route::call('Customer', 'show');
            }
        }
        require_once('../view/createCustomer.php');
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

        $customer = (new CustomerDAOImpl(Database::connect()))->readCustomer($id);
        require_once('../view/readCustomer.php');
    }

    public function update()
    {
        $customer = new Customer();
        $customerValidator = new CustomerValidator();

        $id = null;
        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        }

        if (null == $id) {
            return Route::call('Customer', 'show');
        }

        if (!empty($_POST)) {
            $customer = new Customer($id, $_POST['name'],$_POST['email'],$_POST['mobile']);
            $customerValidator = new CustomerValidator($customer);

            if ($customerValidator->isValid()) {
                $customer = (new CustomerDAOImpl(Database::connect()))->updateCustomer($customer);
                return Route::call('Customer', 'show');
            }
        } else {
            $customer = (new CustomerDAOImpl(Database::connect()))->readCustomer($id);
        }
        require_once('../view/updateCustomer.php');
    }

    public function deleteAsk()
    {
        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        }else{
            $id = $_GET['id'];
        }
        if ($id==="")
            return Route::call('Error', 'error');

        $customer = (new CustomerDAOImpl(Database::connect()))->readCustomer($id);
        require_once('../view/deleteCustomer.php');
    }

    public function delete()
    {
        if (!empty($_POST)) {
            // keep track post values
            $id = $_POST['id'];
            if ($id==="")
                return Route::call('Error', 'error');
            // delete data
            (new CustomerDAOImpl(Database::connect()))->deleteCustomer(new Customer($id));
        }else{
            return Route::call('Error', 'error');
        }
        return Route::call('Customer', 'show');
    }

}