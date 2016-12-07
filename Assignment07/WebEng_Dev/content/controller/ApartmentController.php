<?php


/** CREATION 05.12.16 14:30 Alex Noever**/


include_once '../dao/Database.php';
include_once '../dao/apartmentDAO/ApartmentDAOImpl.php';
include_once '../validator/ApartmentValidator.php';


class ApartmentController
{

    public function show()
    {
        $apartments = (new ApartmentDAOImpl(Database::connect()))->findAll();
        require_once('../view/viewApartment/showApartment.php');
    }
    
        public function showForProperty()
    {
                if (!empty($_GET['id_property'])) {
            $id_property = $_REQUEST['id_property'];
        }else{
            $id_property = $_GET['id_property'];
        }
        if ($id_property==="")
            return Route::call('Error', 'error');
        
        $apartments = (new ApartmentDAOImpl(Database::connect()))->findForProperty($id_property);
        require_once('../view/viewApartment/showApartment.php');
    }

    public function create()
    {

        $apartment = new Apartment();
        $apartmentValidator = new ApartmentValidator();

        if (!empty($_POST)) {
            
            $apartment = new Apartment(null,$_POST['apartment_type'],$_POST['rooms'],$_POST['squaremeter'],$_POST['id_property']);
            $apartmentValidator = new ApartmentValidator($apartment);

            if ($apartmentValidator->isValid()) {
                $apartment = (new ApartmentDAOImpl(Database::connect()))->createApartment($apartment);
                return Route::call('Apartment', 'show');
            }
        }
        require_once('../view/viewApartment/createApartment.php');
    }

    public function read()
    {
 
        if (!empty($_GET['id_apartment'])) {
            $id_apartment = $_REQUEST['id_apartment'];
        }else{
            $id_apartment = $_GET['id_apartment'];
        }
        if ($id_apartment==="")
            return Route::call('Error', 'error');

        $apartment = (new ApartmentDAOImpl(Database::connect()))->readApartment($id_apartment);
        require_once('../view/viewApartment/readApartment.php');
    }

    public function update()
    {

        $apartment = new apartment();
        $apartmentValidator = new ApartmentValidator();

        $id_apartment = null;
        if (!empty($_GET['id_apartment'])) {
            $id_apartment = $_REQUEST['id_apartment'];
        }

        if (null == $id_apartment) {
            return Route::call('Apartment', 'show');
        }

        if (!empty($_POST)) {
            $apartment = new Apartment($id_apartment,$_POST['apartment_type'],$_POST['rooms'],$_POST['squaremeter'],$_POST['id_property']);
            $apartmentValidator = new ApartmentValidator($apartment);

            if ($apartmentValidator->isValid()) {
                $apartment = (new ApartmentDAOImpl(Database::connect()))->updateApartment($apartment);
                return Route::call('Apartment', 'show');
            }
        } else {
            $apartment = (new ApartmentDAOImpl(Database::connect()))->readApartment($id_apartment);
        }
        require_once('../view/viewApartment/updateApartment.php');
    }

    public function deleteAsk()
    {

        if (!empty($_GET['id_apartment'])) {
            $id_apartment = $_REQUEST['id_apartment'];
        }else{
            $id_apartment = $_GET['id_apartment'];
        }
        if ($id_apartment==="")
            return Route::call('Error', 'error');

        $apartment = (new ApartmentDAOImpl(Database::connect()))->readApartment($id_apartment);
        require_once('../view/viewApartment/deleteApartment.php');
    }

    public function delete()
    {
        if (!empty($_POST)) {
            // keep track post values
            $id_apartment = $_POST['id_apartment'];
            if ($id_apartment==="")
                return Route::call('Error', 'error');
            // delete data
            (new ApartmentDAOImpl(Database::connect()))->deleteApartment(new Apartment($id_apartment));
        }else{
            return Route::call('Error', 'error');
        }
        return Route::call('Apartment', 'show');
    }
    
}

