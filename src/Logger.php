<?php

if(isset($_POST['name']) && isset($_POST['consulta'])){

    $logFile = fopen("log.txt", 'a') or die("Error creando archivo");

    fwrite($logFile, "\n".date("d/m/Y H:i:s"). " {$_POST['name']}" . " ha hecho una consulta: " . $_POST['consulta']) or die("Error escribiendo en el archivo");

    fclose($logFile);
}

?>