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
    public $table = "citascoders";

    public function __construct(string $nombre = '', string $consulta = '', string $fecha = null, string $resuelto = null, int $id = null)
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
        $this->database->mysql->query("INSERT INTO `{$this->table}` (`nombre`, `consulta`) VALUES ('$this->nombre', '$this->consulta');");
    }

    public function all()
    {
        $prueba = new Database();
        $query = $prueba->mysql->query('SELECT * FROM citascoders');
        $codersArray = $query->fetchAll();
        $coderList = [];
        foreach ($codersArray as $coder) {
            $coderItem = new Cita($coder['nombre'], $coder['consulta'], $coder['fecha'], $coder['resuelto'], $coder['id']);
            array_push($coderList, $coderItem);
        }

        return $coderList;
    }

    public function deleteById($id)
    {
    $query = $this->database->mysql->query("DELETE FROM `citascoders` WHERE `citascoders`.`id` = {$id}");
    }

    public function delete()
    {
    $query = $this->database->mysql->query("DELETE FROM `citascoders` WHERE `citascoders`.`id` = {$this->id}");
    }

    public function findById($id)
    {
    $query = $this->database->mysql->query("SELECT * FROM `citascoders` WHERE `id` = {$id}");
    $result = $query->fetchAll();
    $cita = new Cita($result[0]['nombre'], $result[0]['consulta'], $result[0]['fecha'], $result[0]['resuelto'], $result[0]['id']);
        
    return $cita;

    }

    public function modify($consulta)
    {
        $this->consulta = $consulta;
    }

    public function update()
    {
        $this->database->mysql->query("UPDATE `citascoders` SET `consulta` =  '{$this->consulta}' WHERE `id` = {$this->id}");
    }
    
    

    // public function UpdateById($data, $id)
    //  {
    //      $this->database->mysql->query("UPDATE `students` SET `name` =  '{$data["name"]}' WHERE `id` = {$id}");
    //  }

    //  public function Update()
    //  {
    //      $this->database->mysql->query("UPDATE `students` SET `name` =  '{$this->name}' WHERE `id` = {$this->id}");
    //  }
    }


