<?php

namespace App\Models;


use App\Database;

class Cita
{
    public ?int $id;
    public string $nombre;
    public string $consulta;
    public ?string $resuelto;
    public ?string $fecha;
    public $database;
    public $table = "citascoder";

    public function __construct(string $nombre = '', int $id = null, string $consulta = '', string $resuelto = null,string $fecha = null)
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
        $this->database->mysql->query("INSERT INTO `{$this->table}` (`nombre`) VALUES ('$this->nombre');");
    }

    public function all()
    {
        $query = $this->database->mysql->query("select * FROM {$this->table}");
        $studentsArray = $query->fetchAll();
        $studentList = [];
        foreach ($studentsArray as $student) {
            $studentItem = new Student($student["name"], $student["id"], $student["created_at"]);
            array_push($studentList, $studentItem);
        }

        return $studentList;
    }

    public function deleteById($id)
    {
        $query = $this->database->mysql->query("DELETE FROM `students` WHERE `students`.`id` = {$id}");
    }

    public function delete()
    {
        $query = $this->database->mysql->query("DELETE FROM `students` WHERE `students`.`id` = {$this->id}");
    }

    public function findById($id)
    {
        $query = $this->database->mysql->query("SELECT * FROM `students` WHERE `id` = {$id}");
        $result = $query->fetchAll();

        return new Student($result[0]["name"], $result[0]["id"], $result[0]["created_at"]);
    }

    public function UpdateById($data, $id)
    {
        $this->database->mysql->query("UPDATE `students` SET `name` =  '{$data["name"]}' WHERE `id` = {$id}");
    }

    public function Update()
    {
        $this->database->mysql->query("UPDATE `students` SET `name` =  '{$this->name}' WHERE `id` = {$this->id}");
    }
}
