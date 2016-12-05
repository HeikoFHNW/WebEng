<?php

include_once "../dao/AbstractDAO.php";
include "../dao/tenantDAO/TenantDAOInterface.php";

class TenantDAOImpl extends AbstractDAO implements TenantDAOInterface
{
    /**
     * @param Tenant $tenant
     * @return Customer
     */
    public function createTenant(Tenant $tenant)
    {
        if (!is_null($tenant->getId_tenant())) {
            return $this->updateTenant($tenant);
        }
        
        $stmt = $this->pdoInstance->prepare('
            INSERT IGNORE INTO city (postcode, city)
            VALUES (:postcode, :city);
            
            INSERT IGNORE INTO adress (street, streetnumber, postcode)
            VALUES (:street, :streetnumber, :postcode);
            
            INSERT INTO tenant (title, firstname, lastname, birthday, marital_status, phone, mobile, email, id_adress)
            VALUES (:title, :firstname, :lastname, :birthday, :marital_status, :phone, :mobile, :email, (SELECT id_adress FROM adress WHERE street = :street AND streetnumber = :streetnumber AND postcode = :postcode));');
        
        $stmt->bindValue(':title', $tenant->getTitle());
        $stmt->bindValue(':firstname', $tenant->getFirstname());
        $stmt->bindValue(':lastname', $tenant->getLastname());
        $stmt->bindValue(':birthday', $tenant->getBirthday());
        $stmt->bindValue(':marital_status', $tenant->getMarital_status());
        $stmt->bindValue(':phone', $tenant->getPhone());
        $stmt->bindValue(':mobile', $tenant->getMobile());
        $stmt->bindValue(':email', $tenant->getEmail());
        $stmt->bindValue(':postcode', $tenant->getPostcode());
        $stmt->bindValue(':city', $tenant->getCity());
        $stmt->bindValue(':street', $tenant->getStreet());
        $stmt->bindValue(':streetnumber', $tenant->getStreetnumber());
        $stmt->execute();
        unset($stmt);
        $tenant = $this->readTenant($this->pdoInstance->lastInsertId());
        return $tenant;
    }

    /**
     * @param Customer $customer
     * @return Customer
     */
    public function updateTenant(Tenant $tenant)
    {
        if (is_null($tenant->getId_tenant())) {
            throw new LogicException(
                'Cannot update tenant that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT IGNORE INTO city (postcode, city)
            VALUES (:postcode, :city);
            
            INSERT IGNORE INTO adress (street, streetnumber, postcode)
            VALUES (:street, :streetnumber, :postcode);            

            UPDATE propertymanagement.tenant
            SET
            id_tenant = :id_tenant,
            title = :title,
            firstname = :firstname,
            lastname = :lastname,
            birthday = :birthday,
            marital_status = :marital_status,
            phone = :phone,
            mobile = :mobile,
            email = :email,
            id_adress = (SELECT id_adress FROM adress WHERE street = :street AND streetnumber = :streetnumber AND postcode = :postcode)
            WHERE id_tenant = :id_tenant;
        ');
        $stmt->bindValue(':id_tenant', $tenant->getId_tenant());
        $stmt->bindValue(':title', $tenant->getTitle());
        $stmt->bindValue(':firstname', $tenant->getFirstname());
        $stmt->bindValue(':lastname', $tenant->getLastname());
        $stmt->bindValue(':birthday', $tenant->getBirthday());
        $stmt->bindValue(':marital_status', $tenant->getMarital_status());
        $stmt->bindValue(':phone', $tenant->getPhone());
        $stmt->bindValue(':mobile', $tenant->getMobile());
        $stmt->bindValue(':email', $tenant->getEmail());
        $stmt->bindValue(':postcode', $tenant->getPostcode());
        $stmt->bindValue(':city', $tenant->getCity());
        $stmt->bindValue(':street', $tenant->getStreet());
        $stmt->bindValue(':streetnumber', $tenant->getStreetnumber());
        $stmt->execute();
        unset($stmt);
        return $tenant;
    }


    /**
     * @param $id
     * @return Customer
     */
    public function readTenant($id_tenant)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT C.id_tenant, C.title, C.firstname, C.lastname, C.birthday, C.marital_status, C.phone, C.mobile, C.email, B.postcode, B.city, A.id_adress, A.street, A.streetnumber 
                FROM adress = A, city = B, tenant = C
                WHERE A.postcode = B.postcode 
                AND A.id_adress = C.id_adress
                AND C.id_tenant = :id_tenant;
        ');
        $stmt->bindValue(':id_tenant', $id_tenant);
        $stmt->execute();
        return $stmt->fetchObject("Tenant");
    }

    /**
     * @param Customer $customer
     */
    public function deleteTenant(Tenant $tenant)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM tenant
            WHERE id_tenant = :id
        ');
        $stmt->bindValue(':id', $tenant->getId_tenant());
        $stmt->execute();
        $tenant = null;
    }


    /**
     * @return Tenant[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT C.id_tenant, C.title, C.firstname, C.lastname, C.birthday, C.marital_status, C.phone, C.mobile, C.email, B.postcode, B.city, A.id_adress, A.street, A.streetnumber 
                FROM adress = A, city = B, tenant = C
                WHERE A.postcode = B.postcode 
                AND A.id_adress = C.id_adress
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Tenant');
    }

}