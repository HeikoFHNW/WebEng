<?php


/** CREATION 06.12.16 14:30 Alex Noever**/


include_once '../dao/Database.php';
include_once '../dao/tenancy_agreementDAO/Tenancy_agreementDAOImpl.php';
include_once '../validator/Tenancy_agreementValidator.php';


class Tenancy_agreementController
{

    public function show()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $tenancy_agreements = (new Tenancy_agreementDAOImpl(Database::connect()))->findAll();
        require_once('../view/viewTenancy_agreement/showTenancy_agreement.php');
    }

    public function create()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $tenancy_agreement = new Tenancy_agreement();
        $tenancy_agreementValidator = new Tenancy_agreementValidator();

        if (!empty($_POST)) {
            
            $tenancy_agreement = new Tenancy_agreement(null,$_POST['start_of_tenancy'],$_POST['end_of_tenancy'],$_POST['netrent'],$_POST['cancellationterms'],$_POST['id_apartment'],$_POST['id_tenant']);
            $tenancy_agreementValidator = new Tenancy_agreementValidator($tenancy_agreement);

            if ($tenancy_agreementValidator->isValid()) {
                $tenancy_agreement = (new Tenancy_agreementDAOImpl(Database::connect()))->createTenancy_agreement($tenancy_agreement);
                return Route::call('Tenancy_agreement', 'show');
            }
        }
        require_once('../view/viewTenancy_agreement/createTenancy_agreement.php');
    }

    public function read()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if (!empty($_GET['id_tenancy_agreement'])) {
            $id_tenancy_agreement = $_REQUEST['id_tenancy_agreement'];
        }else{
            $id_tenancy_agreement = $_GET['id_tenancy_agreement'];
        }
        if ($id_tenancy_agreement==="")
            return Route::call('Error', 'error');

        $tenancy_agreement = (new Tenancy_agreementDAOImpl(Database::connect()))->readTenancy_agreement($id_tenancy_agreement);
        require_once('../view/viewTenancy_agreement/readTenancy_agreement.php');
    }

    public function update()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $tenancy_agreement = new tenancy_agreement();
        $tenancy_agreementValidator = new Tenancy_agreementValidator();

        $id_tenancy_agreement = null;
        if (!empty($_GET['id_tenancy_agreement'])) {
            $id_tenancy_agreement = $_REQUEST['id_tenancy_agreement'];
        }

        if (null == $id_tenancy_agreement) {
            return Route::call('Tenancy_agreement', 'show');
        }

        if (!empty($_POST)) {
            $tenancy_agreement = new Tenancy_agreement($id_tenancy_agreement,$_POST['start_of_tenancy'],$_POST['end_of_tenancy'],$_POST['netrent'],$_POST['cancellationterms'],$_POST['id_apartment'],$_POST['id_tenant']);
            $tenancy_agreementValidator = new Tenancy_agreementValidator($tenancy_agreement);

            if ($tenancy_agreementValidator->isValid()) {
                $tenancy_agreement = (new Tenancy_agreementDAOImpl(Database::connect()))->updateTenancy_agreement($tenancy_agreement);
                return Route::call('Tenancy_agreement', 'show');
            }
        } else {
            $tenancy_agreement = (new Tenancy_agreementDAOImpl(Database::connect()))->readTenancy_agreement($id_tenancy_agreement);
        }
        require_once('../view/viewTenancy_agreement/updateTenancy_agreement.php');
    }

    public function deleteAsk()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if (!empty($_GET['id_tenancy_agreement'])) {
            $id_tenancy_agreement = $_REQUEST['id_tenancy_agreement'];
        }else{
            $id_tenancy_agreement = $_GET['id_tenancy_agreement'];
        }
        if ($id_tenancy_agreement==="")
            return Route::call('Error', 'error');

        $tenancy_agreement = (new Tenancy_agreementDAOImpl(Database::connect()))->readTenancy_agreement($id_tenancy_agreement);
        require_once('../view/viewTenancy_agreement/deleteTenancy_agreement.php');
    }

    public function delete()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if (!empty($_POST)) {
            // keep track post values
            $id_tenancy_agreement = $_POST['id_tenancy_agreement'];
            if ($id_tenancy_agreement==="")
                return Route::call('Error', 'error');
            // delete data
            (new Tenancy_agreementDAOImpl(Database::connect()))->deleteTenancy_agreement(new Tenancy_agreement($id_tenancy_agreement));
        }else{
            return Route::call('Error', 'error');
        }
        return Route::call('Tenancy_agreement', 'show');
    }
    
}

