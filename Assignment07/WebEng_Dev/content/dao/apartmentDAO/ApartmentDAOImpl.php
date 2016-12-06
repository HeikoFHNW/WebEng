<?php

/** CREATION 05.12.16 14:30 Alex Noever**/


include_once "../dao/AbstractDAO.php";
include "../dao/apartmentDAO/ApartmentDAOInterface.php";

class ApartmentDAOImpl extends AbstractDAO implements ApartmentDAOInterface
{
    /**
     * @param Apartment $apartment
     * @return Customer
     */
    public function createApartment(Apartment $apartment)
    {
        if (!is_null($apartment->getId_apartment())) {
            return $this->updateApartment($apartment);
        }
        
        $stmt = $this->pdoInstance->prepare('
                        
            INSERT INTO apartment (id_property, apartment_type, rooms, squaremeter)
            VALUES ((SELECT id_property FROM property WHERE id_property = :id_property), :apartment_type, :rooms, :squaremeter);');
        
        $stmt->bindValue(':apartment_type', $apartment->getApartment_type());
        $stmt->bindValue(':rooms', $apartment->getRooms());
        $stmt->bindValue(':squaremeter', $apartment->getSquaremeter());
        $stmt->bindValue(':id_property', $apartment->getId_property());
        $stmt->execute();
        unset($stmt);
        $apartment = $this->readApartment($this->pdoInstance->lastInsertId());
        return $apartment;
    }

    /**
     * @param Customer $customer
     * @return Customer
     */
    public function updateApartment(Apartment $apartment)
    {
        if (is_null($apartment->getId_apartment())) {
            throw new LogicException(
                'Cannot update apartment that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('

            UPDATE propertymanagement.apartment
            SET
            apartment_type = :apartment_type
            rooms = :rooms
            squaremeter = :squaremeter
            id_property = :id_property
            WHERE id_apartment = :id_apartment;
        ');
        $stmt->bindValue(':apartment_type', $apartment->getApartment_type());
        $stmt->bindValue(':rooms', $apartment->getRooms());
        $stmt->bindValue(':squaremeter', $apartment->getSquaremeter());
        $stmt->bindValue(':id_property', $apartment->getId_property());
        $stmt->bindValue(':id_apartment', $apartment->getId_apartment());
        $stmt->execute();
        unset($stmt);
        return $apartment;
    }


    /**
     * @param $id
     * @return Customer
     */
    public function readApartment($id_apartment)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM apartment 
                WHERE id_apartment = :id_apartment;
        ');
        $stmt->bindValue(':id_apartment', $id_apartment);
        $stmt->execute();
        return $stmt->fetchObject("Apartment");
    }

    /**
     * @param Customer $customer
     */
    public function deleteApartment(Apartment $apartment)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM apartment
            WHERE id_apartment = :id
        ');
        $stmt->bindValue(':id', $apartment->getId_apartment());
        $stmt->execute();
        $apartment = null;
    }


    /**
     * @return Apartment[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM apartment;
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Apartment');
    }
    
    public function findForProperty($id_property)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM apartment
            WHERE id_property = :id_property;
        ');
        $stmt->bindValue(':id_property', $id_property);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Apartment');
    }

}