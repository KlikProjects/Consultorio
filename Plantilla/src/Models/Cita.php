<?php


//namespace App\Models;

include 'Database.php';

//use App\Database;

class Cita
{
    private ?int $id;
    private string $nombre;
    private string $temaconsulta;
    private ?string $resuelto;
    private ?string $fecha;
    private $database;
    private $table = 'citascoders';

    public function __construct(int $id = null, string $nombre = '', string $temaconsulta = '', string $resuelto = null, string $fecha = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->temaconsulta = $temaconsulta;
        $this->resuelto = $resuelto;
        $this->fecha = $fecha;

        if (!$this->database) {
            $this->database = new Database();
        }
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function rename($nombre)
    {
        $this->nombre = $nombre;
    }

    public function guardar(): void
    {
        $this->database->mysql->query("INSERT INTO `{$this->table}` (`nombre`) VALUES ('$this->nombre');");
    }

    public function all()
    {
        $query = $this->database->mysql->query("SELECT * FROM {$this->table}");
        $codersArray = $query->fetchAll();
        $codersList = [];
        foreach ($codersArray as $coder) {
            $codersItem = new Cita($coder["nombre"], $coder["temaconsulta"], $coder["fecha"]);
            array_push($codersList, $codersItem);
        }

        //return $codersList;
        print_r($codersList);
    }
    // public function deleteById($id)
    // {
    //     $query = $this->database->mysql->query("DELETE FROM `students` WHERE `students`.`id` = {$id}");
    // }

    // public function delete()
    // {
    //     $query = $this->database->mysql->query("DELETE FROM `students` WHERE `students`.`id` = {$this->id}");
    // }

    // public function findById($id)
    // {
    //     $query = $this->database->mysql->query("SELECT * FROM `students` WHERE `id` = {$id}");
    //     $result = $query->fetchAll();

    //     return new Student($result[0]["name"], $result[0]["id"], $result[0]["created_at"]);
    // }

    // public function UpdateById($data, $id)
    // {
    //     $this->database->mysql->query("UPDATE `students` SET `name` =  '{$data["name"]}' WHERE `id` = {$id}");
    // }

    // public function Update()
    // {
    //     $this->database->mysql->query("UPDATE `students` SET `name` =  '{$this->name}' WHERE `id` = {$this->id}");
    // }
}
