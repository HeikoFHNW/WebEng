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
        if (!is_null($user->getId())) {
            return $this->updateUser($user);
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO Benutzer (vorname, nachname, benutzername, passwort, email, gesperrt, admin)
            VALUES (:firstname, :lastname, :username, :password, :email, :banned, :admin)');
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':banned', $user->getBanned());
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
        if (is_null($user->getId())) {
            throw new LogicException(
                'Cannot update customer that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            UPDATE Benutzer
            SET Vorname = :firstname,
                Nachname = :lastname,
                Benutzername = :username
                Passwort = :password
                Email = :email
                Gesperrt = :banned
                Admin = :admin
            WHERE id = :id
        ');
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':banned', $user->getBanned());
        $stmt->bindValue(':admin', $user->getAdmin());
        $stmt->bindValue(':id', $user->getId());
        $stmt->execute();
        return $user;
    }


    /**
     * @param $id
     * @return Customer
     */
    public function readUser($id)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT benutzer.id, benutzer.vorname, benutzer.nachname, benutzer.benutzername, benutzer.passwort, benutzer.email, benutzer.gesperrt, benutzer.admin
             FROM customers 
             WHERE id = :id
        ');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject("User");
    }

    /**
     * @param Customer $customer
     */
    public function deleteUser(User $user)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM benutzer
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $user->getId());
        $stmt->execute();
        $user = null;
    }


    /**
     * @return User[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT benutzer.* FROM benutzer
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
            SELECT benutzer.benutzername, benutzer.passwort FROM benutzer
            WHERE benutzername = (:username) AND passwort = (:password)
        ');
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        $user = new User($stmt->fetchObject("User"));
	return $user;
             
    }
}