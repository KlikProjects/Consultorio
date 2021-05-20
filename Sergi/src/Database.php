<?php

namespace App;

use PDO;
use PDOException;

class Database
{

    public $mysql;

    public function __construct()
    {
        try {
            $this->mysql = $this->getConnection();
        } catch (PDOException $ex) {
            echo "Ooooops, sois muy malos para el código !" . $ex->getMessage();
        }
    }

    private function getConnection()
    {

        $host = "eu-cdbr-west-01.cleardb.com";
        $user = "b903d83205089c";
        $pass = "bc8b00c6";
        $database = "heroku_c294b90092b0a6b";
/* 
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "elconsultorio"; */
        $charset = "utf-8";
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $pdo = new pdo("mysql:host={$host};dbname={$database};charset{$charset}", $user, $pass, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}
