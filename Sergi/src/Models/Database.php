<?php


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

        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "elconsultorio";
        $charset = "utf-8";
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $pdo = new pdo("mysql:host={$host};dbname={$database};charset{$charset}", $user, $pass, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}
