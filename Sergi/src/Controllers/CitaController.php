<?php


namespace App\Controllers;

use App\Core\View;
use App\Database;
use App\Models\Cita;


require_once("./src/Logger.php");

class CitaController

{
    public function __construct()
    {
        if (isset($_GET["action"]) && ($_GET["action"] == "index")) {
            $this->index();

            return;
        }

        if (isset($_GET["action"]) && ($_GET["action"] == "show")) {
            $this->show();

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

        if (isset($_GET["action"]) && ($_GET["action"] == "delete")) {

            $this->delete($_GET["id"]);
            return;
        }

        $this->index();
    }

    public function index():void
    {
        $cita = new Cita();
        $citas = $cita->all();

        new View("CreateCita", [
            "citas" => $citas,
        ]);
    }

    
    public function show(): void
    {
        $cita = new Cita();
        $citas = $cita->all();

        new View("UsuarioCita", [
            "citas" => $citas,
        ]);
    }

    public function store(array $request): void
    {
        $nuevaCita = new Cita($request['nombre'], $request['consulta']);
        $nuevaCita->save();

        $this->index();
    }



    public function delete($id)
    {
        $deleteCita = new Cita();
        $cita = $deleteCita->findById($id);
        $cita->delete();

        $this->index();
    }

    public function edit($id)
    {
        
        $editCita = new Cita();
        $cita = $editCita->findById($id);

        new View("EditCita", ["cita" => $cita]);
    }
}
