<?php

include "AbstractDAO.php";
include "CustomerDAOInterface.php";
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:36
 */
class CustomerDAOImpl extends AbstractDAO implements CustomerDAOInterface
{
    /**
     * @param Customer $customer
     * @return Customer
     */
    public function createCustomer(Customer $customer)
    {
        if (!is_null($customer->getId())) {
            return $this->updateCustomer($customer);
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO customers (name, email, mobile)
            VALUES (:name, :email , :mobile)');
        $stmt->bindValue(':name', $customer->getName());
        $stmt->bindValue(':email', $customer->getEmail());
        $stmt->bindValue(':mobile', $customer->getMobile());
        $stmt->execute();
        $customer = $this->readCustomer($this->pdoInstance->lastInsertId());
        return $customer;
    }

    /**
     * @param Customer $customer
     * @return Customer
     */
    public function updateCustomer(Customer $customer)
    {
        if (is_null($customer->getId())) {
            throw new LogicException(
                'Cannot update customer that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            UPDATE customers
            SET name = :name,
                email = :email,
                mobile = :mobile
            WHERE id = :id
        ');
        $stmt->bindValue(':name', $customer->getName());
        $stmt->bindValue(':email', $customer->getEmail());
        $stmt->bindValue(':mobile', $customer->getMobile());
        $stmt->bindValue(':id', $customer->getId());
        $stmt->execute();
        return $customer;
    }


    /**
     * @param $id
     * @return Customer
     */
    public function readCustomer($id)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT customers.id, customers.name, customers.email, customers.mobile
             FROM customers 
             WHERE id = :id
        ');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject("Customer");
    }

    /**
     * @param Customer $customer
     */
    public function deleteCustomer(Customer $customer)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM customers
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $customer->getId());
        $stmt->execute();
        $customer = null;
    }


    /**
     * @return Customer[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT customers.* FROM customers
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Customer');
    }
}