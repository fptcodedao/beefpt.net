<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM sliders');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Find User with email
     * @param string $email Email
     * @return object
     */
    public static function FindMail($email){
        $sql = 'SELECT * FROM users WHERE email = :email';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function FindID($id){
        $sql = 'SELECT * FROM users WHERE id = :id';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function checklogin($email, $password)
    {
        $user = static::FindMail($email);
        if ($user && $user->role) {
            if (password_verify($password,$user->password)) {
                return $user;
            }
        }
        return false;
    }
}
