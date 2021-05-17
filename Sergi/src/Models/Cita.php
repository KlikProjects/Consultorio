<?php
include "Database.php";


class Cita
{
    public ?int $id;
    public string $nombre;
    public string $consulta;
    public ?string $resuelto;
    public ?string $fecha;
    public $database;
    public $table = "citascoder";

    public function __construct(string $nombre = '', string $consulta = '', string $fecha = null, int $id = null, string $resuelto = null)
    {
        $this->nombre = $nombre;
        $this->id = $id;
        $this->consulta = $consulta;
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

    public function getConsulta()
    {
        return $this->consulta;
    }

    public function getResuelto()
    {
        return $this->resuelto;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function save(): void
    {
        $this->database->mysql->query("INSERT INTO `{$this->table}` (`nombre`, `consulta`) VALUES ('$this->nombre', `$this ->consulta`);");
    }

    public function all()
    {
        $prueba = new Database();
        $query = $prueba->mysql->query('SELECT * FROM citascoders');
        $codersArray = $query->fetchAll();
        $coderList = [];
        foreach ($codersArray as $coder) {
            $coderItem = new Cita($coder['nombre'], $coder['consulta'], $coder['fecha']);
            array_push($coderList, $coderItem);
        }

        return $coderList;
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
    //  {
    //      $this->database->mysql->query("UPDATE `students` SET `name` =  '{$data["name"]}' WHERE `id` = {$id}");
    //  }

    //  public function Update()
    //  {
    //      $this->database->mysql->query("UPDATE `students` SET `name` =  '{$this->name}' WHERE `id` = {$this->id}");
    //  }
}
