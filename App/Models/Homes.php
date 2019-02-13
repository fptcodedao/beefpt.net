<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Homes extends \Core\Model
{
    /**
     * Get Random row Categories != 5
     * @return array
     */
    public static function getCate()
    {
        $db = static::getDB();
        $stmt = $db->query('select * from categories where id != 5 order by rand() limit 4');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Get row Categories id = 5
     * @return array
     */
    public static function GetRich()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM categories where id = 5');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
