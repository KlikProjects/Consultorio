<?php

namespace App\Controllers;

use App\Core\View;
use App\Database;
use App\Models\Cita;

class CitaController

{
    public function __construct()
    {
        if (isset($_GET["action"]) && ($_GET["action"] == "create")) {
            $this->create();
            return;
        }

        if (isset($_GET["action"]) && ($_GET["action"] == "store")) {
            $this->store($_POST);
            return;
        }
    
        $this->index();
    }

    public function index()
    {
        $cita = new Cita();
        $citas = $cita->all();

        new View("CitasList", [
            "citas" => $citas,
        ]);
    }

    public function create(): void
    {
        new View("CreateStudent");
    }

    public function store(array $request): void
    {
        $nuevaCita = new Cita($request['name'], $request['consulta']);
        $nuevaCita -> save();
        $this->index();
    }
}

