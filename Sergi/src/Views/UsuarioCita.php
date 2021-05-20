<?php require_once("Components/Layout.php"); ?>


<body class="bodyUsuarioEdit">
    <?php require_once("Components/HeaderAdd.php"); ?>

    <main class="mainContainerAllDate">


        <?php
        foreach ($data["citas"] as $cita) {
            echo "
                <div class='formBoxOne'>
            <div class='boxDate_name'>
                <p class='boxDate txtInput'>{$cita->getFecha()}</p>
                <p class='boxName txtInput'>{$cita->getNombre()}</p>
                <p class='boxConsulta'>{$cita->getConsulta()}</p>
            </div>

            <a href='?action=delete&id={$cita->getId()}'>
            <button class='buttonDelete'>
                <img src='./public/img/delete.svg' alt='close' class='imgDelete ' />
            </button>
            </a>
            <a href='?action=edit&id={$cita->getId()}'>
            <input class='checkbox' type='checkbox' />
             </a>
             </div>";
        } ?>

    </main>

    <footer class="footerContainer">
        <button class="buttonsPrincipals">VOLVER</button>
    </footer>
</body>

</html>