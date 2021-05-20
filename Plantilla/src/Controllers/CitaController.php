<?php

namespace App\Controllers;

use App\Core\View;
use App\Database;
use App\Models\Cita;
use phpDocumentor\Reflection\Location;

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

        if (isset($_GET["action"]) && ($_GET["action"] == "edit")) {
            $this->edit($_GET["id"]);
            return;
        }

        if (isset($_GET["action"]) && ($_GET["action"] == "update")) {
            $this->update($_POST, $_GET["id"]);
            return;
        }

        if (isset($_GET["action"]) && ($_GET["action"] == "delete")) {
            $this->delete($_GET["id"]);
            return;
        }

        $this->index();
    }

    public function index(): void
    {
        $cita = new Cita();
        $citas = $cita->all();

        new View("CitasList", ["citas" => $citas]);
    }

    public function create(): void
    {
        echo 'Aqui tendremos el Formulario para crear';
    }

    public function store(array $request): void
    {
        $newCita = new Cita($request["name"]);
        $newCita->save();

        $this->index();
    }

    public function delete($id)
    {
        $citaHelper = new Cita();
        $cita = $citaHelper->findById($id);
        $cita->delete();

        $this->index();
    }

    public function edit($id)
    {
        $citaHelper = new Cita();
        $cita = $citaHelper->findById($id);
        new View("EditCita", ["cita" => $cita]);
    }

    public function update(array $request, $id)
    {
        $citaHelper = new Cita();
        $cita = $citaHelper->findByID($id);
        $cita->rename($request["name"]);
        $cita->update();

        $this->index();
    }
}
