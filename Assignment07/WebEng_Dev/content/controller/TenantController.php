<?php

include_once '../dao/Database.php';
include_once '../dao/tenantDAO/TenantDAOImpl.php';
include_once '../validator/TenantValidator.php';


class TenantController
{

    public function show()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $tenants = (new TenantDAOImpl(Database::connect()))->findAll();
        require_once('../view/viewTenant/showTenant.php');
    }

    public function create()
    {
        /**ANGEPASST 05.12.16**/
        
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $tenant = new Tenant();
        $tenantValidator = new TenantValidator();

        if (!empty($_POST)) {
            
            $tenant = new Tenant(null,$_POST['title'],$_POST['firstname'],$_POST['lastname'],$_POST['birthday'],$_POST['marital_status'], $_POST['phone'], $_POST['mobile'],$_POST['email'],$_POST['postcode'],$_POST['city'],null,$_POST['street'],$_POST['streetnumber']);
            $tenantValidator = new TenantValidator($tenant);

            if ($tenantValidator->isValid()) {
                $tenant = (new TenantDAOImpl(Database::connect()))->createTenant($tenant);
                return Route::call('Tenant', 'show');
            }
        }
        require_once('../view/viewTenant/createTenant.php');
    }

    public function read()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if (!empty($_GET['id_tenant'])) {
            $id_tenant = $_REQUEST['id_tenant'];
        }else{
            $id_tenant = $_GET['id_tenant'];
        }
        if ($id_tenant==="")
            return Route::call('Error', 'error');

        $tenant = (new TenantDAOImpl(Database::connect()))->readTenant($id_tenant);
        require_once('../view/viewTenant/readTenant.php');
    }

    public function update()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $tenant = new tenant();
        $tenantValidator = new TenantValidator();

        $id_tenant = null;
        if (!empty($_GET['id_tenant'])) {
            $id_tenant = $_REQUEST['id_tenant'];
        }

        if (null == $id_tenant) {
            return Route::call('Tenant', 'show');
        }

        if (!empty($_POST)) {
            $tenant = new Tenant($id_tenant,$_POST['title'],$_POST['firstname'],$_POST['lastname'],$_POST['birthday'],$_POST['marital_status'], $_POST['phone'], $_POST['mobile'],$_POST['email'],$_POST['postcode'],$_POST['city'],null,$_POST['street'],$_POST['streetnumber']);
            $tenantValidator = new TenantValidator($tenant);

            if ($tenantValidator->isValid()) {
                $tenant = (new TenantDAOImpl(Database::connect()))->updateTenant($tenant);
                return Route::call('Tenant', 'show');
            }
        } else {
            $tenant = (new TenantDAOImpl(Database::connect()))->readTenant($id_tenant);
        }
        require_once('../view/viewTenant/updateTenant.php');
    }

    public function deleteAsk()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if (!empty($_GET['id_tenant'])) {
            $id_tenant = $_REQUEST['id_tenant'];
        }else{
            $id_tenant = $_GET['id_tenant'];
        }
        if ($id_tenant==="")
            return Route::call('Error', 'error');

        $tenant = (new TenantDAOImpl(Database::connect()))->readTenant($id_tenant);
        require_once('../view/viewTenant/deleteTenant.php');
    }

    public function delete()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if (!empty($_POST)) {
            // keep track post values
            $id_tenant = $_POST['id_tenant'];
            if ($id_tenant==="")
                return Route::call('Error', 'error');
            // delete data
            (new TenantDAOImpl(Database::connect()))->deleteTenant(new Tenant($id_tenant));
        }else{
            return Route::call('Error', 'error');
        }
        return Route::call('Tenant', 'show');
    }
    
}

