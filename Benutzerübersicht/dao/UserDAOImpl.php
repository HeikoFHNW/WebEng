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

    public function createUser(User $user)
    {
        if (!is_null($user->getId())) {
            return $this->updateUser($user);
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO `Benutzer`(`ID_Benutzer`, `Vorname`, `Nachname`, `Benutzername`, `Passwort`, `Email`, `Gesperrt`, `Admin`)
            VALUES (:firstname,:lastname,:username:, :password, :email');
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->execute();
        $user = $this->readUser($this->pdoInstance->lastInsertId());
        return $user;
    }

   
    public function updateUser(User $user)
    {
        if (is_null($user->getId())) {
            throw new LogicException(
                'Cannot update user that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
           
       UPDATE `Benutzer` SET `Vorname`=:firstname,`Nachname`=:lastname,`Benutzername`=:username,`Passwort`=:password,`Email`=:email,`Admin`=:admin
            WHERE ID_Benutzer = :id
        ');
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->execute();
        return $user;
    }


    
    public function readUser($id)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT `Vorname`, `Nachname`, `Benutzername`, `Passwort`, `Email`, `Gesperrt`, `Admin`, `Session` FROM `Benutzer` WHERE ID_Benutzer =:id
        ');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject("User");
    }

    
    public function deleteUser(User $user)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM Benutzer
            WHERE ID_Benutzer = :id
        ');
        $stmt->bindValue(':id', $user->getId());
        $stmt->execute();
        $user = null;
    }


    
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT Benutzer.* FROM Benutzer
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
    }
}