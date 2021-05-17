<?php

include "../Models/Cita.php";
include "./Sergi/src/Core/View.php";

class CitaController

{

    public function __construct()
    {
        
        
    
        $this->index();
    }

    public function index(): void
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
