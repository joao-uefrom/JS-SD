<?php

class DataBase
{

    public static $pdo;

    public static function conectar(): PDO
    {
        if (self::$pdo == null) {
            self::$pdo = new \PDO('sqlite:../database.sqlite');
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }

}