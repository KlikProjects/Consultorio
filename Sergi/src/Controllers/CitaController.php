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
    
        $this -> index();
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

        $this -> index();
    }

    public function edit($id)
    {
     
        $citaHelper = new Cita();
        $cita = $citaHelper->findById($id);
        
        new View("EditCita", ["student" => $student]);
    }
}

