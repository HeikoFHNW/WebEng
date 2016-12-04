<?php

include "AbstractDAO.php";
include "UserDAOInterface.php";
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:36
 */
class UserDAOImpl extends AbstractDAO implements UserDAOInterface
{
    /**
     * @param User $User
     * @return Customer
     */
    public function createUser(User $user)
    {
        if (!is_null($user->getId_user())) {
            return $this->updateUser($user);
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO User (firstname, lastname, username, password, email, locked, admin)
            VALUES (:firstname, :lastname, :username, :password, :email, :locked, :admin)');
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':locked', $user->getLocked());
        $stmt->bindValue(':admin', $user->getAdmin());
        $stmt->execute();
        $user = $this->readUser($this->pdoInstance->lastInsertId());
        return $user;
    }

    /**
     * @param Customer $customer
     * @return Customer
     */
    public function updateUser(User $user)
    {
        if (is_null($user->getId_user())) {
            throw new LogicException(
                'Cannot update customer that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            UPDATE User
            SET firstname = :firstname,
                lastname = :lastname,
                username = :username,
                password = :password,
                email = :email,
                locked = :locked,
                admin = :admin
            WHERE id_user = :id
        ');
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':locked', $user->getLocked());
        $stmt->bindValue(':admin', $user->getAdmin());
        $stmt->bindValue(':id', $user->getId_user());
        $stmt->execute();
        return $user;
    }


    /**
     * @param $id
     * @return Customer
     */
    public function readUser($id_user)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT user.id_user, user.firstname, user.lastname, user.username, user.password, user.email, user.locked, user.admin
             FROM user 
             WHERE id_user = :id
        ');
        $stmt->bindValue(':id', $id_user);
        $stmt->execute();
        return $stmt->fetchObject("User");
    }

    /**
     * @param Customer $customer
     */
    public function deleteUser(User $user)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM user
            WHERE id_user = :id
        ');
        $stmt->bindValue(':id', $user->getId_user());
        $stmt->execute();
        $user = null;
    }


    /**
     * @return User[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT user.* FROM user
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
    }
    
    /**
     * @return User[]
     */
    public function checkUser($username, $password) {
        $user = new User();
        $stmt = $this->pdoInstance->prepare('
            SELECT user.username, user.password FROM user
            WHERE username = (:username) AND password = (:password)
        ');
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        
        if($stmt->fetch() != 0) {
            return true;
        } else {
            return false;
        }
             
    }
}