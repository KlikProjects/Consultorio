<?php require_once("Components/Layout.php");
?>

<body>

    <?php require_once("Components/Header.php") ?>
    <main class="container">
        <a href="?action=create">
            <button class="btn btn-primary btn-circle btn-lg">
                <i class="fas fa-plus"></i>
            </button>
        </a>
        <table class="table table-light">

            <thead class="thead-light">
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Consulta</th>
                    <th>Resuelto</th>
                    <th>Fecha</th>
                </tr>
            </thead>

            <tbody>
                <?php

                foreach ($data["citas"] as $cita) {
                    echo "
                    <tr>
                        <td>{$cita->getNombre()}</td>
                        <td>{$cita->getConsulta()}</td>
                        
                    </tr>
                    ";
                } ?>

            </tbody>
        </table>
    </main>
</body>

</html>