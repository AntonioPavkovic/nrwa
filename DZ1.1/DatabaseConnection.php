<?php

class DatabaseConnection
{
    public static $host = "127.0.0.1";
    public static $dbname = "hr";
    public static $username = "root";
    public static $password = "root";

    private static function connect()
    {
        $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname.";charset=utf8mb3_general_ci", self::$username, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }


    public static function query($query, $params = array())
    {
        $statement = self::connect()->prepare($query);
        $statement->execute($params);

        if(explode(' ', $query)[0] == 'SELECT') 
        {
            return $statement->fetchAll();
        }
    }

}