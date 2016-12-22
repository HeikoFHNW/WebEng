<?php

include_once "../dao/AbstractDAO.php";
include "../dao/userDAO/UserDAOInterface.php";
include_once '../model/Encryption.php';
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
        $user->setHash($this->hashPassword($user->getPassword())); 
        if (!is_null($user->getId_user())) {
            return $this->updateUser($user);
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO user (firstname, lastname, username, hash, email)
            VALUES (:firstname, :lastname, :username, :hash, :email)');
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':hash', $user->getHash());
        $stmt->bindValue(':email', $user->getEmail());
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
        $user->setHash($this->hashPassword($user->getPassword())); 
        
        $stmt = $this->pdoInstance->prepare('
            UPDATE user
            SET firstname = :firstname,
                lastname = :lastname,
                username = :username,
                hash = :hash,
                email = :email
            WHERE id_user = :id
        ');
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':hash', $user->getHash());
        $stmt->bindValue(':email', $user->getEmail());
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
            SELECT user.id_user, user.firstname, user.lastname, user.username, user.hash, user.email
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

        $stmt = $this->pdoInstance->prepare('
            SELECT user.username, user.hash FROM user
            WHERE username = (:username)
        ');
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $user = $stmt->fetchObject("User");

        // Hashing the password with its hash as the salt returns the same hash

        if ( crypt($password, $user->getHash())==$user->getHash() ) {
          return true;
        }
        return false;     
    }
    
    public function hashPassword($password){

        // A higher "cost" is more secure but consumes more processing power
        $cost = 10;

        // Create a random salt
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

        // Prefix information about the hash so PHP knows how to verify it later.
        // "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
        $salt = sprintf("$2a$%02d$", $cost) . $salt;

        // Value:
        // $2a$10$eImiTXuWVxfM37uY4JANjQ==

        // Hash the password with the salt
        $hash = crypt($password, $salt);

        // Value:
        // $2a$10$eImiTXuWVxfM37uY4JANjOL.oTxqp7WylW7FCzx2Lc7VLmdJIddZq
        return $hash;
    }
}