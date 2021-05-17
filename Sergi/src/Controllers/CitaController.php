<?php

namespace App\Controllers;

use App\Core\View;
use App\Database;
use App\Models\Cita;

class CitaController

{
    public function __construct()
    {
        
    
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
        echo 'Aqui tendremos el Formulario para crear';
        // new View("CreateStudent");
    }
}

